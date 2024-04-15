<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'nrp' => 0000001,
                'name' => 'Jono',
                'email' => 'jono@test.com',
                'role' => 'Admin',
                'fakultas_id' => 1,
                'prodi_id' => 1,
                'password' => bcrypt('Adm12345')
            ],
            [
                'nrp' => 720001,
                'name' => 'Agus',
                'email' => 'agus@test.com',
                'role' => 'Program Studi',
                'fakultas_id' => 3,
                'prodi_id' => 3,
                'password' => bcrypt('Prd12345')
            ],
            [
                'nrp' => 2272037,
                'name' => 'Asep',
                'email' => 'asep@test.com',
                'role' => 'Mahasiswa',
                'fakultas_id' => 3,
                'prodi_id' => 3,
                'password' => bcrypt('Mhs12345')
            ],
            [
                'nrp' => 300001,
                'name' => 'Udin',
                'email' => 'udin@test.com',
                'role' => 'Program Studi',
                'fakultas_id' => 2,
                'prodi_id' => 2,
                'password' => bcrypt('Prd12345')
            ],
            [
                'nrp' => 2230001,
                'name' => 'Kokom',
                'email' => 'kokom@test.com',
                'role' => 'Mahasiswa',
                'fakultas_id' => 2,
                'prodi_id' => 2,
                'password' => bcrypt('Mhs12345')
            ],
            [
                'nrp' => 730001,
                'name' => 'Mahmud',
                'email' => 'mahmud@test.com',
                'role' => 'Program Studi',
                'fakultas_id' => 3,
                'prodi_id' => 4,
                'password' => bcrypt('Prd12345')
            ],
            [
                'nrp' => 2273001,
                'name' => 'Budi',
                'email' => 'budi@test.com',
                'role' => 'Mahasiswa',
                'fakultas_id' => 3,
                'prodi_id' => 4,
                'password' => bcrypt('Mhs12345')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
