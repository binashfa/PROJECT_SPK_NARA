<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Online</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased text-gray-800">

    @include('siswa.navbar')

    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <header class="mb-12">
            <div class="w-full bg-gradient-to-br from-[#105666] to-[#0d4b59] rounded-[32px] p-8 md:p-12 flex items-center justify-between shadow-xl relative overflow-hidden">

                <div class="absolute top-0 right-0 w-80 h-80 bg-[#839958]/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-1/3 w-60 h-60 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

                <div class="relative z-10 space-y-2">
                    <span class="inline-flex items-center gap-2 bg-white/10 text-[#F7F4D5] text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm tracking-wider uppercase">
                        <i class="fa-solid fa-user-check text-xs text-[#839958] animate-pulse"></i> Kehadiran Aktif
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">
                        Absensi Online
                    </h1>

                    <p class="text-gray-200 text-sm md:text-base font-medium max-w-md">
                        Catat kehadiran harian dan pantau status absensi secara real-time dengan sistem terintegrasi.
                    </p>
                </div>

                <div class="hidden lg:flex relative z-10 items-center justify-center pr-6">
                    <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl shadow-inner flex items-center justify-center border border-white/20 transform rotate-6 hover:rotate-0 transition duration-300">
                        <i class="fa-solid fa-clipboard-check text-[#F7F4D5] text-4xl"></i>
                    </div>
                </div>

            </div>
        </header>

        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

            <div class="xl:col-span-8 space-y-6">

                <section class="bg-white rounded-[32px] border border-gray-100 p-6 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-[#105666]">
                            Jadwal Hari Ini
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Aktivitas dan kelas yang berlangsung hari ini
                        </p>
                    </div>

                    @if(!$todayAttendance)

                        <div class="bg-gradient-to-r from-[#105666] to-[#0d4b59] rounded-3xl p-6 text-white flex items-center justify-between">
                            <div>
                                <h3 class="text-xl md:text-2xl font-bold mb-2">
                                    Kamu belum hadir hari ini 👋
                                </h3>
                                <p class="text-gray-200">
                                    Lakukan absensi sekarang sebelum kelas dimulai.
                                </p>
                            </div>

                            <a href="/absensi" class="group bg-white text-[#105666] px-6 py-3 rounded-2xl font-semibold flex items-center gap-2 transition-all duration-300 hover:bg-[#F7F4D5] hover:text-[#0d4b59] hover:-translate-y-[2px] hover:shadow-md">
                                Hadir Sekarang
                                <i class="fa-solid fa-arrow-right text-sm transition group-hover:translate-x-1"></i>
                            </a>
                        </div>

                    @else

                        @forelse ($absensis as $absen)
                            <div class="group relative bg-white border border-gray-100 rounded-2xl p-5 transition-all duration-300 hover:shadow-md hover:border-[#839958]/40 hover:bg-[#f9fdf8] overflow-hidden mb-4 last:mb-0">
                                <div class="flex items-center justify-between gap-4">
                                    
                                    <div class="flex items-start gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-[#eef6f6] text-[#105666] flex items-center justify-center transition group-hover:bg-[#105666] group-hover:text-white">
                                            <i class="fa-solid fa-school text-lg"></i>
                                        </div>

                                        <div>
                                            <div class="flex items-center gap-2 mb-1">
                                                <div class="w-2.5 h-2.5 rounded-full bg-[#839958]"></div>
                                                <h3 class="text-lg font-semibold text-gray-800">
                                                    {{ $absen->kelas->nama_kelas ?? '-' }}
                                                </h3>
                                            </div>
                                            <p class="text-sm text-gray-500">
                                                Tingkat {{ $absen->kelas->tingkat ?? '-' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <p class="font-bold text-[#105666]">
                                            {{ $absen->created_at->format('H:i') }}
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">
                                            {{ $absen->created_at->translatedFormat('l') }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="text-center py-10 text-gray-400 italic">
                                Belum ada data absensi
                            </div>
                        @endforelse

                    @endif

                </section>

                <section class="bg-white rounded-[32px] border border-gray-100 p-6 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-[#105666]">
                            Rekap Absensi Mingguan
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Kehadiran selama 7 hari terakhir
                        </p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            
                            <thead>
                                <tr class="text-left text-gray-400 border-b border-gray-100 uppercase text-[11px] tracking-wider">
                                    <th class="pb-4 font-semibold">Hari</th>
                                    <th class="pb-4 font-semibold">Mata Pelajaran</th>
                                    <th class="pb-4 font-semibold">Jam</th>
                                    <th class="pb-4 font-semibold">Status</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-700">
                                @forelse ($absensis as $absen)
                                    <tr class="border-b border-gray-50 hover:bg-[#f9fdf8] transition">
                                        
                                        <td class="py-4 font-medium text-gray-800">
                                            {{ $absen->created_at->translatedFormat('l') }}
                                        </td>

                                        <td class="py-4">
                                            {{ $absen->kelas->nama_kelas ?? '-' }}
                                        </td>

                                        <td class="py-4 text-[#105666] font-semibold">
                                            {{ $absen->created_at->format('H:i') }}
                                        </td>

                                        <td class="py-4">
                                            @if($absen->status == 'hadir')
                                                <span class="inline-flex items-center gap-1.5 bg-[#eef6f6] text-[#105666] px-3 py-1 rounded-full text-xs font-bold">
                                                    <i class="fa-solid fa-circle-check text-[#839958]"></i> Hadir
                                                </span>
                                            @elseif($absen->status == 'izin')
                                                <span class="inline-flex items-center gap-1.5 bg-[#fef9c3] text-[#ca8a04] px-3 py-1 rounded-full text-xs font-bold">
                                                    <i class="fa-solid fa-circle-exclamation"></i> Izin
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 bg-[#fee2e2] text-[#dc2626] px-3 py-1 rounded-full text-xs font-bold">
                                                    <i class="fa-solid fa-circle-xmark"></i> Alpha
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-10 text-gray-400 italic">
                                            Belum ada data absensi
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </section>

            </div>

            <div class="xl:col-span-4 space-y-6">

                <section class="bg-white rounded-[32px] border border-gray-100 p-6 relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-[#105666]">
                            Statistik Kehadiran
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Persentase kehadiran semester ini
                        </p>
                    </div>

                    <div class="space-y-6">

                        <div class="group">
                            <div class="flex justify-between mb-2">
                                <p class="text-sm text-gray-600">Hadir</p>
                                <p class="text-sm font-bold text-[#105666]">{{ $persenHadir }}%</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="h-2.5 rounded-full transition-all duration-500 bg-gradient-to-r from-[#105666] to-[#839958] group-hover:brightness-110"
                                     @style(['width: '.$persenHadir.'%'])>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="flex justify-between mb-2">
                                <p class="text-sm text-gray-600">Izin</p>
                                <p class="text-sm font-bold text-[#ca8a04]">{{ $persenIzin }}%</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="h-2.5 rounded-full transition-all duration-500 bg-gradient-to-r from-[#facc15] to-[#fde68a] group-hover:brightness-110"
                                     @style(['width: '.$persenIzin.'%'])>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="flex justify-between mb-2">
                                <p class="text-sm text-gray-600">Alpha</p>
                                <p class="text-sm font-bold text-[#dc2626]">{{ $persenAlpha }}%</p>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                <div class="h-2.5 rounded-full transition-all duration-500 bg-gradient-to-r from-[#ef4444] to-[#fca5a5] group-hover:brightness-110"
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