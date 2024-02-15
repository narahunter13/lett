<?php

namespace App\Livewire;

use App\Models\SuratMasukModel;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditSuratMasuk extends Component
{
    public $id;

    #[Validate('required', message: 'Anda Harus Masukkan Nomor Tanggal Surat!')]
    #[Validate('min:5', message: 'Nomor Tanggal Surat Minimal 5 Karakter!')]
    public $nomorTanggalSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Nama Pengirim!')]
    #[Validate('min:4', message: 'Nama Pengirim Minimal 4 Karakter!')]
    public $namaPengirim;

    #[Validate('required', message: 'Anda Harus Masukkan Nama Penerima!')]
    #[Validate('min:4', message: 'Nama Penerima Minimal 4 Karakter!')]
    public $namaPenerima;

    #[Validate('required', message: 'Anda Harus Masukkan Isi Surat!')]
    #[Validate('min:5', message: 'Isi Surat Minimal 5 Karakter!')]
    public $isiSurat;

    #[On('edit-surat-masuk')]
    public function update($id = null)
    {
        $surat = SuratMasukModel::where('nomor_surat_id', $id)->first();
        $this->id = $id;
        $this->nomorTanggalSurat = $surat->nomor_tanggal_surat;
        $this->namaPengirim = $surat->nama_pengirim;
        $this->namaPenerima = $surat->nama_penerima;
        $this->isiSurat = $surat->isi;
    }

    public function ubahSuratMasuk()
    {
        $this->validate();

        SuratMasukModel::where('nomor_surat_id', $this->id)
            ->update([
                'nomor_tanggal_surat' => $this->nomorTanggalSurat,
                'nama_pengirim' => $this->namaPengirim,
                'nama_penerima' => $this->namaPenerima,
                'isi' => $this->isiSurat,
            ]);

        $this->reset();

        $this->dispatch('refresh-table');
        $this->dispatch('ubah-surat-masuk');
    }

    public function render()
    {
        return view('livewire.edit-surat-masuk');
    }
}
