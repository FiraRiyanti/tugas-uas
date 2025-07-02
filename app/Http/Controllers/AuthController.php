<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if ($user) {
            Session::put('login', true);
            Session::put('user', $user->username);
            Session::put('nama', $user->nama);
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Login gagal!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}