<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <img src="{{ asset('img/logounpam.png') }}" alt="logo" width="50">

            <h1 class="text-xl font-bold text-blue-600">
                📘 E-Learning Dasar
            </h1>

            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="px-5 py-2 border rounded-lg text-sm hover:bg-gray-100 transition"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="px-5 py-2 text-sm hover:underline"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="px-5 py-2 border rounded-lg text-sm hover:bg-gray-100 transition"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
        <div class="max-w-4xl mx-auto text-center px-6">
            <h2 class="text-4xl font-bold mb-4">
                Aplikasi Pembelajaran Berbasis Web
            </h2>
            <p class="text-lg mb-8">
                Belajar materi dasar secara mudah, kerjakan kuis, dan lihat hasil evaluasi belajarmu.
            </p>

            @guest
                <a href="{{ route('login') }}"
                   class="inline-block bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
                    Mulai Belajar
                </a>
            @else
                <a href="{{ url('/dashboard') }}"
                   class="inline-block bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
                    Masuk ke Dashboard
                </a>
            @endguest
        </div>
    </section>

    <!-- Fitur -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h3 class="text-2xl font-bold text-center mb-10">
                Fitur Utama
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-4xl mb-4">📖</div>
                    <h4 class="font-semibold text-lg mb-2">Materi Teks</h4>
                    <p class="text-gray-600">
                        Pelajari materi dasar dengan penjelasan yang mudah dipahami.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-4xl mb-4">📝</div>
                    <h4 class="font-semibold text-lg mb-2">Kuis</h4>
                    <p class="text-gray-600">
                        Uji pemahamanmu melalui kuis pilihan ganda.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-4xl mb-4">📊</div>
                    <h4 class="font-semibold text-lg mb-2">Evaluasi</h4>
                    <p class="text-gray-600">
                        Lihat hasil belajar dan perkembangan nilai.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} Aplikasi Pembelajaran • Laravel 12
        </div>
    </footer>

</body>
</html>
