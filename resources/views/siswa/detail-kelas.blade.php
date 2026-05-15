<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas - {{ $kelas->nama_kelas }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- CONTAINER -->
    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <!-- BACK BUTTON -->
        <div class="mb-6">
            <a href="{{ url()->previous() }}" 
               class="inline-flex items-center gap-2 text-sm font-medium text-[#105666] bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md hover:bg-[#f9fdf8]">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <!-- HEADER HERO -->
        <header class="mb-8">
            <div class="w-full rounded-3xl px-10 py-8 flex flex-col md:flex-row items-center justify-between bg-gradient-to-r from-[#F7F4D5] via-[#f3f0d0] to-[#F7F4D5] border border-[#ece8c9] shadow-sm relative overflow-hidden">
                
                <!-- BACKGROUND DECORATION -->
                <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 blur-3xl rounded-full"></div>
                <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

                <!-- CONTENT LEFT -->
                <div class="flex flex-col md:flex-row items-center gap-6 relative z-10 text-center md:text-left">
                    <!-- ICON BOX -->
                    <div class="w-20 h-20 rounded-2xl bg-white shadow-sm flex items-center justify-center text-3xl text-[#105666]">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </div>

                    <!-- CLASS INFO -->
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-[#105666] mb-2 leading-tight">
                            {{ $kelas->nama_kelas }}
                        </h1>
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-5 text-gray-600 text-sm font-medium">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-layer-group text-[#839958]"></i> 
                                Tingkat {{ $kelas->tingkat }}
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-school text-[#D3968C]"></i> 
                                {{ $kelas->ruangan ?? '-' }}
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-clock text-[#105666]"></i>
                                {{ \Carbon\Carbon::parse($kelas->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($kelas->end_time)->format('H:i') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- MAIN CONTENT GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <!-- LEFT COLUMN: MATERI -->
            <div class="xl:col-span-2 space-y-6">
                <section class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100 relative overflow-hidden">
                    
                    <!-- DECORATION -->
                    <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#105666]/10 blur-3xl rounded-full"></div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

                    <!-- SECTION HEADER -->
                    <div class="flex items-center justify-between mb-8 relative z-10">
                        <div>
                            <h2 class="text-2xl font-bold text-[#105666]">Materi Pembelajaran</h2>
                            <p class="text-sm text-gray-500 mt-1">Materi yang telah diberikan guru</p>
                        </div>
                        <div class="w-14 h-14 rounded-2xl bg-[#F7F4D5] flex items-center justify-center text-[#105666] shadow-sm">
                            <i class="fa-solid fa-book text-xl"></i>
                        </div>
                    </div>

                    <!-- MATERI LIST -->
                    <div class="space-y-4 relative z-10">
                        @forelse($materis as $materi)
                        <a href="{{ asset('storage/materi/'.$materi->file) }}" target="_blank"
                           class="group block relative border border-gray-100 rounded-2xl p-6 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-[#D3968C]/40 hover:bg-[#fffafa] overflow-hidden">
                            
                            <!-- TOP ACCENT -->
                            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                            <div class="flex items-start justify-between gap-4 relative z-10">
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-800 mb-2 transition group-hover:text-[#105666]">
                                        {{ $materi->judul }}
                                    </h3>
                                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">
                                        {{ $materi->deskripsi }}
                                    </p>
                                </div>

                                <!-- INTERACTIVE INDICATOR -->
                                <div class="flex items-center">
                                    <div class="relative w-[120px] h-8 flex items-center justify-end">
                                        <div class="absolute right-0 transition-all duration-300 group-hover:translate-x-10 group-hover:opacity-0 text-[#105666]">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                        <div class="absolute right-0 text-sm font-semibold text-[#105666] translate-x-10 opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100 whitespace-nowrap">
                                            Lihat Detail
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        <div class="text-center py-16 text-gray-400">
                            <i class="fa-regular fa-folder-open text-4xl mb-3 block"></i>
                            <p class="font-medium">Belum ada materi tersedia</p>
                        </div>
                        @endforelse
                    </div>
                </section>
            </div>

            <!-- RIGHT COLUMN: NILAI & ABSENSI -->
            <div class="space-y-6">
                
                <!-- SECTION: NILAI -->
                <section class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute -top-16 -right-16 w-32 h-32 bg-[#839958]/10 blur-3xl rounded-full"></div>
                    
                    <div class="mb-6 relative z-10">
                        <h2 class="text-2xl font-bold text-[#105666]">Nilai</h2>
                        <p class="text-sm text-gray-500 mt-1">Hasil pembelajaran</p>
                    </div>

                    <div class="space-y-4 relative z-10">
                        @forelse($nilais as $nilai)
                        <div class="group relative border border-gray-100 rounded-2xl p-5 bg-white transition-all duration-300 hover:shadow-md hover:border-[#839958]/40 hover:bg-[#f9fdf8] overflow-hidden">
                            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>
                            
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold text-gray-800 leading-tight">{{ $nilai->judul }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $nilai->keterangan }}</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-[#eef6f6] flex items-center justify-center font-bold text-[#105666] transition group-hover:bg-[#105666] group-hover:text-white">
                                    {{ $nilai->nilai }}
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8 text-gray-400">
                            <p class="text-sm italic text-gray-400">Belum ada nilai</p>
                        </div>
                        @endforelse
                    </div>
                </section>

                <!-- SECTION: ABSENSI -->
                <section class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100 relative overflow-hidden">
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#D3968C]/10 blur-3xl rounded-full"></div>
                    
                    <div class="mb-6 relative z-10">
                        <h2 class="text-2xl font-bold text-[#105666]">Rekap Absensi</h2>
                        <p class="text-sm text-gray-500 mt-1">Riwayat kehadiran</p>
                    </div>

                    <div class="overflow-x-auto relative z-10">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b text-gray-400">
                                    <th class="pb-4 text-left font-semibold uppercase text-[10px] tracking-wider">Tanggal</th>
                                    <th class="pb-4 text-left font-semibold uppercase text-[10px] tracking-wider">Jam</th>
                                    <th class="pb-4 text-left font-semibold uppercase text-[10px] tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($absensis as $absen)
                                <tr class="border-b border-gray-50 last:border-0 hover:bg-gray-50/50 transition-colors">
                                    <td class="py-4 font-medium">{{ $absen->created_at->translatedFormat('d M Y') }}</td>
                                    <td class="py-4 text-gray-500">{{ $absen->created_at->format('H:i') }}</td>
                                    <td class="py-4">
                                        @if($absen->status == 'hadir')
                                        <span class="inline-flex items-center gap-1.5 bg-[#eef6f6] text-[#105666] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-tighter">
                                            <i class="fa-solid fa-circle-check text-[#839958]"></i> Hadir
                                        </span>
                                        @elseif($absen->status == 'izin')
                                        <span class="inline-flex items-center gap-1.5 bg-[#fff4e5] text-[#f59e0b] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-tighter">
                                            <i class="fa-solid fa-circle-exclamation"></i> Izin
                                        </span>
                                        @else
                                        <span class="inline-flex items-center gap-1.5 bg-[#fff1f1] text-[#D3968C] px-3 py-1 rounded-full text-xs font-bold uppercase tracking-tighter">
                                            <i class="fa-solid fa-circle-xmark"></i> Alpha
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-10 text-gray-400 italic">Data kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>
        </div>
    </main>

</body>

</html>