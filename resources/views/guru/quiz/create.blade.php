<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ➕ Tambah Quiz
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-10">
        <form action="{{ route('guru.quiz.store') }}"
              method="POST"
              class="bg-white p-6 rounded-xl shadow space-y-4">
            @csrf

            <div>
                <label class="text-sm font-medium">Mata Pelajaran</label>
                <select name="subject_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Mapel --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->nama_mapel }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm font-medium">Pertanyaan</label>
                <textarea name="question" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <input name="option_a" class="border rounded px-3 py-2" placeholder="Option A">
                <input name="option_b" class="border rounded px-3 py-2" placeholder="Option B">
                <input name="option_c" class="border rounded px-3 py-2" placeholder="Option C">
                <input name="option_d" class="border rounded px-3 py-2" placeholder="Option D">
            </div>

            <div>
                <label class="text-sm font-medium">Jawaban Benar</label>
                <select name="correct_answer" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Jawaban --</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                    <option>D</option>
                </select>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('guru.quiz.index') }}"
                   class="text-gray-600 hover:underline">
                    ← Kembali
                </a>

                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Simpan Quiz
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
