<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Detail Tugas</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f7] min-h-screen">

    @include('siswa.navbar')

    <div class="p-8">

        <div class="max-w-4xl mx-auto bg-white rounded-[35px] shadow-sm p-8">

            <!-- HEADER -->
            <div class="flex items-start justify-between mb-8">

                <div>

                    <p class="text-sm text-purple-600 font-semibold mb-2">
                        {{ $tugas->kelas->nama_kelas ?? '-' }}
                    </p>

                    <h1 class="text-4xl font-bold text-gray-800 mb-3">
                        {{ $tugas->judul }}
                    </h1>

                    <p class="text-gray-500 leading-relaxed">
                        {{ $tugas->deskripsi }}
                    </p>

                </div>

                <div class="bg-red-100 text-red-500 px-5 py-3 rounded-2xl font-semibold">

                    {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d M Y') }}

                </div>

            </div>

            <!-- BOX -->
            <div class="bg-gray-50 rounded-3xl p-6 mb-8">

                <div class="flex items-center gap-4 mb-5">

                    <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">

                        <i class="fa-solid fa-file text-purple-600 text-2xl"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-gray-800">
                            Upload Jawaban Tugas
                        </h2>

                        <p class="text-gray-400 text-sm">
                            PDF, DOCX, ZIP, PNG, JPG
                        </p>

                    </div>

                </div>

                <!-- FORM -->
                <form action="/tugas/{{ $tugas->id }}/upload"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <!-- FILE LAMA -->
                    @if($tugas->file_tugas)

                    <div class="mb-5 bg-green-50 border border-green-200 rounded-2xl p-4">

                        <p class="text-sm text-green-700 font-medium mb-2">
                            File tugas sudah diupload
                        </p>

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                <i class="fa-solid fa-file text-green-600"></i>

                                <p class="text-sm text-gray-700">
                                    {{ $tugas->file_tugas }}
                                </p>

                            </div>

                            <a href="{{ asset('storage/tugas/' . $tugas->file_tugas) }}"
                                target="_blank"
                                class="text-purple-600 text-sm font-semibold">

                                Lihat File

                            </a>

                        </div>

                    </div>

                    @endif

                    <!-- INPUT -->
                    <input type="file"
                        name="file_tugas"
                        class="w-full border border-gray-200 rounded-2xl p-4 bg-white mb-5">

                    <!-- BUTTON -->
                    <button
                        class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-2xl font-semibold transition">

                        {{ $tugas->file_tugas ? 'Update Tugas' : 'Kumpulkan Tugas' }}

                    </button>

                </form>

            </div>

            <!-- STATUS -->
            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-400 mb-1">
                        Status
                    </p>

                    @if($tugas->status == 'selesai')

                    <div class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm inline-block">
                        Sudah Dikumpulkan
                    </div>

                    @else

                    <div class="bg-red-100 text-red-500 px-4 py-2 rounded-full text-sm inline-block">
                        Belum Dikumpulkan
                    </div>

                    @endif

                </div>

                <a href="/pengumpulan-tugas"
                    class="text-purple-600 font-semibold">

                    ← Kembali

                </a>

            </div>

        </div>

    </div>

</body>

</html>