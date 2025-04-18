<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Mail\ContactPageMessage;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $contact = DB::table('page_contact_items')->where('id', 1)->first();
        return view('pages.contact', compact('contact','g_setting'));
    }

    public function send_email(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $request->validate([
            'visitor_name' => 'required|max:50',
            'visitor_email' => 'required|email|max:80',
            'visitor_message' => 'required|max:600'
        ]);

        // Save data to the database
        ContactUs::create([
            'name' => $request->visitor_name,
            'email' => $request->visitor_email,
            'message' => $request->visitor_message,
            'phone' => $request->visitor_phone // Ensure this field exists in your form and database
        ]);

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 1)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $message = str_replace('[[visitor_name]]', $request->visitor_name, $message);
        $message = str_replace('[[visitor_email]]', $request->visitor_email, $message);
        $message = str_replace('[[visitor_phone]]', $request->visitor_phone, $message);
        $message = str_replace('[[visitor_message]]', $request->visitor_message, $message);

        $admin_data = DB::table('admins')->where('id',1)->first();

        Mail::to('supportcenter@ginicoe.com')->send(new ContactPageMessage($subject,$message));

        return redirect()->back()->with('success', 'Message is sent successfully! Admin will contact you soon');
    }

    
/* --------------------------------------- */
/* contact us - Admin */
/* --------------------------------------- */

public function contact_page()
{
    $messages = ContactUs::orderBy('created_at', 'desc')->paginate(5);
    
    return view('admin.contact.index', compact('messages'));
}

public function delete($id)
{
    try {
        $message = ContactUs::findOrFail($id);
        $message->delete();
        
        return redirect()->route('admin.contact.index')
                       ->with('success', 'Contact message deleted successfully');
    } catch (\Exception $e) {
        return redirect()->route('admin.contact.index')
                       ->with('error', 'Error deleting contact message');
    }
}

}
