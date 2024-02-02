<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NomorSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/nomor_surat.csv'), 'r');

        $transRow = true;
        while (($data = fgetcsv($csv, 555, ';')) !== false) {
            if (!$transRow) {
                DB::table('nomor_surat')->insert([
                    'nomor' => $data[0],
                    'abjad' => $data[1] ?? NULL,
                    'tanggal' => $data[2],
                ]);
            }
            $transRow = false;
        }
        fclose($csv);
    }
}
