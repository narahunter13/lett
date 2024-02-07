<x-layouts.app>
    <x-slot:title>
        Surat Keluar
    </x-slot:title>
    @vite('resources/js/datepicker.js')
    <div class="grid gap-6 mb-8 grid-cols-1" x-data="{ modelOpen: false }">
        <livewire:surat-keluar-table theme="tailwind" />
        <livewire:buat-surat-keluar/>
    </div>
</x-layouts.app>