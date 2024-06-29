
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Daerah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Create Daerah Page') }}
                    </div>
                    <form method="post" action="{{ route('daerah.store') }}" class="">
                        @csrf
                        @method('POST')
                        <div class="mb-6">
                            <x-input-label for="nama_kabupaten" value="Nama Kabupaten" />
                            <x-text-input id="nama_kabupaten" name="nama_kabupaten" type="text" class="block w-full mt-1" required autofocus autocomplete="nama_kabupaten"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_kecamatan" value="Nama Kecamatan" />
                            <x-text-input id="nama_kecamatan" name="nama_kecamatan" type="text" class="block w-full mt-1" required autocomplete="nama_kecamatan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_kelurahan" value="Nama Kelurahan" />
                            <x-text-input id="nama_kelurahan" name="nama_kelurahan" type="text" class="block w-full mt-1" required autocomplete="nama_kelurahan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="nama_desa" value="Nama Desa" />
                            <x-text-input id="nama_desa" name="nama_desa" type="text" class="block w-full mt-1" required autocomplete="nama_desa"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="koordinat" value="Koordinat" />
                            <x-text-input id="koordinat" name="koordinat" type="text" class="block w-full mt-1" required autocomplete="koordinat"/>
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
