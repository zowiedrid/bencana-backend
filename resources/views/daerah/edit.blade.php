<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Daerah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Edit Daerah Page') }}
                    </div>
                    <form method="post" action="{{ route('daerah.update', $daerah) }}" class="">
                        @csrf
                        @method('patch')
                        <div class="mb-6">
                            <x-input-label for="nama_kabupaten" value="Nama Kabupaten" />
                            <x-text-input id="nama_kabupaten" name="nama_kabupaten" type="text" class="block w-full mt-1" value="{{ $daerah->nama_kabupaten }}" required autofocus autocomplete="nama_kabupaten"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_kecamatan" value="Nama Kecamatan" />
                            <x-text-input id="nama_kecamatan" name="nama_kecamatan" type="text" class="block w-full mt-1" value="{{ $daerah->nama_kecamatan }}" required autocomplete="nama_kecamatan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_kelurahan" value="Nama Kelurahan" />
                            <x-text-input id="nama_kelurahan" name="nama_kelurahan" type="text" class="block w-full mt-1" value="{{ $daerah->nama_kelurahan }}" required autocomplete="nama_kelurahan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_desa" value="Nama Desa" />
                            <x-text-input id="nama_desa" name="nama_desa" type="text" class="block w-full mt-1" value="{{ $daerah->nama_desa }}" required autocomplete="nama_desa"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="koordinat" value="Koordinat" />
                            <x-text-input id="koordinat" name="koordinat" type="text" class="block w-full mt-1" value="{{ $daerah->koordinat }}" required autocomplete="koordinat"/>
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
