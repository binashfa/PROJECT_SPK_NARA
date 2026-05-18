<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">

    @include('siswa.navbar')

    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <header class="mb-12">
            <div class="w-full bg-gradient-to-br from-[#105666] to-[#0d4b59] rounded-[32px] p-8 md:p-12 flex items-center justify-between shadow-lg relative overflow-hidden">
                
                <div class="absolute top-0 right-0 w-80 h-80 bg-[#839958]/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-1/3 w-60 h-60 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

                <div class="relative z-10 space-y-2">

                    <span class="inline-flex items-center gap-2 bg-white/10 text-[#F7F4D5] text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm tracking-wider uppercase">
                        <i class="fa-solid fa-gear text-xs text-[#839958] animate-spin-slow"></i>
                        Pengaturan Akun
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">
                        Settings
                    </h1>

                    <p class="text-gray-200 text-sm md:text-base font-medium max-w-md">
                        Kelola informasi akun, keamanan, dan preferensi aplikasi sesuai kebutuhanmu.
                    </p>

                </div>

                <div class="hidden lg:flex relative z-10 items-center justify-center pr-6">
                    <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl shadow-inner flex items-center justify-center border border-white/20 transform rotate-6 hover:rotate-0 transition duration-300">
                        <i class="fa-solid fa-user-gear text-[#F7F4D5] text-4xl"></i>
                    </div>
                </div>

            </div>
        </header>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 items-start">

            <div class="xl:col-span-1">

                <div class="group bg-white rounded-[30px] p-8 border border-gray-100 
                            shadow-sm transition-all duration-300 
                            hover:shadow-lg hover:-translate-y-[3px] relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] 
                                bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#105666]/10 blur-3xl rounded-full"></div>
                    <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

                    <div class="flex flex-col items-center text-center relative z-10">

                        <div class="w-28 h-28 rounded-full 
                                   bg-gradient-to-br from-[#105666] to-[#0d4b59]
                                   flex items-center justify-center 
                                   text-white text-4xl font-bold shadow-md mb-5
                                   transition group-hover:scale-105">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                        <h2 class="text-2xl font-bold text-[#105666] mb-1">

                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-gray-400 text-sm mb-6">

                            {{ Auth::user()->email }}

                        </p>

                        <div class="bg-[#eef6f6] text-[#105666] px-5 py-2 rounded-full text-sm font-medium
                                   transition group-hover:bg-[#105666] group-hover:text-white">

                            Siswa Aktif

                        </div>

                    </div>

                    <div class="mt-8 space-y-4 relative z-10">

                        <div class="flex items-center justify-between border border-gray-100 rounded-2xl p-4
                                    transition-all duration-300 hover:bg-[#f9fdf8] hover:border-[#839958]/40">

                            <div class="flex items-center gap-3">

                                <div class="w-12 h-12 rounded-2xl bg-[#eef6f6] flex items-center justify-center 
                                           text-[#105666] transition group-hover:bg-[#105666] group-hover:text-white">

                                    <i class="fa-solid fa-school"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-400">
                                        Role
                                    </p>

                                    <h3 class="font-semibold text-gray-800">
                                        Siswa
                                    </h3>

                                </div>

                            </div>

                        </div>

                        <div class="flex items-center justify-between border border-gray-100 rounded-2xl p-4
                                    transition-all duration-300 hover:bg-[#fff7f6] hover:border-[#D3968C]/40">

                            <div class="flex items-center gap-3">

                                <div class="w-12 h-12 rounded-2xl bg-[#fff1f1] flex items-center justify-center 
                                           text-[#D3968C] transition group-hover:bg-[#D3968C] group-hover:text-white">

                                    <i class="fa-solid fa-circle-check"></i>

                                </div>

                                <div>

                                    <p class="text-xs text-gray-400">
                                        Status
                                    </p>

                                    <h3 class="font-semibold text-gray-800">
                                        Online
                                    </h3>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="xl:col-span-2 space-y-6">

                <div class="bg-white rounded-[30px] p-8 border border-gray-100 shadow-sm relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-[#105666] mb-2">
                            Notifikasi
                        </h2>
                        <p class="text-sm text-gray-500">
                            Atur pemberitahuan aplikasi
                        </p>
                    </div>

                    <div class="space-y-4">

                        <div class="group flex items-center justify-between border border-gray-100 rounded-2xl p-5 
                                    transition-all duration-300 hover:bg-[#f9fdf8] hover:border-[#839958]/40">

                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-[#eef6f6] flex items-center justify-center 
                                            text-[#105666] text-xl transition group-hover:bg-[#839958] group-hover:text-white">
                                    <i class="fa-solid fa-bell"></i>
                                </div>

                                <div>
                                    <h3 class="font-bold text-gray-800">Notifikasi Tugas</h3>
                                    <p class="text-sm text-gray-400">Dapatkan pengingat deadline tugas</p>
                                </div>
                            </div>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-200 rounded-full 
                                            peer-checked:bg-[#839958] transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full 
                                            transition-all duration-300 peer-checked:translate-x-6"></div>
                            </label>

                        </div>

                        <div class="group flex items-center justify-between border border-gray-100 rounded-2xl p-5 
                                    transition-all duration-300 hover:bg-[#f9fdf8] hover:border-[#105666]/40">

                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-[#eef6f6] flex items-center justify-center 
                                            text-[#105666] text-xl transition group-hover:bg-[#105666] group-hover:text-white">
                                    <i class="fa-solid fa-clipboard-check"></i>
                                </div>

                                <div>
                                    <h3 class="font-bold text-gray-800">Notifikasi Absensi</h3>
                                    <p class="text-sm text-gray-400">Pengingat absensi harian</p>
                                </div>
                            </div>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-200 rounded-full 
                                            peer-checked:bg-[#105666] transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full 
                                            transition-all duration-300 peer-checked:translate-x-6"></div>
                            </label>

                        </div>

                        <div class="group flex items-center justify-between border border-gray-100 rounded-2xl p-5 
                                    transition-all duration-300 hover:bg-[#fff7f6] hover:border-[#D3968C]/40">

                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 rounded-2xl bg-[#fff1f1] flex items-center justify-center 
                                            text-[#D3968C] text-xl transition group-hover:bg-[#D3968C] group-hover:text-white">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <div>
                                    <h3 class="font-bold text-gray-800">Email Notification</h3>
                                    <p class="text-sm text-gray-400">Kirim notifikasi melalui email</p>
                                </div>
                            </div>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-200 rounded-full 
                                            peer-checked:bg-[#D3968C] transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full 
                                            transition-all duration-300 peer-checked:translate-x-6"></div>
                            </label>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-[30px] p-8 border border-gray-100 shadow-sm relative overflow-hidden">

                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-[#105666] mb-2">
                            Account
                        </h2>
                        <p class="text-sm text-gray-500">
                            Pengaturan akun pengguna
                        </p>
                    </div>

                    <div class="space-y-4">

                        <button class="group w-full flex items-center justify-between border border-gray-100 
                                       hover:border-[#105666]/40 hover:bg-[#f5fbfb] 
                                       rounded-2xl p-5 transition-all duration-300">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-[#eef6f6] flex items-center justify-center 
                                           text-[#105666] transition group-hover:bg-[#105666] group-hover:text-white">
                                    <i class="fa-solid fa-user-pen"></i>
                                </div>

                                <div class="text-left">
                                    <h3 class="font-bold text-gray-800">
                                        Edit Profile
                                    </h3>
                                    <p class="text-sm text-gray-400">
                                        Ubah data akun pengguna
                                    </p>
                                </div>

                            </div>

                            <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-[#105666]"></i>

                        </button>

                        <button class="group w-full flex items-center justify-between border border-red-100 
                                       hover:bg-[#fff7f6] hover:border-[#D3968C]/40 
                                       rounded-2xl p-5 transition-all duration-300">

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-2xl bg-[#fff1f1] flex items-center justify-center 
                                           text-[#D3968C] transition group-hover:bg-[#D3968C] group-hover:text-white">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </div>

                                <div class="text-left">
                                    <h3 class="font-bold text-[#D3968C]">
                                        Logout
                                    </h3>
                                    <p class="text-sm text-gray-400">
                                        Keluar dari akun
                                    </p>
                                </div>

                            </div>

                            <i class="fa-solid fa-chevron-right text-gray-400 group-hover:text-[#D3968C]"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>