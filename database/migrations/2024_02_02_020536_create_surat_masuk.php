<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nomor_surat_id');
            $table->string('nomor_tanggal_surat');
            $table->string('nama_penerima');
            $table->string('nama_pengirim');
            $table->string('isi');
            $table->timestamps();

            $table->foreign('nomor_surat_id')->references('id')->on('nomor_surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
