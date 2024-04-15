<?php

namespace App\Http\Controllers;

use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('dashboard.users.index', [
            'users' => User::all(),
            'prodis' => Prodis::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'prodis' => Prodis::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'prodi_id' => 'nullable|exists:prodis,id'
        ]);

        $role = $validatedData['role'];
        $password = $this->generateDefaultPassword($role);
        $validatedData['password'] = $password;

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user,
            'prodis' => Prodis::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'role' => 'required',
            'prodi_id' => 'nullable|exists:prodis,id'
        ];

        if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users';
        }
        
        $validatedData = $request->validate($rules);
        
        if($request->role != $user->role){
            $role = $request->role;
            $password = $this->generateDefaultPassword($role);
            $validatedData['password'] = $password;
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus!');
    }

    private function generateDefaultPassword($role)
    {
        if ($role === 'Mahasiswa') {
            return bcrypt('Mhs12345');
        } elseif ($role === 'Program Studi') {
            return bcrypt('Prd12345');
        } elseif ($role === 'Admin') {
            return bcrypt('Adm12345');
        }

        return null;
    }
}
