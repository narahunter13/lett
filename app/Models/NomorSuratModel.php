<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NomorSuratModel extends Model
{
    use HasFactory;

    protected $table = 'nomor_surat';

    protected $fillable = ['nomor', 'abjad', 'tanggal'];

    public function suratKeluar(): HasOne
    {
        return $this->hasOne(SuratKeluarModel::class, 'nomor_surat_id');
    }

    public function suratmasuk(): HasOne
    {
        return $this->hasOne(SuratMasukModel::class, 'nomor_surat_id');
    }
}
