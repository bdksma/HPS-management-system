<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered; // Tambahkan ini di atas namespace

class RegisterController extends Controller
{
    public function register()
    {
        return view('reg');
    }
    
    public function actionregister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string'
        ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'active' => 0 // Set status pengguna menjadi tidak aktif
        ]);

        // Kirim email verifikasi
        event(new Registered($user));
        
        Auth::login($user);

        Session::flash('message', 'Registrasi berhasil. Silahkan cek email Anda untuk verifikasi.');
        return redirect()->route('login');
    }
}
