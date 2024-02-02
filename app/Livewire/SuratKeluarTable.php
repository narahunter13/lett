<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SuratKeluarModel;

class SuratKeluarTable extends DataTableComponent
{
    protected $model = SuratKeluarModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Nomor surat", "nomor_surat_id")
                ->sortable(),
            Column::make("Alamat surat", "alamat_surat")
                ->sortable(),
            Column::make("Nama penyusun", "nama_penyusun")
                ->sortable(),
            Column::make("Isi", "isi")
                ->sortable()
                ->searchable(),
            Column::make("Kode Arsip", "kode_arsip_id")
                ->sortable(),
            Column::make("Kode Surat", "kode_surat_id")
                ->sortable(),
        ];
    }
}
