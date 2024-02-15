<x-layouts.app>
    <x-slot:title>
        Surat Masuk
    </x-slot:title>
    @vite('resources/js/datepicker.js')
    <div class="grid gap-6 mb-8 grid-cols-1" x-data="{ modelOpen: false, editModelOpen: false, id: 0 }">
        <livewire:surat-masuk-table theme="tailwind" />
        <livewire:buat-surat-masuk />
        <livewire:edit-surat-masuk />
    </div>
</x-layouts.app>