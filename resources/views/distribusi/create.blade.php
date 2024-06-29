<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Distribusi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Create Distribusi Page') }}
                    </div>
                    <form method="post" action="{{ route('distribusi.store') }}" class="">
                        @csrf
                        @method('POST')

                        <div class="mb-6">
                            <x-input-label for="tanggal" value="Tanggal" />
                            <x-text-input id="tanggal" name="tanggal" type="date" class="block w-full mt-1" required autocomplete="tanggal"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jenis_barang_id" value="Jenis Barang" />
                            <x-select-input id="jenis_barang_id" name="jenis_barang_id">
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jumlah_didistribusikan" value="Jumlah Didistribusikan" />
                            <x-text-input id="jumlah_didistribusikan" name="jumlah_didistribusikan" type="number" class="block w-full mt-1" required autocomplete="jumlah_didistribusikan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="lokasi_distribusi" value="Lokasi Distribusi" />
                            <x-text-input id="lokasi_distribusi" name="lokasi_distribusi" type="text" class="block w-full mt-1" required autocomplete="lokasi_distribusi"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="penerima_bantuan" value="Penerima Bantuan" />
                            <x-text-input id="penerima_bantuan" name="penerima_bantuan" type="text" class="block w-full mt-1" required autocomplete="penerima_bantuan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="user_id" value="User" />
                            <x-select-input id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </x-select-input>
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
