<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        // ? Handle validation fail first before continue
        if($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }

        // ? If validation Succeed
        $user = User::firstWhere('email', $request->email);

        // ? Checks if user have registered before & have default password template
        if($user && Hash::check('L7u7POZHwZu5Zumn29C3', $user->password)) {
            $user = User::where('email', $user->email)->first()->update(['password' => Hash::make($request->password)]);
        
        // ? However if user exists and not from google
        } else if ($user) {
            return redirect()->route('register')->withErrors(['email' => 'email already exists! use another']);
        }

        $user = User::firstOrCreate([
            'email' => $request->email,
        ], [
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}

/*
 * Intended Behavior
 * > if user first time register, then
 * no record in GoogleAuthAccount & Users
 * Account therefore create 1 record
 * in users
 * 
 * > if user is not first time, then 1 of
 * 2 scenario might happen:
 * 1) User registered using lavarel breeze,
 * therefore record is found in Users, but no
 * GoogleAuthAccount record. Skip automatically
 * by FirstOrCreate
 * 
 * 2) User registered using google account,
 * record is found both in GoogleAuthAccount
 * and Users. Replace or update existing
 * user record if password is default template
 */