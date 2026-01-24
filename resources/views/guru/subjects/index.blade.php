
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            📚 Data Subject
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto">

        <a href="{{ route('guru.subject.create') }}"
           class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            ➕ Tambah Subject
        </a>
        <a href="{{ route('guru.materi.index') }}"
           class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            ⬅ Kembali
        </a>

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white shadow rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama Subject</th>
                    <th class="p-3 text-left">Kelas ID</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $index => $subject)
                <tr class="border-t">
                    <td class="p-3">{{ $index+1 }}</td>
                    <td class="p-3">{{ $subject->nama_mapel }}</td>
                    <td class="p-3">{{ $subject->className->nama_kelas }}</td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('guru.subject.edit',$subject->id) }}"
                           class="w-9 h-9 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition">✏️</a>

                        {{-- DELETE --}}
                                        <form action="{{ route('guru.subject.destroy', $subject->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus subject ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition"
                                                title="Hapus subject">
                                                🗑️
                                            </button>
                                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
