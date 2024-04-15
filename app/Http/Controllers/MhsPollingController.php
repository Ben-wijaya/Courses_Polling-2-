<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class MhsPollingController extends Controller
{
    public function index() {
        return view('dashboard.mhs_polling.index', [
            'users' => User::all(),
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all(),
            'polls' => Polling::all(),
        ]); 
    }

    public function create()
    {
        return view('dashboard.mhs_polling.polling', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
            'matkuls' => MataKuliah::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            //
        ]);

        // Loop melalui data mata kuliah yang dipilih dari formulir
        foreach ($request->mata_kuliah as $mk) {
            // Simpan data ke dalam database menggunakan model
            Polling::create([
                'users_id' => auth()->user()->id,
                'mata_kuliah_id' => $mk // Sesuaikan dengan nama kolom di tabel Anda
                // Tambahkan kolom lain jika diperlukan
            ]);
        }

        $validatedData['polling_status'] = 1;

        User::where('id', auth()->user()->id)->update($validatedData);

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect('/dashboard/mhs_polling')->with('success', 'Polling berhasil ditambahkan!');
    }
}
