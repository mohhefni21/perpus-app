<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function autentikasi(Request $request)
    {
        $kridensial = $request->validate(
            [
                'email' => ['required'],
                'password' => ['required', 'min:5', 'max:255'],
            ],
            [
                'email.required' => 'The :attribute field must filled.',
                'password.min' => 'Password minimum 5'
            ]
        );

        if (Auth::attempt($kridensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login Berhasil');
        }
        return back()->with('loginError', 'Login gagal silahkan periksa kembali email atau password anda !')->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout Berhasil');
    }
}
