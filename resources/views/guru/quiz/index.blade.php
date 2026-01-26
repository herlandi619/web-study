<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            📋 Daftar Quiz
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 px-4 space-y-6">

        {{-- TOP ACTION --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            
            {{-- FILTER MAPEL --}}
            <form method="GET"
                  action="{{ route('guru.quiz.index') }}"
                  class="flex flex-col sm:flex-row sm:items-center gap-3 bg-white p-4 rounded-xl shadow w-full sm:w-auto">

                <label class="text-sm font-medium text-gray-700">
                    Mata Pelajaran
                </label>

                <select name="subject_id"
                        onchange="this.form.submit()"
                        class="border rounded-lg px-3 py-2 text-sm w-full sm:w-56">
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->nama_mapel }}
                        </option>
                    @endforeach
                </select>
            </form>

            {{-- BUTTON TAMBAH --}}
            <a href="{{ route('guru.quiz.create') }}"
               class="inline-flex justify-center items-center gap-2 bg-blue-600 text-white px-4 py-2.5 rounded-xl text-sm hover:bg-blue-700 transition w-full sm:w-auto">
                ➕ Tambah Quiz
            </a>
        </div>

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div id="alert-success"
                 class="relative rounded-xl bg-green-100 border border-green-300 text-green-800 px-5 py-3">
                <button onclick="document.getElementById('alert-success').remove()"
                        class="absolute top-2 right-2 text-green-700 hover:text-green-900">
                    ✖
                </button>
                <div class="flex items-center gap-2 text-sm">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- TABLE --}}
        <div class="bg-white shadow rounded-xl overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left whitespace-nowrap">No</th>
                        <th class="p-3 text-left whitespace-nowrap">Mapel</th>
                        <th class="p-3 text-left">Pertanyaan</th>
                        <th class="p-3 text-left whitespace-nowrap">Jawaban</th>
                        <th class="p-3 text-left whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($quizzes as $quiz)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">{{ $loop->iteration }}</td>

                            <td class="p-3 whitespace-nowrap">
                                {{ $quiz->subject->nama_mapel }}
                            </td>

                            <td class="p-3">
                                {{ Str::limit($quiz->question, 70) }}
                            </td>

                            <td class="p-3 font-semibold whitespace-nowrap">
                                {{ $quiz->correct_answer }}
                            </td>

                            <td class="p-3">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('guru.quiz.edit', $quiz->id) }}"
                                       class="text-blue-600 hover:underline text-sm">
                                        ✏
                                    </a>

                                    <form action="{{ route('guru.quiz.destroy', $quiz->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus quiz ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline text-sm">
                                            🗑
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="p-6 text-center text-gray-500">
                                @if (request('subject_id'))
                                    Tidak ada quiz untuk mata pelajaran ini
                                @else
                                    Silakan pilih mata pelajaran terlebih dahulu
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($quizzes->hasPages())
            <div class="flex justify-center mt-6">
                {{ $quizzes->links() }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('dashboard.guru') }}"
                       class="inline-flex items-center justify-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm hover:bg-gray-300 transition">
                        ⬅ Kembali
                    </a>
                </div>


    </div>
</x-app-layout>
