<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = $request->user() ?? $request->user('google')->user();
        if ($user->hasVerifiedEmail()) {
            // $user->verified_user()->updateOrCreate(
            //     ['user_id' => $user->id],
            //     ['verified_type' => 'Verified User']
            // );            

            return redirect()->intended(route('dashboard', absolute: false));
        }

        $user->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
