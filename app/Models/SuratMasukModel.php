<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratMasukModel extends Model
{
    use HasFactory;
    
    protected $table = 'surat_masuk';

    protected $fillable = ['nomor_surat_id', 'nomor_tanggal_surat', 'nama_pengirim', 'isi', 'nama_penerima'];
    
    public function nomorSurat(): BelongsTo
    {
        return $this->belongsTo(NomorSuratModel::class);
    }
}
