<?php

namespace App\Livewire;

use App\Models\KodeArsipModel;
use App\Models\NomorSuratModel;
use App\Models\SuratKeluarModel;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSuratKeluar extends Component
{
    public $id;

    public $kodeArsipList = [];

    #[Validate('required', message: 'Anda Harus Masukkan Alamat!')]
    #[Validate('min:5', message: 'Alamat Minimal 5 Karakter!')]
    public $alamatSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Isi Surat!')]
    #[Validate('min:5', message: 'Isi Surat Minimal 5 Karakter!')]
    public $isiSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Nama Penyusun!')]
    #[Validate('min:4', message: 'Nama Penyusun Minimal 4 Karakter!')]
    public $namaPenyusun;

    #[Validate('required', message: 'Anda Harus Memilih Kode Surat!')]
    public $kodeSurat;

    #[Validate('required', message: 'Anda Harus Memilih Kode Arsip!')]
    public $kodeArsip;

    public function mount()
    {
        $this->kodeArsipList = KodeArsipModel::all();
    }

    #[On('edit-surat-keluar')]
    public function update($id = null)
    {
        $surat = SuratKeluarModel::where('nomor_surat_id', $id)->first();
        $this->namaPenyusun = $surat->nama_penyusun;
        $this->alamatSurat = $surat->alamat_surat;
        $this->isiSurat = $surat->isi;
        $this->id = $id;
        $this->kodeArsip = $surat->kode_arsip_id;
        $this->kodeSurat = $surat->kode_surat_id;
    }

    public function ubahSuratKeluar()
    {
        $this->validate();

        SuratKeluarModel::where('nomor_surat_id', $this->id)
            ->update([
                'alamat_surat' => $this->alamatSurat,
                'nama_penyusun' => $this->namaPenyusun,
                'isi' => $this->isiSurat,
                'kode_arsip_id' => $this->kodeArsip,
                'kode_surat_id' => $this->kodeSurat,
            ]);

        $this->resetExcept('kodeArsipList');

        $this->dispatch('refresh-table');
        $this->dispatch('ubah-surat-keluar');
    }

    public function render()
    {
        return view('livewire.edit-surat-keluar');
    }
}
