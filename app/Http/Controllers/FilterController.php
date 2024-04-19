<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use App\Models\VendorLocationMapModel;
use App\Models\VendorsModel;
use App\Models\LocationsModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Model\BaseModelController;
use App\Http\Controllers\Api\BaseApiController;

class FilterController extends Controller
{
    public function backHome(Request $request){
        $input = $request->input();
        return view('welcome',["request"=>$request]);
    }
    public function index(Request $request){
        $response = $this->callApi($request);
        if(empty($response)){
            $response = [];
        }
        return view('filter',["request"=>$request, "response"=>$response]);
    }
    public function callApi(Request $request){
        $input = $request->input();
        $pickup = BaseModelController::getLocationById($request->pickup);
        $dropoff = BaseModelController::getLocationById($request->dropoff);
        // print_r($pickup);
        // die();
        $pickupArray = array_filter(array_unique(array_column($pickup['vendors'], 'id')));
        $dropoffArray = array_filter(array_unique(array_column($dropoff['vendors'], 'id')));

        $resultIds = array_intersect($dropoffArray, $pickupArray);
        $result = \App\Utility\Utility::filterArrayByValues($pickup['vendors'], 'id', $resultIds);
        $response = [];
        foreach($result as $res){
            if(isset($res['api_url_code']) && $res['api_url_code'] == 'yesaway' && isset($res['is_api_enable']) && intval($res['is_api_enable']) == 1){
                $input['vendor_id'] = $res['id'];
                $input['pickup_datetime'] = date('Y-m-d', strtotime($request->start_date))."T".date('H:m:s', strtotime($request->start_time));
                $input['dropoff_datetime'] = date('Y-m-d', strtotime($request->end_date))."T".date('H:m:s', strtotime($request->end_time));
                $input['pickup_location_code'] = $pickup['code'];
                $input['dropoff_location_code'] = $dropoff['code'];
                $input['country_code'] = $pickup['country_code'];
                $apiData = \App\Http\Controllers\Api\YesAwayApiController::searchVehiclesForLocation($input);
                $apiVehiclesData = ((isset($apiData) && is_array($apiData) && isset($apiData['vehicles'])) ? BaseApiController::addAdditionalData($apiData['vehicles'],$res) : []);
                $response = array_merge($response, (isset($apiVehiclesData) ? $apiVehiclesData : []));
            }
            if(isset($res['api_url_code']) && $res['api_url_code'] == 'easirent' && isset($res['is_api_enable']) && intval($res['is_api_enable']) == 1){
                $input['vendor_id'] = $res['id'];
                $input['pickup_date'] = date('Y-m-d', strtotime($request->start_date));
                $input['pickup_time'] = date('H:m', strtotime($request->start_time));
                $input['dropoff_date'] = date('Y-m-d', strtotime($request->end_date));
                $input['dropoff_time'] = date('H:m', strtotime($request->end_time));
                $input['pickup_location_code'] = $pickup['code'];
                $input['dropoff_location_code'] = $dropoff['code'];
                $apiData = \App\Http\Controllers\Api\EasirentApiController::searchVehiclesForLocation($input);
                $apiVehiclesData = ((isset($apiData) && is_array($apiData) && isset($apiData['vehicles'])) ? BaseApiController::addAdditionalData($apiData['vehicles'],$res) : []);
                $response = array_merge($response, (isset($apiVehiclesData) ? $apiVehiclesData : []));
            }
            if(isset($res['api_url_code']) && $res['api_url_code'] == 'nissa' && isset($res['is_api_enable']) && intval($res['is_api_enable']) == 1){
                $input['vendor_id'] = $res['id'];
                $input['dropoff_location_id'] = $pickup['location_id'];
                $input['pickup_location_id'] = $dropoff['location_id'];
                $input['pickup_day'] = date('d', strtotime($request->start_date));
                $input['pickup_month'] = date('m', strtotime($request->start_date));
                $input['pickup_year'] = date('Y', strtotime($request->start_date));
                $input['dropoff_day'] = date('d', strtotime($request->end_date));
                $input['dropoff_month'] = date('m', strtotime($request->end_date));
                $input['dropoff_year'] = date('Y', strtotime($request->end_date));
                $input['pickup_hour'] = date('H', strtotime($request->start_time));
                $input['pickup_min'] = "00";
                $input['dropoff_hour'] = date('H', strtotime($request->end_time));
                $input['dropoff_min'] = "00";
                //$input['currency'] = $pickup['currency'];
                $apiData = \App\Http\Controllers\Api\NissaApiController::searchVehiclesForLocation($input);
                $apiVehiclesData = ((isset($apiData) && is_array($apiData) && isset($apiData['vehicles'])) ? BaseApiController::addAdditionalData($apiData['vehicles'],$res) : []);
                $response = array_merge($response, (isset($apiVehiclesData) ? $apiVehiclesData : []));
            }
            if(isset($res['api_url_code']) && $res['api_url_code'] == 'easygo' && isset($res['is_api_enable']) && intval($res['is_api_enable']) == 1){
                $input['vendor_id'] = $res['id'];
                $input['dropoff_location_id'] = $pickup['location_id'];
                $input['pickup_location_id'] = $dropoff['location_id'];
                $input['pickup_day'] = date('d', strtotime($request->start_date));
                $input['pickup_month'] = date('m', strtotime($request->start_date));
                $input['pickup_year'] = date('Y', strtotime($request->start_date));
                $input['dropoff_day'] = date('d', strtotime($request->end_date));
                $input['dropoff_month'] = date('m', strtotime($request->end_date));
                $input['dropoff_year'] = date('Y', strtotime($request->end_date));
                $input['pickup_hour'] = date('H', strtotime($request->start_time));
                $input['pickup_min'] = "00";
                $input['dropoff_hour'] = date('H', strtotime($request->end_time));
                $input['dropoff_min'] = "00";
                //$input['currency'] = $pickup['currency'];
                $apiData = \App\Http\Controllers\Api\EasygoApiController::searchVehiclesForLocation($input);
                $apiVehiclesData = ((isset($apiData) && is_array($apiData) && isset($apiData['vehicles'])) ? BaseApiController::addAdditionalData($apiData['vehicles'],$res) : []);
                $response = array_merge($response, (isset($apiVehiclesData) ? $apiVehiclesData : []));
            }
            if(isset($res['is_api_enable']) && intval($res['is_api_enable']) == 0){
                //Manual Data process
                /*$input['vendor_id'] = $res['id'];
                $input['dropoff_location_id'] = $pickup['location_id'];
                $input['pickup_location_id'] = $dropoff['location_id'];
                $input['pickup_day'] = date('d', strtotime($request->start_date));
                $input['pickup_month'] = date('m', strtotime($request->start_date));
                $input['pickup_year'] = date('Y', strtotime($request->start_date));
                $input['dropoff_day'] = date('d', strtotime($request->end_date));
                $input['dropoff_month'] = date('m', strtotime($request->end_date));
                $input['dropoff_year'] = date('Y', strtotime($request->end_date));
                $input['pickup_hour'] = date('H', strtotime($request->start_time));
                $input['pickup_min'] = "00";
                $input['dropoff_hour'] = date('H', strtotime($request->end_time));
                $input['dropoff_min'] = "00";
                //$input['currency'] = $pickup['currency'];
                $apiData = \App\Http\Controllers\Api\EasygoApiController::searchVehiclesForLocation($input);
                $apiVehiclesData = ((isset($apiData) && is_array($apiData) && isset($apiData['vehicles'])) ? BaseApiController::addAdditionalData($apiData['vehicles'],$res) : []);
                $response = array_merge($response, (isset($apiVehiclesData) ? $apiVehiclesData : []));*/
            }
        }
        // echo "<pre>"; print_r($response); die();
        return $response;
    }
}
