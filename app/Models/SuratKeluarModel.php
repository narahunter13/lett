<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuratKeluarModel extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';

    protected $fillable = ['nomor_surat_id', 'alamat_surat', 'nama_penyusun', 'isi', 'kode_arsip_id', 'kode_surat_id'];
    
    public function nomorSurat(): BelongsTo
    {
        return $this->belongsTo(NomorSuratModel::class);
    }
    
    public function kodeSurat(): BelongsTo
    {
        return $this->belongsTo(KodeSuratModel::class);
    }
    
    public function kodeArsip(): BelongsTo
    {
        return $this->belongsTo(KodeArsipModel::class);
    }
}
