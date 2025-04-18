<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use DB;

class ProfileChangeController extends Controller
{
    public function getprofile() {
        $records = Admin::where('id',session('id'))->get();
        return response()->json(['success'=>true,'message' => "Profile Get",'records'=>$records]);
    }
    public function update(Request $request){ 
        if(env('PROJECT_MODE') == 0) { 
            return response()->json(['error' => env('PROJECT_NOTIFICATION')], 403);
        }

        $rules = [ 
            'name' => 'required|max:50',
            'email' => 'required|email|max:80',
        ];

        $customMessages = [
            'name.required' => 'Name is required field',
            'name.max' => 'Name should be max 50 characters',
            'email.required' => 'Email is required field',
            'email.email' => 'Enter a valid Email address',
            'email.max' => 'Email should be max 80 characters',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        Admin::where('id',session('id'))->update($data);

        session(['name' => $request->name]);
        session(['email' => $request->email]);

        return response()->json(['success' => "Profile Information is updated successfully!"], 200);
    }
}
