<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Bencana') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Create Bencana Page') }}
                    </div>
                    <form method="post" action="{{ route('bencana.store') }}" class="">
                        @csrf
                        @method('POST')
                        <div class="mb-6">
                            <x-input-label for="nama_bencana" value="Nama Bencana" />
                            <x-text-input id="nama_bencana" name="nama_bencana" type="text" class="block w-full mt-1" required autofocus autocomplete="nama_bencana"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="tanggal_kejadian" value="Tanggal Kejadian" />
                            <x-text-input id="tanggal_kejadian" name="tanggal_kejadian" type="date" class="block w-full mt-1" required autocomplete="tanggal_kejadian"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="waktu_kejadian" value="Waktu Kejadian" />
                            <x-text-input id="waktu_kejadian" name="waktu_kejadian" type="time" class="block w-full mt-1" required autocomplete="waktu_kejadian"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="lokasi_kejadian" value="Lokasi Kejadian" />
                            <x-text-input id="lokasi_kejadian" name="lokasi_kejadian" type="text" class="block w-full mt-1" required autocomplete="lokasi_kejadian"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="tingkat_keparahan_bencana" value="Tingkat Keparahan Bencana" />
                            <x-select-input id="tingkat_keparahan_bencana" name="tingkat_keparahan_bencana">
                                <option value="Ringan">Ringan</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Berat">Berat</option>
                            </x-select-input>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jumlah_korban" value="Jumlah Korban" />
                            <x-text-input id="jumlah_korban" name="jumlah_korban" type="number" class="block w-full mt-1" required autocomplete="jumlah_korban"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jumlah_pengungsi" value="Jumlah Pengungsi" />
                            <x-text-input id="jumlah_pengungsi" name="jumlah_pengungsi" type="number" class="block w-full mt-1" required autocomplete="jumlah_pengungsi"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="kerugian_materi" value="Kerugian Materi" />
                            <x-text-input id="kerugian_materi" name="kerugian_materi" type="number" class="block w-full mt-1" required autocomplete="kerugian_materi"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="deskripsi" value="Deskripsi" />
                            <x-text-input id="deskripsi" name="deskripsi" type="text" class="block w-full mt-1" required autocomplete="deskripsi"/>
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
