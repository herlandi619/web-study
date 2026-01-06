<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            👥 Daftar Siswa
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-xl p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Data Siswa Terdaftar
                    </h3>

                    <a href="{{ route('dashboard.guru') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                        ⬅ Kembali
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-base border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-base">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">No</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Nama</th>
                                <th class="px-6 py-4 text-left font-semibold text-gray-700">Email</th>
                                <th class="px-6 py-4 text-center font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            @forelse ($students as $index => $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $students->firstItem() + $index }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $student->name }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-700">
                                        {{ $student->email }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('student.show', $student->id) }}"
                                        class="inline-flex items-center bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                            👁 Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                        Tidak ada data siswa
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>


                <!-- Pagination -->
                <div class="mt-6">
                    {{ $students->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
