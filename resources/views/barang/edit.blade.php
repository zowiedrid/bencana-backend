<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Edit Barang Page') }}
                    </div>
                    <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-6">
                            <x-input-label for="nama_barang" value="Nama Barang" />
                            <x-text-input id="nama_barang" name="nama_barang" type="text" class="block w-full mt-1" value="{{ $barang->nama_barang }}" required autofocus autocomplete="nama_barang"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="deskripsi" value="Deskripsi" />
                            <x-text-input id="deskripsi" name="deskripsi" type="text" class="block w-full mt-1" value="{{ $barang->deskripsi }}" required autocomplete="deskripsi"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="satuan" value="Satuan" />
                            <x-text-input id="satuan" name="satuan" type="text" class="block w-full mt-1" value="{{ $barang->satuan }}" required autocomplete="satuan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="keterangan" value="Keterangan" />
                            <x-text-input id="keterangan" name="keterangan" type="text" class="block w-full mt-1" value="{{ $barang->keterangan }}" required autocomplete="keterangan"/>
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
