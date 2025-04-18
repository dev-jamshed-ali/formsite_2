<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Customer;
use Stripe\Subscription as StripeSubscription;
use Laravel\Cashier\Subscription as CashierSubscription;

class DonationController extends Controller
{
    public function donate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
            'frequency' => 'required|in:one_time,monthly',
            'paymentMethodId' => 'required',
            'name' => 'required'
        ]);

        $email = $validatedData['email'];
        $name = $validatedData['name'];
        $amount = $validatedData['amount'];
        $frequency = $validatedData['frequency'];
        $paymentMethodId = $validatedData['paymentMethodId'];

        try {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $existingCustomer = \Stripe\Customer::all(["email" => $email])->data[0] ?? null;

            if (!$existingCustomer) {
                // Create a new customer if one doesn't exist
                $customer = \Stripe\Customer::create([
                    'email' => $email,
                    'name' => $name,
                    'payment_method' => $paymentMethodId,
                    'invoice_settings' => [
                        'default_payment_method' => $paymentMethodId,
                    ],
                ]);
            } else {
                $customer = $existingCustomer;
            }

            if ($frequency === 'one_time') {

                $user =  User::updateOrCreate(['email' => $email], [
                    'name' => $name, 'email' => $email, 'password' => bcrypt('12345678'), 'role_id' => 1, 'stripe_id' => $customer->id
                ]);

                // Create a one-time charge
                $payment =  \Stripe\PaymentIntent::create([
                    'customer' => $customer->id,
                    'payment_method' => $paymentMethodId,
                    'amount' => $amount * 100, // Convert to cents
                    'currency' => 'usd',
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);


                Donor::create([
                    'user_id' => $user->id,
                    'stripe_transaction_id' => $payment->id,
                    'stripe_status' => $payment->status,
                    'donation_amount' => $amount,
                    'donation_type' => 'one_time'
                ]);
            } else {
                $stripeProductId = 'prod_NpTqgk1m50kCbl';
                $existingCustomer = \Stripe\Customer::all(["email" => $email])->data[0] ?? null;

                if ($existingCustomer) {
                    // Check if the customer already has a subscription
                    $existingSubscription = null;
                    $subscriptions = StripeSubscription::all(["customer" => $existingCustomer->id]);
                    foreach ($subscriptions->data as $sub) {
                        if ($sub->items->data[0]->price->product == $stripeProductId) {
                            $existingSubscription = $sub;
                            break;
                        }
                    }
                }
                if (!$existingSubscription) {
                    // Create a subscription
                    $subscription = StripeSubscription::create([
                        'customer' => $customer->id,
                        'items' => [
                            [
                                'price_data' => [
                                    'currency' => 'usd',
                                    'unit_amount' => $amount * 100, // Convert to cents
                                    'product' => $stripeProductId,
                                    'recurring' => [
                                        'interval' => 'month',
                                    ],
                                ],
                            ],
                        ],
                    ]);


                    $user =  User::updateOrCreate(['email' => $email], [
                        'name' => $name, 'email' => $email, 'password' => bcrypt('12345678'), 'role_id' => 1, 'stripe_id' => $customer->id
                    ]);

                    Donor::create([
                        'user_id' => $user->id,
                        'stripe_transaction_id' => $subscription->id,
                        'stripe_status' => $subscription->status,
                        'donation_amount' => $amount,
                        'donation_type' => 'monthly'
                    ]);
                }
            }


            return response()->json([
                'message' => 'Thank you for your donation!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while processing your donation: ' . $e->getMessage(),
            ], 500);
        }
    }
}
