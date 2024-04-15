<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodis;
use App\Models\User;
use App\Models\Fakultas;
use App\Models\Polling;
use Illuminate\Http\Request;

class ProdiHasilController extends Controller
{
    public function index() {
        return view('dashboard.prodi_hasil.index', [
            'users' => User::all(),
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
        ]); 
    }

    public function edit($matkul) {
        return view('dashboard.prodi_hasil.detail', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
            'matkul' => $matkul,
            'matkuls' => MataKuliah::all(),
        ]); 
    }
}
