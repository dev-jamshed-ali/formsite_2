<?php

namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Models\AdminCode;
use App\Mail\Send2FAMail;
use Exception;
use Illuminate\Support\Str;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $check_email = Admin::where('email', $request->email)->whereIn('role_id', [1, 13])->first();
            if (!$check_email) {
                return response()->json(['error' => 'Email address not found', 'message' => 'The provided email does not exist in our records.'], 404);
            }

            $check_email->last_login_at = now();
            $check_email->save();

            if ($check_email->isLocked()) {
                return response()->json(['error' => __('Your account is locked. Please try again later.'), 'message' => 'Account is currently locked.'], 423);
            }

            if (!Hash::check($request->password, $check_email->password)) {
                Cache::increment("try_{$check_email->id}");
                $check_email->incrementAttempts();

                if ($check_email->loginAttemptsExceeded()) {
                    $check_email->sendUnusualLoginEmail();
                    $check_email->lockAccount();
                    return response()->json(['error' => __('Unusual login activity detected. Your account is locked for 30 minutes.'), 'message' => 'Account locked due to unusual activity.'], 423);
                }

                return response()->json(['error' => 'Password is wrong', 'message' => 'The password you entered is incorrect.'], 401);
            }

            if ($check_email->status == 0) {
                Cache::increment("try_{$check_email->id}");
                return response()->json(['error' => 'Customer is not active', 'message' => 'Your account is not active.'], 403);
            }

            $verificationId = $this->generateCode($check_email->id, $check_email->email, $check_email->phone);
            return response()->json([
                'verificationId' => $verificationId,
                'message' => "OTP sent successfully",
                'status' => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'An error occurred during login', 'message' => $th->getMessage()], 500);
        }
    }

    public function verifyToken(Request $request)
    {
        $request->validate([
            'accessToken' => 'required|string',
            'refreshToken' => 'required|string',
        ]);

        $accessToken = $request->accessToken;
        $refreshToken = $request->refreshToken;

        // Verify the access token
        try {
            $decodedAccessToken = JWT::decode($accessToken, new Key('sterlingsTech', 'HS256'));
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'message' => 'Invalid access token.', 'error' => $e->getMessage()], 401);
        }

        // Verify the refresh token
        try {
            $decodedRefreshToken = JWT::decode($refreshToken, new Key('sterlingsTech', 'HS256'));
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'message' => 'Invalid refresh token.', 'error' => $e->getMessage()], 401);
        }

        // Check if the tokens are valid and not expired
        if ($decodedAccessToken->exp > time() && $decodedRefreshToken->exp > time()) {
            return response()->json(['status' => 200, 'message' => 'Access token is valid', 'data' => ['valid' => true]], 200);
        } else {
            $this->logout();
            return response()->json(['status' => 401, 'message' => 'Tokens are expired.'], 401);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'verificationId' => 'required',
        ]);

        // Get the JWT secret key from .env
        $jwtSecret = 'sterlingsTech';
        // Find the user by ID from the decoded token
        $user = Admin::where('verification_id', $request->verificationId)->first();

        // Check if the user's account is locked
        if (!$user) {
            return response()->json(['error' => __('Your account is not found.'), 'message' => 'No account associated with the provided verification ID.'], 403);
        }
        // Check if the code is correct and within the time limit
        $validCode = AdminCode::where('admin_id', $user->id)
            ->where('code', $request->code)
            ->where('updated_at', '>=', now()->subMinutes(200))
            ->first();

        if ($validCode) {
            // Clear login attempts upon successful login
            $user->clearLoginAttempts();

            // Create new access and refresh tokens for the user
            $accessPayload = [
                'sub' => $user->id,
                'iat' => time(),
                'exp' => time() + 3600, 
                'email' => $user->email,
                'name' => $user->name, 
                'role_id' => $user->role_id,
                'user_id' => $user->id
            ];
            $refreshPayload = [
                'sub' => $user->id,
                'iat' => time(),
                'exp' => time() + 1209600 // Refresh token valid for 14 days
            ];
            $accessToken = JWT::encode($accessPayload, $jwtSecret, 'HS256');
            $refreshToken = JWT::encode($refreshPayload, $jwtSecret, 'HS256');

            return response()->json([
                'message' => 'OTP verified successfully',
                'data' => [
                    'tokens' => [
                        'accessToken' => $accessToken, // Send the access token in the response
                        'refreshToken' => $refreshToken // Send the refresh token in the response
                    ]
                ],
                'redirect' => route('admin.dashboard')
            ], 200);
        } else {
            // Increment login attempts for the user
            $user->incrementAttempts();

            // Check if the login attempts exceed the limit
            if ($user->loginAttemptsExceeded()) {
                // Notify the user about unusual login activity via email
                $user->sendUnusualLoginEmail();
                // Lock the user's account for 30 minutes
                $user->lockAccount();

                return response()->json(['error' => __('Unusual login activity detected. Your account is locked for 30 minutes.'), 'message' => 'Account locked due to unusual activity.'], 403);
            }

            return response()->json(['error' => __('You entered the wrong code.'), 'message' => 'The verification code is incorrect.'], 400);
        }
    }
    public function getProfileDetail($id)
    {
        $consumer = Admin::find($id);
        if (!$consumer) {
            return response()->json(['error' => __('Consumer not found')], 404);
        }

        return response()->json(['success' => __('Fetched successfully!'), 'data' => $consumer], 200);
    }   
    public function generateCode($id, $email, $phone)
    {
        $verification_id = $this->generateUniqueVerificationId();
        $code = rand(100000, 999999);

        AdminCode::updateOrCreate(
            ['admin_id' => $id],
            ['code' => $code]
        );

        Admin::updateOrCreate(
            ['id' => $id],
            ['verification_id' => $verification_id]
        );

        $receiverNumber = $phone;
        $message = "Your Ginicoe Verification Code is: " . $code;

        try {
            Mail::to($email)->send(new Send2FAMail('2FA Code from Ginicoe', $message));
            if (!empty($receiverNumber)) {
                $TELNYX_API_KEY = 'KEY01926396F3107FFDB928F351724710CE_tPbmJ64tJgW9lfjD5qUknJ';
                $SERVICES_TELNYX_SMS_FROM = '+12167104200';
                \Telnyx\Telnyx::setApiKey($TELNYX_API_KEY);

                // Create and send the SMS message
                \Telnyx\Message::create([
                    'from' => $SERVICES_TELNYX_SMS_FROM,
                    'to' => $receiverNumber,
                    'text' => $message,
                ]);
            }
            return $verification_id;
        } catch (Exception $e) {
            info("Generate code Error: " . $e->getMessage());
            return response()->json(['error' => 'Failed to send OTP', 'message' => $e->getMessage()], 500);
        }
    }
    function generateUniqueVerificationId()
    {
        $randomString = Str::random(10);
        $randomInteger = mt_rand(100000, 999999);
        return $randomString . $randomInteger;
    }
}