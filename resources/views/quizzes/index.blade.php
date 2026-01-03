<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Daftar Kuis
        </h2>
    </x-slot>


    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4">

            
    {{-- ALERT ERROR --}}
    @if (session('error'))
        <div class="mb-4 text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Gagal!</strong>
            <span class="block sm:inline">
                {{ session('error') }}
            </span>

            <button onclick="this.parentElement.remove()"
                    class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700">
                ✕
            </button>
        </div>
    @endif

    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="mb-4 text-center bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            <strong class="font-bold">Berhasil!</strong>
            <span class="block sm:inline">
                {{ session('success') }}
            </span>

            <button onclick="this.parentElement.remove()"
                    class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700">
                ✕
            </button>
        </div>
    @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach ($subjects as $subject)
                    <a href="{{ route('quiz.start', $subject->id) }}"
                       class="block bg-white p-6 rounded-xl shadow hover:shadow-xl transition hover:ring-2 hover:ring-green-400">

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            {{ $subject->nama_mapel }}
                        </h3>

                        <p class="text-gray-600 mb-4">
                            Jumlah Soal: {{ $subject->quizzes->count() }}
                        </p>

                        <span class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg">
                            Mulai Kuis →
                        </span>
                    </a>
                @endforeach

            </div>

            <div class="mt-10">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
