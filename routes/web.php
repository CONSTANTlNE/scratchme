<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SocialiteController;
use App\Models\Language;
use Illuminate\Support\Facades\Route;

// ======== Fortify ==============
use Illuminate\Support\Str;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;
use Laravel\Fortify\RoutePath;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Test Routes
//Route::prefix('{locale?}')
//    ->where(['locale' => '[a-zA-Z]{2}'])
//    ->middleware('Setlocale') // <-- Add the middleware
//    ->group(function () {
Route::get('/test', [TestController::class, 'index'])->name('test');
//    });
Route::get('/test2', function () {
$rand1=Str::upper(Str::random(3, 'abcdefghijklmnopqrstuvwxyz'));
$rand=random_int(156,999);
$code=$rand1.'-'.$rand;

//    while (YourModel::where('unique_code', $code)->exists()) {
//        // If the code already exists, generate a new one
//        $code = Str::random(6, '0123456789');
//    }

    return $code;

})->name('test2');


Route::get('/', function () {

$main=Language::where('main',1)->pluck('abbr');
        return redirect($main[0]);


})->name('home');


// No Auth General Routes
Route::prefix('{locale?}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('Setlocale')
    ->group(function () {
        Route::get('/', [LandingController::class, 'index'])->name('index');
        Route::get('/scratch/all', [LandingController::class, 'allProducts'])->name('allproduct');
        Route::get('/scratch/about', [LandingController::class, 'about'])->name('about');
        Route::get('/scratch/terms', [LandingController::class, 'terms'])->name('landingterms');
        Route::get('/scratch/{product}', [LandingController::class, 'productDetails'])->name('productDetails');

    });



// ADMIN ROUTES

Route::prefix('{locale?}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware(['auth', 'Setlocale','role:admin']) // <-- Add the middleware
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'adminMain'])->name('adminMain');

        // Start JSON CRUD
        Route::get('/admin/static/translation/add',
            [AdminController::class, 'addTranslation'])->name('addStaticTranslation');
        Route::post('/admin/static/translation/store',
            [AdminController::class, 'storeStaticTranslations'])->name('storeStaticTranslations');
        Route::post('/admin/static/translation/update',
            [AdminController::class, 'updateStaticTranslation'])->name('updateStaticTranslation');
        // End JSON CRUD


        // Start Language Crud
        Route::post('/admin/language/store', [AdminController::class, 'createLanguage'])->name('createLanguage');
        Route::post('/admin/language/status/update',
            [AdminController::class, 'updateLangStatus'])->name('updateLangStatus');
        Route::post('/admin/language/delete', [AdminController::class, 'deleteLanguage'])->name('deleteLanguage');
        Route::post('/admin/language/main/update', [AdminController::class, 'setMainLang'])->name('setMainLang');
        Route::get('/admin/languages', [AdminController::class, 'languages'])->name('languages');
        Route::post('/admin/languages/position/change',
            [AdminController::class, 'changePosition'])->name('changePosition');

        //Delivery
        Route::get('/admin/delivery', [AdminController::class, 'delivery'])->name('delivery');
        Route::post('/admin/delivery/create', [AdminController::class, 'createDelivery'])->name('createDelivery');
        Route::post('/admin/delivery/update', [AdminController::class, 'updateDelivery'])->name('updateDelivery');


        // Admin Order
        Route::get('/admin/orders', [AdminController::class, 'allOrders'])->name('orders');
        Route::get('/admin/order/{order}/{user}', [AdminController::class, 'singleOrder'])->name('singleOrder');
        Route::post('/admin/manualPayment', [PaymentController::class, 'manualPayment'])->name('manualPayment');


        // Products
        Route::get('/admin/products', [ProductController::class, 'index'])->name('addProduct');
        Route::get('/admin/products/all', [ProductController::class, 'allProduct'])->name('allProduct');
        Route::post('/admin/product/position/update',
            [ProductController::class, 'changeProductPosition'])->name('changeProductPosition');
        Route::post('/admin/product/price/update', [ProductController::class, 'priceUpdate'])->name('priceUpdate');
        Route::post('/admin/product/forlanding/update',
            [ProductController::class, 'forLandingUpdate'])->name('forLandingUpdate');
        Route::post('/admin/product/status/update',
            [ProductController::class, 'changeProductStatus'])->name('changeProductStatus');
        Route::post('/admin/product/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
        Route::post('/admin/product/features/update',
            [ProductController::class, 'updateFeatures'])->name('updateFeatures');
        Route::post('/admin/product/shortdescr/update',
            [ProductController::class, 'updateShortDescr'])->name('updateShortDescr');
        Route::post('/admin/product/longdescr/update',
            [ProductController::class, 'updateLongDescr'])->name('updateLongDescr');
        Route::post('/admin/product/prodname/update',
            [ProductController::class, 'updateProdName'])->name('updateProdName');
        Route::get('/admin/product/change-photo/{id}', [ProductController::class, 'changePhoto'])->name('changePhoto');
        Route::post('/admin/product/photos/update', [ProductController::class, 'updatePhotos'])->name('updatePhotos');

        Route::post('/admin/product/store', [ProductController::class, 'store'])->name('storeProduct');
        Route::post('/admin/product/update', [ProductController::class, 'update'])->name('updateProduct');


        // Discounts
        Route::post('/admin/discount/create',
            [DiscountController::class, 'createDiscount'])->name('createDiscount');
        Route::post('/admin/coupon/create',
            [DiscountController::class, 'createCoupon'])->name('createCoupon');
        Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('discounts');
        Route::post('/admin/discounts/status', [DiscountController::class, 'discountStatus'])->name('discountStatus');
        Route::post('/admin/discounts/delete', [DiscountController::class, 'deleteDiscount'])->name('deleteDiscount');
        Route::post('/admin/discounts/applycoupon', [OrderController::class, 'applyCoupon'])->name('applyCoupon');


        // FAQ
        Route::get('/admin/faq', [FaqController::class, 'index'])->name('faq');
        Route::post('/admin/faq/update', [FaqController::class, 'updateFaq'])->name('updateFaq');
        Route::post('/admin/faq/create', [FaqController::class, 'createFaq'])->name('createFaq');
        Route::post('/admin/faq/delete', [FaqController::class, 'faqDelete'])->name('faqDelete');

        // About
        Route::get('/admin/about', [AdminController::class, 'aboutUs'])->name('aboutUs');
        Route::post('/admin/about/create', [AdminController::class, 'createAbout'])->name('createAbout');
        Route::post('/admin/about/update', [AdminController::class, 'updateAbout'])->name('updateAbout');
        Route::post('/admin/about/status', [AdminController::class, 'aboutStatus'])->name('aboutStatus');
        Route::post('/admin/about/photo/create', [AdminController::class, 'aboutphoto'])->name('aboutphoto');
        Route::post('/admin/about/photo/update', [AdminController::class, 'aboutphotoupdate'])->name('aboutphotoupdate');



        // Terms
        Route::get('/admin/terms', [AdminController::class, 'terms'])->name('terms');
        Route::post('/admin/term/create', [TermController::class, 'createTerm'])->name('createTerm');
        Route::post('/admin/term/delete', [TermController::class, 'deleteTerm'])->name('deleteTerm');
        Route::post('/admin/term/update', [TermController::class, 'updateTerm'])->name('updateTerm');

    });


