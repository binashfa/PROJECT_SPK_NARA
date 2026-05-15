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

    <!-- MAIN CONTAINER -->
    <main class="max-w-7xl mx-auto px-6 pt-[70px] pb-16">

        <!-- HEADER HERO -->
        <header class="mb-10">
            <div class="w-full bg-[#F7F4D5] rounded-3xl px-10 py-10 flex items-center justify-between shadow-sm border border-[#ece8c9] relative overflow-hidden">
                
                <!-- Glow Decorative Background -->
                <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

                <!-- Hero Text -->
                <div class="relative z-10">
                    <h1 class="text-4xl font-bold text-[#105666] mb-2">Kelas Saya</h1>
                    <p class="text-gray-600">Daftar kelas yang sedang aktif semester ini</p>
                </div>

                <!-- Hero Visual Icon -->
                <div class="hidden md:flex relative z-10 items-center justify-center">
                    <div class="w-20 h-20 bg-white rounded-2xl shadow-sm flex items-center justify-center">
                        <i class="fa-solid fa-book-open text-[#105666] text-3xl"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- GRID KELAS -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($kelas as $item)
                <!-- CARD KELAS -->
                <article class="group bg-white rounded-3xl p-6 border border-gray-100 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl relative overflow-hidden">
                    
                    <!-- Accent Gradient Line -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <!-- Card Header (Icon & Status) -->
                    <div class="flex items-center justify-between mb-5">
                        <div class="w-14 h-14 rounded-2xl bg-[#F7F4D5] flex items-center justify-center text-[#105666] shadow-sm">
                            <i class="fa-solid fa-book-open-reader text-lg"></i>
                        </div>
                        <span class="bg-[#D3968C]/20 text-[#D3968C] text-xs px-3 py-1 rounded-full font-semibold uppercase tracking-wider">
                            Aktif
                        </span>
                    </div>

                    <!-- Course Title -->
                    <div class="mb-5">
                        <h2 class="text-lg font-bold text-gray-800 leading-tight group-hover:text-[#105666] transition-colors">
                            {{ $item->nama_kelas }}
                        </h2>
                        <p class="text-sm text-gray-400 mt-1 font-medium">Tingkat {{ $item->tingkat }}</p>
                    </div>

                    <!-- Info Details -->
                    <div class="space-y-4 text-sm">
                        <!-- Room Info -->
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#fff4f2] flex items-center justify-center text-[#D3968C]">
                                <i class="fa-solid fa-school"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-tighter">Ruangan</p>
                                <p class="font-semibold text-gray-700">{{ $item->ruangan ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Schedule Info -->
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#eef6f6] flex items-center justify-center text-[#105666]">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-tighter">Jam Pelajaran</p>
                                <p class="font-semibold text-gray-700">
                                    {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}
                                </p>
                            </div>
                        </div>

                        <!-- Teacher Info -->
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#fff1f1] flex items-center justify-center text-[#D3968C]">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-gray-400 text-[10px] uppercase font-bold tracking-tighter">Wali Kelas</p>
                                <p class="font-semibold text-gray-700 truncate">{{ $item->wali_kelas ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <a href="/kelas/{{ $item->id }}"
                       class="mt-8 block text-center w-full bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#0d4b59] hover:to-[#105666] text-white py-3.5 rounded-2xl transition-all duration-300 font-bold text-sm shadow-md hover:shadow-lg">
                        Detail Kelas
                    </a>

                    <!-- Decorative Bottom Glows -->
                    <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/20 blur-3xl rounded-full pointer-events-none"></div>
                    <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 blur-3xl rounded-full pointer-events-none"></div>
                </article>

            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-dashed border-gray-200">
                    <div class="w-24 h-24 rounded-full bg-[#F7F4D5] flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <i class="fa-solid fa-book text-4xl text-[#105666]"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Kelas</h2>
                    <p class="text-gray-400 max-w-xs mx-auto">Kelas aktif yang kamu ikuti akan muncul di daftar ini.</p>
                </div>
            @endforelse

        </section>
    </main>

</body>

</html>