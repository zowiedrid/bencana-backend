<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Kebutuhan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Create Kebutuhan Page') }}
                    </div>
                    <form method="post" action="{{ route('kebutuhan.store') }}" class="">
                        @csrf
                        @method('POST')
                        <div class="mb-6">
                            <x-input-label for="jenis_barang_id" value="Jenis Barang" />
                            <x-select-input id="jenis_barang_id" name="jenis_barang_id">
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jumlah_dibutuhkan" value="Jumlah Dibutuhkan" />
                            <x-text-input id="jumlah_dibutuhkan" name="jumlah_dibutuhkan" type="number" class="block w-full mt-1" required autocomplete="jumlah_dibutuhkan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="lokasi_kebutuhan" value="Lokasi Kebutuhan" />
                            <x-text-input id="lokasi_kebutuhan" name="lokasi_kebutuhan" type="text" class="block w-full mt-1" required autocomplete="lokasi_kebutuhan"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="bencana_id" value="Bencana" />
                            <x-select-input id="bencana_id" name="bencana_id">
                                @foreach($bencanas as $bencana)
                                    <option value="{{ $bencana->id }}">{{ $bencana->nama_bencana }}</option>
                                @endforeach
                            </x-select-input>
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
