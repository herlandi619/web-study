<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            🛠️ Dashboard Admin
        </h2>
    </x-slot>

    
        <div class="py-10 bg-gray-100 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 space-y-8">

                {{-- WELCOME --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-1">
                        Selamat Datang, Admin 👋
                    </h1>
                    <p class="text-gray-600 text-sm">
                        Kelola pengguna, kelas, dan data utama aplikasi pembelajaran.
                    </p>
                </div>

                {{-- MENU CARD --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    {{-- INFO / STATS (OPSIONAL) --}}
                    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">
                        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-purple-100 text-purple-600 text-2xl mb-4">
                            📊
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">
                            Informasi Sistem
                        </h3>
                        <p class="text-sm text-gray-600">
                            Dashboard admin untuk pengelolaan data inti aplikasi.
                        </p>
                    </div>


                    {{-- MANAJEMEN USER --}}
                    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-100 text-blue-600 text-2xl mb-4">
                                👤
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                Manajemen User
                            </h3>
                            <p class="text-sm text-gray-600">
                                Kelola akun admin, guru, dan siswa.
                            </p>
                        </div>

                        <a href="{{ route('admin.users.index') }}"
                        class="mt-6 inline-flex justify-center items-center gap-2 bg-blue-600 text-white px-4 py-2.5 rounded-xl text-sm hover:bg-blue-700 transition">
                            Kelola User
                        </a>
                    </div>

                    {{-- MANAJEMEN KELAS --}}
                    <div class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 text-green-600 text-2xl mb-4">
                                🏫
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                Manajemen Kelas
                            </h3>
                            <p class="text-sm text-gray-600">
                                Tambah, edit, dan hapus kelas.
                            </p>
                        </div>

                        <a href="{{ route('admin.classes.index') }}"
                        class="mt-6 inline-flex justify-center items-center gap-2 bg-green-600 text-white px-4 py-2.5 rounded-xl text-sm hover:bg-green-700 transition">
                            Kelola Kelas
                        </a>
                    </div>

                    

                </div>

            </div>
    </div>
    
        
</x-app-layout>
