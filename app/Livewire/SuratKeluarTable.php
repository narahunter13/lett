<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SuratKeluarModel;
use Illuminate\Database\Eloquent\Builder;

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
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => '<div class="text-center">' . $row->nomor . $row->abjad . '</div>'
                )
                ->html(),
            Column::make("Alamat surat", "alamat_surat")
                ->sortable(),
            Column::make("Nama penyusun", "nama_penyusun")
                ->sortable(),
            Column::make("Isi", "isi")
                ->sortable()
                ->searchable(),
            Column::make("Kode Arsip", "kodeArsip.kode")
                ->sortable(),
            Column::make("Kode Surat", "kodeSurat.kode")
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return SuratKeluarModel::query()
            ->join('nomor_surat', 'nomor_surat_id', 'nomor_surat.id')
            ->select('nomor_surat.nomor as nomor', 'nomor_surat.abjad as abjad');
    }
}
