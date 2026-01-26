<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Kuis {{ $subject->nama_mapel }}
        </h2>
    </x-slot>

    <form action="{{ route('quiz.submit', $subject->id) }}" method="POST"
          class="max-w-4xl mx-auto py-10 space-y-8">
        @csrf

        @foreach ($quizzes as $index => $quiz)
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="font-semibold mb-4">
                    {{ $index + 1 }}. {{ $quiz->question }}
                </p>

                @foreach (['A','B','C','D'] as $opt)
                    <label class="block mb-2">
                        <input type="radio"
                               name="answers[{{ $quiz->id }}]"
                               value="{{ $opt }}"
                               class="mr-2" required>
                        {{ $quiz['option_' . strtolower($opt)] }}
                    </label>
                @endforeach
            </div>
        @endforeach

        
        <div class="mt-10">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                    Selesai & Lihat Nilai
                </button>

                    <a href="{{ route('quiz.index') }}"
                    class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                        ← Kembali ke index
                    </a>
                </div>

        </form>

    
</x-app-layout>
