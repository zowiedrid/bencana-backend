<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kebutuhan List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                        @if (request('search'))
                            <h2 class="pb-3 text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                Search result for : {{ request('search') }}
                            </h2>
                        @endif
                        <form class="flex items-center gap-2">
                            <x-text-input id="search" name="search" placeholder="Search Kebutuhan" class="w-full"
                                value="{{ request('search') }}" autofocus />
                            <x-primary-button type="submit">Search</x-primary-button>
                        </form>
                    </div>
                    <div class="mr-4">
                        <x-create-button href="{{ route('kebutuhan.create') }}">Create</x-create-button>
                    </div>
                </div>
                <div class="px-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div></div>
                        <div>
                            @if (@session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show => false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">
                                    {{ session('success') }}
                                </p>
                            @endif
                            @if (@session('error'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show => false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">
                                    {{ session('error') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a
                                    href="{{ route('kebutuhan.index', ['sort_by' => 'nama_barang', 'sort_order' => request('sort_by') === 'nama_barang' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'page' => request('page')]) }}">
                                    Jenis Kebutuhan
                                </a>
                            </th>
                            <!-- Add more columns as needed -->
                            <th scope="col" class="px-6 py-3">
                                <a
                                    href="{{ route('kebutuhan.index', ['sort_by' => 'jumlah_dibutuhkan', 'sort_order' => request('sort_by') === 'jumlah_dibutuhkan' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'page' => request('page')]) }}">
                                    Jumlah dibutuhkan
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a
                                    href="{{ route('kebutuhan.index', ['sort_by' => 'lokasi_kebutuhan', 'sort_order' => request('sort_by') === 'lokasi_kebutuhan' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'page' => request('page')]) }}">
                                    Lokasi Kebutuhan
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a
                                    href="{{ route('kebutuhan.index', ['sort_by' => 'bencana_id', 'sort_order' => request('sort_by') === 'bencana_id' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'page' => request('page')]) }}">
                                    Bencana
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a
                                    href="{{ route('kebutuhan.index', ['sort_by' => 'user_id', 'sort_order' => request('sort_by') === 'user_id' && request('sort_order') === 'asc' ? 'desc' : 'asc', 'page' => request('page')]) }}">
                                    User
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kebutuhans as $kebutuhan)
                            <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>{{ $loop->iteration }}</p>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('kebutuhan.show', $kebutuhan) }}"
                                        class="text-blue-500 hover:text-blue-700">
                                        {{ $kebutuhan->nama_barang}}
                                    </a>
                                </td>
                                <!-- Add more data cells as needed -->
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $kebutuhan->jumlah_dibutuhkan }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $kebutuhan->lokasi_kebutuhan }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('bencana.show', $kebutuhan->bencana) }}" class="text-blue-500 hover:text-blue-700">
                                        {{ $kebutuhan->bencana->nama_bencana }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $kebutuhan->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('kebutuhan.edit', $kebutuhan) }}"
                                            class="px-2 py-1 text-xs text-white bg-blue-500 rounded-md hover:bg-blue-700">
                                            Edit
                                        </a>
                                        <form action="{{ route('kebutuhan.destroy', $kebutuhan) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-2 py-1 text-xs text-white bg-red-500 rounded-md hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td scope="row" class="px-6 py-4 text-center" colspan="10">Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($kebutuhans->hasPages())
                <div class="p-3">
                    {{ $kebutuhans->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
