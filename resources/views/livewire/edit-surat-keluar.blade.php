<div x-show="editModelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div wire:loading class="fixed inset-0 z-50 w-full min-h-screen">
        <div class="flex justify-center items-center space-x-1 text-sm text-white h-full w-full bg-gray-700 bg-opacity-40">

            <svg fill='none' class="w-6 h-6 animate-spin" viewBox="0 0 32 32" xmlns='http://www.w3.org/2000/svg'>
                <path clip-rule='evenodd' d='M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z' fill='currentColor' fill-rule='evenodd' />
            </svg>


            <div>Loading ...</div>
        </div>
    </div>
    <div wire:loading.remove x-on:hapus-surat-keluar-action.window="editModelOpen = false" class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-show="editModelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

        <div x-cloak x-show="editModelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Edit Surat Keluar</h1>

                <button @click="editModelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Silahkan isikan surat keluar
            </p>

            <form wire:submit="ubahSuratKeluar" class="mt-5">
                <div>
                    <label for="alamat" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Alamat Surat</label>
                    <input wire:model="alamatSurat" placeholder="Alamat" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('alamatSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="isi" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Isi Surat</label>
                    <input wire:model="isiSurat" placeholder="Isi Surat" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('isiSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="penyusun" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nama Penyusun</label>
                    <input wire:model="namaPenyusun" placeholder="Penyusun" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('namaPenyusun') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="arsip" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Kode Surat</label>
                    <select wire:model="kodeSurat" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        <option value="" selected>Pilih Kode Surat...</option>
                        <option value="1">16740</option>
                        <option value="2">16741</option>
                    </select>
                    <div class="text-sm italic">
                        @error('kodeSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="surat" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Kode Arsip</label>
                    <select wire:model="kodeArsip" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                        <option value="" selected>Pilih Kode Arsip...</option>
                        @foreach($kodeArsipList as $row)
                        <option value="{{ $row->id }}">{{ $row->kode . '-' . $row->nama }}</option>
                        @endforeach
                    </select>
                    <div class="text-sm italic">
                        @error('kodeArsip') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" @click="editModelOpen = !editModelOpen" class="px-3 py-2 text-sm tracking-wide text-white inline-flex items-center capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Ubah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('ubah-surat-keluar', () => {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Surat telah diubah',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>
@endscript