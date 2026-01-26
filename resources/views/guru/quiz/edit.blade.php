<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ✏️ Edit Quiz
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6 px-4">

        <div class="bg-white shadow rounded-2xl p-6 space-y-6">

            <form action="{{ route('guru.quiz.update', $quiz->id) }}"
                  method="POST"
                  class="space-y-6">
                @csrf
                @method('PUT')

                {{-- MAPEL --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Mata Pelajaran
                    </label>
                    <select name="subject_id"
                            class="w-full border rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}"
                                {{ $quiz->subject_id == $subject->id ? 'selected' : '' }}>
                                {{ $subject->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- PERTANYAAN --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Pertanyaan
                    </label>
                    <textarea name="question"
                              rows="4"
                              required
                              class="w-full border rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                              placeholder="Masukkan pertanyaan quiz...">{{ old('question', $quiz->question) }}</textarea>
                </div>

                {{-- JAWABAN --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Jawaban Benar
                    </label>
                    <input type="text"
                           name="correct_answer"
                           required
                           value="{{ old('correct_answer', $quiz->correct_answer) }}"
                           placeholder="Masukkan jawaban benar"
                           class="w-full border rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                {{-- ACTION BUTTON --}}
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-2">
                    <a href="{{ route('guru.quiz.index') }}"
                       class="inline-flex justify-center items-center px-4 py-2 rounded-xl bg-gray-200 text-gray-700 text-sm hover:bg-gray-300 transition">
                        Batal
                    </a>

                    <button type="submit"
                            class="inline-flex justify-center items-center px-4 py-2 rounded-xl bg-blue-600 text-white text-sm hover:bg-blue-700 transition">
                        💾 Update Quiz
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
