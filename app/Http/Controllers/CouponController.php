<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Models\CountryModel;
use App\Models\VendorLocationMapModel;
use App\Models\VendorsModel;
use App\Models\LocationsModel;
use App\Models\CouponModel;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;
use Auth;

class CouponController extends Controller
{
    public function index(){
        return view('admin/coupon_add',['selected_menu'=>'coupon_add']);
    }
    public function couponView(){
        $page_limit = env('PAGE_LIMIT');
        $coupon = CouponModel::paginate($page_limit);
        return view('admin/coupon_view', ['coupons'=>$coupon, 'selected_menu'=>'coupon_view']);
    }
    public function addCoupon(request $request){
        $validated = $request->validate([
            'code' => ['required'],
            'amount' => ['required']
        ]);

        $coupon_array['code'] = $request->code;
        $coupon_array['amount'] = $request->amount;
        $coupon_array['description'] = $request->description;
        $coupon_array['created_at'] = date('Y-m-d');
        $data = CouponModel::create($coupon_array);
        return redirect('/coupon_view');
    }
    public function couponStatus($id, $status){
        $vendor = CouponModel::where('id', $id)->first();
        $vendor->status = $status;
        $vendor->save();
        return redirect('/coupon_view');
    }
    public function deleteCoupon($id){
        CouponModel::where('id', $id)->delete();
        return back();
    }
    public function verifyCoupon(request $request){
        $coupon = CouponModel::where('code', $request->data)->get()->toArray();
        $currency = "INR";
        $conversion_currency_name = session()->get('currency_name');
        $getCurrency = \App\Http\Controllers\Model\BaseModelController::getCurrencyValue($conversion_currency_name, $currency);
        $data['amount'] =  $coupon[0]['amount'] * $getCurrency;
        return json_encode($data);
    } 
}