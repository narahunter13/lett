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
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('nomor_surat_id');
            $table->string('alamat_surat');
            $table->string('nama_penyusun');
            $table->string('isi');
            $table->unsignedBigInteger('kode_arsip_id');
            $table->unsignedBigInteger('kode_surat_id');
            $table->timestamps();

            // $table->foreign('nomor_surat_id')->references('id')->on('nomor_surat');
            $table->foreign('kode_surat_id')->references('id')->on('kode_surat');
            $table->foreign('kode_arsip_id')->references('id')->on('kode_arsip');

            $table->foreignId('nomor_surat_id')
                ->constrained(table: 'nomor_surat', indexName: 'nomor_keluar_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluar');
    }
};
