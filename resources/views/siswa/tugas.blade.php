<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumpulan Tugas</title>

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
    <header class="mb-8">
        <div class="w-full bg-gradient-to-br from-[#105666] to-[#0d4b59] rounded-[32px] p-8 md:p-12 
                    flex items-center justify-between shadow-xl relative overflow-hidden">
            
            <!-- GLOW -->
            <div class="absolute top-0 right-0 w-80 h-80 bg-[#839958]/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
            <div class="absolute bottom-0 left-1/3 w-60 h-60 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

            <!-- TEXT -->
            <div class="relative z-10 space-y-2">
                
                <span class="inline-flex items-center gap-2 bg-white/10 text-[#F7F4D5] text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm tracking-wider uppercase">
                    <i class="fa-solid fa-clock text-xs text-[#839958] animate-pulse"></i> Batas Waktu Aktif
                </span>

                <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">
                    Pengumpulan Tugas
                </h1>

                <p class="text-gray-200 text-sm md:text-base font-medium max-w-md">
                    Kumpulkan tugas sesuai dengan batas waktu yang telah diberikan oleh bapak/ibu guru.
                </p>

            </div>

            <!-- ICON -->
            <div class="hidden lg:flex relative z-10 items-center justify-center pr-6">
                <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl shadow-inner flex items-center justify-center border border-white/20 transform rotate-6 hover:rotate-0 transition duration-300">
                    <i class="fa-solid fa-file-arrow-up text-[#F7F4D5] text-4xl"></i>
                </div>
            </div>

        </div>
    </header>

    <!-- SEARCH BAR -->
    <div class="mb-10">

        <div class="relative w-full">

            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

            <input type="text"
                placeholder="Cari tugas..."
                class="w-full pl-11 pr-4 py-3 rounded-2xl 
                    bg-white border border-gray-200 
                    text-gray-700 placeholder-gray-400 
                    shadow-sm
                    focus:outline-none focus:ring-2 focus:ring-[#105666]/30 
                    transition-all">

        </div>

    </div>
        <!-- HORIZONTAL ROW LAYOUT LIST -->
        <section class="space-y-6">

            @forelse($tugas as $item)
                <!-- CARD TUGAS BARU (ROW LAYOUT) -->
                <article class="group bg-white rounded-2xl border border-gray-100 shadow-sm transition-all duration-300 hover:shadow-xl hover:border-gray-200/80 p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                    
                    <!-- Left Stripe Accent -->
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-gradient-to-b from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <!-- KIRI: Informasi Utama Tugas -->
                    <div class="flex items-center gap-5 w-full md:w-2/5 shrink-0">
                        <!-- Icon Badge -->
                        <div class="w-16 h-16 shrink-0 rounded-2xl bg-[#F7F4D5] flex items-center justify-center text-[#105666] shadow-inner transition duration-300 group-hover:scale-105">
                            <i class="fa-solid fa-book text-2xl"></i>
                        </div>
                        <!-- Judul, Deskripsi & Status -->
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-1.5">
                                <h2 class="text-lg font-bold text-gray-800 tracking-tight group-hover:text-[#105666] transition-colors truncate max-w-[180px] sm:max-w-xs">
                                    {{ $item->judul }}
                                </h2>
                                
                                @if($item->status == 'selesai')
                                    <span class="bg-emerald-50 text-emerald-600 text-[10px] px-2.5 py-0.5 rounded-md font-bold uppercase tracking-wider border border-emerald-200/50">
                                        Selesai
                                    </span>
                                @else
                                    <span class="bg-rose-50 text-rose-500 text-[10px] px-2.5 py-0.5 rounded-md font-bold uppercase tracking-wider border border-rose-200/50 animate-pulse">
                                        Belum
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>

                    <!-- TENGAH: Grid Meta Detail (Mata Pelajaran & Deadline) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-8 w-full md:w-auto flex-1 md:px-6">
                        <!-- Detail Mata Pelajaran -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-[#eef6f6] flex items-center justify-center text-[#105666] shrink-0">
                                <i class="fa-solid fa-graduation-cap text-sm"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Mata Pelajaran</p>
                                <p class="font-bold text-gray-700 text-sm truncate">{{ $item->kelas->nama_kelas ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Detail Deadline -->
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-[#fff4f2] flex items-center justify-center text-[#D3968C] shrink-0">
                                <i class="fa-solid fa-calendar-day text-sm"></i>
                            </div>
                            <div class="min-w-0">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-wider">Deadline</p>
                                <p class="font-bold text-rose-500 text-sm whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- KANAN: Action Button -->
                    <div class="w-full md:w-auto pt-4 md:pt-0 border-t border-gray-100 md:border-t-0 shrink-0">
                        <a href="/tugas/{{ $item->id }}"
                           class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#0d4b59] hover:to-[#105666] text-white px-6 py-3 rounded-xl transition-all duration-300 font-bold text-sm shadow-md hover:shadow-lg group/btn">
                            Detail Tugas
                            <i class="fa-solid fa-arrow-right text-xs transition-transform group-hover/btn:translate-x-1"></i>
                        </a>
                    </div>
                </article>

            @empty
                <!-- Empty State -->
                <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200 shadow-sm">
                    <div class="w-20 h-20 rounded-full bg-[#F7F4D5] flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-file-circle-xmark text-3xl text-[#105666]"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-700 mb-1">Belum Ada Tugas</h2>
                    <p class="text-gray-400 text-sm max-w-xs mx-auto">Tugas baru yang diberikan oleh guru akan otomatis muncul di baris list ini.</p>
                </div>
            @endforelse

        </section>
    </main>

</body>

</html>