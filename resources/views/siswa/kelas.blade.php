<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Saya</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- CONTAINER -->
    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <!-- HEADER HERO -->
        <header class="mb-12">
            <div class="w-full bg-gradient-to-br from-[#105666] to-[#0d4b59] rounded-[32px] p-8 md:p-12 flex items-center justify-between shadow-xl relative overflow-hidden">
                
                <!-- Glow Decorative Background -->
                <div class="absolute top-0 right-0 w-80 h-80 bg-[#839958]/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-1/3 w-60 h-60 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

                <!-- Hero Text -->
                <div class="relative z-10 space-y-2">
                    <span class="inline-flex items-center gap-2 bg-white/10 text-[#F7F4D5] text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm tracking-wider uppercase">
                        <i class="fa-solid fa-circle-check text-xs text-[#839958] animate-pulse"></i> Akademik Aktif
                    </span>
                    <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">Kelas Saya</h1>
                    <p class="text-gray-200 text-sm md:text-base font-medium max-w-md">Daftar ruang lingkup materi, jadwal pelajaran, dan wali kelas yang sedang berjalan aktif semester ini.</p>
                </div>

                <!-- Hero Visual Icon -->
                <div class="hidden lg:flex relative z-10 items-center justify-center pr-6">
                    <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl shadow-inner flex items-center justify-center border border-white/20 transform rotate-6 hover:rotate-0 transition duration-300">
                        <i class="fa-solid fa-graduation-cap text-[#F7F4D5] text-4xl"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- HORIZONTAL ROW LAYOUT LIST -->
        <section class="space-y-6">

            @forelse($kelas as $item)
                <!-- CARD KELAS BARU (ROW LAYOUT) -->
                <article class="group bg-white rounded-2xl border border-gray-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:border-gray-200/80 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                    
                    <!-- Left Stripe Accent -->
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gradient-to-b from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <!-- KIRI: Informasi Utama Kelas -->
                    <div class="flex items-center gap-5 w-full md:w-auto">
                        <!-- Icon Badge -->
                        <div class="w-16 h-16 shrink-0 rounded-2xl bg-[#F7F4D5] flex items-center justify-center text-[#105666] shadow-inner transition duration-300 group-hover:scale-105">
                            <i class="fa-solid fa-book-open-reader text-2xl"></i>
                        </div>
                        <!-- Judul & Status -->
                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-2 mb-1.5">
                                <h2 class="text-xl font-bold text-gray-800 tracking-tight group-hover:text-[#105666] transition-colors truncate">
                                    {{ $item->nama_kelas }}
                                </h2>
                                <span class="bg-emerald-50 text-emerald-600 text-[10px] px-2.5 py-0.5 rounded-md font-bold uppercase tracking-wider border border-emerald-200/50">
                                    Aktif
                                </span>
                            </div>
                            <p class="inline-flex items-center gap-1.5 text-xs text-gray-500 font-semibold bg-gray-100 px-2.5 py-1 rounded-lg">
                                <i class="fa-solid fa-layer-group text-[#839958]"></i> Tingkat {{ $item->tingkat }}
                            </p>
                        </div>
                    </div>

                    <!-- TENGAH: Grid Meta Detail (Jadwal, Ruang, Guru) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-8 w-full md:w-auto flex-1 md:px-6">
                        <!-- Detail Ruangan -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-[#fff4f2] flex items-center justify-center text-[#D3968C] shrink-0">
                                <i class="fa-solid fa-school text-sm"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Ruangan</p>
                                <p class="font-bold text-gray-700 text-sm truncate">{{ $item->ruangan ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Detail Waktu -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-[#eef6f6] flex items-center justify-center text-[#105666] shrink-0">
                                <i class="fa-solid fa-clock text-sm"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Jam Pelajaran</p>
                                <p class="font-bold text-gray-700 text-sm whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Detail Wali Kelas -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-[#fff1f1] flex items-center justify-center text-[#D3968C] shrink-0">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Wali Kelas</p>
                                <p class="font-bold text-gray-700 text-sm truncate">{{ $item->wali_kelas ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- KANAN: ACTION BUTTON -->
                    <div class="w-full md:w-auto pt-4 md:pt-0 border-t border-gray-100 md:border-t-0 shrink-0">

                        <a href="/kelas/{{ $item->id }}"
                        class="group/btn w-full md:w-auto inline-flex items-center justify-center gap-2
                                px-6 py-3 rounded-xl font-semibold text-sm text-white
                                bg-[#105666]
                                transition-all duration-300
                                hover:bg-[#D3968C] hover:shadow-lg hover:-translate-y-[2px]
                                active:scale-[0.98]">

                            Masuk Kelas

                            <i class="fa-solid fa-arrow-right text-xs
                                    transition-transform duration-300
                                    group-hover/btn:translate-x-1"></i>

                        </a>

                    </div>
                </article>

            @empty
                <!-- Empty State -->
                <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200 shadow-sm">
                    <div class="w-20 h-20 rounded-full bg-[#F7F4D5] flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-folder-open text-3xl text-[#105666]"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-700 mb-1">Belum Ada Kelas Terdaftar</h2>
                    <p class="text-gray-400 text-sm max-w-xs mx-auto">Kelas aktif yang kamu ikuti akan otomatis muncul di baris list ini.</p>
                </div>
            @endforelse

        </section>
    </main>

</body>

</html>