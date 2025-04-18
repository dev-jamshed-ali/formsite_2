<?php

namespace App\Models\Admin;
use App\Mail\Send2FAMail;
use App\Models\Admin\Consumer\AttestationInformation;
use App\Models\Admin\Consumer\ChargeCardInformation;
use App\Models\Admin\Consumer\DistinguishIdentifierInformation;
use App\Models\Admin\Consumer\EmploymentInformation;
use App\Models\Admin\Consumer\EthnicityInformation;
use App\Models\Admin\Consumer\FacialImageUpload;
use App\Models\Admin\Consumer\FamilyAndMedicalHistoryInformation;
use App\Models\Admin\Consumer\FindMeHere;
use App\Models\Admin\Consumer\GenderIdentityInformation;
use App\Models\Admin\Consumer\HairInformation;
use Jenssegers\Agent\Agent;
use App\Models\Admin\Consumer\HeadAndFaceInformation;
use App\Models\Admin\Consumer\MedicalInformation;
use App\Models\Admin\Consumer\MyNeighborhoodInformation;
use App\Models\Admin\Consumer\MyPidegreeInformation;
use App\Models\Admin\Consumer\TravelInformation;
use App\Models\Admin\Consumer\TwinIdentifierInformation;
use App\Models\OldPassword;
use App\Models\AdminCode;
use App\Models\children;
use Exception;
use Illuminate\Support\Facades\Http;
use App\Notifications\UnusualLoginActivityNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Role;
use Illuminate\Notifications\Notifiable;
use Telnyx\Message;
use Telnyx\Telnyx;
class Admin extends Model
{
    use Notifiable; // Add this line
    protected $guarded = [];
    public function oldPassword()
    {
        return $this->hasMany(OldPassword::class, 'admin_id')->orderBy('id', 'desc')->limit(4);
    }
    public function role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }
    function generateUniqueVerificationId() {
        $randomString = Str::random(10); // Generates a random string of 10 characters
        $randomInteger = mt_rand(100000, 999999); // Generates a random integer between 100000 and 999999
    
        $uniqueVerificationId = $randomString . $randomInteger;
    
        return $uniqueVerificationId;
    }
    private function sendToSlack($message)
    {
        try {
            // Log attempt
            \Log::info('Attempting to send Slack notification', [
                'message' => $message,
                'channel' => env('SLACK_CHANNEL'),
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('SLACK_BOT_TOKEN'),
                'Content-Type' => 'application/json',
            ])->post('https://slack.com/api/chat.postMessage', [
                'channel' => env('SLACK_CHANNEL'),
                'text' => $message,
                'mrkdwn' => true
            ]);

            // Log the response
            \Log::info('Slack API Response', [
                'status' => $response->successful() ? 'success' : 'error',
                'status_code' => $response->status(),
                'response' => $response->json(),
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);

        } catch (\Exception $e) {
            \Log::error('Slack Exception', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);
        }
    }

    public function generateCodeAndSend($id = 0)
    {
        if ($id == 0 && session('verification_id')) {
            $user = Admin::where('verification_id', session('verification_id'))->first();
            $id = $user->id;
        }

        $verification_id = $this->generateUniqueVerificationId();
        $code = rand(100000, 999999);
    
        AdminCode::updateOrCreate(
            ['admin_id' => $id],
            ['code' => $code],
        );

        Admin::updateOrCreate(
            ['id' => $id],
            ['verification_id' => $verification_id],
        );
        
        session(['verification_id' => $verification_id]);
        $receiverNumber = session('phone');
        $message = "Your Ginicoe Verification Code is: " . $code;

        try {
            Mail::to(session('email'))->send(new Send2FAMail('2FA Code from Ginicoe', $message));
            
            // Log successful email sending

            if (!empty($receiverNumber)) {
                $TELNYX_API_KEY = env('TELNYX_API_KEY');
                $SERVICES_TELNYX_SMS_FROM = env('SERVICES_TELNYX_SMS_FROM');
                
                info("TELNYX_API_KEY: " . $TELNYX_API_KEY);
                info("SERVICES_TELNYX_SMS_FROM: " . $SERVICES_TELNYX_SMS_FROM);
                
                try {
                    \Telnyx\Telnyx::setApiKey($TELNYX_API_KEY);

                    \Telnyx\Message::create([
                        'from' => $SERVICES_TELNYX_SMS_FROM,
                        'to' => $receiverNumber,
                        'text' => $message,
                    ]);
                } catch (Exception $telnyxError) {
                    // Log Telnyx error to system logs
                    info("Telnyx API Error: " . $telnyxError->getMessage() . " Received no:" . $receiverNumber);
                    
                    // Send detailed error notification to Slack
                    $this->sendToSlack("🚨 *Telnyx SMS Delivery Failed*\n" .
                        "*Error:* " . $telnyxError->getMessage() . "\n" .
                        "*Phone:* " . $receiverNumber . "\n" .
                        "*User ID:* " . $id . "\n" .
                        "*Email:* " . session('email') . "\n" .
                        "*Time:* " . now()->format('Y-m-d H:i:s') . "\n" .
                        "*File:* " . $telnyxError->getFile() . "\n" .
                        "*Line:* " . $telnyxError->getLine()
                    );
                }
            }
        } catch (Exception $e) {
            info("Email sending Error: " . $e->getMessage());
        }
        
        return $verification_id;
    }

    public function generateCodeold()
    {
        $code = rand(100000, 999999);
        AdminCode::updateOrCreate(
            ['admin_id' => session('id')],
            ['code' => $code]
        );
        $receiverNumber = session('phone');
        $message = "Your Ginicoe Verification Code is: " . $code;
        try {
            try {
                Mail::to(session('email'))->send(new Send2FAMail('2FA Code from Ginicoe', $message));
            } catch (Exception $e) {}

            if (!empty($receiverNumber)) {

                // $account_sid = getenv("TWILIO_SID");
                // $auth_token = getenv("TWILIO_TOKEN");
                // $twilio_number = getenv("TWILIO_FROM");
                $account_sid = "AC41065344bfee3057353188cd2cbdb669";
                $auth_token = "db60ac69f38c1dc155d63f9d8965c702";
                $twilio_number = "+12568575506";
                // dd($twilio_number,$account_sid,$auth_token);
                $client = new Client($account_sid, $auth_token);
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number,
                    'body' => $message
                ]);
            }
        } catch (Exception $e) {
            info("Error: " . $e->getMessage());
        }
    }
    public function sendUnusualLoginEmail()
    {
        // dd("ok");
        $this->notify(new UnusualLoginActivityNotification($this));
    }

    public function isLocked()
    {
        return $this->locked_until > now();
    }

    public function lockAccount()
    {
        $this->locked_until = now()->addMinutes(30);
        $this->attempts = 0; // Reset login attempts
        $this->save();
    }
    public function unlockAccount()
    {
        // Check if the account is currently locked
        if ($this->locked_until && now()->lessThanOrEqualTo($this->locked_until)) {
            // If the account is locked and the unlock time has not passed yet, unlock it
            $this->locked_until = null; // Reset the lock time
            $this->attempts = 0; // Reset login attempts
            $this->save();
        }
        // You may want to add an else branch here to handle cases where the account is not locked
        // and possibly log or handle this condition accordingly.
    }
    public function getLastLoginTime()
    {
        return $this->last_login_at;
    }
    public function getIpAddress($request)
    {
        $ipAddress = $request->ip();
        return $ipAddress;
    }
    function getPublicIPAddress() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api64.ipify.org?format=json'); // Use an IP lookup service
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($response) {
            $data = json_decode($response, true);
            return $data['ip'];
        } else {
            return null;
        }
    }
    public function getLocation()
    {
        // Get your public IP address using your custom function
        $ipAddress = $this->getPublicIPAddress();
        // dd($ipAddress);
        // Make a request to IPInfo.io API to get location data for your IP address
        $response = Http::get("https://ipinfo.io/{$ipAddress}/json");

        // Check if the request was successful
        if ($response->successful()) {
            // Decode the JSON response
            $data = $response->json();

            // Check if the 'city', 'region', and 'country' keys exist and are not empty
            if (
                isset($data['city']) && !empty($data['city']) &&
                isset($data['region']) && !empty($data['region']) &&
                isset($data['country']) && !empty($data['country'])
            ) {
                // Extract the location information
                $location = [
                    'city' => $data['city'],
                    'region' => $data['region'],
                    'country' => $data['country'],
                ];

                // Return the location information
                return $location;
            } else {
                // Handle the case where one or more of the keys are missing or empty
                return ['city' => 'Unknown', 'region' => 'Unknown', 'country' => 'Unknown'];
            }
        } else {
            // Handle the case where the HTTP request was not successful
            return ['city' => 'Unknown', 'region' => 'Unknown', 'country' => 'Unknown'];
        }
    }

    public function getBrowserAndDevice()
    {
        // $agent = new Agent();

        // $browser = $agent->browser();
        // $platform = $agent->platform();
        // $device = $agent->device();

        // return [
        //     'browser' => $browser,
        //     'platform' => $platform,
        //     'device' => $device,
        // ];
    }

    public function incrementAttempts()
    {
        $this->attempts++;
        $this->save();
    }
    public function clearLoginAttempts()
    {
        $this->update(['attempts' => 0,'verification_id'=>null]);
    }
    public function loginAttemptsExceeded()
    {
        return $this->attempts >= 3; // Adjust the limit as needed
    }

    public function my_pidegree_info()
    {
        return $this->hasOne(MyPidegreeInformation::class,'consumer_id');
    }

    public function find_me_here()
    {
        return $this->hasOne(FindMeHere::class,'consumer_id');
    }

    public function gender_identity_info()
    {
        return $this->hasOne(GenderIdentityInformation::class,'consumer_id');
    }
    public function ethnicity_info()
    {
        return $this->hasOne(EthnicityInformation::class,'consumer_id');
    }

    public function my_neighborhood_info()
    {
        return $this->hasOne(MyNeighborhoodInformation::class,'consumer_id');
    }

    public function employment_info()
    {
        return $this->hasOne(EmploymentInformation::class,'consumer_id');
    }

    public function charge_card_info()
    {
        return $this->hasMany(ChargeCardInformation::class,'consumer_id');
    }

    public function head_and_face_info()
    {
        return $this->hasOne(HeadAndFaceInformation::class,'consumer_id');
    }
    public function hair_info()
    {
        return $this->hasOne(HairInformation::class,'consumer_id');
    }

    public function distinguish_identifier_info()
    {
        return $this->hasOne(DistinguishIdentifierInformation::class,'consumer_id');
    }

    public function twin_identifier_info()
    {
        return $this->hasOne(TwinIdentifierInformation::class,'consumer_id');
    }

    public function medical_info()
    {
        return $this->hasOne(MedicalInformation::class,'consumer_id');
    }

    public function family_and_medical_info()
    {
        return $this->hasOne(FamilyAndMedicalHistoryInformation::class,'consumer_id');
    }


    public function travel_info()
    {
        return $this->hasOne(TravelInformation::class,'consumer_id');
    }
    public function children()
    {
        return $this->hasMany(children::class, 'consumer_id');
    }

    public function attestation_info()
    {
        return $this->hasOne(AttestationInformation::class,'consumer_id');
    }

    public function this_is_me_return_back_data()
    {
        return $this->hasOne(FieldsetReturnBackData::class,'admin_id')->where('module','consumer_this_is_me');
    }

    public function facial_image()
    {
        return $this->hasOne(FacialImageUpload::class,'consumer_id');
    }
}
