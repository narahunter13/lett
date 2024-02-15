<div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Tambah Surat Masuk</h1>

                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Silahkan isikan surat masuk
            </p>

            <form wire:submit="addSuratMasuk" class="mt-5">
                <div>
                    <label for="nomor_tanggal_surat" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nomor Tanggal Surat</label>
                    <input wire:model="nomorTanggalSurat" placeholder="Nomor Tanggal Surat" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('nomorTanggalSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4" x-data="datepicker" x-init="[initDate(), getNoOfDays()]" x-cloak>
                    <label for="tanggal" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tanggal Surat</label>
                    <livewire:datepicker />
                    <input x-ref="date" type="hidden" name="tanggal" wire:model="tanggalSurat" x-model="$wire.tanggalSurat = datepickerValue">
                    <div class="text-sm italic">
                        @error('tanggalSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="pengirim" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nama Pengirim</label>
                    <input wire:model="namaPengirim" placeholder="Nama Pengirim" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('namaPengirim') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="penerima" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Nama Penerima</label>
                    <input wire:model="namaPenerima" placeholder="Nama Penerima" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('namaPenerima') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label for="isi" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Isi Surat</label>
                    <input wire:model="isiSurat" placeholder="Isi Surat" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    <div class="text-sm italic">
                        @error('isiSurat') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" wire:loading.attr="disabled" class="px-3 py-2 text-sm tracking-wide text-white inline-flex items-center capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        <svg wire:loading aria-hidden="true" role="status" class="mr-2 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                        </svg>
                        <span wire:loading>Loading...</span>
                        <span wire:loading.remove>Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('tambah-surat-masuk', () => {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Surat telah ditambahkan',
            icon: 'success',
            confirmButtonText: 'OK'
        })
    })
</script>
@endscript