// User Routes
Route::prefix('{locale?}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware(['auth', 'Setlocale']) // <-- Add the middleware
    ->group(function () {

        //Order-Cart
        Route::get('/cart', [OrderController::class, 'index'])->name('cart');
        Route::post('/cart/item/add', [OrderController::class, 'addItem'])->name('addItem');
        Route::post('/cart/item/remove', [OrderController::class, 'removeItem'])->name('removeItem');
        Route::post('/cart/item/delete', [OrderController::class, 'deleteItem'])->name('deleteItem');
        Route::post('/cart/delivery/order/update', [OrderController::class, 'updateOrderDelivery'])->name('updateOrderDelivery');

        // Purchase
        Route::post('/cart/purchase', [PurchaseController::class, 'createPayment'])->name('createPayment');
        Route::post('/cart/checkout', [PurchaseController::class, 'checkout'])->name('checkout');


        // Order History
        Route::get('/orders', [OrderController::class, 'userOrders'])->name('userOrders');
        Route::get('/orders/{order}', [OrderController::class, 'orderDetails'])->name('orderDetails');



    });


// Socalite Logins

Route::get('auth/{provider}/redirect/', [SocialiteController::class, 'redirect'])->name('social.login');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback']);



// ======================= FORTIFY ========================================

Route::group(['middleware' => config('fortify.middleware', ['web', 'Setlocale'])], function () {
    $enableViews = config('fortify.views', true);

    // Authentication...
    if ($enableViews) {
        Route::get(RoutePath::for('login', '{locale?}/login'), [AuthenticatedSessionController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard'), 'Setlocale'])
            ->name('login');
    }

    $limiter             = config('fortify.limiters.login');
    $twoFactorLimiter    = config('fortify.limiters.two-factor');
    $verificationLimiter = config('fortify.limiters.verification', '6,1');

    Route::post(RoutePath::for('login', '{locale?}/login'), [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:'.config('fortify.guard'),
            $limiter ? 'throttle:'.$limiter : null,
        ]), 'Setlocale');

    Route::post(RoutePath::for('logout', '{locale?}/logout'), [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // Password Reset...
    if (Features::enabled(Features::resetPasswords())) {
        if ($enableViews) {
            Route::get(RoutePath::for('password.request', '{locale?}/forgot-password'),
                [PasswordResetLinkController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard'), 'Setlocale'])
                ->name('password.request');

            Route::get(RoutePath::for('password.reset', '{locale?}/reset-password/{token}'),
                [NewPasswordController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard'), 'Setlocale'])
                ->name('password.reset');
        }

        Route::post(RoutePath::for('password.email', '{locale?}/forgot-password'), [PasswordResetLinkController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard', ), 'Setlocale'])
            ->name('password.email');

        Route::post(RoutePath::for('password.update', '{locale?}/reset-password'), [NewPasswordController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard'), 'Setlocale'])
            ->name('password.update');
    }

    // Registration...
    if (Features::enabled(Features::registration())) {
        if ($enableViews) {
            Route::get(RoutePath::for('register', '{locale?}/register'), [RegisteredUserController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard'), 'Setlocale'])
                ->name('register');
        }

        Route::post(RoutePath::for('register', '{locale?}/register'), [RegisteredUserController::class, 'store'])
            ->middleware(['guest:'.config('fortify.guard'), 'Setlocale']);
    }

    // Email Verification...
    if (Features::enabled(Features::emailVerification())) {
        if ($enableViews) {
            Route::get(RoutePath::for('verification.notice', '/email/verify'),
                [EmailVerificationPromptController::class, '__invoke'])
                ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
                ->name('verification.notice');
        }

        Route::get(RoutePath::for('verification.verify', '/email/verify/{id}/{hash}'),
            [VerifyEmailController::class, '__invoke'])
            ->middleware([
                config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'signed',
                'throttle:'.$verificationLimiter
            ])
            ->name('verification.verify');

        Route::post(RoutePath::for('verification.send', '/email/verification-notification'),
            [EmailVerificationNotificationController::class, 'store'])
            ->middleware([
                config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'throttle:'.$verificationLimiter
            ])
            ->name('verification.send');
    }

    // Profile Information...
    if (Features::enabled(Features::updateProfileInformation())) {
        Route::put(RoutePath::for('user-profile-information.update', '/user/profile-information'),
            [ProfileInformationController::class, 'update'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
            ->name('user-profile-information.update');
    }

    // Passwords...
    if (Features::enabled(Features::updatePasswords())) {
        Route::put(RoutePath::for('user-password.update', '/user/password'), [PasswordController::class, 'update'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
            ->name('user-password.update');
    }

    // Password Confirmation...
    if ($enableViews) {
        Route::get(RoutePath::for('password.confirm', '/user/confirm-password'),
            [ConfirmablePasswordController::class, 'show'])
            ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')]);
    }

    Route::get(RoutePath::for('password.confirmation', '/user/confirmed-password-status'),
        [ConfirmedPasswordStatusController::class, 'show'])
        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
        ->name('password.confirmation');

    Route::post(RoutePath::for('password.confirm', '/user/confirm-password'),
        [ConfirmablePasswordController::class, 'store'])
        ->middleware([config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')])
        ->name('password.confirm');

    // Two Factor Authentication...
    if (Features::enabled(Features::twoFactorAuthentication())) {
        if ($enableViews) {
            Route::get(RoutePath::for('two-factor.login', '/two-factor-challenge'),
                [TwoFactorAuthenticatedSessionController::class, 'create'])
                ->middleware(['guest:'.config('fortify.guard')])
                ->name('two-factor.login');
        }

        Route::post(RoutePath::for('two-factor.login', '/two-factor-challenge'),
            [TwoFactorAuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest:'.config('fortify.guard'),
                $twoFactorLimiter ? 'throttle:'.$twoFactorLimiter : null,
            ]));

        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
            ? [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard'), 'password.confirm']
            : [config('fortify.auth_middleware', 'auth').':'.config('fortify.guard')];

        Route::post(RoutePath::for('two-factor.enable', '/user/two-factor-authentication'),
            [TwoFactorAuthenticationController::class, 'store'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.enable');

        Route::post(RoutePath::for('two-factor.confirm', '/user/confirmed-two-factor-authentication'),
            [ConfirmedTwoFactorAuthenticationController::class, 'store'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.confirm');

        Route::delete(RoutePath::for('two-factor.disable', '/user/two-factor-authentication'),
            [TwoFactorAuthenticationController::class, 'destroy'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.disable');

        Route::get(RoutePath::for('two-factor.qr-code', '/user/two-factor-qr-code'),
            [TwoFactorQrCodeController::class, 'show'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.qr-code');

        Route::get(RoutePath::for('two-factor.secret-key', '/user/two-factor-secret-key'),
            [TwoFactorSecretKeyController::class, 'show'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.secret-key');

        Route::get(RoutePath::for('two-factor.recovery-codes', '/user/two-factor-recovery-codes'),
            [RecoveryCodeController::class, 'index'])
            ->middleware($twoFactorMiddleware)
            ->name('two-factor.recovery-codes');

        Route::post(RoutePath::for('two-factor.recovery-codes', '/user/two-factor-recovery-codes'),
            [RecoveryCodeController::class, 'store'])
            ->middleware($twoFactorMiddleware);
    }
});

