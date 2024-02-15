<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\SuratMasukModel;
use Illuminate\Database\Eloquent\Builder;

class SuratMasukTable extends DataTableComponent
{
    protected $model = SuratMasukModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([
            'toolbar-left-start' => './components/table-toolbar/buat-surat-masuk-button',
        ]);
        $this->setTableAttributes([
            'default' => true,
            'x-on:refresh-table.window' => '$wire.$refresh()'
        ]);
    }

    public function columns(): array
    {
        return [
            Column::make("Nomor Surat", "nomor_surat_id")
                ->sortable()
                ->format(
                    fn ($value, $row, Column $column) => '<div class="text-center">' . $row->nomor . $row->abjad . '</div>'
                )
                ->html(),
            Column::make("Nomor Tanggal Surat", "nomor_tanggal_surat")
                ->sortable(),
            Column::make("Tanggal", "nomorSurat.tanggal")
                ->format(
                    fn ($value, $row, Column $column) => date('d-m-Y', $value)
                )
                ->sortable(),
            Column::make("Nama Pengirim", "nama_pengirim")
                ->sortable(),
            Column::make("Nama Penerima", "nama_penerima")
                ->sortable(),
            Column::make("Isi", "isi")
                ->sortable()
                ->searchable(),
            Column::make("Aksi", "id")
                ->label(function ($row, Column $column) {
                    return view('tables.edit-surat-masuk-button', ['id' => $row->id]);
                }),
        ];
    }

    public function builder(): Builder
    {
        return SuratMasukModel::query()
            ->join('nomor_surat', 'nomor_surat_id', 'nomor_surat.id')
            ->select('nomor_surat.id as id', 'nomor_surat.nomor as nomor', 'nomor_surat.abjad as abjad', 'nomor_surat.tanggal as tanggal');
    }
}
