<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/clear-temps', function () {
    return 'Command Run successfully';
});

Route::post('contact/send_email', [App\Http\Controllers\Api\ContactController::class, 'send_email']);
Route::get('admin/logout', [App\Http\Controllers\Api\LogoutController::class, 'index'])->name('api.admin.logout');
Route::group(['prefix' => 'admin'], function () {
    Route::get('protect-your-account', [App\Http\Controllers\Api\LoginController::class, 'protect_account'])->name('api.protect-account');
    Route::get('unlock-account/{id}', [App\Http\Controllers\Api\LoginController::class, 'unlock'])->name('api.unlock-account');
    Route::post('login/store', [App\Http\Controllers\Api\LoginController::class, 'store'])->name('api.admin.login.store');
    Route::post('2fa', [App\Http\Controllers\TwoFAApiController::class, 'store'])->name('api.2fa.post');
    Route::post('register/store', [App\Http\Controllers\Api\RegisterController::class, 'store'])->name('api.admin.register.store');
    Route::post('forget-password/store', [App\Http\Controllers\Api\ForgetPasswordController::class, 'store'])->name('api.admin.forget_password.store');
    Route::post('reset-password/update', [App\Http\Controllers\Api\ResetPasswordController::class, 'update']);
});

Route::middleware(['api.token.validation'])->prefix('admin')->group(function () { // composer require laravel/passport
    Route::post('get_consumer_by_location', [App\Http\Controllers\Api\Consumer\ThisIsMeController::class, 'get_consumer_by_location']);
    Route::post('get-all-consumer', [App\Http\Controllers\Api\Consumer\ThisIsMeController::class, 'all_consumer']);
    Route::get('check-guid', [App\Http\Controllers\Api\RegisterController::class, 'check_guid']);
    Route::post('profile-change/pictureupdate', [App\Http\Controllers\Api\ProfileChangeController::class, 'picture_update']);
    Route::post('profile-change/update', [App\Http\Controllers\Api\ProfileChangeController::class, 'update']);
    Route::get('profile', [App\Http\Controllers\Api\ProfileChangeController::class, 'getprofile']);
    Route::post('password-change/update', [App\Http\Controllers\Api\PasswordChangeController::class, 'update']);
    Route::get('this_is_me', [App\Http\Controllers\Api\Consumer\ThisIsMeController::class, 'this_is_me']);
    Route::post('this-is-me-store', [App\Http\Controllers\Admin\Consumer\ThisIsMeController::class, 'this_is_me_store']);
    Route::get('merchant/update-my-info', [App\Http\Controllers\Api\Merchant\UpdateMyInfoController::class, 'index']);
    Route::post('merchant/update-my-info-store', [App\Http\Controllers\Api\Merchant\UpdateMyInfoController::class, 'store']);
    Route::get('bank/update-my-info', [App\Http\Controllers\Api\Bank\UpdateMyInfoController::class, 'index']);
    Route::post('bank/update-my-info-store', [App\Http\Controllers\Api\Bank\UpdateMyInfoController::class, 'store']);
    Route::get('govt/update-my-info', [App\Http\Controllers\Api\Govt\UpdateMyInfoController::class, 'index']);
    Route::post('govt/update-my-info-store', [App\Http\Controllers\Api\Govt\UpdateMyInfoController::class, 'store']);
    Route::get('govt/update-my-info', [App\Http\Controllers\Api\Govt\UpdateMyInfoController::class, 'index']);
    Route::post('govt/update-my-info-store', [App\Http\Controllers\Api\Govt\UpdateMyInfoController::class, 'store']);
    Route::get('healthcare/get-my-info', [App\Http\Controllers\Api\Healthcare\HealthcareUpateMyInfoController::class, 'index']);
    Route::post('healthcare/update-my-info-store', [App\Http\Controllers\Api\Healthcare\HealthcareUpateMyInfoController::class, 'store']);
    Route::get('tracker/get-my-info', [App\Http\Controllers\Api\Tracker\TrackerUpateMyInfoController::class, 'index']);
    Route::post('tracker/update-my-info-store', [App\Http\Controllers\Api\Tracker\TrackerUpateMyInfoController::class, 'store']);
    Route::get('education/get-my-info', [App\Http\Controllers\Api\Education\EducationUpateMyInfoController::class, 'index']);
    Route::post('education/update-my-info-store', [App\Http\Controllers\Api\Education\EducationUpateMyInfoController::class, 'store']);
    Route::post('/create-payment-intent', [App\Http\Controllers\Api\PaymentController::class, 'createPaymentIntent']);
});

Route::middleware(['data.backup'])->group(function () {
    Route::get('get-data', [App\Http\Controllers\sync\DatabaseSyncController::class, 'getData']);
    Route::get('get-user-info', [App\Http\Controllers\sync\DatabaseSyncController::class, 'getAllUserInfo']);
});

// Dashboard Routes
Route::middleware(['api.token.validation'])->group(function () {
    Route::get('get-consumer', [App\Http\Controllers\Crm\ConsumerController::class, 'getAllConsumers']);
});

Route::post('crm/login', [App\Http\Controllers\Crm\AuthController::class, 'login']);
Route::post('crm/verify-otp', [App\Http\Controllers\Crm\AuthController::class, 'verifyOtp']);
Route::post('crm/verify-token', [App\Http\Controllers\Crm\AuthController::class, 'verifyToken']);
Route::get('crm/profile/detail/{id}', [App\Http\Controllers\Crm\AuthController::class, 'getProfileDetail'])->name('api.crm.profile.detail');
Route::middleware(['crm'])->group(function () {
    Route::get('crm/consumers/get-all-data', [App\Http\Controllers\Crm\CrmController::class, 'getDashboardStats']);
    Route::get('crm/consumers/get-all-consumers', [App\Http\Controllers\Crm\ConsumerController::class, 'getAllConsumers'])->name('api.crm.consumers.get-all');
    Route::get('crm/consumer/get-consumer-detail/{id}', [App\Http\Controllers\Crm\ConsumerController::class, 'getConsumerDetail'])->name('api.crm.consumer.detail');
    Route::get('crm/users/get-all-users', [App\Http\Controllers\Crm\CrmController::class, 'getAllUSers']);
});
// ----------------------------------mobile app api routes to get dynamic content ----------------------------------
Route::get('pages/{page_title}', [App\Http\Controllers\Api\MobileApiPagesController::class, 'pageData']);