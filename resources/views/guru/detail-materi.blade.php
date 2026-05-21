<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Materi Kelas</title>

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
                        Materi Kelas
                    </h1>

                    <p class="text-gray-400">
                        Upload dan kelola materi pembelajaran
                    </p>

                </div>

                <!-- BUTTON -->
                <button
                    onclick="document.getElementById('modalMateri').classList.remove('hidden')"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl text-sm font-medium transition flex items-center gap-3">

                    <i class="fa-solid fa-plus"></i>

                    <span>Tambah Materi</span>

                </button>

            </div>

            <!-- CARD INFO -->
            <div class="grid grid-cols-3 gap-5 mb-8">

                <!-- TOTAL -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Total Materi
                            </p>

                            <h2 class="text-3xl font-bold text-purple-600 mt-2">
                                {{ count($materi) }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                            <i class="fa-solid fa-book text-purple-600 text-xl"></i>

                        </div>

                    </div>

                </div>

                <!-- KELAS -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Nama Kelas
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

                <!-- TINGKAT -->
                <div class="bg-white rounded-3xl p-5 shadow-sm">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-400">
                                Tingkat
                            </p>

                            <h2 class="text-3xl font-bold text-green-600 mt-2">
                                {{ $kelas->tingkat }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                            <i class="fa-solid fa-layer-group text-green-600 text-xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- LIST MATERI -->
            <div class="bg-white rounded-3xl p-6 shadow-sm">

                <!-- TITLE -->
                <div class="mb-6">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Materi
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Semua materi yang telah diupload
                    </p>

                </div>

                <!-- LIST -->
                <div class="space-y-4">

                    @forelse($materi as $item)

                    <!-- ITEM -->
                    <div
                        class="border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition rounded-3xl p-5">

                        <div class="flex items-center justify-between">

                            <!-- LEFT -->
                            <div class="flex items-center gap-4">

                                <div
                                    class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                                    <i class="fa-solid fa-file-lines text-purple-600 text-xl"></i>

                                </div>

                                <div>

                                    <h3 class="text-lg font-semibold text-gray-800">

                                        {{ $item->judul }}

                                    </h3>

                                    <p class="text-sm text-gray-400 mt-1">

                                        {{ $item->deskripsi }}

                                    </p>

                                    <p class="text-xs text-gray-400 mt-2">

                                        Upload:
                                        {{ $item->created_at->format('d M Y') }}

                                    </p>

                                </div>

                            </div>

                            <!-- RIGHT -->
                            <div class="flex items-center gap-3">

                                <!-- DOWNLOAD -->
                                <a href="{{ asset('materi/' . $item->file) }}"
                                    target="_blank"
                                    class="bg-blue-100 hover:bg-blue-200 text-blue-600 w-11 h-11 rounded-2xl flex items-center justify-center transition">

                                    <i class="fa-solid fa-download"></i>

                                </a>

                                <!-- DELETE -->
                                <a href="/guru/materi/delete/{{ $item->id }}"
                                    class="bg-red-100 hover:bg-red-200 text-red-600 w-11 h-11 rounded-2xl flex items-center justify-center transition">

                                    <i class="fa-solid fa-trash"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                    @empty

                    <!-- EMPTY -->
                    <div
                        class="border-2 border-dashed border-gray-200 rounded-3xl p-10 text-center">

                        <div
                            class="w-20 h-20 rounded-full bg-purple-100 mx-auto flex items-center justify-center mb-5">

                            <i class="fa-solid fa-book text-purple-600 text-3xl"></i>

                        </div>

                        <h3 class="text-xl font-bold text-gray-700 mb-2">
                            Belum Ada Materi
                        </h3>

                        <p class="text-gray-400">
                            Upload materi pertama untuk kelas ini
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

    <!-- MODAL -->
    <div id="modalMateri"
        class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">

        <div class="bg-white w-full max-w-xl rounded-3xl p-7">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Upload Materi
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Tambahkan materi pembelajaran baru
                    </p>

                </div>

                <!-- CLOSE -->
                <button
                    onclick="document.getElementById('modalMateri').classList.add('hidden')"
                    class="w-11 h-11 rounded-2xl bg-gray-100 hover:bg-gray-200 transition">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            <!-- FORM -->
            <form action="/guru/materi/store"
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
                        Judul Materi
                    </label>

                    <input type="text"
                        name="judul"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none"
                        placeholder="Masukkan judul materi">

                </div>

                <!-- DESKRIPSI -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="4"
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none"
                        placeholder="Masukkan deskripsi materi"></textarea>

                </div>

                <!-- FILE -->
                <div>

                    <label class="text-sm text-gray-500 block mb-2">
                        Upload File
                    </label>

                    <input type="file"
                        name="file"
                        required
                        class="w-full bg-gray-100 rounded-2xl px-5 py-4 outline-none">

                </div>

                <!-- BUTTON -->
                <button
                    type="submit"
                    class="w-full bg-purple-600 hover:bg-purple-700 text-white py-4 rounded-2xl font-semibold transition">

                    Upload Materi

                </button>

            </form>

        </div>

    </div>

</body>

</html>