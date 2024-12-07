<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        $user = new User();
        $user->id = random_int(0 , PHP_INT_MAX);
        $user->nama = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->uuid =  Str::uuid()->toString();
    

        
        return redirect('/');
    }
}
