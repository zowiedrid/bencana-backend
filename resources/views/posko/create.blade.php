<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Posko') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl">
                        {{ __('Create Posko Page') }}
                    </div>
                    <form method="post" action="{{ route('posko.store') }}" class="">
                        @csrf
                        @method('POST')
                        <div class="mb-6">
                            <x-input-label for="nama_posko" value="Nama Posko" />
                            <x-text-input id="nama_posko" name="nama_posko" type="text" class="block w-full mt-1" required autofocus autocomplete="nama_posko"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="alamat" value="Alamat" />
                            <x-text-input id="alamat" name="alamat" type="text" class="block w-full mt-1" required autocomplete="alamat"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="kontak_penanggung_jawab" value="Kontak Penanggung Jawab" />
                            <x-text-input id="kontak_penanggung_jawab" name="kontak_penanggung_jawab" type="text" class="block w-full mt-1" required autocomplete="kontak_penanggung_jawab"/>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="daerah_id" value="Daerah" />
                            <x-select-input id="daerah_id" name="daerah_id">
                                @foreach($daerahs as $daerah)
                                    <option value="{{ $daerah->id }}">{{ $daerah->nama_desa }}</option>
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
