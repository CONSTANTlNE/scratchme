<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();

    }

    public function callback($provider){

        try {
            $user = Socialite::driver($provider)->stateless()->user();

//            dd($user->token);
            $userId = $user->id;


            if(User::where('email',$user->getEmail())->exists() &&
                !User::where('email', $user->getEmail())->where('provider', $provider)->exists()
            ) {
                return redirect('login')->withErrors(['email'=>'Account with this email already registered']);
            }

            $social_user = User::updateOrCreate([
                // in user migration should be provider_id table or something
                'provider_id' => $user->id,
                'email'=>$user->email,
            ], [
                //  in user migration should be provider table
                'provider' => $provider,
                'name' => $user->name ?? $user->nickname,
                'email' => $user->email,
                'provider_token'=>$user->token,
                'password'=>Hash::make(Str::random(10)),
                'email_verified_at'=>now()
            ]);

            Auth::login($social_user);
            return redirect('/');
        } catch (Exception $e){
            dd($e);
        }

    }
}
