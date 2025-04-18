<?php
use App\Http\Controllers\Admin\Bank\UpdateMyInfoController as BankUpdateMyInfoController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController as DashboardControllerForAdmin;
use App\Http\Controllers\Admin\DynamicPageController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\FooterColumnController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\LoginController as LoginControllerForAdmin;
use App\Http\Controllers\Admin\LogoutController as LogoutControllerForAdmin;
use App\Http\Controllers\Admin\ForgetPasswordController as ForgetPasswordControllerForAdmin;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageAboutController;
use App\Http\Controllers\Admin\PageBlogController;
use App\Http\Controllers\Admin\PageCareerController;
use App\Http\Controllers\Admin\PageContactController;
use App\Http\Controllers\Admin\PageFaqController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\PageOtherController;
use App\Http\Controllers\Admin\PagePhotoGalleryController;
use App\Http\Controllers\Admin\PagePrivacyController;
use App\Http\Controllers\Admin\PageProjectController;
use App\Http\Controllers\Admin\PageServiceController;
use App\Http\Controllers\Admin\PageShopController;
use App\Http\Controllers\Admin\PageTeamController;
use App\Http\Controllers\Admin\PageTermController;
use App\Http\Controllers\Admin\PageVideoGalleryController;
use App\Http\Controllers\Admin\PhotoChangeController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ResetPasswordController as ResetPasswordControllerForAdmin;
use App\Http\Controllers\Admin\PasswordChangeController as PasswordChangeControllerForAdmin;
use App\Http\Controllers\Admin\ProfileChangeController as ProfileChangeControllerForAdmin;
use App\Http\Controllers\Admin\CategoryController as CategoryControllerForAdmin;
use App\Http\Controllers\Admin\BlogController as BlogControllerForAdmin;
use App\Http\Controllers\Admin\Consumer\ThisIsMeController;
use App\Http\Controllers\Admin\ProjectController as ProjectControllerForAdmin;
use App\Http\Controllers\Admin\ScorringRulesController;
use App\Http\Controllers\Admin\ServiceController as ServiceControllerForAdmin;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SocialMediaItemController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TeamMemberController as TeamMemberControllerForAdmin;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\JobController as JobControllerForAdmin;
use App\Http\Controllers\Admin\FaqController as FaqControllerForAdmin;
use App\Http\Controllers\Admin\Govt\UpdateMyInfoController as GovtUpdateMyInfoController;
use App\Http\Controllers\Admin\Merchant\UpdateMyInfoController;
use App\Http\Controllers\Admin\ProductController as ProductControllerForAdmin;
use App\Http\Controllers\Admin\OrderController as OrderControllerForAdmin;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\USPSAddressController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\DashboardController as DashboardControllerForCustomer;
use App\Http\Controllers\Customer\ForgetPasswordController as ForgetPasswordControllerForCustomer;
use App\Http\Controllers\Customer\LoginController as LoginControllerForCustomer;
use App\Http\Controllers\Customer\LogoutController as LogoutControllerForCustomer;
use App\Http\Controllers\Customer\OrderController as OrderControllerForCustomer;
use App\Http\Controllers\Customer\PasswordChangeController as PasswordChangeControllerForCustomer;
use App\Http\Controllers\Customer\ProfileChangeController as ProfileChangeControllerForCustomer;
use App\Http\Controllers\Customer\RegistrationController;
use App\Http\Controllers\Customer\ResetPasswordController as ResetPasswordControllerForCustomer;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController as BlogControllerForFront;
use App\Http\Controllers\Front\CategoryController as CategoryControllerForFront;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DonationController;
use App\Http\Controllers\Front\FaqController as FaqControllerForFront;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\JobController as JobControllerForFront;
use App\Http\Controllers\Front\PackageController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\PhotoGalleryController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\ProductController as ProductControllerForFront;
use App\Http\Controllers\Front\ProjectController as ProjectControllerForFront;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\ServiceController as ServiceControllerForFront;
use App\Http\Controllers\Front\SubscriptionController;
use App\Http\Controllers\Front\TeamMemberController as TeamMemberControllerForFront;
use App\Http\Controllers\Front\TermController;
use App\Http\Controllers\Front\VideoGalleryController;
use App\Http\Controllers\Front\WhyChooseController as FrontWhyChooseController;
use App\Http\Controllers\Webhook\StripeWebhookController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\Healthcare\HealthcareUpateMyInfoController;
use App\Http\Controllers\Admin\Education\EducationUpateMyInfoController;
use App\Http\Controllers\Admin\Tracker\TrackerUpateMyInfoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\SdkController;
use Telnyx\Message;
use Telnyx\Telnyx;
use App\Http\Controllers\MFAController;
//Route::post('/mfa/verify', [MFAController::class, 'verifyTotp'])->name('mfa.verify');
//Route::get('mfa/select', [MFAController::class, 'selectMethod'])->name('mfa.select');

Route::middleware('no.mfa.verified')->group(function () {
    Route::get('mfa/totp', [MFAController::class, 'totp'])->name('mfa.totp');
    Route::get('/mfa/code', [MFAController::class, 'showTotpCodeForm'])->name('mfa.verify.code');
    Route::post('mfa/verify-totp', [MFAController::class, 'verifyTotp'])->name('mfa.verify.totp');
    Route::get('/mfa/select-method', [MFAController::class, 'selectMethod'])->name('mfa.select');
    Route::post('/mfa/select-method', [MFAController::class, 'handleMethod'])->name('mfa.select.method');
});



//use App\Mail\ContactPageMessage;


Route::fallback(function () {
    return view('404');
});


Route::get('send-tests-sms', function () {
    $code = rand(100000, 999999);
    $message = "Your Ginicoe Test Verification Code is: " . $code;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.telnyx.com/v2/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1); //$message
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n    \"from\": \"+12167104200\",\n    \"to\": \"+13474649144\",\n    \"text\": \"Hello, world!\"\n  }");

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: Bearer KEY01926396F3107FFDB928F351724710CE_tPbmJ64tJgW9lfjD5qUknJ';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);


    return 'operate ==33== successfully!' . $result;
});


Route::middleware(['auth'])->group(function () {
    Route::get('/settings/mfa', [MFAController::class, 'show'])->name('mfa.settings');
    Route::post('/settings/mfa/setup', [MFAController::class, 'setup'])->name('mfa.setup');
    Route::post('/settings/mfa/enable', [MFAController::class, 'enable'])->name('mfa.enable');
    Route::get('/verify-mfa', [MFAController::class, 'verifyForm'])->name('mfa.verify.form');
    

});

