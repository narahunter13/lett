<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/surat_masuk.csv'), 'r');

        $transRow = true;
        while (($data = fgetcsv($csv, 555, ';')) !== false) {
            if (!$transRow) {
                DB::table('surat_masuk')->insert([
                    'nomor_surat_id' => $data[0],
                    'nomor_tanggal_surat' => $data[1],
                    'nama_penerima' => $data[2],
                    'nama_pengirim' => $data[3],
                    'isi' => $data[4],
                ]);
            }
            $transRow = false;
        }
        fclose($csv);
    }
}
