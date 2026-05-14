<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelas Saya</title>

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
        <div class="mb-8">

            <h1 class="text-4xl font-bold text-gray-800 mb-2">
                Kelas Saya
            </h1>

            <p class="text-gray-400">
                Daftar kelas yang sedang aktif semester ini
            </p>

        </div>

        <!-- GRID -->
        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-5">

            @forelse($kelas as $item)

            <!-- CARD -->
            <div
                class="bg-white rounded-[30px] p-5 border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 relative overflow-hidden">

                <!-- TOP -->
                <div class="flex items-center justify-between mb-5">

                    <!-- ICON -->
                    <div
                        class="w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center text-white text-xl shadow-lg">

                        <i class="fa-solid fa-book-open-reader"></i>

                    </div>

                    <!-- BADGE -->
                    <div
                        class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full font-semibold">

                        Aktif

                    </div>

                </div>

                <!-- TITLE -->
                <div class="mb-5">

                    <h2 class="text-lg font-bold text-gray-800 leading-tight">

                        {{ $item->nama_kelas }}

                    </h2>

                    <p class="text-sm text-gray-400 mt-1">

                        Tingkat {{ $item->tingkat }}

                    </p>

                </div>

                <!-- INFO -->
                <div class="space-y-3 text-sm">

                    <!-- RUANG -->
                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-500 shrink-0">

                            <i class="fa-solid fa-school"></i>

                        </div>

                        <div>

                            <p class="text-gray-400 text-xs">
                                Ruangan
                            </p>

                            <p class="font-semibold text-gray-700">

                                {{ $item->ruangan ?? '-' }}

                            </p>

                        </div>

                    </div>

                    <!-- JAM -->
                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center text-purple-600 shrink-0">

                            <i class="fa-solid fa-clock"></i>

                        </div>

                        <div>

                            <p class="text-gray-400 text-xs">
                                Jam
                            </p>

                            <p class="font-semibold text-gray-700">

                                {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}
                                -
                                {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}

                            </p>

                        </div>

                    </div>

                    <!-- WALI -->
                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">

                            <i class="fa-solid fa-user"></i>

                        </div>

                        <div>

                            <p class="text-gray-400 text-xs">
                                Wali
                            </p>

                            <p class="font-semibold text-gray-700 truncate">

                                {{ $item->wali_kelas ?? '-' }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <a href="/kelas/{{ $item->id }}"
                    class="mt-6 block text-center w-full bg-black hover:bg-purple-600 text-white py-3 rounded-2xl transition font-medium text-sm">

                    Detail Kelas

                </a>

                <!-- BLUR -->
                <div
                    class="absolute -bottom-16 -right-16 w-32 h-32 bg-purple-300/20 blur-3xl rounded-full">
                </div>

            </div>

            @empty

            <!-- EMPTY -->
            <div class="col-span-full text-center py-20">

                <div
                    class="w-24 h-24 rounded-full bg-purple-100 flex items-center justify-center mx-auto mb-6">

                    <i class="fa-solid fa-book text-4xl text-purple-500"></i>

                </div>

                <h2 class="text-2xl font-bold text-gray-700 mb-2">
                    Belum Ada Kelas
                </h2>

                <p class="text-gray-400">
                    Kelas aktif akan muncul di sini
                </p>

            </div>

            @endforelse

        </div>

    </div>

</body>

</html>