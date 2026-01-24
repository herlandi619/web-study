
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ✏️ Edit Subject
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded-xl shadow">

            <form action="{{ route('guru.subject.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')


                {{-- Kelas --}}
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Kelas</label>
                    <select name="class_id" class="w-full border rounded p-2">
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}"
                                {{ $subject->class_id == $class->id ? 'selected' : '' }}>
                                {{ $class->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nama Mapel --}}
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Nama Mata Pelajaran</label>
                    <input
                        type="text"
                        name="nama_mapel"
                        value="{{ old('nama_mapel', $subject->nama_mapel) }}"
                        class="w-full border rounded p-2"
                        required>
                </div>

                {{-- Tombol --}}
                <div class="flex gap-3">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        💾 Simpan
                    </button>

                    <a href="{{ route('guru.subject.index') }}"
                       class="bg-gray-300 px-4 py-2 rounded">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
