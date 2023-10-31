<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    
    public function index(){
        return view('login');
    }

    //login
    public function authenticate(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin-dashboard'); 
            } elseif ($user->role === 'dosen') {
                return redirect()->intended('/lecture-dashboard'); 
            } else {
                return redirect()->intended('/student-dashboard');
            }
        } return back();
    }

    //logout
    public function logout(Request $request){

    Auth::logout(); // Logout pengguna
    $request->session()->invalidate(); // Membatalkan sesi pengguna
    $request->session()->regenerateToken(); // Regenerasi token sesi

    return redirect('/'); // Arahkan pengguna ke halaman beranda atau lokasi yang sesuai
}
}
