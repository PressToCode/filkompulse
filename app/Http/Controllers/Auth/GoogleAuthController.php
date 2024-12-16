<?php

namespace App\Http\Controllers\Auth;

use App\Models\GoogleAccountAuth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        // ? CHANGE STATELESS, SECURITY VULNERABILITY ->stateless();
        // ! https://stackoverflow.com/questions/30660847/laravel-socialite-invalidstateexception
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $Googleuser = Socialite::driver('google')->user();
            $user = User::firstWhere('email', $Googleuser->getEmail());
            $GUser = new GoogleAccountAuth;

            // * User account exists
            if($user && $Googleuser) {
                $GUser = GoogleAccountAuth::UpdateOrCreate([
                    'google_id' => $Googleuser->getId(),
                ],[
                    'user_id' => $user->id,
                    'name' => $Googleuser->getName(),
                    'nickname' => $Googleuser->getNickname(),
                    'email' => $Googleuser->getEmail(),
                    'avatar' => $Googleuser->getAvatar(),
                    'token' => $Googleuser->token,
                    'refreshToken' => $Googleuser->refreshToken,
                    'expireIn' => $Googleuser->expireIn,
                ]);
            // * User account does not exists
            } else {
                // ? A bit redundant but better safe than sorry
                $user = User::firstOrCreate([
                    'email' => $Googleuser->getEmail(),
                ], [
                    'name' => $Googleuser->getName(),
                    'password' => \Hash::make('L7u7POZHwZu5Zumn29C3'),
                ]);

                $GUser = GoogleAccountAuth::UpdateOrCreate([
                    'google_id' => $Googleuser->getId(),
                ],[
                    'user_id' => $user->id,
                    'name' => $Googleuser->getName(),
                    'nickname' => $Googleuser->getNickname(),
                    'email' => $Googleuser->getEmail(),
                    'avatar' => $Googleuser->getAvatar(),
                    'token' => $Googleuser->token,
                    'refreshToken' => $Googleuser->refreshToken,
                    'expireIn' => $Googleuser->expireIn,
                ]);

                event(new Registered($user));
            }

            Auth::guard('google')->login($GUser);
            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            Log::error('Unexpected error occurred', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }
}

/* 
 * To determine if user is first-time
 * checks user table if email exists
 * 
 * In case you asked, yes, it's a hashed
 * 20 digit password
 * 
 * Intended Behavior
 * > If user first time register or log-in
 * then create a new record in GoogleAccountAuth
 * and User table. Eloquently connect both, and
 * use a placeholder password.
 * 
 * > If user is not first time (record exists)
 * then 2 of the following might occur:
 * 1) if user registered from Google, then
 * record in GoogleAccountAuth would already
 * exist therefore update, but leave existing
 * user record
 * 
 * 2) if user not registered from google, but
 * registered from laravel breeze, then create
 * a new record in GoogleAccountAuth, but leave
 * existing user record
 * 
 * Best case is use UpdateOrCreate
 * 
 * Supposedly there is
 * getUserByToken($token) -> get user data
 * refreshToken($refreshToken) -> return token
 */