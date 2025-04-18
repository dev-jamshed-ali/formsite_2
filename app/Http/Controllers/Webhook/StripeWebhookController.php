<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Donor;
use App\Models\GinicoeDonor;
use App\Models\PackageOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{

    public function index(Request $request)
    {

        $payload = $request->all();

        ///print_r($payload ); exit; 
        $data = [];
        // Verify the event type
        if ($payload['type'] === 'checkout.session.completed') {

            // Extract the required data from the payload
            $amount = $payload['data']['object']['amount_total'] / 100; // Convert amount to dollars
            $name = $payload['data']['object']['customer_details']['name'];
            $email = $payload['data']['object']['customer_details']['email'];
            $payment_type = $payload['data']['object']['metadata']['payment_type'];
             

            $data = ['name' => $name, 'email' => $email, 'amount' => $amount, 'payment_type' => $payment_type];

            if ($payment_type == 'donation') {
              
                $rw = GinicoeDonor::where('email', $email)->first(); 
                if($rw){
                    GinicoeDonor::where('id' , $rw->id)->update(['name' => $name, 'amount' => $amount ]);
                }else{
                    GinicoeDonor::create(['name' => $name, 'email' => $email, 'amount' => $amount ]);
                }
              
                /* GinicoeDonor::updateOrCreate([
                    'email' => $email
                ], [
                    'name' => $name,
                    'email' => $email,
                    'amount' => $amount
                ]); */
            }
            if ($payment_type == 'basic' || $payment_type == 'standard' || $payment_type == 'plus' || $payment_type == 'elite') {
               
                    $admin = Admin::where('email', $email)->first();

                    // get one year late date
                    $currentTimestamp = time();
                    $oneYearLaterTimestamp = strtotime('+1 year', $currentTimestamp);
                    $newDate = date('Y-m-d H:i:s', $oneYearLaterTimestamp);

                    PackageOwner::create(['admin_id' => $admin->id ?? '0','email' => $email,'name' => $name ,'package_type' => $payment_type, 'amount' => $amount, 'expire_at' => $newDate]);
            }
        }


        return response()->json(['received' => true, 'data' => $data]);
    }
}
