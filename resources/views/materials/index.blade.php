<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Materi Pembelajaran
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4">

            <!-- Grid Materi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @foreach ($materials as $materi)
                    <a href="{{ route('materi.show', $materi->id) }}"
                       class="block bg-white p-6 rounded-xl shadow hover:shadow-xl transition hover:ring-2 hover:ring-blue-400">

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            {{ $materi->title }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-4">
                            Mata Pelajaran: {{ $materi->subject->nama_mapel }}
                        </p>

                        <span class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">
                            Baca Materi →
                        </span>
                    </a>
                @endforeach

            </div>

            <!-- Tombol Kembali -->
            <div class="mt-10">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
