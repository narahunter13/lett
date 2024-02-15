<?php

namespace App\Livewire;

use App\Models\NomorSuratModel;
use App\Models\SuratMasukModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BuatSuratMasuk extends Component
{
    public $nomorSurat;

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

    public $tanggalSurat;

    public function addSuratMasuk()
    {
        $this->validate();
        $this->nomorSurat =  NomorSuratModel::create($this->addNomorSurat());

        SuratMasukModel::create([
            'nomor_surat_id' => $this->nomorSurat->id,
            'nomor_tanggal_surat' => $this->nomorTanggalSurat,
            'nama_pengirim' => $this->namaPengirim,
            'nama_penerima' => $this->namaPenerima,
            'isi' => $this->isiSurat,
        ]);

        $this->reset();

        $this->dispatch('refresh-table');
        $this->dispatch('tambah-surat-masuk');
    }

    private function addNomorSurat()
    {
        $nomor = '';

        $abjad = '';

        $nomorSurat = NomorSuratModel::orderBy('tanggal', 'desc')
            ->orderBy('nomor', 'desc')
            ->orderBy('abjad', 'desc')
            ->first();

        $tanggalTerakhir = $nomorSurat->tanggal;

        $this->tanggalSurat = strtotime($this->tanggalSurat);

        if ($this->tanggalSurat >= $tanggalTerakhir) {
            $nomor = str(intval($nomorSurat->nomor + 1));
        } else {
            $nomorSurat = NomorSuratModel::where('tanggal', '<=', $this->tanggalSurat)
                ->orderBy('tanggal', 'desc')
                ->orderBy('nomor', 'desc')
                ->orderBy('abjad', 'desc')
                ->first();
            $nomor = $nomorSurat->nomor;
            $abjad = $nomorSurat->abjad;

            if ($abjad == '') {
                $abjad = 'a';
            } else {
                $abjad++;
            }
        }

        return [
            'nomor' => $nomor,
            'abjad' => $abjad,
            'tanggal' => $this->tanggalSurat
        ];
    }

    public function render()
    {
        return view('livewire.buat-surat-masuk');
    }
}
