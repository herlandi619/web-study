<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏ Edit Materi
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-2xl p-8">

                <form action="{{ route('guru.materi.update', $materi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Mata Pelajaran -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Mata Pelajaran
                        </label>
                        <select name="subject_id"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ $materi->subject_id == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->nama_mapel }}
                                </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Judul Materi
                        </label>
                        <input type="text"
                               name="title"
                               value="{{ old('title', $materi->title) }}"
                               class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Isi Materi -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Isi Materi
                        </label>
                        <textarea name="content"
                                  rows="8"
                                  class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('content', $materi->content) }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
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
                            💾 Update Materi
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
