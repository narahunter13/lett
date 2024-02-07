<div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Tambah Surat Keluar</h1>

                <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Silahkan isikan surat keluar
            </p>
            
            <form wire:submit="addSuratKeluar" class="mt-5">
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

                <div class="mt-4" x-data="datepicker" x-init="[initDate(), getNoOfDays()]" x-cloak>
                    <label for="tanggal" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Tanggal Surat</label>
                    <livewire:datepicker />
                    <input x-ref="date" type="hidden" name="tanggal" wire:model="tanggalSurat" x-model="$wire.tanggalSurat = datepickerValue">
                    <div class="text-sm italic">
                        @error('tanggalSurat') <span class="text-red-500">{{ $message }}</span> @enderror
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
                    <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>