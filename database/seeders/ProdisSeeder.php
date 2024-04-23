<?php

namespace Database\Seeders;

use App\Models\Prodis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiData =[
            ['fakultas_id' => 1, 'kode' => 1, 'name' => 'Admin'],
            ['fakultas_id' => 2, 'kode' => 30, 'name' => 'Psikologi'],
            ['fakultas_id' => 3, 'kode' => 72, 'name' => 'Teknik Informatika'],
            ['fakultas_id' => 3, 'kode' => 73, 'name' => 'Sistem Informasi'],
        ];

        foreach($prodiData as $key => $val) {
            Prodis::create($val);
        }
    }
}
