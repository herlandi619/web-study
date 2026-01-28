<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ➕ Tambah User
        </h2>
    </x-slot>

    <div class="mx-auto py-6 px-4 space-y-6
            w-full
            sm:max-w-md
            md:max-w-sm
            lg:max-w-[300px]">
        <div class="w-full max-w-xs">

            {{-- ALERT ERROR GLOBAL --}}
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

                <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- NAMA --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Nama
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm
                               @error('name') border-red-500 @enderror">

                        @error('name')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Email
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm
                               @error('email') border-red-500 @enderror">

                        @error('email')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Password
                        </label>
                        <input type="password"
                               name="password"
                               class="w-full border rounded-lg px-3 py-2 text-sm
                               @error('password') border-red-500 @enderror">

                        @error('password')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Konfirmasi Password
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    {{-- ROLE --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Role
                        </label>
                        <select name="role"
                                class="w-full border rounded-lg px-3 py-2 text-sm
                                @error('role') border-red-500 @enderror">
                            <option value="">-- Pilih Role --</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>
                                Guru
                            </option>
                            <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>
                                Siswa
                            </option>
                        </select>

                        @error('role')
                            <p class="text-xs text-red-600 mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex justify-end gap-3 pt-3">
                        <a href="{{ route('admin.users.index') }}"
                           class="px-3 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300">
                            Batal
                        </a>

                        <button
                            class="px-3 py-2 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
