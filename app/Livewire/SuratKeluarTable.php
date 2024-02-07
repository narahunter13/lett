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
        $this->setConfigurableAreas([
            'toolbar-left-start' => './components/buat-surat-keluar-button',
          ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nomor Surat", "nomor_surat_id")
                ->sortable()
                ->format(
                    fn($value, $row, Column $column) => '<div class="text-center">' . $row->nomor . $row->abjad . '</div>'
                )
                ->html(),
            Column::make("Alamat Surat", "alamat_surat")
                ->sortable(),
            Column::make("Tanggal", "nomorSurat.tanggal")
                ->format(
                    fn($value, $row, Column $column) => date('d-m-Y',$value)
                )
                ->sortable(),
            Column::make("Nama Penyusun", "nama_penyusun")
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
            ->select('nomor_surat.nomor as nomor', 'nomor_surat.abjad as abjad', 'nomor_surat.tanggal as tanggal');
    }
}
