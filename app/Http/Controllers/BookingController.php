<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Models\CountryModel;
use App\Models\VendorLocationMapModel;
use App\Models\VendorsModel;
use App\Models\LocationsModel;
use App\Models\BookingModel;
use App\Models\CouponModel;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Auth;
use App\Http\Controllers\Api\YesAwayApiController;
use App\Http\Controllers\Api\EasirentApiController;

class BookingController extends Controller
{
    public function index(){
        $booking = session()->get('booking');
        $coupon = CouponModel::get()->toArray();
        return view('booking',['booking'=>$booking, 'coupons'=>$coupon]);
    }
    public function setSes(request $request){
        $input = $request->data;
        $data = $input['data'];
        if($request->type == 'personal_detail'){
            $booking = session()->get('booking');
            $json['booking_detail']['personal_detail'] = $data;
            $json['booking_detail']['booking'] = $booking;
            $userId = Auth::id();
            $ven_array['user_id'] = isset($userId) ? $userId : 0;
            $ven_array['vendor_id'] = $booking['vendor_id'];
            $ven_array['vehicle_id'] = 0;
            $ven_array['currency_code'] = session()->get('currency_name');
            $ven_array['dropoff_location_id'] = $booking['dropoff'];
            $ven_array['pickup_location_id'] = $booking['pickup'];
            $ven_array['meta_json'] = json_encode($json);
            $ven_array['discount'] = (isset($data['discount']) || $data['discount'] != '') ? $data['discount'] : 0;
            $ven_array['coupon'] = (isset($data['coupon']) || $data['coupon'] != '') ? $data['coupon'] : '';
            $ven_array['payment_type'] = $data['payment_type'] == 'Full' ? 1 : 0;
            $ven_array['created_at'] = date('Y-m-d');
            $book = BookingModel::create($ven_array);
            $data['id'] = $book->id;
            session()->put($request->type, $data);
            $info = array(
                'name' => "Cars4Hires.com"
            );
            Mail::send(['html' => 'mail'], $info, function ($message) use ($booking) 
            {
                $message->to(env('SUPPROT_EMAIL'), 'Cars4Hires')
                ->subject("New Booking arrived on ".date('d-M-Y', strtotime($booking['start_date']))." at ".date('h:i A', strtotime($booking['start_time'])));
                $message->from(env('MAIL_USERNAME'), 'Cars4Hires.com');
            });
        }
        if($request->type != 'personal_detail'){
            $cars = json_decode($data['cars']);
            if($cars->api_url_code == 'yesaway'){
                $data = YesAwayApiController::createBookingArray($data);
            }
            else if($cars->api_url_code == 'easirent'){
                $data = EasirentApiController::createBookingArray($data);
            }
        }
        session()->put($request->type, $data);
        return true;
    }
    public function bookingConfirm(){
        $booking = session()->get('booking');
        $personal_detail = session()->get('personal_detail');
        return view('booking_confirm',['booking' => $booking, 'personal_detail' => $personal_detail]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $personal_detail = session()->get('personal_detail');
        $booking = session()->get('booking');
        $boobing_detail = [];
        if($booking['api_url_code'] == 'yesaway'){
            $data = \App\Http\Controllers\Api\YesAwayApiController::bookingStore();
            $boobing_detail = \App\Http\Controllers\Api\YesAwayApiController::bookVehicleForLocation($data);
            $api_order_id = isset($boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['Customer']['Primary']['TPA_Extensions']['TPA_Extensions_Ref']['@attributes']['BillingRef']) ? $boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['Customer']['Primary']['TPA_Extensions']['TPA_Extensions_Ref']['@attributes']['BillingRef'] : '';
            $api_billing_id = isset($boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['VehSegmentCore']['ConfID']['@attributes']['ID']) ? $boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['VehSegmentCore']['ConfID']['@attributes']['ID'] : '';
            $pnr_status = isset($boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['VehSegmentCore']['ConfID']['@attributes']['Status']) ? $boobing_detail['OTA_VehResRS']['VehResRSCore']['VehReservation']['VehSegmentCore']['ConfID']['@attributes']['Status'] : '';
        }
        else if($booking['api_url_code'] == 'easirent'){
            $data = \App\Http\Controllers\Api\EasirentApiController::bookingStore();
            $boobing_detail = \App\Http\Controllers\Api\EasirentApiController::bookVehicleForLocation($data);
            $api_order_id = isset($boobing_detail['reservation']['reference']) ? $boobing_detail['reservation']['reference'] : '' ;
            $api_billing_id = isset($boobing_detail['reservation']['agencyreference']) ? $boobing_detail['reservation']['agencyreference'] : '' ;;
            $pnr_status = isset($boobing_detail['reservation']['status']) && ($boobing_detail['reservation']['status'] == 'Approved') ? 'confirmed' : '' ;
        }
        // $data['driver_age'] = isset($input['driver_age']) ? $input['driver_age'] : '35';
        // $data['driver_license_type'] = isset($input['driver_license_type']) ? $input['driver_license_type'] : '2';
        
        $info = array(
            'name' => "Cars4Hires.com"
        );
        Mail::send(['html' => 'payment'], $info, function ($message)
        {
            $message->to(env('SUPPROT_EMAIL'), 'Cars4Hires')
            ->subject('Booking Details | Car4hires.com');
            $message->from(env('MAIL_USERNAME'), 'Cars4Hires.com');
        });
       
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $commission = \App\Http\Controllers\Api\BaseApiController::getCommission($booking['vendor_id']);
                $value = session()->get('currency_value');
                $value = round(($value * $booking['vehicle_price']),3);
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
                $book = BookingModel::where('id', $personal_detail['id'])->first();
                $book->razorpay_order_id = $input['razorpay_payment_id'];
                $book->paid_amount = ($payment['amount'] / 100);
                $book->payment_status = 1;
                $book->total_amount = $value;
                $book->order_status = $pnr_status;
                $book->api_billing_id = $api_billing_id;
                $book->api_order_id = $api_order_id;
                $book->currency_code = $payment->currency;
                $book->updated_at = date('Y-m-d');
                $book->save();
                session()->put('personal_detail',[]);
                session()->put('booking',[]);
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        return redirect(url('/'));
    }
    public function sendmail(){
        return view('emails/welcome');
    }
    public function orders(){
        $page_limit = env('PAGE_LIMIT');
        $booking = BookingModel::select('id', 'payment_status', 'meta_json')->paginate($page_limit)->toArray();
        $booking_data = self::formatOrdersData($booking);
        return view('admin/orders', ['bookings'=>$booking_data, 'selected_menu'=>'booking_order']);
    }
    public static function formatOrdersData($bookings){        
        $data = [];
        $formatedData = [];
        foreach($bookings['data'] as $booking){
            $book_array = json_decode($booking['meta_json']);
            $object = [];
            $meta_json =  isset($booking->meta_json) ? json_decode($booking->meta_json, true) : [];
            $pickup_time = (isset($book_array->booking_detail->booking->start_date) ? $book_array->booking_detail->booking->start_date : '').' '.(isset($book_array->booking_detail->booking->start_time) ? $book_array->booking_detail->booking->start_time : '');
            $dropoff_time = (isset($book_array->booking_detail->booking->end_date) ? $book_array->booking_detail->booking->end_date : '').' '.(isset($book_array->booking_detail->booking->end_time) ? $book_array->booking_detail->booking->end_time : '');
            $object['booking_id'] = isset($booking['id']) ? $booking['id']: '';
            $object['payment_status'] = isset($booking['payment_status'])  ? ($booking['payment_status'] == 0 ? 'Pending' : 'Paid') : '';
            $object['pickup_city']  = isset($book_array->booking_detail->booking->pickup_location) ? $book_array->booking_detail->booking->pickup_location : '';
            $object['dropoff_city']  = isset($book_array->booking_detail->booking->dropoff_location) ? $book_array->booking_detail->booking->dropoff_location : '';
            $object['pickup_time']  = isset($book_array->booking_detail->booking->start_date) ? date('d-M-Y h:i A', strtotime($pickup_time)) : '';
            $object['dropoff_time']  = isset($book_array->booking_detail->booking->end_date) ? date('d-M-Y h:i A', strtotime($dropoff_time)) : '';
            $object['vendor_name'] =  isset($book_array->booking_detail->booking->company_name) ? $book_array->booking_detail->booking->company_name : '';
            $object['payment_type'] = isset($book_array->booking_detail->personal_detail->payment_type) ? $book_array->booking_detail->personal_detail->payment_type : '';
            $data[] = $object;
        }
        $formatedData['links'] = $bookings['links'];
        $formatedData['current_page'] = $bookings['current_page'];
        $formatedData['data'] = $data;
        $formatedData['first_page_url'] = $bookings['first_page_url'];
        $formatedData['from'] = $bookings['from'];
        $formatedData['last_page'] = $bookings['last_page'];
        $formatedData['last_page_url'] = $bookings['last_page_url'];
        $formatedData['next_page_url'] = $bookings['next_page_url'];
        $formatedData['path'] = $bookings['path'];
        $formatedData['per_page'] = $bookings['per_page'];
        $formatedData['prev_page_url'] = $bookings['prev_page_url'];
        $formatedData['to'] = $bookings['to'];
        return $formatedData;
    }
}