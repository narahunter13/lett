<?php

namespace Database\Seeders;

use App\Models\KodeArsipModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KodeArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = fopen(base_path('database/data/kode_arsip.csv'), 'r');

        $transRow = true;
        while (($data = fgetcsv($csv, 555, ';')) !== false) {
            if (!$transRow) {
                DB::table('kode_arsip')->insert([
                    'kode' => $data[0],
                    'nama' => $data[1]
                ]);
            }
            $transRow = false;
        }
        fclose($csv);
    }
}
