<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Detail Penilaian</title>

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
            <a href="/guru/tugas/{{ $tugas->kelas_id }}"
                class="inline-flex items-center gap-3 mb-6 bg-white hover:bg-gray-100 text-gray-700 px-5 py-3 rounded-2xl shadow-sm transition">

                <i class="fa-solid fa-arrow-left"></i>

                <span>Kembali ke Daftar Tugas</span>

            </a>

            <!-- HEADER -->
            <div class="bg-white rounded-3xl p-7 shadow-sm mb-8">

                <div class="flex items-start justify-between">

                    <div>

                        <h1 class="text-3xl font-bold text-gray-800">
                            {{ $tugas->judul }}
                        </h1>

                        <p class="text-gray-400 mt-3">
                            {{ $tugas->deskripsi }}
                        </p>

                        <div class="flex items-center gap-5 mt-5">

                            <div
                                class="bg-red-100 text-red-600 px-4 py-2 rounded-2xl text-sm font-medium">

                                Deadline:
                                {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}

                            </div>

                            <div
                                class="bg-blue-100 text-blue-600 px-4 py-2 rounded-2xl text-sm font-medium">

                                Total Pengumpulan:
                                {{ count($pengumpulan) }}

                            </div>

                        </div>

                    </div>

                    <!-- DOWNLOAD FILE TUGAS -->
                    <a href="{{ asset('tugas/' . $tugas->file_tugas) }}"
                        target="_blank"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl transition flex items-center gap-3">

                        <i class="fa-solid fa-download"></i>

                        <span>Download Soal</span>

                    </a>

                </div>

            </div>

            <!-- TABLE -->
            <div class="bg-white rounded-3xl p-6 shadow-sm">

                <div class="mb-6">

                    <h2 class="text-2xl font-bold text-gray-800">
                        Daftar Pengumpulan
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Berikan nilai kepada siswa yang sudah mengumpulkan tugas
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b text-left text-gray-400">

                                <th class="pb-4">
                                    Nama Siswa
                                </th>

                                <th class="pb-4">
                                    File
                                </th>

                                <th class="pb-4">
                                    Upload
                                </th>

                                <th class="pb-4">
                                    Nilai
                                </th>

                                <th class="pb-4">
                                    Catatan
                                </th>

                                <th class="pb-4">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($pengumpulan as $item)

                            <tr class="border-b">

                                <!-- NAMA -->
                                <td class="py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-11 h-11 rounded-2xl bg-purple-100 flex items-center justify-center">

                                            <i class="fa-solid fa-user text-purple-600"></i>

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-gray-800">
                                                {{ $item->siswa->name }}
                                            </h3>

                                            <p class="text-sm text-gray-400">
                                                Siswa
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- FILE -->
                                <td>

                                    <a href="{{ asset('tugas/' . $item->file) }}"
                                        target="_blank"
                                        class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-4 py-2 rounded-xl inline-flex items-center gap-2 transition">

                                        <i class="fa-solid fa-download"></i>

                                        <span>Download</span>

                                    </a>

                                </td>

                                <!-- TANGGAL -->
                                <td class="text-gray-500">

                                    {{ $item->created_at->format('d M Y') }}

                                </td>

                                <!-- FORM -->
                                <td colspan="3">

                                    <form action="/guru/nilai/store"
                                        method="POST"
                                        class="flex items-center gap-3">

                                        @csrf

                                        <input type="hidden"
                                            name="pengumpulan_id"
                                            value="{{ $item->id }}">

                                        <!-- NILAI -->
                                        <input type="number"
                                            name="nilai"
                                            value="{{ $item->nilai }}"
                                            placeholder="0-100"
                                            class="bg-gray-100 rounded-xl px-4 py-2 w-24 outline-none">

                                        <!-- CATATAN -->
                                        <input type="text"
                                            name="catatan"
                                            value="{{ $item->catatan }}"
                                            placeholder="Catatan..."
                                            class="bg-gray-100 rounded-xl px-4 py-2 w-full outline-none">

                                        <!-- BUTTON -->
                                        <button
                                            type="submit"
                                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl transition">

                                            Simpan

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="6"
                                    class="py-14 text-center">

                                    <div
                                        class="w-20 h-20 rounded-full bg-gray-100 mx-auto flex items-center justify-center mb-5">

                                        <i class="fa-solid fa-file-circle-xmark text-gray-400 text-3xl"></i>

                                    </div>

                                    <h3 class="text-xl font-bold text-gray-700 mb-2">
                                        Belum Ada Pengumpulan
                                    </h3>

                                    <p class="text-gray-400">
                                        Siswa belum mengupload tugas
                                    </p>

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</body>

</html>