Route::get('send-tests-mails', function () {

    // $mails = new ContactPageMessage();
    // Send the email
    //$mail_status = Mail::to('younasali22@gmail.com')->send($mails);
    $user = [];
    $mail_status = Mail::send('emails.tests_mail', [], function ($m) use ($user) {
        $m->from('no-reply@ginicoe.com', 'ginicoe');
        $m->to("younasali22@gmail.com", "Younas")->subject('Your Reminder!');
    });

    return response()->json(['message' => $mail_status], 200);

    //  echo app()->version();
    //	return true;       
    //$resource_email = "younasali22@gmail.com";






    /*	$email_body = "<h3><u>New Assessment to Attempt:</u></h3> <p> Hi <br> <br> Please login to attempt your new assessment in 'Assessments' Section: <br> <br> <strong>Assessment title: </strong> <br> <br> <br> <p>Kind Regards,<br><b>Premier Partnership</b></p>";  
        
        Mail::send([], [], function ($message) use ($resource_email, $email_body){
            $message->to($resource_email)
                ->subject("My Coach | New Assessment to Attempt")
                ->setBody($email_body, 'text/html');
        }); */

    return true;
    /* return view('emails.tests_mail')->render();
    $postdata = ["test data here"]; 
     //view('emails.tests_mail')
    Mail::to("younasali22@gmail.com")->send('emails.tests_mail', $postdata); */

    //return 'this is mails'; 
});

/* --------------------------------------- */
/* Front End */
/* --------------------------------------- */

Route::get('/clear-temps', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    return 'Command Run successfully';
});

Route::get('/run-commands', function () {
    Artisan::call('migrate');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('route:cache');
    return 'Command Run successfully';
});


Route::get('/', [HomeController::class, 'index'])->name('front.index');
Route::get('about', [AboutController::class, 'index'])->name('front.about');
Route::get('services', [ServiceControllerForFront::class, 'index'])->name('front.services');
Route::get('service/{slug}', [ServiceControllerForFront::class, 'detail']);
Route::get('why-choose/{slug}', [FrontWhyChooseController::class, 'detail']);
Route::get('blog', [BlogControllerForFront::class, 'index'])->name('front.blogs');
Route::get('blog/{slug}', [BlogControllerForFront::class, 'detail']);
Route::post('blog/comment', [BlogControllerForFront::class, 'comment'])->name('front.comment');
Route::get('category/{slug}', [CategoryControllerForFront::class, 'detail']);
Route::post('search', [SearchController::class, 'index']);
Route::get('getautocomplete', [SearchController::class, 'getAddress']);
Route::post('getAddressDetail', [SearchController::class, 'getAddressDetail']);
Route::get('projects', [ProjectControllerForFront::class, 'index'])->name('front.projects');
Route::get('project/{slug}', [ProjectControllerForFront::class, 'detail']);
Route::get('faq', [FaqControllerForFront::class, 'index'])->name('front.faq');
Route::get('team-members', [TeamMemberControllerForFront::class, 'index'])->name('front.team_members');
Route::get('team-member/{slug}', [TeamMemberControllerForFront::class, 'detail']);
Route::get('photo-gallery', [PhotoGalleryController::class, 'index'])->name('front.photo_gallery');
Route::get('video-gallery', [VideoGalleryController::class, 'index'])->name('front.video_gallery');
Route::get('page/{slug}', [PageController::class, 'detail']);
Route::get('contact', [ContactController::class, 'index'])->name('front.contact');
Route::post('contact/store', [ContactController::class, 'send_email'])->name('front.contact_form');
Route::get('career', [JobControllerForFront::class, 'index'])->name('front.career');
Route::get('job/{slug}', [JobControllerForFront::class, 'detail']);
Route::get('job/apply/{slug}', [JobControllerForFront::class, 'apply']);
Route::post('job/apply/store', [JobControllerForFront::class, 'apply_form'])->name('front.apply_form');
Route::get('shop', [ProductControllerForFront::class, 'index'])->name('front.shop');
Route::get('product/{slug}', [ProductControllerForFront::class, 'detail']);
Route::post('product/cart/add', [ProductControllerForFront::class, 'add_to_cart'])->name('front.add_to_cart');
Route::get('cart', [ProductControllerForFront::class, 'cart'])->name('front.cart');
Route::get('cart/delete/{id}', [ProductControllerForFront::class, 'cart_item_delete']);
Route::post('cart/update', [ProductControllerForFront::class, 'update_cart']);
Route::get('checkout', [ProductControllerForFront::class, 'checkout'])->name('front.checkout');
Route::post('checkout/shipping/update', [ProductControllerForFront::class, 'shipping_update'])->name('front.shipping_update');
Route::post('checkout/coupon/update', [ProductControllerForFront::class, 'coupon_update'])->name('front.coupon_update');
Route::post('subscription', [SubscriptionController::class, 'index'])->name('front.subscription');
Route::get('subscriber/verify/{token}/{email}', [SubscriptionController::class, 'verify']);
Route::get('terms-and-conditions', [TermController::class, 'index'])->name('front.term');
Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('front.privacy');
Route::post('/donate', [DonationController::class, 'donate'])->name('donate');
// Route::get('/go-to-package-payment/{package_name}', [PackageController::class, 'goto_payment_page'])->name('front.goto.payment.page');
Route::get('/go-to-package-payment/{id}', [PackageController::class, 'goto_payment_page'])->name('front.goto.payment.page');
// Webhook routes
Route::post('/stripe-webhook', [StripeWebhookController::class, 'index']);


