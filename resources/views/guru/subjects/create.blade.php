<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ➕ Tambah Subject
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto px-4">

        <div class="bg-white shadow rounded-xl p-6">

            <form action="{{ route('guru.subject.store') }}" method="POST">
                @csrf

                <!-- Pilih Kelas -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kelas
                    </label>
                    <select name="class_id"
                            class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}"
                                {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Subject -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Mata Pelajaran
                    </label>
                    <input type="text"
                           name="nama_mapel"
                           value="{{ old('nama_mapel') }}"
                           placeholder="Contoh: Pemrograman Dasar"
                           class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">

                    @error('nama_mapel')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-between">
                    <a href="{{ route('guru.subject.index') }}"
                       class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        ← Kembali
                    </a>

                    <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        💾 Simpan Subject
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>
