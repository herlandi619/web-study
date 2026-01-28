<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            👤 Manajemen User
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-6 px-4 space-y-6">

        {{-- TOP ACTION --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">

            {{-- SEARCH --}}
            <form method="GET"
                  class="flex gap-2 w-full sm:w-auto">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Cari nama / email..."
                       class="border rounded-lg px-3 py-2 text-sm w-full sm:w-64">
                <button class="bg-gray-200 px-4 py-2 rounded-lg text-sm">
                    Cari
                </button>
            </form>

            {{-- TAMBAH USER --}}
            <a href="{{ route('admin.users.create') }}"
               class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-4 py-2.5 rounded-xl text-sm hover:bg-blue-700 w-full sm:w-auto">
                ➕ Tambah User
            </a>
        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="rounded-xl bg-green-100 border border-green-300 text-green-800 px-4 py-3 text-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl bg-red-100 border border-red-300 text-red-800 px-4 py-3 text-sm">
                ❌ {{ session('error') }}
            </div>
        @endif

        {{-- TABLE --}}
        <div class="bg-white shadow rounded-xl overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Role</th>
                        <th class="p-3 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3">
                                {{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}
                            </td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs font-medium
                                    {{ $user->role === 'admin' ? 'bg-red-100 text-red-700' : '' }}
                                    {{ $user->role === 'guru' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $user->role === 'siswa' ? 'bg-green-100 text-green-700' : '' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="text-blue-600 hover:underline text-sm">
                                        ✏
                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline text-sm">
                                            🗑
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"
                                class="p-6 text-center text-gray-500">
                                Data user tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div>
            {{ $users->links() }}
        </div>


        <div class="mt-10">
                <a href="{{ route('dashboard.admin') }}"
                   class="inline-flex items-center bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700">
                    ← Kembali ke Dashboard
                </a>
            </div>

    </div>
</x-app-layout>