Route::get('payament/done', [PageController::class, 'payamentDone'])->name('payament.done');
/* --------------------------------------- */
/* Customer Login and profile management */
/* --------------------------------------- */
Route::get('customer/login', [LoginControllerForCustomer::class, 'index'])->name('customer.login');
Route::post('customer/login/store', [LoginControllerForCustomer::class, 'store'])->name('customer.login.store');
Route::post('customer/checkout/login/store', [CheckoutController::class, 'login'])->name('customer.login_from_checkout_page.store');
Route::get('customer/logout', [LogoutControllerForCustomer::class, 'index'])->name('customer.logout');
Route::get('customer/register', [RegistrationController::class, 'index'])->name('customer.registration');
Route::post('customer/registration/store', [RegistrationController::class, 'store'])->name('customer.registration.store');
Route::get('customer/dashboard', [DashboardControllerForCustomer::class, 'index'])->name('customer.dashboard');
Route::get('customer/registration/verify/{token}/{email}', [RegistrationController::class, 'verify']);
Route::get('customer/forget-password', [ForgetPasswordControllerForCustomer::class, 'index'])->name('customer.forget_password');
Route::post('customer/forget-password/store', [ForgetPasswordControllerForCustomer::class, 'store'])->name('customer.forget_password.store');
Route::get('customer/reset-password/{token}/{email}', [ResetPasswordControllerForCustomer::class, 'index']);
Route::post('customer/reset-password/update', [ResetPasswordControllerForCustomer::class, 'update']);
Route::get('customer/password-change', [PasswordChangeControllerForCustomer::class, 'index'])->name('customer.password_change');
Route::post('customer/password-change/update', [PasswordChangeControllerForCustomer::class, 'update']);
Route::get('customer/profile-change', [ProfileChangeControllerForCustomer::class, 'index'])->name('customer.profile_change');
Route::post('customer/profile-change/update', [ProfileChangeControllerForCustomer::class, 'update']);
Route::get('customer/order', [OrderControllerForCustomer::class, 'index'])->name('customer.order');
Route::post('customer/checkout/billing/shipping', [CheckoutController::class, 'billing_shipping'])->name('customer.billing_shipping_submit');
Route::get('customer/payment', [CheckoutController::class, 'payment'])->name('customer.payment');
Route::post('customer/payment/stripe', [CheckoutController::class, 'stripe'])->name('customer.stripe');
Route::get('customer/execute-payment', [CheckoutController::class, 'paypal']);


/* --------------------------------------- */
/* Admin Login and profile management */
/* --------------------------------------- */

Route::get('admin', function () {
    return redirect('admin/login'); });

Route::get('admin/protect-your-account', [LoginControllerForAdmin::class, 'protect_account'])->name('protect-account');
Route::get('admin/unlock-account/{id}', [LoginControllerForAdmin::class, 'unlock'])->name('unlock-account');
Route::get('admin/login', [LoginControllerForAdmin::class, 'index'])->name('admin.login');
Route::post('admin/login/store', [LoginControllerForAdmin::class, 'store'])->name('admin.login.store');
Route::get('admin/register', [RegisterController::class, 'index'])->name('admin.register');
Route::post('admin/register/store', [RegisterController::class, 'store'])->name('admin.register.store');
Route::get('admin/check-guid', [RegisterController::class, 'check_guid']);

//Route::get('admin/registration/verify/{token}/{email}', [RegisterController::class, 'verify']);
Route::get('admin/registration/verify/{token}/{userid}', [RegisterController::class, 'verify']);
Route::get('admin/logout', [LogoutControllerForAdmin::class, 'index'])->name('admin.logout');
Route::get('admin/forget-password', [ForgetPasswordControllerForAdmin::class, 'index'])->name('admin.forget_password');
Route::post('admin/forget-password/store', [ForgetPasswordControllerForAdmin::class, 'store'])->name('admin.forget_password.store');
Route::get('admin/reset-password/{token}/{email}', [ResetPasswordControllerForAdmin::class, 'index']);
/*
Route::get('admin/reset-password11/{token}/{email}', function () {
    echo "testin g"; 
    return '';
});  */

Route::post('admin/reset-password/update', [ResetPasswordControllerForAdmin::class, 'update']);

Route::post('admin/2fa/verify', [App\Http\Controllers\TwoFAApiController::class, 'verify'])->name('2fa.verify');
Route::get('admin/2fa', [App\Http\Controllers\TwoFAController::class, 'index'])->name('2fa.index');
Route::post('admin/2fa', [App\Http\Controllers\TwoFAController::class, 'store'])->name('2fa.post');
Route::get('admin/2fa/reset', [App\Http\Controllers\TwoFAController::class, 'resend'])->name('2fa.resend');

// Google2FA
Route::get('admin/google2fa', [App\Http\Controllers\TwoFAController::class, 'google2fa'])->name('google2fa.index');
Route::post('admin/google2fa', [App\Http\Controllers\TwoFAController::class, 'google2fa_post'])->name('google2fa.post');
Route::post('admin/disable2fa', [App\Http\Controllers\TwoFAController::class, 'disable2fa'])->name('disable2fa');



