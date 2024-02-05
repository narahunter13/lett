<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KodeArsipModel extends Model
{
    use HasFactory;

    protected $table = 'kode_arsip';

    protected $fillable = ['kode', 'nama'];

    public function suratKeluar(): HasOne
    {
        return $this->hasOne(SuratKeluarModel::class, 'kode_arsip_id');
    }
}
