<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class Account extends Controller
{
    public function Login(Request $request){
        // Checks that email and password are present (required) and that emila is in an email format
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerate session for security
            $request->session()->regenerate();

            $user = User::where('email', '=', $credentials['email'])->select(['access_level', 'id'])->get()[0]; //db returns array with one element
            session(['access_level' => $user->access_level]); // set user id to allow user to access account features
            session(['user_id' => $user->id]); // set user id to allow user to access account features


            // Redirect to intended page or home with message
            return redirect()->intended('/account')->with('success', '1');
        }

        // If login fails, redirect back with error
        return back()
            ->withErrors(['error' => 'The provided credentials do not match our records.'])
            ->onlyInput('email'); //reinput emails
    }

    public function Logout(Request $request){
        Auth::logout();

        session(['user_id' => '-1']); // log user out


        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', '1');
    }

    public function Register(Request $request){
        // Validate the input cuasing errors for some reason
        // $validated = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'surname' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'town' => 'required|string|max:255',
        //     'postcode' => 'required|string|max:8',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8',
        // ]);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'postcode' => 'required|string|max:8',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create the user
        $user = User::create([
            'access_level' => "1",
            'first_name' => $validated['first_name'],
            'surname' => $validated['surname'],
            'address' => $validated['address'],
            'town' => $validated['town'],
            'postcode' => $validated['postcode'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'notification_preferences' => 0,
        ]);


        // Auto login some how
        Auth::login($user);
        session(['access_level' => $user->access_level]); // set user id to allow user to access account features
        session(['user_id' => $user->id]); // set user id to allow user to access account features

        // Redirect to home
        return redirect('/account')->with('success', '1');
    }

    public function UpdateNotificationPreferences(Request $request){
        $validated = $request->validate([
            'emailPref' => '',
            'phonePref' => '',
        ]);

        if(isset($validated['emailPref']) && isset($validated['phonePref']))
            $notifSetting = 0;
        else if(isset($validated['emailPref']) && !isset($validated['phonePref']))
            $notifSetting = 1;
        else if(!isset($validated['emailPref']) && isset($validated['phonePref']))
            $notifSetting = 2;

        $user = User::find(session('user_id'));
        $user->notification_preference = $notifSetting;
        $user->save();

        return redirect('/account');
    }
}
