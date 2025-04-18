<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Mail\ContactPageMessage;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{ 

    public function send_email(Request $request)
    { 
        if(env('PROJECT_MODE') == 0) { 
            return response()->json(['error' => env('PROJECT_NOTIFICATION')], 403);
        }
        
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $rules = [ 
            'visitor_name' => 'required|max:50',
            'visitor_email' => 'required|email|max:80',
            'visitor_phone' => 'required|max:20',
            'visitor_message' => 'required|max:600'
        ];

        // Define custom error messages (optional)
        $customMessages = [
            'visitor_name.required' => 'Name is required field', 
            //'visitor_name.strip_tags' => 'Name content contains special tags!', 
            'visitor_name.max' => 'Name max length should be 50 characters',  
            'visitor_email.required' => 'Email is required field',
            'visitor_email.email' => 'Enter a valid Email address!', 
            //'visitor_email.strip_tags' => 'Email content contains special tags!', 
            'visitor_email.max' => 'Email max length should be 80 characters', 
            'visitor_phone.required' => 'Phone number is required field', 
            //'visitor_phone.strip_tags' => 'Phone number content contains special tags!', 
            'visitor_phone.max' => 'Phone number max length should be 20 characters', 
            'visitor_message.required' => 'Message is required field', 
            //'visitor_message.strip_tags' => 'Message content contains special tags!', 
            'visitor_message.max' => 'Message max length should be 600 characters', 
        ];
       
        $validator = Validator::make($request->all(), $rules, $customMessages);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 403);
        } 
        
        // if($g_setting->google_recaptcha_status == 'Show') {
        //     $request->validate([
        //         'g-recaptcha-response' => 'required'
        //     ],
        //     [
        //         'g-recaptcha-response.required'    => 'You must have to input recaptcha correctly'
        //     ]);
        // }

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 1)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[visitor_name]]', $request->visitor_name, $message);
        $message = str_replace('[[visitor_email]]', $request->visitor_email, $message);
        $message = str_replace('[[visitor_phone]]', $request->visitor_phone, $message);
        $message = str_replace('[[visitor_message]]', $request->visitor_message, $message);

        $admin_data = DB::table('admins')->where('id',1)->first();

        //Mail::to('supportcenter@ginicoe.com')->send(new ContactPageMessage($subject,$message));
        Mail::to('younasali22@gmail.com')->send(new ContactPageMessage($subject,$message));

        return response()->json(['success' => __('Message is sent successfully! Admin will contact you soon!')], 200); 
    }
}
