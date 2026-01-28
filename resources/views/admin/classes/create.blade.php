<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">➕ Tambah Kelas</h2>
    </x-slot>

    <div class="max-w-xs mx-auto py-6">

        <div class="bg-white shadow rounded-xl p-6">
            <form action="{{ route('admin.classes.store') }}"
                  method="POST"
                  class="space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-medium">Nama Kelas</label>
                    <input type="text"
                           name="nama_kelas"
                           value="{{ old('nama_kelas') }}"
                           class="w-full border rounded-lg px-3 py-2 text-sm
                           @error('nama_kelas') border-red-500 @enderror">

                    @error('nama_kelas')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-2">
                    <a href="{{ route('admin.classes.index') }}"
                       class="px-3 py-2 text-sm bg-gray-200 rounded">
                        Batal
                    </a>
                    <button class="px-3 py-2 text-sm bg-blue-600 text-white rounded">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
