<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
            $user = User::where('google_id', $Googleuser->id)->first();

            if ($user === null) {
                $user = User::create([
                    'name' => $Googleuser->name,
                    'email' => $Googleuser->email,
                    'password' => encrypt('admin_123'),
                    'google_id'=> $Googleuser->id,
                ]);
            }

            Auth::login($user);
            return redirect()->intended('dashboard');
        } catch (\Exception $e) {
            dd($e->getMessage());
            \Log::error('Unexpected error occurred', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }
}
