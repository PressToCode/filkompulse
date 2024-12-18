<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user() ?? $request->user('google')->user();
        if ($user->hasVerifiedEmail()) {
            $user->verified_user()->updateOrCreate(
                ['user_id' => $user->id],
                ['verified_type' => 'Verified User']
            );

            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($user->markEmailAsVerified()) {
            $user->verified_user()->updateOrCreate(
                ['user_id' => $user->id],
                ['verified_type' => 'Verified User']
            );
            
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
