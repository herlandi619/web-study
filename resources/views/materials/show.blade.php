<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $material->title }}
        </h2>
    </x-slot>

        

        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow">

            <!-- Judul Materi -->
            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                {{ $material->title }}
            </h1>

            <!-- Gambar Materi (Random) -->
            <div class="mb-8">
                <img
                    src="https://picsum.photos/seed/{{ $material->id }}/1200/400"
                    alt="Gambar Materi"
                    class="w-full h-64 object-cover rounded-lg shadow">
            </div>


            <!-- Isi Materi -->
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                {!! nl2br(e($material->content)) !!}
            </div>

           <!-- Tombol Aksi -->
            <div class="mt-10 flex flex-col sm:flex-row justify-between items-center gap-4">

                <!-- Tombol Kembali -->
                <a href="{{ route('materi.index') }}"
                class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl
                        font-semibold hover:bg-blue-700 transition shadow">
                    ← Kembali ke Daftar Materi
                </a>

                <!-- Tombol Mulai Kuis -->
                <a href="{{ route('quiz.start', $material->subject->id) }}"
                class="inline-flex items-center gap-2 bg-green-600 text-white px-6 py-3 rounded-xl
                        font-semibold hover:bg-green-700 transition shadow-lg">
                    📝 Mulai Kuis
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
