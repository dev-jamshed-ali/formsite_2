<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToAdmin;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse; 
use DB;

class ForgetPasswordController extends Controller
{
    

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) { 
            return response()->json(['error' => env('PROJECT_NOTIFICATION')]);
            //return response()->json(['success' => __('Already loginned!')], $this->successStatus);
        } 

        // Define validation rules for your request data
        $rules = [
            'email' => 'required|email|max:80', 
        ];

        // Define custom error messages (optional)
        $customMessages = [ 
            'email.required' => 'Email is required field',
            'email.email' => 'Enter a valid Email address',
            'email.max' => 'Email should be max 80 characters',              
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } 
 

        $check_email = Admin::where('email',$request->email)->first();
        if(!$check_email)
        {
            return response()->json(['error' => 'Email address not found']);
        }else{
            $email_template_data = DB::table('email_templates')->where('id', 5)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $token = hash('sha256',time());
            //$reset_link = url('admin/reset-password/'.$token.'/'.urlencode($request->email));
            $reset_link = url('admin/reset-password/'.$token.'/'.base64_encode($check_email->id));
            $message = str_replace('[[reset_link]]', $reset_link, $message);

            $data['token'] = $token;
            Admin::where('email', $check_email->email)->update($data);

            Mail::to($request->email)->send(new ResetPasswordMessageToAdmin($subject,$message));
        }

        //return redirect()->back()->with('success', 'Please check your email for reset instruction');
        return response()->json(['success' => __('Please check your email for reset instruction')], 200);	
    }

}
