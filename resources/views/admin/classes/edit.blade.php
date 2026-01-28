<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ✏️ Edit Kelas
        </h2>
    </x-slot>

    <div class="flex justify-center py-10 px-4">
        <div class="w-full max-w-xs">

            {{-- ALERT ERROR --}}
            @if ($errors->any())
                <div class="mb-4 rounded-xl bg-red-100 border border-red-300 text-red-800 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white shadow rounded-2xl p-6">

                <form action="{{ route('admin.classes.update', $class->id) }}"
                      method="POST"
                      class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- NAMA KELAS --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Nama Kelas
                        </label>
                        <input type="text"
                               name="nama_kelas"
                               value="{{ old('nama_kelas', $class->nama_kelas) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm
                               @error('nama_kelas') border-red-500 @enderror">

                        @error('nama_kelas')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-3 pt-2">
                        <a href="{{ route('admin.classes.index') }}"
                           class="px-3 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-3 py-2 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
