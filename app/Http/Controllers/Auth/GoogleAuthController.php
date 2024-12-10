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
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $Googleuser = Socialite::driver('google')->user();         
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
