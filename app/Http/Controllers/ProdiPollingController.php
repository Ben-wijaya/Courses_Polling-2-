<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class ProdiPollingController extends Controller
{
    public function index() {
        return view('dashboard.prodi_polling.index', [
            'users' => User::all(),
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
        ]); 
    }

    public function create() {
        return view('dashboard.prodi_polling.create', [
            'users' => User::all(),
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
        ]); 
    }

    public function store(Request $request) {
        // Validation rules
        $validatedData = $request->validate([
            'prodis_id' => 'required',
            'nama_polling' => 'required|unique:polling',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // Set default value for status_polling
        $validatedData['status_polling'] = 0;

        // Create the Polling record
        Polling::create($validatedData);

        // Redirect with success message
        return redirect('/dashboard/prodi_polling')->with('success', 'Polling baru berhasil ditambahkan!');
    }

    public function show($id) {
        return view('dashboard.prodi_polling.hasil', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
            'matkuls' => MataKuliah::all(),
            'pollid' => $id,
        ]); 
    }

    public function detail($pollid, $matkul) {
        return view('dashboard.prodi_polling.detail', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
            'polls' => PollingDetail::all(),
            'matkul' => $matkul,
            'matkuls' => MataKuliah::all(),
            'pollid' => $pollid,
        ]); 
    }
}
