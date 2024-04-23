<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
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
        return view('dashboard.fakultas.create', [
            'fakultas' => Fakultas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        Fakultas::create($validatedData);

        return redirect('/dashboard/fakultas')->with('success', 'Fakultas baru berhasil ditambahkan!');
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
    public function edit(Fakultas $fakultas)
    {
        return view('dashboard.fakultas.edit', [
            'fakultas' => $fakultas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        $rules = [
            'kode' => 'required',
            'nama' => 'required'
        ];
        
        $validatedData = $request->validate($rules);

        Fakultas::where('id', $fakultas->id)->update($validatedData);

        return redirect('/dashboard/fakultas')->with('success', 'Fakultas berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        dd($fakultas->id);
        Fakultas::destroy($fakultas->id);
        return redirect('/dashboard/fakultas')->with('success', 'Fakultas berhasil dihapus!');
    }
}
