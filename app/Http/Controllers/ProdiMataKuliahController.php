<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class ProdiMataKuliahController extends Controller
{
    public function index()
    {   
        return view('dashboard.matkul.index', [
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all()
        ]); 
    }

    public function create()
    {
        return view('dashboard.matkul.create', [
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required|max:255',
            'sks' => 'required',
            'prodis_id' => 'required'
        ]);

        MataKuliah::create($validatedData);

        return redirect('/dashboard/matkul')->with('success', 'Mata Kuliah baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $matkul)
    {
        return view('dashboard.matkul.edit', [
            'matkul' => $matkul
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataKuliah $matkul)
    {
        $rules = [
            'kode' => 'required',
            'nama' => 'required|max:255',
            'sks' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        MataKuliah::where('id', $matkul->id)->update($validatedData);

        return redirect('/dashboard/matkul')->with('success', 'Mata Kuliah berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $matkul)
    {
        MataKuliah::destroy($matkul->id);
        return redirect('/dashboard/matkul')->with('success', 'Mata Kuliah berhasil dihapus!');
    }
}
