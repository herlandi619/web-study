<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Tambah Materi
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-2xl p-8">

                <!-- Header -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Form Materi Baru
                    </h3>
                    <p class="text-sm text-gray-500">
                        Isi data materi pembelajaran dengan lengkap
                    </p>
                </div>

                <form action="{{ route('guru.materi.store') }}" method="POST">
                    @csrf

                    <!-- Mata Pelajaran -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Mata Pelajaran
                        </label>
                        <select name="subject_id"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
                        @enderror
                    </div>

                    <!-- Judul Materi -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Judul Materi
                        </label>
                        <input type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Contoh: Pengenalan Laravel">
                        @error('title')
                            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
                        @enderror
                    </div>

                    <!-- Isi Materi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Isi Materi
                        </label>
                        <textarea name="content"
                                rows="8"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Tuliskan isi materi lengkap di sini...">{{ old('content') }}</textarea>
                        @error('content')
                            <x-input-error :messages="$errors->get('subject_id')" class="mt-1" />
                        @enderror
                    </div>

                    <!-- Action -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('guru.materi.index') }}"
                        class="px-4 py-2 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                            ⬅ Kembali
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-xl bg-blue-600 text-white hover:bg-blue-700 transition">
                            💾 Simpan Materi
                        </button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</x-app-layout>
