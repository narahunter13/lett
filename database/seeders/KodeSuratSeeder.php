<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KodeSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kode_surat')->insert(
            [
                'kode' => '16740',
                'tanda_tangan' => 'Kepala BPS Kota Lubuk Linggau',
            ],
            [
                'kode' => '16741',
                'tanda_tangan' => 'Kepala Sub Bagian Umum',
            ],
        );
    }
}
