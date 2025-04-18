<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Plan;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class PackageController extends Controller
{

    public function goto_payment_page($id)
    {
       $plan = Plan::find($id);
       $stripe_link = $plan->stripe_link;
    //    echo "<pre>";
    //    print_r(session());
    //    die;
    //    return session('id');
        if (session('id') != null) {
            // if ($package_name == 'basic')
            //     return redirect('https://buy.stripe.com/14kaFD0nSekOfEk4gi');
            // if ($package_name == 'standard')
            //     return redirect('https://buy.stripe.com/5kA5ljdaE0tY3VCdQT');
            // if ($package_name == 'plus')
            //     return redirect('https://buy.stripe.com/28o5lj1rWgsW2Ry7sw');
            // if ($package_name == 'elite')
            //     return redirect('https://buy.stripe.com/dR6bJHdaEb8Cak0cMR');

            $transaction = new Transaction();
            $transaction->admin_id = session('id');
            $transaction->plan_id = $plan->id;
            $transaction->date = now();
            $transaction->status = 0;
            $transaction->save();
            
            return redirect($stripe_link);

        } else {
            return redirect()->route('admin.login');
        }
    }
}