Route::group(['middleware' => '2fa'], function () {
    Route::get('admin/password-change', [PasswordChangeControllerForAdmin::class, 'index'])->name('admin.password_change');
    Route::post('admin/password-change/update', [PasswordChangeControllerForAdmin::class, 'update']);
    Route::get('admin/profile-change', [ProfileChangeControllerForAdmin::class, 'index'])->name('admin.profile_change');
    Route::post('admin/profile-change/update', [ProfileChangeControllerForAdmin::class, 'update']);
    Route::get('admin/photo-change', [PhotoChangeController::class, 'index'])->name('admin.photo_change');
    Route::post('admin/photo-change/update', [PhotoChangeController::class, 'update']);
    Route::get('admin/dashboard', [DashboardControllerForAdmin::class, 'index'])->name('admin.dashboard')->middleware('2fa');
    Route::get('admin/socialjustice', [DashboardControllerForAdmin::class, 'social'])->name('admin.socialjustice')->middleware('2fa');
    Route::get('admin/settings', [DashboardControllerForAdmin::class, 'settings'])->name('admin.settings')->middleware('2fa');
    Route::get('admin/complete-registration', [DashboardControllerForAdmin::class, 'verify2fa'])->name('admin.verify2fa')->middleware('2fa');
    Route::get('admin/knowledge', [DashboardControllerForAdmin::class, 'knowledge'])->name('admin.knowledge')->middleware('2fa');

    /* --------------------------------------- */
    /* Category - Admin */
    /* --------------------------------------- */
    Route::get('admin/category/view', [CategoryControllerForAdmin::class, 'index'])->name('admin.category.index');
    Route::get('admin/category/create', [CategoryControllerForAdmin::class, 'create'])->name('admin.category.create');
    Route::post('admin/category/store', [CategoryControllerForAdmin::class, 'store'])->name('admin.category.store');
    Route::get('admin/category/delete/{id}', [CategoryControllerForAdmin::class, 'destroy']);
    Route::get('admin/category/edit/{id}', [CategoryControllerForAdmin::class, 'edit']);
    Route::post('admin/category/update/{id}', [CategoryControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Blog - Admin */
    /* --------------------------------------- */
    Route::get('admin/blog/view', [BlogControllerForAdmin::class, 'index'])->name('admin.blog.index');
    Route::get('admin/blog/create', [BlogControllerForAdmin::class, 'create'])->name('admin.blog.create');
    Route::post('admin/blog/store', [BlogControllerForAdmin::class, 'store'])->name('admin.blog.store');
    Route::get('admin/blog/delete/{id}', [BlogControllerForAdmin::class, 'destroy']);
    Route::get('admin/blog/edit/{id}', [BlogControllerForAdmin::class, 'edit']);
    Route::post('admin/blog/update/{id}', [BlogControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Comment - Admin */
    /* --------------------------------------- */
    Route::get('admin/comment/approved', [CommentController::class, 'approved'])->name('admin.comment.approved');
    Route::get('admin/comment/make-pending/{id}', [CommentController::class, 'make_pending']);
    Route::get('admin/comment/pending', [CommentController::class, 'pending'])->name('admin.comment.pending');
    Route::get('admin/comment/make-approved/{id}', [CommentController::class, 'make_approved']);
    Route::get('admin/comment/delete/{id}', [CommentController::class, 'destroy']);


    /* --------------------------------------- */
    /* Slider - Admin */
    /* --------------------------------------- */
    Route::get('admin/slider/view', [SliderController::class, 'index'])->name('admin.slider.index');
    Route::get('admin/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('admin/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('admin/slider/delete/{id}', [SliderController::class, 'destroy']);
    Route::get('admin/slider/edit/{id}', [SliderController::class, 'edit']);
    Route::post('admin/slider/update/{id}', [SliderController::class, 'update']);


    /* --------------------------------------- */
    /* Logo - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/logo/edit', [GeneralSettingController::class, 'logo_edit'])->name('admin.general_setting.logo');
    Route::post('admin/setting/general/logo/update', [GeneralSettingController::class, 'logo_update']);

    /* --------------------------------------- */
    /* Video - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/video/edit', [GeneralSettingController::class, 'video_edit'])->name('admin.general_setting.video');
    Route::post('admin/setting/general/video/update', [GeneralSettingController::class, 'video_update']);


    /* --------------------------------------- */
    /* Favicon - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/favicon/edit', [GeneralSettingController::class, 'favicon_edit'])->name('admin.general_setting.favicon');
    Route::post('admin/setting/general/favicon/update', [GeneralSettingController::class, 'favicon_update']);


    /* --------------------------------------- */
    /* Login Background - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/loginbg/edit', [GeneralSettingController::class, 'loginbg_edit'])->name('admin.general_setting.loginbg');
    Route::post('admin/setting/general/loginbg/update', [GeneralSettingController::class, 'loginbg_update']);


    /* --------------------------------------- */
    /* TopBar - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/topbar/edit', [GeneralSettingController::class, 'topbar_edit'])->name('admin.general_setting.topbar');
    Route::post('admin/setting/general/topbar/update', [GeneralSettingController::class, 'topbar_update']);


    /* --------------------------------------- */
    /* Banner - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/banner/edit', [GeneralSettingController::class, 'banner_edit'])->name('admin.general_setting.banner');
    Route::post('admin/setting/general/banner/update', [GeneralSettingController::class, 'banner_update']);


    /* --------------------------------------- */
    /* Footer - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/footer/edit', [GeneralSettingController::class, 'footer_edit'])->name('admin.general_setting.footer');
    Route::post('admin/setting/general/footer/update', [GeneralSettingController::class, 'footer_update']);


    /* --------------------------------------- */
    /* Sidebar - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/sidebar/edit', [GeneralSettingController::class, 'sidebar_edit'])->name('admin.general_setting.sidebar');
    Route::post('admin/setting/general/sidebar/update', [GeneralSettingController::class, 'sidebar_update']);


    /* --------------------------------------- */
    /* Color - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/color/edit', [GeneralSettingController::class, 'color_edit'])->name('admin.general_setting.color');
    Route::post('admin/setting/general/color/update', [GeneralSettingController::class, 'color_update']);


    /* --------------------------------------- */
    /* Preloader - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/preloader/edit', [GeneralSettingController::class, 'preloader_edit'])->name('admin.general_setting.preloader');
    Route::post('admin/setting/general/preloader/update', [GeneralSettingController::class, 'preloader_update']);


    /* --------------------------------------- */
    /* Sticky Header - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/stickyheader/edit', [GeneralSettingController::class, 'stickyheader_edit'])->name('admin.general_setting.stickyheader');
    Route::post('admin/setting/general/stickyheader/update', [GeneralSettingController::class, 'stickyheader_update']);


    /* --------------------------------------- */
    /* Google Analytic - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/googleanalytic/edit', [GeneralSettingController::class, 'googleanalytic_edit'])->name('admin.general_setting.googleanalytic');
    Route::post('admin/setting/general/googleanalytic/update', [GeneralSettingController::class, 'googleanalytic_update']);


    /* --------------------------------------- */
    /* Google Recaptcha - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/googlerecaptcha/edit', [GeneralSettingController::class, 'googlerecaptcha_edit'])->name('admin.general_setting.googlerecaptcha');
    Route::post('admin/setting/general/googlerecaptcha/update', [GeneralSettingController::class, 'googlerecaptcha_update']);


    /* --------------------------------------- */
    /* Tawk Live Chat - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/tawklivechat/edit', [GeneralSettingController::class, 'tawklivechat_edit'])->name('admin.general_setting.tawklivechat');
    Route::post('admin/setting/general/tawklivechat/update', [GeneralSettingController::class, 'tawklivechat_update']);


    /* --------------------------------------- */
    /* Cookie Consent - Admin */
    /* --------------------------------------- */
    Route::get('admin/setting/general/cookieconsent/edit', [GeneralSettingController::class, 'cookieconsent_edit'])->name('admin.general_setting.cookieconsent');
    Route::post('admin/setting/general/cookieconsent/update', [GeneralSettingController::class, 'cookieconsent_update']);


    /* --------------------------------------- */
    /* Page Settings - Admin */
    /* --------------------------------------- */
    Route::group(['prefix' => 'admin/page/home'], function () {

        Route::get('/edit', [PageHomeController::class, 'edit'])->name('admin.page_home.edit');
        Route::post('/1', [PageHomeController::class, 'update1']);
        Route::post('/2', [PageHomeController::class, 'update2']);
        Route::post('/3', [PageHomeController::class, 'update3']);
        Route::post('/4', [PageHomeController::class, 'update4']);
        Route::post('/5', [PageHomeController::class, 'update5']);
        Route::post('/6', [PageHomeController::class, 'update6']);
        Route::post('/7', [PageHomeController::class, 'update7']);
        Route::post('/8', [PageHomeController::class, 'update8']);
        Route::post('/9', [PageHomeController::class, 'update9']);
        Route::post('/10', [PageHomeController::class, 'update10']);
    });

    Route::group(['prefix' => 'admin/page'], function () {
        Route::get('/about/edit', [PageAboutController::class, 'edit'])->name('admin.page_about.edit');
        Route::post('/about/update', [PageAboutController::class, 'update']);

        Route::get('/service/edit', [PageServiceController::class, 'edit'])->name('admin.page_service.edit');
        Route::post('/service/update', [PageServiceController::class, 'update']);

        Route::get('/shop/edit', [PageShopController::class, 'edit'])->name('admin.page_shop.edit');
        Route::post('/shop/update', [PageShopController::class, 'update']);

        Route::get('/blog/edit', [PageBlogController::class, 'edit'])->name('admin.page_blog.edit');
        Route::post('/blog/update', [PageBlogController::class, 'update']);

        Route::get('/project/edit', [PageProjectController::class, 'edit'])->name('admin.page_project.edit');
        Route::post('/project/update', [PageProjectController::class, 'update']);

        Route::get('/faq/edit', [PageFaqController::class, 'edit'])->name('admin.page_faq.edit');
        Route::post('/faq/update', [PageFaqController::class, 'update']);

        Route::get('/team/edit', [PageTeamController::class, 'edit'])->name('admin.page_team.edit');
        Route::post('/team/update', [PageTeamController::class, 'update']);

        Route::get('/photo-gallery/edit', [PagePhotoGalleryController::class, 'edit'])->name('admin.page_photo_gallery.edit');
        Route::post('/photo-gallery/update', [PagePhotoGalleryController::class, 'update']);

        Route::get('/video-gallery/edit', [PageVideoGalleryController::class, 'edit'])->name('admin.page_video_gallery.edit');
        Route::post('/video-gallery/update', [PageVideoGalleryController::class, 'update']);

        Route::get('/contact/edit', [PageContactController::class, 'edit'])->name('admin.page_contact.edit');
        Route::post('/contact/update', [PageContactController::class, 'update']);

        Route::get('/career/edit', [PageCareerController::class, 'edit'])->name('admin.page_career.edit');
        Route::post('/career/update', [PageCareerController::class, 'update']);

        Route::get('/term/edit', [PageTermController::class, 'edit'])->name('admin.page_term.edit');
        Route::post('/term/update', [PageTermController::class, 'update']);

        Route::get('/privacy/edit', [PagePrivacyController::class, 'edit'])->name('admin.page_privacy.edit');
        Route::post('/privacy/update', [PagePrivacyController::class, 'update']);
    });

    Route::group(['prefix' => 'admin/page/other'], function () {
        Route::get('/edit', [PageOtherController::class, 'edit'])->name('admin.page_other.edit');
        Route::post('/1', [PageOtherController::class, 'update1']);
        Route::post('/2', [PageOtherController::class, 'update2']);
        Route::post('/3', [PageOtherController::class, 'update3']);
        Route::post('/4', [PageOtherController::class, 'update4']);
        Route::post('/5', [PageOtherController::class, 'update5']);
        Route::post('/6', [PageOtherController::class, 'update6']);
        Route::post('/7', [PageOtherController::class, 'update7']);
        Route::post('/8', [PageOtherController::class, 'update8']);
    });


    /* --------------------------------------- */
    /* Dynamic Pages - Admin */
    /* --------------------------------------- */
    Route::get('admin/dynamic-page/view', [DynamicPageController::class, 'index'])->name('admin.dynamic_page.index');
    Route::get('admin/dynamic-page/create', [DynamicPageController::class, 'create'])->name('admin.dynamic_page.create');
    Route::post('admin/dynamic-page/store', [DynamicPageController::class, 'store'])->name('admin.dynamic_page.store');
    Route::get('admin/dynamic-page/delete/{id}', [DynamicPageController::class, 'destroy']);
    Route::get('admin/dynamic-page/edit/{id}', [DynamicPageController::class, 'edit']);
    Route::post('admin/dynamic-page/update/{id}', [DynamicPageController::class, 'update']);


    /*************************************/
    /*     Plans - Admin
    /*************************************/


    Route::get('admin/plan/index', [PlanController::class, 'index'])->name('admin.plan.index');
    Route::get('admin/plan/create', [PlanController::class, 'create'])->name('admin.plan.create');
    Route::post('admin/plan/store', [PlanController::class, 'store'])->name('admin.plan.store');
    Route::get('admin/plan/delete/{id}', [PlanController::class, 'destroy']);
    Route::get('admin/plan/edit/{id}', [PlanController::class, 'edit']);
    Route::post('admin/plan/update/{id}', [PlanController::class, 'update']);

    /*************************************/
    /*     housing - Admin
    /*************************************/
    Route::get('admin/housing/index', [ScorringRulesController::class, 'housingRules'])->name('admin.house.index');
    Route::post('admin/housing/update_score', [ScorringRulesController::class, 'updateScore']);

    /*     gender - Admin
    /*************************************/

    Route::get('admin/gender/index', [ScorringRulesController::class, 'genderRules'])->name('admin.gender.index');
    Route::post('admin/gender/update_score', [ScorringRulesController::class, 'genderScore']);
    
    /*     income - Admin
    /*************************************/

    Route::get('admin/income/index', [ScorringRulesController::class, 'incomeRules'])->name('admin.income.index');
    Route::post('admin/income/update_score', [ScorringRulesController::class, 'updateIncomeRules']);

    /* --------------------------------------- */
    /* Project - Admin */
    /* --------------------------------------- */
    Route::get('admin/project/view', [ProjectControllerForAdmin::class, 'index'])->name('admin.project.index');
    Route::get('admin/project/create', [ProjectControllerForAdmin::class, 'create'])->name('admin.project.create');
    Route::post('admin/project/store', [ProjectControllerForAdmin::class, 'store'])->name('admin.project.store');
    Route::get('admin/project/delete/{id}', [ProjectControllerForAdmin::class, 'destroy']);
    Route::get('admin/project/edit/{id}', [ProjectControllerForAdmin::class, 'edit']);
    Route::post('admin/project/update/{id}', [ProjectControllerForAdmin::class, 'update']);
    Route::get('admin/project/gallery/{id}', [ProjectControllerForAdmin::class, 'gallerysection']);
    Route::get('admin/project/gallery-delete/{id}', [ProjectControllerForAdmin::class, 'gallerydelete']);
    Route::post('admin/project/gallery-store', [ProjectControllerForAdmin::class, 'gallerystore'])->name('admin.project.gallery-store');


    /* --------------------------------------- */
    /* Photo Gallery - Admin */
    /* --------------------------------------- */
    Route::get('admin/photo-gallery/view', [PhotoController::class, 'index'])->name('admin.photo.index');
    Route::get('admin/photo-gallery/create', [PhotoController::class, 'create'])->name('admin.photo.create');
    Route::post('admin/photo-gallery/store', [PhotoController::class, 'store'])->name('admin.photo.store');
    Route::get('admin/photo-gallery/delete/{id}', [PhotoController::class, 'destroy']);
    Route::get('admin/photo-gallery/edit/{id}', [PhotoController::class, 'edit']);
    Route::post('admin/photo-gallery/update/{id}', [PhotoController::class, 'update']);


    /* --------------------------------------- */
    /* Video Gallery - Admin */
    /* --------------------------------------- */
    Route::get('admin/video-gallery/view', [VideoController::class, 'index'])->name('admin.video.index');
    Route::get('admin/video-gallery/create', [VideoController::class, 'create'])->name('admin.video.create');
    Route::post('admin/video-gallery/store', [VideoController::class, 'store'])->name('admin.video.store');
    Route::get('admin/video-gallery/delete/{id}', [VideoController::class, 'destroy']);
    Route::get('admin/video-gallery/edit/{id}', [VideoController::class, 'edit']);
    Route::post('admin/video-gallery/update/{id}', [VideoController::class, 'update']);


    /* --------------------------------------- */
    /* Why Choose Us - Admin */
    /* --------------------------------------- */
    Route::get('admin/why-choose/view', [WhyChooseController::class, 'index'])->name('admin.why_choose.index');
    Route::get('admin/why-choose/create', [WhyChooseController::class, 'create'])->name('admin.why_choose.create');
    Route::post('admin/why-choose/store', [WhyChooseController::class, 'store'])->name('admin.why_choose.store');
    Route::get('admin/why-choose/delete/{id}', [WhyChooseController::class, 'destroy']);
    Route::get('admin/why-choose/edit/{id}', [WhyChooseController::class, 'edit']);
    Route::post('admin/why-choose/update/{id}', [WhyChooseController::class, 'update']);


    /* --------------------------------------- */
    /* Service - Admin */
    /* --------------------------------------- */
    Route::get('admin/service/view', [ServiceControllerForAdmin::class, 'index'])->name('admin.service.index');
    Route::get('admin/service/create', [ServiceControllerForAdmin::class, 'create'])->name('admin.service.create');
    Route::post('admin/service/store', [ServiceControllerForAdmin::class, 'store'])->name('admin.service.store');
    Route::get('admin/service/delete/{id}', [ServiceControllerForAdmin::class, 'destroy']);
    Route::get('admin/service/edit/{id}', [ServiceControllerForAdmin::class, 'edit']);
    Route::post('admin/service/update/{id}', [ServiceControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Testimonial - Admin */
    /* --------------------------------------- */
    Route::get('admin/testimonial/view', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('admin/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
    Route::post('admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('admin/testimonial/delete/{id}', [TestimonialController::class, 'destroy']);
    Route::get('admin/testimonial/edit/{id}', [TestimonialController::class, 'edit']);
    Route::post('admin/testimonial/update/{id}', [TestimonialController::class, 'update']);


    /* --------------------------------------- */
    /* Team Member - Admin */
    /* --------------------------------------- */
    Route::get('admin/team-member/view', [TeamMemberControllerForAdmin::class, 'index'])->name('admin.team_member.index');
    Route::get('admin/team-member/create', [TeamMemberControllerForAdmin::class, 'create'])->name('admin.team_member.create');
    Route::post('admin/team-member/store', [TeamMemberControllerForAdmin::class, 'store'])->name('admin.team_member.store');
    Route::get('admin/team-member/delete/{id}', [TeamMemberControllerForAdmin::class, 'destroy']);
    Route::get('admin/team-member/edit/{id}', [TeamMemberControllerForAdmin::class, 'edit']);
    Route::post('admin/team-member/update/{id}', [TeamMemberControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Job or Career - Admin */
    /* --------------------------------------- */
    Route::get('admin/job/view', [JobControllerForAdmin::class, 'index'])->name('admin.job.index');
    Route::get('admin/job/create', [JobControllerForAdmin::class, 'create'])->name('admin.job.create');
    Route::post('admin/job/store', [JobControllerForAdmin::class, 'store'])->name('admin.job.store');
    Route::get('admin/job/delete/{id}', [JobControllerForAdmin::class, 'destroy']);
    Route::get('admin/job/edit/{id}', [JobControllerForAdmin::class, 'edit']);
    Route::post('admin/job/update/{id}', [JobControllerForAdmin::class, 'update']);
    Route::get('admin/job/application', [JobControllerForAdmin::class, 'view_application'])->name('admin.job.view_application');
    Route::get('admin/job/application/delete/{id}', [JobControllerForAdmin::class, 'delete_application']);


    /* --------------------------------------- */
    /* FAQ - Admin */
    /* --------------------------------------- */
    Route::get('admin/faq/view', [FaqControllerForAdmin::class, 'index'])->name('admin.faq.index');
    Route::get('admin/faq/create', [FaqControllerForAdmin::class, 'create'])->name('admin.faq.create');
    Route::post('admin/faq/store', [FaqControllerForAdmin::class, 'store'])->name('admin.faq.store');
    Route::get('admin/faq/delete/{id}', [FaqControllerForAdmin::class, 'destroy']);
    Route::get('admin/faq/edit/{id}', [FaqControllerForAdmin::class, 'edit']);
    Route::post('admin/faq/update/{id}', [FaqControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Email Template - Admin */
    /* --------------------------------------- */
    Route::get('admin/email-template/view', [EmailTemplateController::class, 'index'])->name('admin.email_template.index');
    Route::get('admin/email-template/edit/{id}', [EmailTemplateController::class, 'edit']);
    Route::post('admin/email-template/update/{id}', [EmailTemplateController::class, 'update']);


    /* --------------------------------------- */
    /* Social Media - Admin */
    /* --------------------------------------- */
    Route::get('admin/social-media/view', [SocialMediaItemController::class, 'index'])->name('admin.social_media.index');
    Route::get('admin/social-media/create', [SocialMediaItemController::class, 'create'])->name('admin.social_media.create');
    Route::post('admin/social-media/store', [SocialMediaItemController::class, 'store'])->name('admin.social_media.store');
    Route::get('admin/social-media/delete/{id}', [SocialMediaItemController::class, 'destroy']);
    Route::get('admin/social-media/edit/{id}', [SocialMediaItemController::class, 'edit']);
    Route::post('admin/social-media/update/{id}', [SocialMediaItemController::class, 'update']);


    /* --------------------------------------- */
    /* Subscriber - Admin */
    /* --------------------------------------- */
    Route::get('admin/subscriber/view', [SubscriberController::class, 'index'])->name('admin.subscriber.index');
    Route::get('admin/subscriber/create', [SubscriberController::class, 'create'])->name('admin.subscriber.create');
    Route::post('admin/subscriber/store', [SubscriberController::class, 'store'])->name('admin.subscriber.store');
    Route::get('admin/subscriber/delete/{id}', [SubscriberController::class, 'destroy']);
    Route::get('admin/subscriber/send-email', [SubscriberController::class, 'send_email'])->name('admin.subscriber.send_email');
    Route::post('admin/subscriber/send-email-action', [SubscriberController::class, 'send_email_action'])->name('admin.subscriber.send_email_action');


    /* --------------------------------------- */
    /* Coupon - Admin */
    /* --------------------------------------- */
    Route::get('admin/coupon/view', [CouponController::class, 'index'])->name('admin.coupon.index');
    Route::get('admin/coupon/create', [CouponController::class, 'create'])->name('admin.coupon.create');
    Route::post('admin/coupon/store', [CouponController::class, 'store'])->name('admin.coupon.store');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'destroy']);
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::post('admin/coupon/update/{id}', [CouponController::class, 'update']);


    /* --------------------------------------- */
    /* Shipping - Admin */
    /* --------------------------------------- */
    Route::get('admin/shipping/view', [ShippingController::class, 'index'])->name('admin.shipping.index');
    Route::get('admin/shipping/create', [ShippingController::class, 'create'])->name('admin.shipping.create');
    Route::post('admin/shipping/store', [ShippingController::class, 'store'])->name('admin.shipping.store');
    Route::get('admin/shipping/delete/{id}', [ShippingController::class, 'destroy']);
    Route::get('admin/shipping/edit/{id}', [ShippingController::class, 'edit']);
    Route::post('admin/shipping/update/{id}', [ShippingController::class, 'update']);


    /* --------------------------------------- */
    /* Product - Admin */
    /* --------------------------------------- */
    Route::get('admin/product/view', [ProductControllerForAdmin::class, 'index'])->name('admin.product.index');
    Route::get('admin/product/create', [ProductControllerForAdmin::class, 'create'])->name('admin.product.create');
    Route::post('admin/product/store', [ProductControllerForAdmin::class, 'store'])->name('admin.product.store');
    Route::get('admin/product/delete/{id}', [ProductControllerForAdmin::class, 'destroy']);
    Route::get('admin/product/edit/{id}', [ProductControllerForAdmin::class, 'edit']);
    Route::post('admin/product/update/{id}', [ProductControllerForAdmin::class, 'update']);


    /* --------------------------------------- */
    /* Order - Admin */
    /* --------------------------------------- */
    Route::get('admin/order/view', [OrderControllerForAdmin::class, 'index'])->name('admin.order.index');
    Route::get('admin/order/create', [OrderControllerForAdmin::class, 'create'])->name('admin.order.create');
    Route::post('admin/order/store', [OrderControllerForAdmin::class, 'store'])->name('admin.order.store');
    Route::get('admin/order/detail/{id}', [OrderControllerForAdmin::class, 'detail']);
    Route::get('admin/order/invoice/{id}', [OrderControllerForAdmin::class, 'invoice']);
    Route::get('admin/order/delete/{id}', [OrderControllerForAdmin::class, 'destroy']);


    /* --------------------------------------- */
    /* Customer - Admin */
    /* --------------------------------------- */
    Route::get('admin/customer/view', [CustomerController::class, 'index'])->name('admin.customer.index');
    Route::get('admin/customer/detail/{id}', [CustomerController::class, 'detail']);
    Route::get('admin/customer/make-active/{id}', [CustomerController::class, 'make_active']);
    Route::get('admin/customer/make-pending/{id}', [CustomerController::class, 'make_pending']);
    Route::get('admin/customer/delete/{id}', [CustomerController::class, 'destroy']);


    /* --------------------------------------- */
    /* Footer Columns - Admin */
    /* --------------------------------------- */
    Route::get('admin/footer/view', [FooterColumnController::class, 'index'])->name('admin.footer.index');
    Route::get('admin/footer/create', [FooterColumnController::class, 'create'])->name('admin.footer.create');
    Route::post('admin/footer/store', [FooterColumnController::class, 'store'])->name('admin.footer.store');
    Route::get('admin/footer/delete/{id}', [FooterColumnController::class, 'destroy']);
    Route::get('admin/footer/edit/{id}', [FooterColumnController::class, 'edit']);
    Route::post('admin/footer/update/{id}', [FooterColumnController::class, 'update']);


    /* --------------------------------------- */
    /* Menu - Admin */
    /* --------------------------------------- */
    Route::get('admin/menu/view', [MenuController::class, 'index'])->name('admin.menu.index');
    Route::post('admin/menu/update', [MenuController::class, 'update']);


    /* --------------------------------------- */
    /* Admin Users and Roles - Admin */
    /* --------------------------------------- */
    Route::get('admin/role/user', [RoleController::class, 'user'])->name('admin.role.user');
    Route::get('admin/role/user-create', [RoleController::class, 'user_create'])->name('admin.role.user-create');
    Route::post('admin/role/user-store', [RoleController::class, 'user_store'])->name('admin.role.user-store');
    Route::get('admin/role/user/edit/{id}', [RoleController::class, 'user_edit']);
    Route::post('admin/role/user/update/{id}', [RoleController::class, 'user_update']);
    Route::get('admin/role/user/edit/password/{id}', [RoleController::class, 'user_edit_password']);
    Route::post('admin/role/user/update/password/{id}', [RoleController::class, 'user_update_password']);
    Route::get('admin/role/user/delete/{id}', [RoleController::class, 'user_destroy']);
    Route::get('admin/role/index', [RoleController::class, 'index'])->name('admin.role.index');
    Route::get('admin/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('admin/role/store', [RoleController::class, 'store'])->name('admin.role.store');
    Route::get('admin/role/delete/{id}', [RoleController::class, 'destroy']);
    Route::get('admin/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('admin/role/update/{id}', [RoleController::class, 'update']);
    Route::get('admin/role/access-setup/{id}', [RoleController::class, 'access_setup']);
    Route::post('admin/role/access-setup-update/{id}', [RoleController::class, 'access_setup_update']);

    Route::get('setting/general/eula', [GeneralSettingController::class, 'eula'])->name('admin.general_setting.eula');
    Route::post('setting/general/eula/update', [GeneralSettingController::class, 'eula_update'])->name('admin.general_setting.eula_update');
    //Route::post('eula/agree', [GeneralSettingController::class, 'eula_agree'])->name('admin.eula.agree');


});

/* --------------------------------------- */
/* Consumer Routes */
/* --------------------------------------- */
Route::post('/update/process', [ThisIsMeController::class, 'updateProccess'])->name('admin.consumer.update_process');
Route::group(['prefix' => 'admin/consumer', 'middleware' => ['2fa', 'consumer']], function () {
    Route::get('/this-is-me', [ThisIsMeController::class, 'this_is_me'])->name('admin.consumer.this_is_me');
    Route::get('/validate-address', [USPSAddressController::class, 'validateAddress']);
    Route::get('/autocomplete-job', [ThisIsMeController::class, 'autocomplete'])->name('autocomplete.job.titles');
    Route::post('/this-is-me-store', [ThisIsMeController::class, 'this_is_me_store']);
    Route::get('/return-later', [ThisIsMeController::class, 'return_later']);

});

Route::group(['prefix' => 'admin/merchant', 'middleware' => ['2fa', 'merchant']], function () {
    Route::get('/update-my-info', [UpdateMyInfoController::class, 'index'])->name('admin.merchant.update_my_info');
    Route::post('/update-my-info', [UpdateMyInfoController::class, 'store'])->name('admin.merchant.update_my_info.store');

});

Route::group(['prefix' => 'admin/bank', 'middleware' => ['2fa', 'bank']], function () {
    Route::get('/update-my-info', [BankUpdateMyInfoController::class, 'index'])->name('admin.bank.update_my_info');
    Route::post('/update-my-info', [BankUpdateMyInfoController::class, 'store'])->name('admin.bank.update_my_info.store');
});

Route::group(['prefix' => 'admin/govt', 'middleware' => ['2fa', 'govt']], function () {
    Route::get('/update-my-info', [GovtUpdateMyInfoController::class, 'index'])->name('admin.govt.update_my_info');
    Route::post('/update-my-info', [GovtUpdateMyInfoController::class, 'store'])->name('admin.govt.update_my_info.store');

});
Route::group(['prefix' => 'admin/healthcare', 'middleware' => ['2fa', 'healthcare']], function () {
    Route::get('/update-my-info', [HealthcareUpateMyInfoController::class, 'index'])->name('admin.healthcare.update_my_info');
    Route::post('/update-my-info', [HealthcareUpateMyInfoController::class, 'store'])->name('admin.healthcare.update_my_info.store');

});
Route::group(['prefix' => 'admin/education', 'middleware' => ['2fa', 'education']], function () {
    Route::get('/update-my-info', [EducationUpateMyInfoController::class, 'index'])->name('admin.education.update_my_info');
    Route::post('/update-my-info', [EducationUpateMyInfoController::class, 'store'])->name('admin.education.update_my_info.store');
});
Route::group(['prefix' => 'admin/tracker', 'middleware' => ['2fa', 'tracker']], function () {
    Route::get('/update-my-info', [TrackerUpateMyInfoController::class, 'index'])->name('admin.tracker.update_my_info');
    Route::post('/update-my-info', [TrackerUpateMyInfoController::class, 'store'])->name('admin.tracker.update_my_info.store');
});
Route::get('storeJobs', [ThisIsMeController::class, 'store_jobs_db']);
Route::get('card-check/{number}', [ThisIsMeController::class, 'card_check']);


Route::post('admin/eula/agree', [GeneralSettingController::class, 'eula_agree'])->name('admin.eula.agree');


/* --------------------------------------- */
/* Document Management - Admin */
/* --------------------------------------- */
Route::get('admin/documents', [GeneralSettingController::class, 'documents'])->name('admin.documents.index');
Route::post('admin/documents/store', [GeneralSettingController::class, 'documents_store'])->name('admin.documents.store');
Route::get('admin/documents/delete/{id}', [GeneralSettingController::class, 'documents_destroy']);
Route::get('admin/documents/edit/{id}', [GeneralSettingController::class, 'documents_edit'])->name('admin.documents.edit');
Route::post('admin/documents/update/{id}', [GeneralSettingController::class, 'documents_update'])->name('admin.documents.update');

/* Document Management - User View */
Route::get('admin/my-documents', [GeneralSettingController::class, 'my_documents'])->name('admin.my_documents');
/* --------------------------------------- */
/* Contact Us - Admin */
/* --------------------------------------- */
Route::get('admin/contact', [ContactController::class, 'contact_page'])->name('admin.contact.index');
Route::delete('admin/contact/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
// * Document page Route *//
//*************---------------***********/
Route::get('document', [DocumentController::class, 'index'])->name('front.document');
Route::get('admin/websitedocuments', [AdminDocumentController::class, 'index'])->name('admin.websitedocuments.index');
Route::post('admin/websitedocuments/store', [AdminDocumentController::class, 'store'])->name('admin.websitedocuments.store');
Route::get('admin/websitedocuments/delete/{id}', [AdminDocumentController::class, 'destroy'])->name('admin.websitedocuments.delete');
Route::post('admin/websitedocuments/update/{id}', [AdminDocumentController::class, 'update'])->name('admin.websitedocuments.update');





/* --------------------------------------- */
/* SDK Management - Admin */
/* --------------------------------------- */
Route::get('admin/sdk', [SdkController::class, 'index'])->name('admin.sdk.index');
Route::post('admin/sdk/store', [SdkController::class, 'store'])->name('admin.sdk.store');
Route::get('admin/sdk/delete/{id}', [SdkController::class, 'destroy'])->name('admin.sdk.delete');
Route::get('admin/sdk/edit/{id}', [SdkController::class, 'edit'])->name('admin.sdk.edit');
Route::post('admin/sdk/update/{id}', [SdkController::class, 'update'])->name('admin.sdk.update');
//  SDK routes
Route::get('admin/sdk/view', [SdkController::class, 'viewSdk'])->name('admin.sdk.view');
Route::post('admin/sdk/agree', [SdkController::class, 'agreeSdk'])->name('admin.sdk.agree');
Route::get('admin/sdk/download', [SdkController::class, 'downloadSdk'])->name('admin.sdk.download');