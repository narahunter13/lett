<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/surat_keluar.csv'), 'r');

        $transRow = true;
        while (($data = fgetcsv($csv, 555, ';')) !== false) {
            if (!$transRow) {
                DB::table('surat_keluar')->insert([
                    'nomor_surat_id' => $data[0],
                    'alamat_surat' => $data[1],
                    'nama_penyusun' => $data[2],
                    'isi' => $data[3],
                    'kode_arsip_id' => $data[4],
                    'kode_surat_id' => $data[5],
                ]);
            }
            $transRow = false;
        }
        fclose($csv);
    }
}
