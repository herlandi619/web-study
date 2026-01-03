<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white shadow-lg rounded-xl p-8 mb-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    👋 Selamat Datang!
                </h1>
                <p class="text-gray-600">
                    Selamat datang di <span class="font-semibold">Aplikasi Pembelajaran Berbasis Web</span>.
                    Silakan pilih menu untuk mulai belajar.
                </p>
            </div>

            <!-- Menu Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Materi -->
                <a href="{{ route('materi.index') }}"
                   class="block bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:ring-2 hover:ring-blue-400">

                    <div class="text-blue-600 text-4xl mb-4">📘</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        Materi Pembelajaran
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Baca dan pahami materi pembelajaran berbasis teks.
                    </p>

                    <span class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Lihat Materi
                    </span>
                </a>

                <!-- Kuis -->
                <a href="{{ route('quiz.index') }}"
                   class="block bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:ring-2 hover:ring-green-400">

                    <div class="text-green-600 text-4xl mb-4">📝</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        Kuis
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Kerjakan kuis untuk menguji pemahamanmu.
                    </p>

                    <span class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg">
                        Mulai Kuis
                    </span>
                </a>

                <!-- Nilai -->
                <a href="{{ route('score.index') }}"
                   class="block bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:ring-2 hover:ring-purple-400">

                    <div class="text-purple-600 text-4xl mb-4">📊</div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        Hasil Belajar
                    </h3>
                    <p class="text-gray-600 mb-4">
                        Lihat hasil evaluasi dan nilai belajarmu.
                    </p>

                    <span class="inline-block bg-purple-600 text-white px-4 py-2 rounded-lg">
                        Lihat Nilai
                    </span>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
