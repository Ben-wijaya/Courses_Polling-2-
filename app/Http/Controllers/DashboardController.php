<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(){
        return view('dashboard.index');
    }
    function admin(){
        return view('dashboard.index');
    }
    function program_studi(){
        return view('dashboard.index');
    }
    function mahasiswa(){
        return view('dashboard.index');
    }
}
