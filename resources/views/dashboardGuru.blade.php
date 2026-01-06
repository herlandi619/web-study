<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🎓 Dashboard Guru
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white shadow-lg rounded-xl p-8 mb-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    👋 Selamat Datang, Guru {{ auth()->user()->name }}
                </h1>
                <p class="text-gray-600">
                    Kelola materi, kuis, dan pantau hasil belajar siswa melalui dashboard ini.
                </p>
            </div>

            <!-- Data Siswa Card -->
            <div class="bg-white shadow-lg rounded-2xl p-6 hover:shadow-xl transition flex flex-col justify-between">

                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-blue-100 text-blue-600 text-2xl">
                            👥
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Data Siswa
                            </h3>
                            <p class="text-sm text-gray-500">
                                Manajemen siswa
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="mb-6">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Lihat dan kelola seluruh data siswa yang terdaftar pada sistem pembelajaran.
                    </p>

                    {{-- <!-- Statistik -->
                    <div class="mt-4 bg-blue-50 border border-blue-200 rounded-xl p-4">
                        <p class="text-sm text-blue-700">
                            Total Siswa:
                            <span class="font-bold text-lg ml-1">
                                {{ $totalStudents ?? '-' }}
                            </span>
                        </p>
                    </div> --}}
                </div>

                <!-- Footer / Action -->
                <a href="{{ route('student.index') }}"
                class="w-full inline-flex justify-center items-center gap-2 bg-blue-600 text-white text-sm font-medium px-4 py-2.5 rounded-xl hover:bg-blue-700 transition">
                    📄 Lihat Daftar Siswa
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
