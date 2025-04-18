<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;


class ConsumerController extends Controller{
 public function getAllConsumers(){
    $consumers = Admin::where('role_id', 4)->get(['id', 'name', 'phone', 'email', 'status', 'guid', 'total_score', 'form_completion', 'created_at', 'updated_at']);
    return response()->json([
        'status' => 'success',
        'message' => 'Fetched all consumers successfully.',
        'data' => $consumers
    ], 200);
 }

 public function getConsumerDetail($id){
    $consumer = Admin::with([
        'my_pidegree_info',
        'find_me_here',
        'gender_identity_info',
        'my_neighborhood_info',
        'employment_info',
        'charge_card_info',
        'family_and_medical_info',
        'this_is_me_return_back_data',
        'facial_image'
    ])->where('id', $id)->first();
    if (!$consumer) {
        return response()->json(['status' => 'error', 'message' => 'Consumer not found.'], 404);
    }
    return response()->json([
        'status' => 'success',
        'message' => 'Fetched consumer details successfully.',
        'data' => $consumer
    ], 200);
 }
}