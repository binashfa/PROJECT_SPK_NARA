<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Dashboard Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f7] min-h-screen">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <div class="p-6">

        <!-- HEADER -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-1">
                Dashboard Siswa
            </h1>

            <p class="text-sm text-gray-400">
                Selamat datang kembali 👋
            </p>

        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mb-8">

            <!-- TOTAL TUGAS -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <div class="flex items-center justify-between mb-4">

                    <div>

                        <p class="text-gray-400 text-sm">
                            Total Tugas
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalTugas }}
                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                        <i class="fa-solid fa-folder-open text-purple-600 text-xl"></i>

                    </div>

                </div>

                <p class="text-green-500 text-sm">
                    Tugas aktif semester ini
                </p>

            </div>

            <!-- KEHADIRAN -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <div class="flex items-center justify-between mb-4">

                    <div>

                        <p class="text-gray-400 text-sm">
                            Kehadiran
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $persentaseKehadiran }}%
                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                        <i class="fa-solid fa-clipboard-check text-green-600 text-xl"></i>

                    </div>

                </div>

                <p class="text-green-500 text-sm">
                    Statistik kehadiran siswa
                </p>

            </div>

            <!-- KELAS -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <div class="flex items-center justify-between mb-4">

                    <div>

                        <p class="text-gray-400 text-sm">
                            Kelas Aktif
                        </p>

                        <h2 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalKelas }}
                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">

                        <i class="fa-solid fa-book-open text-orange-500 text-xl"></i>

                    </div>

                </div>

                <p class="text-orange-500 text-sm">
                    Mata pelajaran aktif
                </p>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="xl:col-span-2 bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <div class="flex items-center justify-between mb-6">

                    <h2 class="text-xl font-bold text-gray-800">
                        Jadwal Hari Ini
                    </h2>

                    <button class="text-purple-600 text-sm font-medium">
                        Lihat Semua
                    </button>

                </div>

                <div class="space-y-4">

                    @forelse($jadwalHariIni as $kelas)

                    <div class="bg-purple-50 border border-purple-100 rounded-2xl p-5">

                        <div class="flex justify-between items-center">

                            <div class="flex items-start gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-purple-500 text-white flex items-center justify-center">

                                    <i class="fa-solid fa-book"></i>

                                </div>

                                <div>

                                    <h3 class="text-lg font-semibold text-gray-800">
                                        {{ $kelas->nama_kelas }}
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-1">
                                        {{ $kelas->ruangan ?? 'Tidak ada ruangan' }}
                                    </p>

                                </div>

                            </div>

                            <div class="text-right">

                                <p class="font-bold text-purple-600">

                                    {{ \Carbon\Carbon::parse($kelas->start_time)->format('H:i') }}

                                </p>

                                <p class="text-sm text-gray-400">

                                    {{ \Carbon\Carbon::now()->translatedFormat('l') }}

                                </p>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-10 text-gray-400">

                        Belum ada jadwal hari ini

                    </div>

                    @endforelse

                </div>

            </div>

            <!-- RIGHT -->
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    Upcoming Tasks
                </h2>

                <div class="space-y-4">

                    @forelse($tugas as $item)

                    <div class="border border-gray-100 rounded-2xl p-4 hover:shadow-md transition">

                        <div class="flex items-center justify-between mb-3">

                            @if($item->status == 'selesai')

                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">
                                Selesai
                            </span>

                            @else

                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium">
                                Deadline
                            </span>

                            @endif

                            <p class="text-sm text-gray-400">

                                {{ \Carbon\Carbon::parse($item->deadline)->diffForHumans() }}

                            </p>

                        </div>

                        <h3 class="font-bold text-gray-800 mb-2">
                            {{ $item->judul }}
                        </h3>

                        <p class="text-sm text-gray-400 mb-3 line-clamp-2">
                            {{ $item->deskripsi }}
                        </p>

                        <div class="flex items-center justify-between">

                            <p class="text-sm font-medium text-purple-600">

                                {{ $item->kelas->nama_kelas ?? '-' }}

                            </p>

                            <button class="text-sm text-purple-600 font-medium hover:underline">

                                Detail

                            </button>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-10 text-gray-400">

                        Belum ada tugas

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</body>

</html>