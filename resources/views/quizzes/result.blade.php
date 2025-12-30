<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Hasil Kuis
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-10">
        <div class="bg-white p-8 rounded-xl shadow text-center">
            <h3 class="text-2xl font-bold mb-4">
                Nilai Kamu
            </h3>

            <p class="text-5xl font-bold text-green-600">
                {{ $score }}
            </p>

            <a href="{{ route('dashboard') }}"
               class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>
