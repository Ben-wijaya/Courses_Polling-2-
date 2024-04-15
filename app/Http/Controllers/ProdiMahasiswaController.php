<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class ProdiMahasiswaController extends Controller
{
    public function index() {
        return view('dashboard.prodi_mahasiswa.index', [
            'users' => User::all(),
            'prodis' => Prodis::all()
        ]); 
    }
}
