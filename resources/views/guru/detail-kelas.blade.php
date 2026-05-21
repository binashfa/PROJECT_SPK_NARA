<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Detail Kelas</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f7] min-h-screen">

    <div class="flex">

        <!-- SIDEBAR -->
        @include('guru.sidebar')

        <!-- MAIN -->
        <div class="flex-1 p-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800 mb-2">

                        {{ $kelas->nama_kelas }}

                    </h1>

                    <p class="text-gray-400">

                        Tingkat {{ $kelas->tingkat }} • {{ $kelas->ruangan }}

                    </p>

                </div>

                <!-- BUTTON -->
                <button
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl text-sm font-medium transition flex items-center gap-3">

                    <i class="fa-solid fa-plus"></i>

                    <span>Tambah Aktivitas</span>

                </button>

            </div>

            <!-- INFO CARD -->
            <div class="grid grid-cols-4 gap-5 mb-8">

                <!-- MATERI -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between mb-4">

                        <div>

                            <p class="text-sm text-gray-400">
                                Materi
                            </p>

                            <h2 class="text-3xl font-bold text-gray-800 mt-1">
                                12
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                            <i class="fa-solid fa-book-open-reader text-blue-600 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- TUGAS -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between mb-4">

                        <div>

                            <p class="text-sm text-gray-400">
                                Tugas
                            </p>

                            <h2 class="text-3xl font-bold text-gray-800 mt-1">
                                8
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                            <i class="fa-solid fa-file-circle-check text-orange-500 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- ABSENSI -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between mb-4">

                        <div>

                            <p class="text-sm text-gray-400">
                                Kehadiran
                            </p>

                            <h2 class="text-3xl font-bold text-gray-800 mt-1">
                                95%
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                            <i class="fa-solid fa-clipboard-check text-green-600 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- NILAI -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between mb-4">

                        <div>

                            <p class="text-sm text-gray-400">
                                Partisipatif
                            </p>

                            <h2 class="text-3xl font-bold text-gray-800 mt-1">
                                A
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-award text-purple-600 text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- MENU -->
            <div class="grid grid-cols-2 gap-6">

                <!-- ABSENSI -->
                <div
                    class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center gap-4 mb-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center">

                            <i class="fa-solid fa-clipboard-check text-2xl text-green-600"></i>

                        </div>

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Absensi Siswa
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Kelola kehadiran siswa
                            </p>

                        </div>

                    </div>

                    <a href="/guru/absensi/{{ $kelas->id }}"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-2xl font-semibold transition flex items-center justify-center gap-3">

                        <i class="fa-solid fa-clipboard-check"></i>

                        <span>Buka Absensi</span>

                    </a>

                </div>

                <!-- MATERI -->
                <div
                    class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center gap-4 mb-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">

                            <i class="fa-solid fa-book-open-reader text-2xl text-blue-600"></i>

                        </div>

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Materi Kelas
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Upload materi pembelajaran
                            </p>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="/guru/materi/{{ $kelas->id }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-2xl font-semibold transition flex items-center justify-center">

                        Tambah Materi

                    </a>

                </div>

                <!-- TUGAS -->
                <div
                    class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center gap-4 mb-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center">

                            <i class="fa-solid fa-file-circle-check text-2xl text-orange-500"></i>

                        </div>

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Pengumpulan Tugas
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Tambahkan tugas siswa
                            </p>

                        </div>

                    </div>

                    <a href="/guru/tugas/{{ $kelas->id }}"
    class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-2xl font-semibold transition flex items-center justify-center gap-2">

    <i class="fa-solid fa-file-circle-plus"></i>

    <span>Buat Tugas</span>

</a>

                </div>

                <!-- NILAI -->
                <div
                    class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center gap-4 mb-5">

                        <div
                            class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-star text-2xl text-purple-600"></i>

                        </div>

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Nilai Partisipatif
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Input nilai siswa di kelas
                            </p>

                        </div>

                    </div>

                    <button
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-2xl font-semibold transition">

                        Input Nilai

                    </button>

                </div>

            </div>

        </div>

    </div>

</body>

</html>