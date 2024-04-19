<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\VendorLocationMapModel;
use App\Models\VendorsModel;
use App\Models\LocationsModel;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index(){
        return view('admin/addLocation', ['selected_menu'=>"add_location"]);
    }
    public function addLocation(Request $request){
            $validated = $request->validate([
                'country' => ['required'],
                'name' => ['required']
            ]);
                // 'code' => ['required'],
                // 'id' => ['required'],
                // 'vendor' => ['required']
            $ven_array['country_id'] = $request->country;
            $ven_array['name'] = $request->name;
            $ven_array['code'] = $request->code;
            $ven_array['location_id'] = $request->id;
            $ven_array['created_at'] = date('Y-m-d');
            $data = LocationsModel::create($ven_array);
            $ven_array_map['location_id'] = $data->id;
            if(isset($request->vendor) && is_array($request->vendor) && count($request->vendor) > 0) {
                foreach($request->vendor as $vendor) {
                    $ven_array_map['vendor_id'] = $vendor;
                    VendorLocationMapModel::create($ven_array_map);
                }
            } else if(isset($request->vendor)){
                $ven_array_map['vendor_id'] = $request->vendor;
                VendorLocationMapModel::create($ven_array_map);
            }
            return redirect('/locations');
    }
    public function view(){
        $page_limit = env('PAGE_LIMIT');
        return view('admin/location',["location"=>LocationsModel::paginate($page_limit),'selected_menu'=>"locations"]);
    }
    public function editLocation($id){
        $location = LocationsModel::where('id', $id)->first();
        $vendor = VendorLocationMapModel::where('location_id', $id)->get()->toArray();
        return view('admin/editLocation', ["location"=>$location, "vend"=>$vendor, 'selected_menu'=>"locations"]);    
    }
    public function locationsedit($id, Request $request){ 
        $ven_array['country_id'] = $request->country;
        $ven_array['name'] = $request->name;
        $ven_array['code'] = $request->code;
        $ven_array['location_id'] = $request->id;
        LocationsModel::where('id', $id)->update($ven_array);
        VendorLocationMapModel::where('location_id', $id)->delete();
        if(isset($request->vendor) && is_array($request->vendor) && count($request->vendor) > 0) {
            foreach($request->vendor as $vendor) {
                VendorLocationMapModel::create(['location_id'=>$id,'vendor_id'=>$vendor]);
            }
        }
        return redirect('/locations');
    }
    public function editcountry($id){
        $country = CountryModel::where('id', $id)->get()->toArray();
        return view('admin/editcountry', ["country"=>$country[0], 'selected_menu'=>"country"]);
    }
    public function countryedit(Request $request, $id){
        $validated = $request->validate([
            'name' => ['required'],
            'code' => ['required']
        ]);
        //'phone_code' => ['required']
        $country = CountryModel::where('id', $id)->first();
        $country->country_name = $request->name;
        $country->country_code = $request->code;
        $country->phone_code = $request->phone_code;
        $country->save();
        return redirect('/country');
    }
    public function updatelocation($id, $status){
        $country = LocationsModel::where('id', $id)->first();
        $country->status = $status;
        $country->save();
        return redirect('/locations');
    }
    public function updatecountry($id, $status){
        $country = CountryModel::where('id', $id)->first();
        $country->status = $status;
        $country->save();
        return redirect('/country');
    }
    public function vendorEdit($id){
        return view('admin/addVendors', ["vendors"=>VendorsModel::where('id', $id)->first(), 'selected_menu'=>"vendors"]);
    }
    public function vendorSave(request $request, $id){
        $file = $request->file('pan_no_file');
        if(isset($file)) {
            $file->getClientOriginalName();
            $destinationPath = 'uploads';
        }
        $vendors = VendorsModel::where('id', $id)->first();
        if($request->f_name != ''){
            $vendors->first_name = $request->f_name;
        }
        if($request->last_name != ''){
            $vendors->last_name = $request->l_name;
        }
        if($request->phone_no != ''){
            $vendors->phone_no = $request->phone_no;
        }
        if($request->email != ''){
            $vendors->email = $request->email;
        }
        if($request->pan_no != ''){
            $vendors->pan_no = $request->pan_no;
        }
        if(isset($file) && $file->move($destinationPath,$file->getClientOriginalName())){
            $vendors->pan_image = $file->getClientOriginalName();
        }
        if($request->tan_no != ''){
            $vendors->tan_no = $request->tan_no;
        }
        if($request->gst_no != ''){
            $vendors->gst_no = $request->gst_no;
        }
        if($request->commission != ''){
            $vendors->commission = $request->commission;
        }
        if($request->api_code != ''){
            $vendors->api_url_code = $request->api_code;
        }
        $vendors->save();
        return redirect('/vendors');
    }
    public function vendorStatus($id, $status){
        $vendor = VendorsModel::where('id', $id)->first();
        $vendor->status = $status;
        $vendor->save();
        return redirect('/vendors');
    }
    public function country(){
        $page_limit = env('PAGE_LIMIT');
        return view('admin/viewCountry',["country"=>CountryModel::paginate($page_limit), 'selected_menu'=>'country']);
    }
    public function addCountry(){

        return view('admin/addcountry',['selected_menu'=>"add_country"]);
    }
    public function addVendors(){
        return view('admin/addVendors');
    }
    public function vendors(){
        $page_limit = env('PAGE_LIMIT');
        return view('admin/vendors',["vendors"=>VendorsModel::paginate($page_limit), 'selected_menu'=>"vendors"]);
    }
    public function submitCountry(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'code' => ['required'],
        ]);
                $coun_array['country_name'] = $request->name;
                $coun_array['country_code'] = $request->code;
                $coun_array['phone_code'] = $request->phone_code; 
                $coun_array['created_at'] = date('Y-m-d');
                $data = CountryModel::create($coun_array);
                return redirect('/country');
           
    }
    public function submitVendors(Request $request){
        $ven_array['first_name'] = $request->first_name;
        $ven_array['last_name'] = $request->last_name;
        $ven_array['phone_code'] = $request->phone_code; 
        $ven_array['created_at'] = date('Y-m-d');
        $data = CountryModel::create($ven_array);
        return redirect('/country');
    }
    public function States(Request $request){
        $request = $request->getParsedBody();
        $data = StatesModel::where('country_id', $request['country_id'])->get()->toArray();
        return $data;
    }
    public function District(Request $request){
        $request = $request->getParsedBody();
        $data = DistrictModel::where('state_id', $request['state_id'])->get()->toArray();
        return $data;
    }
    public function Pincode(Request $request){
        $request = $request->getParsedBody();
        $data = PincodeModel::where('district_id', $request['district_id'])->get()->toArray();
        return $data;
    }
    
    public static function getAllLocations(Request $request){
        $data = \App\Models\LocationsModel::select('locations.id','name', 'locations.code','locations.location_id','country_name', 'country_code', 'currency')
        ->JoinCountry()->where('locations.status',1)->get();
        return isset($data) ? json_encode($data->toArray()) : [];
    }
}
