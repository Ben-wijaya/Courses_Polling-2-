<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakultasData = [
            ['kode' => '1', 'nama' => 'Admin'],
            ['kode' => '30', 'nama' => 'Psikologi'],
            ['kode' => '70', 'nama' => 'Teknologi Informasi'],
        ];

        foreach($fakultasData as $key => $val) {
            Fakultas::create($val);
        }
    }
}
