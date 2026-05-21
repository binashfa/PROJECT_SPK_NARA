<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Pengumpulan Tugas</title>

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

            <!-- BACK -->
            <a href="/guru/kelas/{{ $kelas->id }}"
                class="inline-flex items-center gap-3 mb-6 bg-white hover:bg-gray-100 text-gray-700 px-5 py-3 rounded-2xl shadow-sm transition">

                <i class="fa-solid fa-arrow-left"></i>

                <span>Kembali ke Detail Kelas</span>

            </a>

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-8">

                <div>

                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        Pengumpulan Tugas
                    </h1>

                    <p class="text-gray-400">
                        Kelola tugas dan nilai siswa
                    </p>

                </div>

                <!-- BUTTON -->
                <button
                    onclick="document.getElementById('modalTugas').classList.remove('hidden')"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl text-sm font-medium transition flex items-center gap-3">

                    <i class="fa-solid fa-plus"></i>

                    <span>Tambah Tugas</span>

                </button>

            </div>

            <!-- CARD INFO -->
            <div class="grid grid-cols-3 gap-5 mb-8">

                <!-- TOTAL -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Total Tugas
                            </p>

                            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                                {{ count($tugas) }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-file text-purple-600 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- KELAS -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Kelas
                            </p>

                            <h2 class="text-2xl font-bold text-blue-600 mt-2">
                                {{ $kelas->nama_kelas }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                            <i class="fa-solid fa-school text-blue-600 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- SISWA -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Total Pengumpulan
                            </p>

                            <h2 class="text-3xl font-bold text-green-600 mt-2">
                                {{ count($pengumpulan ?? []) }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                            <i class="fa-solid fa-upload text-green-600 text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- LIST TUGAS -->
            <!-- LIST TUGAS -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                @forelse($tugas as $item)

                <!-- CARD -->
                <div class="bg-white rounded-3xl p-6 shadow-sm">

                    <!-- TOP -->
                    <div class="flex items-start justify-between mb-5">

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $item->judul }}
                            </h2>

                            <p class="text-gray-400 mt-2">
                                {{ $item->deskripsi }}
                            </p>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-file-lines text-purple-600 text-xl"></i>

                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="space-y-3 mb-6">

                        <!-- DEADLINE -->
                        <div
                            class="flex items-center gap-3 text-sm text-red-500">

                            <i class="fa-solid fa-calendar-days"></i>

                            <span>
                                Deadline:
                                {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}
                            </span>

                        </div>

                        <!-- FILE -->
                        <div
                            class="flex items-center gap-3 text-sm text-blue-600">

                            <i class="fa-solid fa-file-arrow-down"></i>

                            <a href="{{ asset('tugas/' . $item->file_tugas) }}"
                                target="_blank"
                                class="hover:underline">

                                Download File Tugas

                            </a>

                        </div>

                        <!-- TOTAL -->
                        <div
                            class="flex items-center gap-3 text-sm text-green-600">

                            <i class="fa-solid fa-upload"></i>

                            <span>
                                {{
                        $pengumpulan
                        ->where('tugas_id', $item->id)
                        ->count()
                    }}
                                siswa mengumpulkan
                            </span>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <a href="/guru/tugas/detail/{{ $item->id }}"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-2xl font-semibold transition flex items-center justify-center gap-3">

                        <i class="fa-solid fa-eye"></i>

                        <span>Lihat Penilaian</span>

                    </a>

                </div>

                @empty

                <!-- EMPTY -->
                <div
                    class="col-span-2 bg-white rounded-3xl p-12 shadow-sm text-center">

                    <div
                        class="w-20 h-20 rounded-full bg-purple-100 mx-auto flex items-center justify-center mb-5">

                        <i class="fa-solid fa-file-circle-xmark text-purple-600 text-3xl"></i>

                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-2">
                        Belum Ada Tugas
                    </h2>

                    <p class="text-gray-400">
                        Tambahkan tugas pertama untuk kelas ini
                    </p>

                </div>

                @endforelse

            </div>

        </div>

    </div>

    <!-- MODAL -->
    <div id="modalTugas"
        class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-xl rounded-3xl p-7">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Tambah Tugas
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Buat tugas baru untuk siswa
                    </p>

                </div>

                <!-- CLOSE -->
                <button
                    onclick="document.getElementById('modalTugas').classList.add('hidden')"
                    class="w-11 h-11 rounded-2xl bg-gray-100 hover:bg-gray-200 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            <!-- FORM -->
            <form action="/guru/tugas/store"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5">

                @csrf

                <input type="hidden"
                    name="kelas_id"
                    value="{{ $kelas->id }}">

                <!-- JUDUL -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        Judul Tugas
                    </label>

                    <input type="text"
                        name="judul"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none">

                </div>

                <!-- DESKRIPSI -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none"></textarea>

                </div>

                <!-- DEADLINE -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        Deadline
                    </label>

                    <input type="date"
                        name="deadline"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none">

                </div>

                <!-- FILE -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        File Tugas
                    </label>

                    <input type="file"
                        name="file_tugas"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none">

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white py-4 rounded-2xl font-semibold transition">

                    Simpan Tugas

                </button>

            </form>

        </div>

    </div>

</body>

</html>