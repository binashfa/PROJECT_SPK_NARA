<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN CONTAINER -->
    <main class="max-w-7xl mx-auto px-6 pt-[100px] pb-10">

        <!-- HEADER HERO -->
        <header class="mb-16 relative">
            <div class="w-full rounded-3xl px-8 py-8 flex items-center justify-between shadow-sm hover:shadow-md transition overflow-visible group"
                 style="background: linear-gradient(135deg, #F7F4D5, #e9f0d0);">
                
                <!-- Welcome Text -->
                <div>
                    <h1 class="text-3xl font-bold mb-2" style="color:#105666;">
                        Hi, {{ auth()->user()->name }}
                    </h1>
                    <p class="text-sm text-gray-600">
                        Selamat datang kembali 👋, semangat belajar hari ini!
                    </p>
                </div>

                <!-- Mascot Image -->
                <div class="hidden md:block absolute right-6 -bottom-10">
                    <img src="{{ asset('images/kids.png') }}" 
                         alt="Ilustrasi Siswa"
                         class="w-64 object-contain transition duration-300 ease-out 
                                group-hover:-translate-y-3 group-hover:scale-105 group-hover:rotate-1">
                </div>
            </div>
        </header>

        <!-- MODERN STATISTICS -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-10">
            
            <!-- Card: Total Tugas -->
            <div class="group relative bg-white rounded-2xl shadow-md overflow-hidden flex items-center transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:shadow-[0_20px_60px_rgba(16,86,102,0.35),0_5px_20px_rgba(16,86,102,0.25)] hover:bg-gradient-to-br hover:from-white hover:to-[#f0f8f7]">
                <div class="p-6 pr-20">
                    <h3 class="text-lg font-bold text-[#105666] mb-1 tracking-wide transition-all duration-500 group-hover:scale-[1.05]">
                        Total Tugas
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">Tugas aktif semester ini</p>
                    <h2 class="text-3xl font-bold text-[#105666]">{{ $totalTugas }}</h2>
                </div>
                <div class="absolute right-0 top-0 h-full w-24 bg-[#105666] rounded-l-[60px] transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:w-28 group-hover:brightness-125"></div>
                <div class="absolute right-6 top-1/2 -translate-y-1/2 w-14 h-14 bg-white rounded-full flex items-center justify-center transition-all duration-500 group-hover:scale-110 group-hover:shadow-lg">
                    <i class="fa-solid fa-folder-open text-[#105666] text-xl"></i>
                </div>
            </div>

            <!-- Card: Kehadiran -->
            <div class="group relative bg-white rounded-2xl shadow-md overflow-hidden flex items-center transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:shadow-[0_20px_60px_rgba(131,153,88,0.35),0_5px_20px_rgba(131,153,88,0.25)] hover:bg-gradient-to-br hover:from-white hover:to-[#f3f6eb]">
                <div class="p-6 pr-20">
                    <h3 class="text-lg font-bold text-[#105666] mb-1 tracking-wide transition-all duration-500 group-hover:scale-[1.05]">
                        Kehadiran
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">Statistik kehadiran siswa</p>
                    <h2 class="text-3xl font-bold text-[#105666]">{{ $persentaseKehadiran }}%</h2>
                </div>
                <div class="absolute right-0 top-0 h-full w-24 bg-[#839958] rounded-l-[60px] transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:w-28 group-hover:brightness-125"></div>
                <div class="absolute right-6 top-1/2 -translate-y-1/2 w-14 h-14 bg-white rounded-full flex items-center justify-center transition-all duration-500 group-hover:scale-110 group-hover:shadow-lg">
                    <i class="fa-solid fa-clipboard-check text-[#839958] text-xl"></i>
                </div>
            </div>

            <!-- Card: Kelas Aktif -->
            <div class="group relative bg-white rounded-2xl shadow-md overflow-hidden flex items-center transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-2 hover:shadow-[0_20px_60px_rgba(211,150,140,0.40),0_5px_20px_rgba(211,150,140,0.25)] hover:bg-gradient-to-br hover:from-white hover:to-[#f9efee]">
                <div class="p-6 pr-20">
                    <h3 class="text-lg font-bold text-[#105666] mb-1 tracking-wide transition-all duration-500 group-hover:scale-[1.05]">
                        Kelas Aktif
                    </h3>
                    <p class="text-gray-500 text-sm mb-3">Mata pelajaran aktif</p>
                    <h2 class="text-3xl font-bold text-[#105666]">{{ $totalKelas }}</h2>
                </div>
                <div class="absolute right-0 top-0 h-full w-24 bg-[#D3968C] rounded-l-[60px] transition-all duration-500 ease-[cubic-bezier(0.22,1,0.36,1)] group-hover:w-28 group-hover:brightness-125"></div>
                <div class="absolute right-6 top-1/2 -translate-y-1/2 w-14 h-14 bg-white rounded-full flex items-center justify-center transition-all duration-500 group-hover:scale-110 group-hover:shadow-lg">
                    <i class="fa-solid fa-book-open text-[#D3968C] text-xl"></i>
                </div>
            </div>

        </section>

        <!-- CONTENT GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- LEFT SIDE: SCHEDULE -->
            <section class="xl:col-span-2 bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-[#105666] flex items-center gap-2">
                        <i class="fa-solid fa-calendar-day"></i> Jadwal Hari Ini
                    </h2>
                    <button class="text-[#105666] text-sm font-medium hover:underline">
                        Lihat Semua
                    </button>
                </div>

                <div class="space-y-4">
                    @forelse($jadwalHariIni as $kelas)
                        <div class="flex items-center gap-4 bg-[#F7F4D5] border border-[#e5e7d3] rounded-2xl p-5 transition-all duration-300 ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-1 hover:shadow-md hover:bg-[#f3f0cc]">
                            <!-- Left Accent -->
                            <div class="w-1.5 h-14 rounded-full bg-[#105666]"></div>
                            <!-- Icon -->
                            <div class="w-12 h-12 rounded-xl bg-white shadow-sm flex items-center justify-center">
                                <i class="fa-solid fa-book text-[#105666]"></i>
                            </div>
                            <!-- Info -->
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $kelas->nama_kelas }}</h3>
                                <p class="text-sm text-gray-500 mt-1">
                                    <i class="fa-solid fa-location-dot mr-1 text-[#839958]"></i>
                                    {{ $kelas->ruangan ?? 'Tidak ada ruangan' }}
                                </p>
                            </div>
                            <!-- Time -->
                            <div class="text-right">
                                <p class="font-bold text-[#105666] text-lg">
                                    {{ \Carbon\Carbon::parse($kelas->start_time)->format('H:i') }}
                                </p>
                                <p class="text-xs text-gray-400 flex items-center justify-end gap-1">
                                    <i class="fa-solid fa-clock"></i>
                                    {{ \Carbon\Carbon::now()->translatedFormat('l') }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400">
                            <i class="fa-regular fa-calendar-xmark text-3xl mb-2"></i>
                            <p>Belum ada jadwal hari ini</p>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- RIGHT SIDE: UPCOMING TASKS -->
            <section class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                <h2 class="text-xl font-bold text-[#105666] mb-6 flex items-center gap-2">
                    <i class="fa-solid fa-list-check"></i> Upcoming Tasks
                </h2>

                <div class="space-y-4">
                    @forelse($tugas as $item)
                        <div class="group flex gap-4 bg-[#F7F4D5] border border-[#e5e7d3] rounded-2xl p-4 transition-all duration-300 ease-[cubic-bezier(0.22,1,0.36,1)] hover:-translate-y-1 hover:shadow-md hover:bg-[#f3f0cc]">
                            <!-- Status Accent -->
                            <div class="w-1.5 rounded-full {{ $item->status == 'selesai' ? 'bg-[#839958]' : 'bg-[#D3968C]' }}"></div>

                            <div class="flex-1">
                                <!-- Status Badge & Time -->
                                <div class="flex items-center justify-between mb-3">
                                    @if($item->status == 'selesai')
                                        <span class="flex items-center gap-2 bg-[#839958] text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                                            <i class="fa-solid fa-check text-xs"></i> Selesai
                                        </span>
                                    @else
                                        <span class="flex items-center gap-2 bg-[#D3968C] text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                                            <i class="fa-solid fa-hourglass-half text-xs"></i> Deadline
                                        </span>
                                    @endif
                                    <p class="text-xs text-gray-400 flex items-center gap-1">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($item->deadline)->diffForHumans() }}
                                    </p>
                                </div>

                                <!-- Task Info -->
                                <h3 class="font-semibold text-gray-800 mb-1 leading-snug">{{ $item->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-3 line-clamp-2">{{ $item->deskripsi }}</p>

                                <!-- Card Footer -->
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-[#105666] flex items-center gap-1">
                                        <i class="fa-solid fa-book-open text-xs"></i>
                                        {{ $item->kelas->nama_kelas ?? '-' }}
                                    </p>
                                    <button class="text-sm text-[#105666] font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                        Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-10 text-gray-400">
                            <i class="fa-regular fa-folder-open text-3xl mb-2"></i>
                            <p>Belum ada tugas</p>
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </main>

</body>

</html>