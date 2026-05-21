<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Kelas Guru</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f7] min-h-screen">

    <div class="flex">

        <!-- SIDEBAR -->
        @include('guru.sidebar')

        <!-- MAIN -->
        <div class="flex-1 p-8 overflow-y-auto">

            <!-- HEADER -->
            <div class="mb-8">

                <h1 class="text-3xl font-bold text-gray-800 mb-2">
                    Kelas Guru
                </h1>

                <p class="text-gray-400">
                    Pilih kelas yang ingin dikelola
                </p>

            </div>

            <!-- KELAS -->
            <div class="grid grid-cols-3 gap-6">

                @foreach($kelas as $item)

                <!-- CARD -->
                <a href="/guru/kelas/{{ $item->id }}"
                    class="bg-white rounded-3xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 border border-transparent hover:border-purple-200">

                    <!-- TOP -->
                    <div class="flex items-start justify-between mb-5">

                        <!-- ICON -->
                        <div
                            class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-book-open text-2xl text-purple-600"></i>

                        </div>

                        <!-- BADGE -->
                        <span
                            class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-semibold">

                            Kelas {{ $item->tingkat }}

                        </span>

                    </div>

                    <!-- TITLE -->
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">

                        {{ $item->nama_kelas }}

                    </h2>

                    <!-- INFO -->
                    <div class="space-y-3 mt-5 text-sm text-gray-500">

                        <!-- WALI -->
                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-user text-purple-500"></i>

                            <span>

                                {{ $item->wali_kelas }}

                            </span>

                        </div>

                        <!-- JAM -->
                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-clock text-blue-500"></i>

                            <span>

                                {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}

                                -

                                {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}

                            </span>

                        </div>

                        <!-- RUANG -->
                        <div class="flex items-center gap-3">

                            <i class="fa-solid fa-location-dot text-red-400"></i>

                            <span>

                                {{ $item->ruangan }}

                            </span>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <div
                        class="mt-6 bg-purple-600 hover:bg-purple-700 text-white text-center py-3 rounded-2xl font-medium transition">

                        Masuk Kelas

                    </div>

                </a>

                @endforeach

            </div>

        </div>

    </div>

</body>

</html>