<?php

namespace App\Http\Controllers;

use App\Mail\ReminderMail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class ReminderController extends Controller
{
    /**
     * Send a reminder email at a specified time
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendReminder(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'recipient_email' => 'required|email',
        //     'recipient_name' => 'required|string',
        //     'message' => 'required|string',
        //     'reminder_time' => 'required|date|after:now', // Make sure reminder time is in the future
        // ]);

        // $recipientEmail = $validated['recipient_email'];
        // $recipientName = $validated['recipient_name'];
        // $message = $validated['message'];
        // $reminderTime = Carbon::parse($validated['reminder_time']);
        $user = $request->user() ?? $request->user('google');
        if($user instanceof \App\Models\GoogleAccountAuth) {
            $user = $user->user;
        }

        $recipientEmail = $user->email;
        $recipientName = $user->name;
        $message = "This is a reminder for your events. Don't forget to go to ". 
                    Event::findOrFail($id)->title . " in filkompulse.dev/event/". Event::findOrFail($id)->eventsID;
        $reminderTime = Carbon::now('Asia/Jakarta')->addSeconds(10); // Send 100 seconds after

        try {
            // Mail::to($recipientEmail)->send(new ReminderMail($recipientName, $message, $reminderTime->toDateTimeString()));
            Mail::to($recipientEmail)->later($reminderTime, new ReminderMail($recipientName, $message, $reminderTime->toDateTimeString()));

            return redirect()->back()->with('success', 'Reminder has been scheduled successfully!')->with('chosenEvent', $id);
        } catch (\Exception $e) {
            Log::error('Error sending reminder: '.$e->getMessage());
            return redirect()->back()->with('failure', 'Reminder Failed to Schedule')->with('chosenEvent', $id);
        }
    }
}
