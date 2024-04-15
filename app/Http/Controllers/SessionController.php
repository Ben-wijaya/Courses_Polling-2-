<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('auth.login');
    }

    function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Tolong isi email Anda!',
            'password.required' => 'Tolong isi password Anda!',
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infoLogin)){
            if(Auth::user()->role == 'Admin'){
                return redirect('dashboard/admin');
            } elseif (Auth::user()->role == 'Program Studi'){
                return redirect('dashboard/program_studi');
            } elseif (Auth::user()->role == 'Mahasiswa'){
                return redirect('dashboard/mahasiswa');
            }
        }else{
            return redirect('')->withErrors('Username dan Password tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
