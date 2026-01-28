<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            ✏️ Edit User
        </h2>
    </x-slot>

    <div class="mx-auto py-6 px-4 space-y-6
            w-full
            sm:max-w-md
            md:max-w-sm
            lg:max-w-[300px]">
        <div class="w-full max-w-xs">

            <div class="bg-white shadow rounded-2xl p-6">

                {{-- ERROR VALIDATION --}}
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3 text-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.update', $user->id) }}"
                      method="POST"
                      class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- NAMA --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Nama
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name', $user->name) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Email
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ old('email', $user->email) }}"
                               class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Password Baru
                        </label>
                        <input type="password"
                               name="password"
                               class="w-full border rounded-lg px-3 py-2 text-sm"
                               placeholder="Kosongkan jika tidak diubah">
                    </div>

                    {{-- ROLE --}}
                    <div>
                        <label class="block text-sm font-medium mb-1">
                            Role
                        </label>
                        <select name="role"
                                class="w-full border rounded-lg px-3 py-2 text-sm">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>
                                Guru
                            </option>
                            <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>
                                Siswa
                            </option>
                        </select>
                    </div>

                    {{-- ACTION --}}
                    <div class="flex justify-end gap-3 pt-2">
                        <a href="{{ route('admin.users.index') }}"
                           class="px-3 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300">
                            Batal
                        </a>

                        <button
                            class="px-3 py-2 text-sm rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
