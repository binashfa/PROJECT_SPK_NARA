<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Settings</title>

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
                Settings
            </h1>

            <p class="text-gray-400">
                Kelola akun dan preferensi aplikasi
            </p>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- LEFT -->
            <div class="xl:col-span-1">

                <!-- PROFILE CARD -->
                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-gray-100">

                    <!-- PROFILE -->
                    <div class="flex flex-col items-center text-center">

                        <!-- PHOTO -->
                        <div
                            class="w-28 h-28 rounded-full bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center text-white text-4xl font-bold shadow-lg mb-5">

                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                        </div>

                        <!-- NAME -->
                        <h2 class="text-2xl font-bold text-gray-800 mb-1">

                            {{ Auth::user()->name }}

                        </h2>

                        <!-- EMAIL -->
                        <p class="text-gray-400 text-sm mb-6">

                            {{ Auth::user()->email }}

                        </p>

                        <!-- BADGE -->
                        <div
                            class="bg-purple-100 text-purple-600 px-5 py-2 rounded-full text-sm font-medium">

                            Siswa Aktif

                        </div>

                    </div>

                    <!-- INFO -->
                    <div class="mt-8 space-y-4">

                        <!-- ITEM -->
                        <div
                            class="flex items-center justify-between border border-gray-100 rounded-2xl p-4">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">

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

                        <!-- ITEM -->
                        <div
                            class="flex items-center justify-between border border-gray-100 rounded-2xl p-4">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">

                                    <i class="fa-solid fa-calendar-check"></i>

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

            <!-- RIGHT -->
            <div class="xl:col-span-2 space-y-6">

                <!-- NOTIFICATION -->
                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-gray-100">

                    <div class="mb-8">

                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            Notifikasi
                        </h2>

                        <p class="text-sm text-gray-400">
                            Atur pemberitahuan aplikasi
                        </p>

                    </div>

                    <!-- LIST -->
                    <div class="space-y-5">

                        <!-- ITEM -->
                        <div
                            class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 text-xl">

                                    <i class="fa-solid fa-bell"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">
                                        Notifikasi Tugas
                                    </h3>

                                    <p class="text-sm text-gray-400">
                                        Dapatkan pengingat deadline tugas
                                    </p>

                                </div>

                            </div>

                            <!-- TOGGLE -->
                            <label class="relative inline-flex items-center cursor-pointer">

                                <input type="checkbox"
                                    checked
                                    class="sr-only peer">

                                <div
                                    class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-purple-600 transition">

                                </div>

                                <div
                                    class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition peer-checked:translate-x-6">

                                </div>

                            </label>

                        </div>

                        <!-- ITEM -->
                        <div
                            class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-xl">

                                    <i class="fa-solid fa-clipboard-check"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">
                                        Notifikasi Absensi
                                    </h3>

                                    <p class="text-sm text-gray-400">
                                        Pengingat absensi harian
                                    </p>

                                </div>

                            </div>

                            <!-- TOGGLE -->
                            <label class="relative inline-flex items-center cursor-pointer">

                                <input type="checkbox"
                                    checked
                                    class="sr-only peer">

                                <div
                                    class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition">

                                </div>

                                <div
                                    class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition peer-checked:translate-x-6">

                                </div>

                            </label>

                        </div>

                        <!-- ITEM -->
                        <div
                            class="flex items-center justify-between border border-gray-100 rounded-2xl p-5">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-xl">

                                    <i class="fa-solid fa-envelope"></i>

                                </div>

                                <div>

                                    <h3 class="font-bold text-gray-800">
                                        Email Notification
                                    </h3>

                                    <p class="text-sm text-gray-400">
                                        Kirim notifikasi melalui email
                                    </p>

                                </div>

                            </div>

                            <!-- TOGGLE -->
                            <label class="relative inline-flex items-center cursor-pointer">

                                <input type="checkbox"
                                    class="sr-only peer">

                                <div
                                    class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-orange-500 transition">

                                </div>

                                <div
                                    class="absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition peer-checked:translate-x-6">

                                </div>

                            </label>

                        </div>

                    </div>

                </div>

                <!-- ACCOUNT -->
                <div class="bg-white rounded-[30px] p-8 shadow-sm border border-gray-100">

                    <div class="mb-6">

                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            Account
                        </h2>

                        <p class="text-sm text-gray-400">
                            Pengaturan akun pengguna
                        </p>

                    </div>

                    <div class="space-y-4">

                        <button
                            class="w-full flex items-center justify-between border border-gray-100 hover:border-purple-200 hover:bg-purple-50 rounded-2xl p-5 transition">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600">

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

                            <i class="fa-solid fa-chevron-right text-gray-400"></i>

                        </button>

                        <button
                            class="w-full flex items-center justify-between border border-red-100 hover:bg-red-50 rounded-2xl p-5 transition">

                            <div class="flex items-center gap-4">

                                <div
                                    class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-red-500">

                                    <i class="fa-solid fa-right-from-bracket"></i>

                                </div>

                                <div class="text-left">

                                    <h3 class="font-bold text-red-500">
                                        Logout
                                    </h3>

                                    <p class="text-sm text-gray-400">
                                        Keluar dari akun
                                    </p>

                                </div>

                            </div>

                            <i class="fa-solid fa-chevron-right text-gray-400"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>