<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            👤 Detail Siswa
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-6">

            <!-- Info Siswa -->
            <div class="bg-white shadow-lg rounded-xl p-6 mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    Informasi Siswa
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                    <p><strong>Nama:</strong> {{ $student->name }}</p>
                    <p><strong>Email:</strong> {{ $student->email }}</p>
                </div>
            </div>

            <!-- Nilai Siswa -->
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    📊 Hasil Nilai
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-base border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">No</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Kuis</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Nilai</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            @forelse ($scores as $index => $score)
                                <tr>
                                    <td class="px-6 py-4">
                                        {{ $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $score->subject->nama_mapel ?? 'Kuis' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold">
                                        {{ $score->score }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $score->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                        Belum ada nilai
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <a href="{{ route('student.index') }}"
                       class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                        ⬅ Kembali ke Daftar Siswa
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
