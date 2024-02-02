<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KodeSuratModel extends Model
{
    use HasFactory;
    
    protected $table = 'kode_surat';

    protected $fillable = ['kode', 'tanda_tangan'];

    public function suratKeluar(): HasOne
    {
        return $this->hasOne(SuratKeluarModel::class, 'nomor_surat_id');
    }
}
