<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.fakultas.index', [
            'fakultas' => Fakultas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'name' => 'required'
        ]);

        Prodis::create($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Program Studi baru berhasil ditambahkan!');
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
    public function edit(Prodis $prodi)
    {
        return view('dashboard.prodi.edit', [
            'prodi' => $prodi,
            'fakultas' => Fakultas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodis $prodi)
    {
        $rules = [
            'fakultas_id'=> 'required',
            'kode' => 'required',
            'name' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        Prodis::where('id', $prodi->id)->update($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Fakultas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodis $prodi)
    {
        Prodis::destroy($prodi->id);
        return redirect('/dashboard/prodi')->with('success', 'Fakultas berhasil dihapus!');
    }
}
