<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">

@include('siswa.navbar')

<main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

    <!-- BACK -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-[#105666]
                  bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100
                  transition hover:shadow-md hover:bg-[#f9fdf8]">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    <!-- HEADER -->
    <div class="bg-gradient-to-br from-[#F7F4D5] via-[#f3f0d0] to-[#f9f6e2] 
                rounded-[30px] p-8 border border-[#ece8c9] mb-8 relative overflow-hidden">

        <!-- ACCENT LINE -->
        <div class="absolute top-0 left-0 w-full h-[4px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

        <!-- GLOW -->
        <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

        <div class="flex flex-col md:flex-row justify-between gap-6 relative z-10">

            <!-- LEFT -->
            <div>

                <p class="text-sm text-[#839958] font-semibold mb-2 tracking-wide">
                    {{ $tugas->kelas->nama_kelas ?? '-' }}
                </p>

                <h1 class="text-3xl md:text-4xl font-extrabold text-[#105666] mb-3 leading-tight">
                    {{ $tugas->judul }}
                </h1>

                <p class="text-gray-600 max-w-xl leading-relaxed">
                    {{ $tugas->deskripsi }}
                </p>

            </div>

            <!-- RIGHT -->
            <div class="flex flex-col items-start md:items-end gap-4">

                <!-- DEADLINE -->
                <div class="bg-white/80 backdrop-blur-sm
                            text-[#D3968C] px-6 py-4 rounded-2xl font-bold 
                            border border-[#f5d0d0]">

                    <p class="text-xs text-gray-400 mb-1">Deadline</p>

                    <p class="text-lg">
                        {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d M Y') }}
                    </p>

                </div>

                <!-- STATUS -->
                @if($tugas->status == 'selesai')

                <div class="px-5 py-2 rounded-full text-sm font-bold 
                            bg-white text-green-700 border border-green-200
                            flex items-center gap-2">

                    <i class="fa-solid fa-circle-check text-green-500"></i>
                    Sudah Dikumpulkan

                </div>

                @else

                <div class="px-5 py-2 rounded-full text-sm font-bold 
                            bg-white text-[#D3968C] border border-[#f5d0d0]
                            flex items-center gap-2">

                    <i class="fa-solid fa-circle-xmark"></i>
                    Belum Dikumpulkan

                </div>

                @endif

            </div>

        </div>

    </div>

    <!-- UPLOAD BOX -->
    <div class="bg-white rounded-[30px] p-8 border border-gray-100 relative overflow-hidden">

    <!-- ACCENT -->
    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] to-[#839958]"></div>

    <!-- GLOW -->
    <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 blur-3xl rounded-full"></div>
    <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

    <!-- HEADER -->
    <div class="flex items-center gap-4 mb-8 relative z-10">

        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-[#F7F4D5] to-[#f1edc8] 
                    flex items-center justify-center text-[#105666] shadow-sm">

            <i class="fa-solid fa-file-arrow-up text-2xl"></i>

        </div>

        <div>
            <h2 class="text-xl font-bold text-[#105666]">
                Upload Jawaban
            </h2>
            <p class="text-gray-400 text-sm">
                PDF, DOCX, ZIP, PNG, JPG
            </p>
        </div>

    </div>

    <!-- FORM -->
    <form action="/tugas/{{ $tugas->id }}/upload"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 relative z-10">

        @csrf

        <!-- FILE LAMA -->
        @if($tugas->file_tugas)
        <div class="bg-gradient-to-r from-[#eef6f6] to-[#f5fbfb] 
                    border border-[#d6e5e5] rounded-2xl p-5">

            <p class="text-sm text-[#105666] font-semibold mb-3 flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-[#839958]"></i>
                File sudah diupload
            </p>

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-file text-[#105666] text-lg"></i>
                    <p class="text-sm text-gray-700 truncate max-w-[200px]">
                        {{ $tugas->file_tugas }}
                    </p>
                </div>

                <a href="{{ asset('storage/tugas/' . $tugas->file_tugas) }}"
                   target="_blank"
                   class="text-[#105666] text-sm font-semibold hover:underline">
                    Lihat
                </a>

            </div>

        </div>
        @endif

        <!-- INPUT FILE -->
        <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 text-center
                    hover:border-[#105666]/40 transition">

            <input type="file"
                   name="file_tugas"
                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 
                          file:rounded-xl file:border-0
                          file:bg-[#105666] file:text-white
                          hover:file:bg-[#0d4b59]">

        </div>

        <!-- BUTTON -->
        <button
            class="w-full py-4 rounded-2xl font-semibold text-white
                bg-gradient-to-r from-[#105666] to-[#0d4b59]
                transition-all duration-300
                hover:bg-[#D3968C] hover:from-[#D3968C] hover:to-[#c98378]
                hover:-translate-y-[2px] hover:shadow-lg
                active:scale-[0.98]">

            {{ $tugas->file_tugas ? 'Update Tugas' : 'Kumpulkan Tugas' }}

        </button>

    </form>
    </div>

</main>

</body>
</html>