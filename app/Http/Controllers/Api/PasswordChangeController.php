<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use DB;
use Hash;

class PasswordChangeController extends Controller
{
    public function update(Request $request){
        if(env('PROJECT_MODE') == 0) {
            return response()->json(['error' => env('PROJECT_NOTIFICATION')], 403);
        }

        $rules = [
            'password' => 'required',
            're_password' => 'required|same:password',
        ];

        // Define custom error messages (optional)
        $customMessages = [
            'password.required' => 'Password is required field', 
            're_password.required' => 'Retype Password is required field',
            're_password.same' => 'Password & Retype Password must be same!', 
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }

        $data['password'] = Hash::make($request->password);
        Admin::where('id', session('id'))->update($data);
 
        return response()->json(['success' => 'Password is updated successfully!'], 200);
    }

}
