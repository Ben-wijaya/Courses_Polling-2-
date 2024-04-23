<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matkulData = [
            ['id' => 1, 'kode' => 'IN210', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'prodis_id' => 3],
            ['id' => 2, 'kode' => 'IN212', 'nama' => 'Web Dasar', 'sks' => 3, 'prodis_id' => 3],
            ['id' => 3, 'kode' => 'IN241', 'nama' => 'Statistika', 'sks' => 3, 'prodis_id' => 3],
            ['id' => 4, 'kode' => 'IN242', 'nama' => 'Pemrograman Web Lanjut', 'sks' => 4, 'prodis_id' => 3],
            ['id' => 5, 'kode' => 'BI012', 'nama' => 'Sistem Informasi', 'sks' => 3, 'prodis_id' => 4],
            ['id' => 6, 'kode' => 'PM022', 'nama' => 'Penilaian Kualitatif', 'sks' => 2, 'prodis_id' => 2],
        ];

        foreach($matkulData as $key => $val) {
            MataKuliah::create($val);
        }
    }
}
