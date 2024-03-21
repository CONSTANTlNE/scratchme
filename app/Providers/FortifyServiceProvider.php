<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Language;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(): void
    {
        Fortify::loginView(function () {
            $languages = Language::all();
            return view('auth.login', compact('languages'));
        });

        Fortify::registerView(function () {
            $languages = Language::all();
            return view('auth.register', compact('languages'));
        });

        //View with email input to send password reset link
        Fortify::requestPasswordResetLinkView(function () {
            $languages = Language::all();
            return view('auth.forgot-password', compact('languages'));
        });

        //View with two email inputs for new password
        Fortify::resetPasswordView(function ($request) {
            $languages = Language::all();
            return view('auth.reset-password', ['request' => $request], compact('languages'));
        });

        Fortify::verifyEmailView(function () {
            $languages = Language::all();
            return view('auth.verify-email',compact('languages'));
        });

    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
