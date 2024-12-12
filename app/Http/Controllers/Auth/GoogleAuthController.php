<?php

namespace App\Http\Controllers\Auth;

use App\Models\GoogleAccountAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        // TODO: CHANGE STATELESS, SECURITY VULNERABILITY
        // ! https://stackoverflow.com/questions/30660847/laravel-socialite-invalidstateexception
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // TODO: CHANGE STATELESS, SECURITY VULNERABILITY
            $Googleuser = Socialite::driver('google')->stateless()->user(); 
            $user = GoogleAccountAuth::UpdateOrCreate([
                'google_id' => $Googleuser->getId(),
            ],[
                'name' => $Googleuser->getName(),
                'nickname' => $Googleuser->getNickname(),
                'email' => $Googleuser->getEmail(),
                'avatar' => $Googleuser->getAvatar(),
            ]);

            Auth::guard('google')->login($user);
            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            Log::error('Unexpected error occurred', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }
}
