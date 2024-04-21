<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class ProdiMahasiswaController extends Controller
{
    public function index() {
        return view('dashboard.prodi_mahasiswa.index', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.prodi_mahasiswa.edit', [
            'user' => $user,
            'prodis' => Prodis::all(),
            'fakultas' => Fakultas::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'nrp' => 'required|max:9',
            'name' => 'required|max:255',
            'role' => 'required',
            'fakultas_id' => 'required',
            'prodi_id' => 'required'
        ];

        if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users';
        }
        
        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/prodi_mahasiswa')->with('success', 'User berhasil diupdate!');
    }
}
