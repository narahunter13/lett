<?php

namespace App\Livewire;

use App\Models\KodeArsipModel;
use App\Models\NomorSuratModel;
use App\Models\SuratKeluarModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class BuatSuratKeluar extends Component
{
    public $kodeArsipList = [];
    public $nomorSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Alamat!')]
    #[Validate('min:5', message: 'Alamat Minimal 5 Karakter!')]
    public $alamatSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Isi Surat!')]
    #[Validate('min:5', message: 'Isi Surat Minimal 5 Karakter!')]
    public $isiSurat;

    public $tanggalSurat;

    #[Validate('required', message: 'Anda Harus Masukkan Nama Penyusun!')]
    #[Validate('min:5', message: 'Nama Penyusun Minimal 5 Karakter!')]
    public $namaPenyusun;

    #[Validate('required', message: 'Anda Harus Memilih Kode Surat!')]
    public $kodeSurat;

    #[Validate('required', message: 'Anda Harus Memilih Kode Arsip!')]
    public $kodeArsip;
    public $test;

    public function mount()
    {
        $this->kodeArsipList = KodeArsipModel::all();
    }

    public function addSuratKeluar()
    {
        $this->validate();
        $this->nomorSurat =  NomorSuratModel::create($this->addNomorSurat());
        
        SuratKeluarModel::create([
            'nomor_surat_id' => $this->nomorSurat->id,
            'alamat_surat' => $this->alamatSurat,
            'nama_penyusun' => $this->namaPenyusun,
            'isi' => $this->isiSurat,
            'kode_arsip_id' => $this->kodeArsip,
            'kode_surat_id' => $this->kodeSurat,
        ]);

        return $this->redirect('/surat-keluar');
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

        if ($this->tanggalSurat > $tanggalTerakhir) {
            $nomor = str(intval($nomorSurat->nomor + 1));
        } else if ($this->tanggalSurat == $tanggalTerakhir) {
            $nomor = $nomorSurat->nomor;
            $abjad = $nomorSurat->abjad;
            if ($abjad == '') {
                $abjad = 'a';
            } else {
                $abjad++;
            }
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
        return view('livewire.buat-surat-keluar');
    }
}
