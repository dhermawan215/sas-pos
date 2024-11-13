<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    //controller for authenticated process

    public function index()
    {
        return \view('auth.login');
    }
    /**
     * process the authenticated request
     */
    public function authenticated(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) {
            $request->session()->regenerate();
            return \response()->json(['success' => true, 'url' => \route('dashboard')], 200);
        } else {
            return \response()->json(['success' => \false, 'message' => 'unauthorized!, please check your email and password'], 401);
        }
    }
    /**
     * logout from system
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return \redirect()->route('login');
    }
}
