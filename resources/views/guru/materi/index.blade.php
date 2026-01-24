<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📘 Manajemen Materi
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Daftar Materi
                    </h3>
                    <p class="text-sm text-gray-500">
                        Kelola materi pembelajaran
                    </p>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('dashboard.guru') }}"
                       class="inline-flex items-center justify-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm hover:bg-gray-300 transition">
                        ⬅ Kembali
                    </a>
                    <a href="{{ route('guru.subject.index') }}"
                       class="inline-flex items-center justify-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-sm hover:bg-gray-300 transition">
                        ➕ Tambah Subject   
                    </a>

                    <a href="{{ route('guru.materi.create') }}"
                       class="inline-flex items-center justify-center gap-2 bg-green-600 text-white px-4 py-2 rounded-xl text-sm hover:bg-green-700 transition">
                        ➕ Tambah Materi
                    </a>
                </div>
            </div>

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div id="alert-success"
                    class="relative mb-6 rounded-xl bg-green-100 border border-green-300 text-green-800 px-5 py-3">
                    <button onclick="document.getElementById('alert-success').remove()"
                            class="absolute top-2 right-2 text-green-700 hover:text-green-900">
                        ✖
                    </button>
                    <div class="flex items-center gap-2">
                        <span>✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Table Wrapper -->
            <div class="bg-white shadow-lg rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">
                                Deskripsi
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($materis as $materi)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-4 text-sm">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-4 py-4 font-medium text-gray-800">
                                    {{ $materi->title }}
                                </td>

                                <td class="px-4 py-4 text-gray-600 hidden md:table-cell">
                                    {{ Str::limit($materi->content, 60) }}
                                </td>

                                <td class="px-4 py-4">
                                    <div class="flex justify-center items-center gap-3">

                                        {{-- SHOW --}}
                                        <button onclick="openModal({{ $materi->id }})"
                                            class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 transition"
                                            title="Lihat Materi">
                                            👁
                                        </button>

                                        {{-- EDIT --}}
                                        <a href="{{ route('guru.materi.edit', $materi->id) }}"
                                           class="w-9 h-9 rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-200 transition flex items-center justify-center"
                                           title="Edit Materi">
                                            ✏️
                                        </a>

                                        {{-- DELETE --}}
                                        <form action="{{ route('guru.materi.destroy', $materi->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Hapus materi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-9 h-9 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition"
                                                title="Hapus Materi">
                                                🗑️
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-400 italic">
                                    Belum ada materi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

{{-- MODAL SHOW --}}
<div id="modal-show"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl p-6 relative max-h-[90vh] overflow-hidden">

        <button onclick="closeModal()"
                class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
            ✖
        </button>

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            Detail Materi
        </h3>

        <div class="space-y-4 overflow-y-auto max-h-[60vh] pr-2">
            <div>
                <p class="text-sm text-gray-500">Judul</p>
                <p id="modal-title" class="font-medium text-gray-800"></p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Isi Materi</p>
                <p id="modal-content" class="text-gray-700 text-sm whitespace-pre-line"></p>
            </div>
        </div>

        <div class="mt-6 text-right">
            <button onclick="closeModal()"
                    class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300">
                Tutup
            </button>
        </div>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    const materis = @json($materis);

    function openModal(id) {
        const materi = materis.find(m => m.id === id);
        document.getElementById('modal-title').innerText = materi.title;
        document.getElementById('modal-content').innerText = materi.content;

        document.getElementById('modal-show').classList.remove('hidden');
        document.getElementById('modal-show').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('modal-show').classList.add('hidden');
        document.getElementById('modal-show').classList.remove('flex');
    }
</script>
