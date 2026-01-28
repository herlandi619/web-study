<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            🏫 Manajemen Kelas
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">    
        <div class="max-w-7xl mx-auto px-4 space-y-8">

            <a href="{{ route('admin.classes.create') }}"
            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                ➕ Tambah Kelas
            </a>

            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-xl overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">No</th>
                            <th class="p-3 text-left">Nama Kelas</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($classes as $item)
                            <tr class="border-t">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $item->nama_kelas }}</td>
                                <td class="p-3 flex gap-3">
                                    <a href="{{ route('admin.classes.edit', $item->id) }}"
                                    class="text-blue-600 text-xs">
                                        ✏
                                    </a>

                                    <form method="POST"
                                        action="{{ route('admin.classes.destroy', $item->id) }}"
                                        onsubmit="return confirm('Hapus kelas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 text-xs">
                                            🗑
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="p-4 text-center text-gray-500">
                                    Belum ada kelas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $classes->links() }}

            <div class="mt-10">
                    <a href="{{ route('dashboard.admin') }}"
                    class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                        ← Kembali ke Dashboard
                    </a>
                </div>

        </div>
    </div>
</x-app-layout>
