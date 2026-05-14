<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Dashboard Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f6f7fb] min-h-screen text-gray-800">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <main class="p-6 lg:p-8">

        <!-- GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

            <!-- LEFT -->
            <div class="xl:col-span-8 space-y-6">

                <!-- JADWAL -->
                <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">

                    <div class="mb-5">
                        <h2 class="text-xl font-bold">
                            Jadwal Hari Ini
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Aktivitas dan kelas yang berlangsung hari ini
                        </p>
                    </div>

                    <!-- CARD -->
                    @if(!$todayAttendance)

                    <!-- BELUM ABSEN -->
                    <div
                        class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-3xl p-6 text-white flex items-center justify-between">

                        <div>

                            <h3 class="text-2xl font-bold mb-2">
                                Kamu belum hadir hari ini 👋
                            </h3>

                            <p class="text-purple-100">
                                Lakukan absensi sekarang sebelum kelas dimulai.
                            </p>

                        </div>

                        <a href="/absensi"
                            class="bg-white text-purple-700 px-5 py-3 rounded-2xl font-semibold hover:bg-purple-100 transition">

                            Hadir Sekarang

                        </a>

                    </div>

                    @else

                    @forelse ($absensis as $absen)

                    <div
                        class="bg-gradient-to-r from-purple-50 to-purple-100 border border-purple-200 rounded-2xl p-5 hover:shadow-md transition">

                        <div class="flex items-center justify-between gap-4">

                            <!-- LEFT -->
                            <div class="flex items-start gap-4">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-purple-500 text-white flex items-center justify-center">

                                    <i class="fa-solid fa-school text-lg"></i>

                                </div>

                                <div>

                                    <div class="flex items-center gap-2 mb-1">

                                        <div class="w-2.5 h-2.5 rounded-full bg-purple-500"></div>

                                        <h3 class="text-lg font-semibold">
                                            {{ $absen->kelas->nama_kelas ?? '-' }}
                                        </h3>

                                    </div>

                                    <p class="text-sm text-gray-500">
                                        Tingkat {{ $absen->kelas->tingkat ?? '-' }}
                                    </p>

                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="text-right">

                                <p class="font-bold text-purple-700">
                                    {{ $absen->created_at->format('H:i') }}
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    {{ $absen->created_at->translatedFormat('l') }}
                                </p>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-10 text-gray-400">
                        Belum ada data absensi
                    </div>

                    @endforelse

                    @endif

                </section>

                <!-- TABLE -->
                <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">

                    <div class="mb-5">
                        <h2 class="text-xl font-bold">
                            Rekap Absensi Mingguan
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Kehadiran selama 7 hari terakhir
                        </p>
                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead>

                                <tr class="text-left text-gray-400 border-b">

                                    <th class="pb-4 font-medium">
                                        Hari
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Mata Pelajaran
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Jam
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="text-gray-700">

                                @forelse ($absensis as $absen)

                                <tr class="border-b hover:bg-gray-50 transition">

                                    <td class="py-4 font-medium">
                                        {{ $absen->created_at->translatedFormat('l') }}
                                    </td>

                                    <td>
                                        {{ $absen->kelas->nama_kelas ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $absen->created_at->format('H:i') }}
                                    </td>

                                    <td>

                                        @if($absen->status == 'hadir')

                                        <span
                                            class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-semibold">

                                            Hadir

                                        </span>

                                        @elseif($absen->status == 'izin')

                                        <span
                                            class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-semibold">

                                            Izin

                                        </span>

                                        @else

                                        <span
                                            class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">

                                            Alpha

                                        </span>

                                        @endif

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td colspan="4" class="text-center py-5 text-gray-400">
                                        Belum ada data absensi
                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </section>

            </div>

            <!-- RIGHT -->
            <div class="xl:col-span-4 space-y-6">

                <!-- STATISTIK -->
                <section class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6">

                    <div class="mb-5">

                        <h2 class="text-xl font-bold">
                            Statistik Kehadiran
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Persentase kehadiran semester ini
                        </p>

                    </div>

                    <div class="space-y-5">

                        <!-- HADIR -->
                        <div>

                            <div class="flex justify-between mb-2">

                                <p class="text-sm text-gray-600">
                                    Hadir
                                </p>

                                <p class="text-sm font-bold text-green-600">
                                    {{ $persenHadir }}%
                                </p>

                            </div>

                            <div class="w-full bg-gray-100 rounded-full h-3">

                                <div
                                    class="bg-green-500 h-3 rounded-full transition-all duration-500"
                                    @style(['width: '.$persenHadir.'%'])>
                                </div>

                            </div>

                        </div>

                        <!-- IZIN -->
                        <div>

                            <div class="flex justify-between mb-2">

                                <p class="text-sm text-gray-600">
                                    Izin
                                </p>

                                <p class="text-sm font-bold text-yellow-500">
                                    {{ $persenIzin }}%
                                </p>

                            </div>

                            <div class="w-full bg-gray-100 rounded-full h-3">

                                <div
                                    class="bg-yellow-400 h-3 rounded-full transition-all duration-500"
                                    @style(['width: '.$persenIzin.'%'])>
                                </div>

                            </div>

                        </div>

                        <!-- ALPHA -->
                        <div>

                            <div class="flex justify-between mb-2">

                                <p class="text-sm text-gray-600">
                                    Alpha
                                </p>

                                <p class="text-sm font-bold text-red-500">
                                    {{ $persenAlpha }}%
                                </p>

                            </div>

                            <div class="w-full bg-gray-100 rounded-full h-3">

                                <div
                                    class="bg-red-400 h-3 rounded-full transition-all duration-500"
                                    @style(['width: '.$persenAlpha.'%'])>
                                </div>

                            </div>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </main>

</body>

</html>