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
                'name' => 'Jono',
                'email' => 'jono@test.com',
                'role' => 'Admin',
                'prodi_id' => 1,
                'password' => bcrypt('Adm12345')
            ],

            [
                'name' => 'Agus',
                'email' => 'agus@test.com',
                'role' => 'Program Studi',
                'prodi_id' => 72,
                'password' => bcrypt('Prd12345')
            ],

            [
                'name' => 'Asep',
                'email' => 'asep@test.com',
                'role' => 'Mahasiswa',
                'prodi_id' => 72,
                'password' => bcrypt('Mhs12345')
            ],
            [
                'name' => 'Udin',
                'email' => 'udin@test.com',
                'role' => 'Program Studi',
                'prodi_id' => 30,
                'password' => bcrypt('Prd12345')
            ],

            [
                'name' => 'Kokom',
                'email' => 'kokom@test.com',
                'role' => 'Mahasiswa',
                'prodi_id' => 30,
                'password' => bcrypt('Mhs12345')
            ],
            [
                'name' => 'Mahmud',
                'email' => 'mahmud@test.com',
                'role' => 'Program Studi',
                'prodi_id' => 73,
                'password' => bcrypt('Prd12345')
            ],

            [
                'name' => 'Budi',
                'email' => 'budi@test.com',
                'role' => 'Mahasiswa',
                'prodi_id' => 73,
                'password' => bcrypt('Mhs12345')
            ],
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
