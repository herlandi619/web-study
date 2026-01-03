<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            📊 Hasil Belajar
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4">

        {{-- ALERT --}}
        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-lg font-semibold mb-4">
                Ringkasan Nilai
            </h3>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3">No</th>
                        <th class="p-3">Mata Pelajaran</th>
                        <th class="p-3">Nilai</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($scores as $index => $item)
                    @php
                        $totalSoal = \App\Models\Quiz::where('subject_id', $item->subject_id)->count();
                        $benar = $item->score / 10;
                        $salah = $totalSoal - $benar;
                        $persen = $totalSoal > 0 ? round(($benar / $totalSoal) * 100) : 0;
                        $status = $item->score >= 75 ? 'LULUS' : 'BELUM LULUS';
                    @endphp

                    <tr class="border-t text-center">
                        <td class="p-3">{{ $index + 1 }}</td>
                        <td class="p-3">{{ $item->subject_name ?? 'Mata Pelajaran' }}</td>
                        <td class="p-3 font-semibold">{{ $item->score }}</td>
                        <td class="p-3">
                            @if ($item->score >= 75)
                                <span class="bg-green-600 text-white px-3 py-1 rounded text-sm">LULUS</span>
                            @else
                                <span class="bg-red-600 text-white px-3 py-1 rounded text-sm">BELUM LULUS</span>
                            @endif
                        </td>
                        <td class="p-3">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <button
                                onclick="openModal(
                                    '{{ $item->subject_name ?? 'Mata Pelajaran' }}',
                                    '{{ $item->score }}',
                                    '{{ $totalSoal }}',
                                    '{{ $benar }}',
                                    '{{ $salah }}',
                                    '{{ $persen }}',
                                    '{{ $status }}'
                                )"
                                class="text-blue-600 hover:underline">
                                Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">
                            Belum ada hasil evaluasi
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-10">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                    ← Kembali ke Dashboard
                </a>
            </div>


        </div>
    </div>

   {{-- MODAL DETAIL (KOMPAK & CENTER) --}}
    <div id="modalDetail"
        class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">

        <div class="bg-white rounded-xl shadow-lg w-80 p-5 relative">

            <h3 class="text-base font-semibold mb-4 text-center">
                📄 Detail Evaluasi
            </h3>

            <div class="space-y-2 text-sm">

                <div class="flex justify-between">
                    <span class="text-gray-500">Mata Pelajaran</span>
                    <span class="font-medium text-right" id="mSubject"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Nilai</span>
                    <span class="font-semibold" id="mScore"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Total Soal</span>
                    <span id="mTotal"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Benar</span>
                    <span id="mBenar"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Salah</span>
                    <span id="mSalah"></span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-500">Persentase</span>
                    <span id="mPersen"></span>%
                </div>

                <div class="pt-3 border-t flex justify-between items-center">
                    <span class="text-gray-500">Status</span>
                    <span id="mStatus"
                        class="px-2 py-1 rounded-full text-white text-xs font-semibold">
                    </span>
                </div>
            </div>

            <button onclick="closeModal()"
                    class="mt-4 w-full bg-gray-700 hover:bg-gray-800 text-dark text-sm py-2 rounded">
                Tutup
            </button>
        </div>
    </div>

   

</x-app-layout>

<script>
function openModal(subject, score, total, benar, salah, persen, status) {
    document.getElementById('mSubject').innerText = subject;
    document.getElementById('mScore').innerText = score;
    document.getElementById('mTotal').innerText = total;
    document.getElementById('mBenar').innerText = benar;
    document.getElementById('mSalah').innerText = salah;
    document.getElementById('mPersen').innerText = persen;

    const statusEl = document.getElementById('mStatus');
    statusEl.innerText = status;
    statusEl.className = status === 'LULUS'
        ? 'px-2 py-1 rounded-full text-white text-xs font-semibold bg-green-600'
        : 'px-2 py-1 rounded-full text-white text-xs font-semibold bg-red-600';

    document.getElementById('modalDetail').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modalDetail').classList.add('hidden');
}
</script>


