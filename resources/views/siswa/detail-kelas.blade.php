<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Kelas</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f6f7fb] min-h-screen">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <div class="p-6">

        <!-- HEADER -->
        <div
            class="bg-gradient-to-r from-purple-600 to-violet-700 rounded-[35px] p-8 text-white mb-8 relative overflow-hidden">

            <div class="relative z-10">

                <div class="flex items-center gap-5">

                    <!-- ICON -->
                    <div
                        class="w-20 h-20 rounded-3xl bg-white/20 backdrop-blur-xl flex items-center justify-center text-3xl">

                        <i class="fa-solid fa-book-open-reader"></i>

                    </div>

                    <!-- INFO -->
                    <div>

                        <h1 class="text-4xl font-bold mb-2">

                            {{ $kelas->nama_kelas }}

                        </h1>

                        <div class="flex items-center gap-5 text-purple-100">

                            <p>
                                <i class="fa-solid fa-layer-group mr-2"></i>
                                Tingkat {{ $kelas->tingkat }}
                            </p>

                            <p>
                                <i class="fa-solid fa-school mr-2"></i>
                                {{ $kelas->ruangan }}
                            </p>

                            <p>
                                <i class="fa-solid fa-clock mr-2"></i>

                                {{ \Carbon\Carbon::parse($kelas->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($kelas->end_time)->format('H:i') }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- BLUR -->
            <div
                class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full blur-3xl">
            </div>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="xl:col-span-2 space-y-6">

                <!-- MATERI -->
                <section class="bg-white rounded-[30px] p-6 shadow-sm border border-gray-100">

                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Materi Pembelajaran
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Materi yang telah diberikan guru
                            </p>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600">

                            <i class="fa-solid fa-book"></i>

                        </div>

                    </div>

                    <!-- LIST -->
                    <div class="space-y-4">

                        @forelse($materis as $materi)

                        <a href="{{ asset('storage/materi/'.$materi->file) }}"
                            target="_blank"
                            class="block border border-gray-100 rounded-2xl p-5 hover:bg-purple-50 hover:border-purple-200 transition">

                            <div class="flex items-start justify-between gap-4">

                                <div>

                                    <h3 class="text-lg font-bold text-gray-800 mb-2">

                                        {{ $materi->judul }}

                                    </h3>

                                    <p class="text-sm text-gray-500 leading-relaxed">

                                        {{ $materi->deskripsi }}

                                    </p>

                                </div>

                                <!-- FILE -->
                                @if($materi->file)

                                <div
                                    class="bg-purple-100 text-purple-600 px-4 py-2 rounded-xl text-sm font-medium">

                                    <i class="fa-solid fa-file-pdf mr-2"></i>
                                    Buka File

                                </div>

                                @endif

                            </div>

                        </a>

                        @empty

                        <div class="text-center py-10 text-gray-400">

                            Belum ada materi

                        </div>

                        @endforelse

                    </div>

                </section>



            </div>

            <!-- RIGHT -->
            <div class="space-y-6">

                <!-- NILAI -->
                <section class="bg-white rounded-[30px] p-6 shadow-sm border border-gray-100">

                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Nilai
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Hasil pembelajaran
                            </p>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">

                            <i class="fa-solid fa-chart-line"></i>

                        </div>

                    </div>

                    <!-- LIST -->
                    <div class="space-y-4">

                        @forelse($nilais as $nilai)

                        <div
                            class="border border-gray-100 rounded-2xl p-5 hover:bg-green-50 transition">

                            <div class="flex items-center justify-between mb-3">

                                <h3 class="font-bold text-gray-800">

                                    {{ $nilai->judul }}

                                </h3>

                                <div
                                    class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center font-bold text-green-600">

                                    {{ $nilai->nilai }}

                                </div>

                            </div>

                            <p class="text-sm text-gray-500">

                                {{ $nilai->keterangan }}

                            </p>

                        </div>

                        @empty

                        <div class="text-center py-10 text-gray-400">

                            Belum ada nilai

                        </div>

                        @endforelse

                    </div>

                </section>

                <!-- REKAP ABSEN -->
                <section class="bg-white rounded-[30px] p-6 shadow-sm border border-gray-100">

                    <div class="mb-6">

                        <h2 class="text-2xl font-bold text-gray-800">
                            Rekap Absensi
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Riwayat kehadiran kelas ini
                        </p>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead>

                                <tr class="border-b text-gray-400">

                                    <th class="pb-4 text-left font-medium">
                                        Tanggal
                                    </th>

                                    <th class="pb-4 text-left font-medium">
                                        Jam
                                    </th>

                                    <th class="pb-4 text-left font-medium">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="text-gray-700">

                                @forelse($absensis as $absen)

                                <tr class="border-b hover:bg-gray-50">

                                    <td class="py-4">

                                        {{ $absen->created_at->translatedFormat('d F Y') }}

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

                                    <td colspan="3"
                                        class="text-center py-6 text-gray-400">

                                        Belum ada absensi

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </section>

            </div>

        </div>

    </div>

</body>

</html>