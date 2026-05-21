<form action="/guru/absensi/store" method="POST">

    @csrf

    <input type="hidden"
        name="kelas_id"
        value="{{ $kelas->id }}">

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">

        <title>Absensi Siswa</title>

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

                <!-- BACK BUTTON -->
                <a href="/guru/kelas/{{ $kelas->id }}"
                    class="inline-flex items-center gap-3 mb-6 bg-white hover:bg-gray-100 text-gray-700 px-5 py-3 rounded-2xl shadow-sm transition">

                    <i class="fa-solid fa-arrow-left"></i>

                    <span>Kembali ke Detail Kelas</span>

                </a>

                <!-- HEADER -->
                <div class="flex items-center justify-between mb-8">

                    <div>

                        <h1 class="text-3xl font-bold text-gray-800 mb-2">
                            Absensi Siswa
                        </h1>

                        <p class="text-gray-400">
                            Kelola kehadiran siswa di kelas
                        </p>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-2xl text-sm font-medium transition flex items-center gap-3">

                        <i class="fa-solid fa-check"></i>

                        <span>Simpan Absensi</span>

                    </button>

                </div>

                <!-- TOP -->
                <div class="grid grid-cols-4 gap-5 mb-8">

                    <!-- HADIR -->
                    <div class="bg-white rounded-3xl p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-400">
                                    Hadir
                                </p>

                                <h2 class="text-3xl font-bold text-green-600 mt-2">
                                    28
                                </h2>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                                <i class="fa-solid fa-circle-check text-green-600 text-xl"></i>

                            </div>

                        </div>

                    </div>

                    <!-- IZIN -->
                    <div class="bg-white rounded-3xl p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-400">
                                    Izin
                                </p>

                                <h2 class="text-3xl font-bold text-yellow-500 mt-2">
                                    2
                                </h2>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center">

                                <i class="fa-solid fa-envelope-open-text text-yellow-500 text-xl"></i>

                            </div>

                        </div>

                    </div>

                    <!-- SAKIT -->
                    <div class="bg-white rounded-3xl p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-400">
                                    Sakit
                                </p>

                                <h2 class="text-3xl font-bold text-blue-500 mt-2">
                                    1
                                </h2>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                                <i class="fa-solid fa-notes-medical text-blue-500 text-xl"></i>

                            </div>

                        </div>

                    </div>

                    <!-- ALPHA -->
                    <div class="bg-white rounded-3xl p-5 shadow-sm">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-sm text-gray-400">
                                    Alpha
                                </p>

                                <h2 class="text-3xl font-bold text-red-500 mt-2">
                                    1
                                </h2>

                            </div>

                            <div
                                class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center">

                                <i class="fa-solid fa-circle-xmark text-red-500 text-xl"></i>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="bg-white rounded-3xl p-6 shadow-sm">

                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Daftar Siswa
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Input absensi siswa hari ini
                            </p>

                        </div>

                        <!-- DATE -->
                        <div class="flex items-center gap-3">

                            <label class="text-sm text-gray-500">
                                Tanggal:
                            </label>

                            <input type="date"
                                name="tanggal"
                                value="{{ $tanggal }}"
                                onchange="window.location='?tanggal='+this.value"
                                class="bg-purple-50 text-purple-600 px-4 py-3 rounded-2xl">

                        </div>

                    </div>

                    <!-- TABLE -->
                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead>

                                <tr class="border-b text-left text-gray-400">

                                    <th class="pb-4 font-medium">
                                        No
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Nama Siswa
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Status
                                    </th>

                                    <th class="pb-4 font-medium">
                                        Keterangan
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="text-gray-700">

                                @foreach($siswa as $item)

                                <tr class="border-b">

                                    <!-- NO -->
                                    <td class="py-5">
                                        {{ $loop->iteration }}
                                    </td>

                                    <!-- NAMA -->
                                    <td>

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-11 h-11 rounded-2xl bg-purple-100 flex items-center justify-center">

                                                <i class="fa-solid fa-user text-purple-600"></i>

                                            </div>

                                            <div>

                                                <h3 class="font-semibold">

                                                    {{ $item->name }}

                                                </h3>

                                                <p class="text-sm text-gray-400">
                                                    Siswa
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- STATUS -->
                                    <td>

                                        <select
                                            name="status[{{ $item->id }}]"
                                            class="bg-gray-100 rounded-xl px-4 py-2 outline-none w-full">

                                            @php
                                            $statusLama = $dataAbsensi[$item->id]->status ?? 'hadir';
                                            @endphp

                                            <option value="hadir"
                                                {{ $statusLama == 'hadir' ? 'selected' : '' }}>
                                                Hadir
                                            </option>

                                            <option value="izin"
                                                {{ $statusLama == 'izin' ? 'selected' : '' }}>
                                                Izin
                                            </option>

                                            <option value="sakit"
                                                {{ $statusLama == 'sakit' ? 'selected' : '' }}>
                                                Sakit
                                            </option>

                                            <option value="alpha"
                                                {{ $statusLama == 'alpha' ? 'selected' : '' }}>
                                                Alpha
                                            </option>

                                        </select>
                                    </td>

                                    <!-- KETERANGAN -->
                                    <td>

                                        <input type="text"
                                            name="keterangan[{{ $item->id }}]"
                                            value="{{ $dataAbsensi[$item->id]->keterangan ?? '' }}"
                                            placeholder="Tambahkan catatan..."
                                            class="bg-gray-100 rounded-xl px-4 py-2 w-full outline-none">

                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </body>

    </html>

</form>