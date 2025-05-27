<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    public function run()
    {
        $surats = [
            'Al-Fatihah',
            'Al-Baqarah',
            'Ali Imran',
            'An-Nisa',
            'Al-Ma’idah',
            // Tambah nama surat lain sesuai kebutuhan
        ];

        foreach ($surats as $nama) {
            Surat::create(['nama_surat' => $nama]);
        }
    }
}
