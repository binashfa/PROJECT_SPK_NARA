<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pengumpulan Tugas</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-[#eef2ff] via-[#f8fafc] to-[#dcfce7] min-h-screen overflow-y-auto">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <div class="p-6 h-screen">

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-8">

            <!-- LEFT -->
            <div>

                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Pengumpulan Tugas
                </h1>

                <p class="text-sm text-gray-500">
                    Kumpulkan tugas sesuai deadline yang telah diberikan
                </p>

            </div>

            <!-- SEARCH -->
            <div class="relative">

                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                <input type="text"
                    placeholder="Cari tugas..."
                    class="pl-11 pr-4 py-3 rounded-2xl bg-white/70 border border-white/50 outline-none focus:ring-2 focus:ring-purple-500 w-72">

            </div>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 overflow-y-auto pr-2 custom-scroll pb-10 flex-1">

            @forelse($tugas as $item)

            <!-- CARD -->
            <div class="bg-white/70 backdrop-blur-xl border border-white/60 rounded-[32px] p-6 shadow-lg hover:shadow-2xl hover:-translate-y-1 transition duration-300 relative overflow-hidden flex flex-col">

                <!-- TOP -->
                <div class="flex items-start justify-between mb-6">

                    <!-- ICON -->
                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-purple-500 to-violet-600 text-white flex items-center justify-center text-2xl shadow-lg">

                        <i class="fa-solid fa-book"></i>

                    </div>

                    <!-- STATUS -->
                    @if($item->status == 'selesai')

                    <div class="bg-green-100 text-green-600 text-xs px-4 py-2 rounded-full font-semibold">
                        Selesai
                    </div>

                    @else

                    <div class="bg-red-100 text-red-500 text-xs px-4 py-2 rounded-full font-semibold">
                        Belum
                    </div>

                    @endif

                </div>

                <!-- TITLE -->
                <div class="mb-5">

                    <h2 class="text-2xl font-bold text-gray-800 leading-tight mb-3">

                        {{ $item->judul }}

                    </h2>

                    <p class="text-sm text-gray-500 leading-relaxed line-clamp-4">

                        {{ $item->deskripsi }}

                    </p>

                </div>

                <!-- INFO -->
                <div class="mt-auto space-y-4">

                    <!-- DEADLINE -->
                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs text-gray-400 mb-1">
                                Deadline
                            </p>

                            <p class="font-semibold text-red-500">

                                {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}

                            </p>

                        </div>

                        <div class="text-right">

                            <p class="text-xs text-gray-400 mb-1">
                                Mata Pelajaran
                            </p>

                            <p class="font-semibold text-purple-600">

                                {{ $item->kelas->nama_kelas ?? '-' }}

                            </p>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="/tugas/{{ $item->id }}"
                        class="block text-center w-full bg-black hover:bg-purple-600 text-white py-3 rounded-2xl transition font-medium">

                        Detail Tugas

                    </a>

                </div>

                <!-- BLUR -->
                <div class="absolute -bottom-20 -right-20 w-44 h-44 bg-purple-300/20 blur-3xl rounded-full"></div>

            </div>

            @empty

            <!-- EMPTY -->
            <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">

                <div class="w-24 h-24 rounded-full bg-purple-100 flex items-center justify-center mb-6">

                    <i class="fa-solid fa-file-circle-xmark text-4xl text-purple-500"></i>

                </div>

                <h2 class="text-2xl font-bold text-gray-700 mb-2">
                    Belum Ada Tugas
                </h2>

                <p class="text-gray-400">
                    Tugas yang diberikan guru akan muncul di sini
                </p>

            </div>

            @endforelse

        </div>

    </div>

</body>

<style>
    .custom-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scroll::-webkit-scrollbar-thumb {
        background: #c4b5fd;
        border-radius: 999px;
    }

    .custom-scroll::-webkit-scrollbar-track {
        background: transparent;
    }
</style>

</html>