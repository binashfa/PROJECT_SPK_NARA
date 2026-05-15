<!-- FONT AWESOME -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- NAVBAR -->
<nav class="w-full border-b sticky top-0 z-50"
     style="background-color: white;">

    <!-- CONTAINER -->
    <div class="max-w-7xl mx-auto px-6 h-[80px] flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-10">

            <!-- LOGO -->
            <div class="flex items-center min-w-[70px]">
                <img src="{{ asset('images/logoNara.png') }}" 
                     class="w-14 h-14 object-contain">
            </div>

            <!-- MENU -->
            <ul class="flex items-center gap-2 text-sm font-medium">

                <!-- DASHBOARD -->
                <li>
                    <a href="/siswa-dashboard"
                       class="flex items-center gap-2 px-5 py-2 rounded-full transition-all duration-200
                       {{ request()->is('siswa-dashboard') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
                       hover:bg-[#105666] hover:text-white">

                        <i class="fa-solid fa-house text-[14px]"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- KELAS -->
                <li>
                    <a href="/kelas"
                       class="flex items-center gap-2 px-5 py-2 rounded-full transition-all duration-200
                       {{ request()->is('kelas*') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
                       hover:bg-[#105666] hover:text-white">

                        <i class="fa-solid fa-book-open-reader text-[14px]"></i>
                        <span>Kelas</span>
                    </a>
                </li>

                <!-- TUGAS -->
                <li>
                    <a href="/pengumpulan-tugas"
                       class="flex items-center gap-2 px-5 py-2 rounded-full transition-all duration-200
                       {{ request()->is('pengumpulan-tugas*') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
                       hover:bg-[#105666] hover:text-white">

                        <i class="fa-solid fa-folder-open text-[14px]"></i>
                        <span>Tugas</span>
                    </a>
                </li>

                <!-- CALENDAR -->
                <li>
                    <a href="/calendar"
                       class="flex items-center gap-2 px-5 py-2 rounded-full transition-all duration-200
                       {{ request()->is('calendar*') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
                       hover:bg-[#105666] hover:text-white">

                        <i class="fa-solid fa-calendar-days text-[14px]"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <!-- ABSENSI -->
                <li>
                    <a href="/rekap"
                       class="flex items-center gap-2 px-5 py-2 rounded-full transition-all duration-200
                       {{ request()->is('rekap*') || request()->is('absensi*') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
                       hover:bg-[#105666] hover:text-white">

                        <i class="fa-solid fa-clipboard-check text-[14px]"></i>
                        <span>Absensi</span>
                    </a>
                </li>

            </ul>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-4">

            <!-- NOTIF -->
            @include('siswa.notifikasi-modal')

            <!-- SETTINGS -->
            <a href="/settings"
               class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200
               {{ request()->is('settings') ? 'bg-[#105666] text-white' : 'text-[#105666]' }}
               hover:bg-[#105666] hover:text-white">

                <i class="fa-solid fa-gear text-[14px]"></i>
            </a>

            <!-- PROFILE -->
            <div class="flex items-center gap-3 px-3 py-2 rounded-full w-[200px] justify-between"
                 style="background-color: rgba(16, 86, 102, 0.1);">

                <!-- LEFT PROFILE -->
                <div class="flex items-center gap-2">

                    <div class="w-9 h-9 rounded-full flex items-center justify-center"
                         style="background-color:#105666; color:white;">
                        <i class="fa-solid fa-user text-[12px]"></i>
                    </div>

                    <div class="leading-tight">
                        <p class="text-sm font-semibold truncate" style="color:#105666;">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-[10px]" style="color:#839958;">
                            Siswa
                        </p>
                    </div>

                </div>

                <!-- LOGOUT -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        class="w-8 h-8 rounded-full flex items-center justify-center transition"
                        style="background-color:#D3968C; color:white;">

                        <i class="fa-solid fa-right-from-bracket text-[12px]"></i>
                    </button>

                </form>

            </div>

        </div>

    </div>
</nav>