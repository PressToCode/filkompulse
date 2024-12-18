<?php

namespace App\Http\Controllers;

use App\Models\Verified_user;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        // Only send verified_user records that is not administrator
        $verifiedUsers = Verified_user::whereIn('verified_type', ['Verified User', 'pending'])->get();

        // Send all Events
        $events = Event::all();
        return view('admin.dashboard', compact('verifiedUsers', 'events'));
    }

    public function getVerified() {
        return view('verify.index');
    }

    public function sendVerifyRequest(Request $request) {
        $user = $request->user();

        if($user instanceof \App\Models\GoogleAccountAuth) {
            $user = $user->user;
        }

        $verifiedUser = $user->verified_user;
        $verifiedType = $verifiedUser ? $verifiedUser->verified_type : null;

        if ($verifiedType != 'Verified User' && $verifiedType != 'administrator' && $verifiedType != 'pending') {
            Verified_user::firstOrCreate([
                'user_id' => $user->id,
                'verified_type' => 'pending',
            ]);
            return back()->with('success', 'Verification request sent successfully.');
        } 

        return back()->with('error', 'You are already verified or your request is pending.');
    }

    public function verifyuser(Request $request, $id) {
        $verifiedUser = Verified_user::findOrFail($id);
        
        // Update the user's verification status to 'Verified User'
        $verifiedUser->update([
            'verified_type' => 'Verified User'
        ]);
    
        return redirect()->back()->with('success', 'User has been successfully verified.');
    }

    public function unverifyuser(Request $request, $id) {
        $verifiedUser = Verified_user::findOrFail($id);

        $verifiedUser->delete();
        return redirect()->back()->with('success', 'User has been successfully unverified.');
    }

    public function deleteEvent(Request $request, $event) {
        $event = Event::findOrFail($event);
        $event->delete();
        return redirect()->back()->with('success', 'Event has been successfully deleted.');
    }
}
