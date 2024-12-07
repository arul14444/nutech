<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        $user = new User();
        $user->id = random_int(0, PHP_INT_MAX);
        $user->nama = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->uuid =  Str::uuid()->toString();
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/daftar-produk');
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
