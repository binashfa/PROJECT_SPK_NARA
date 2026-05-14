<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ================= LOGIN =================

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role == 'superadmin') {

                return redirect('/dashboard');

            } elseif ($role == 'guru') {

                return redirect('/guru-dashboard');

            } else {

                return redirect('/siswa-dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    // ================= LOGOUT =================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // ================= REGISTER =================

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        // VALIDASI
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // SIMPAN USER
        User::create([
            'name' => $request->name,
            'email' => $request->email,

            // password diencrypt
            'password' => Hash::make($request->password),

            // default role
            'role' => 'siswa'
        ]);

        // REDIRECT
        return redirect('/login')
            ->with('success', 'Register berhasil!');
    }
}