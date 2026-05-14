<!-- FONT AWESOME -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- NAVBAR -->
<nav class="w-full bg-purple-900 text-white px-8 py-4 flex items-center justify-between shadow-lg">

    <!-- LEFT -->
    <div class="flex items-center gap-12">

        <!-- LOGO -->
        <h1 class="text-3xl font-bold tracking-wide">
            NARA
        </h1>

        <!-- MENU -->
        <ul class="flex items-center gap-6">

            <!-- DASHBOARD -->
            <li>
                <a href="/siswa-dashboard"
                    class="flex items-center gap-2 hover:text-purple-200 transition">

                    <i class="fa-solid fa-house"></i>

                    <span>Dashboard</span>

                </a>
            </li>

            <!-- KELAS -->
            <li>
                <a href="/kelas"
                    class="flex items-center gap-2 hover:text-purple-200 transition">

                    <i class="fa-solid fa-book-open-reader"></i>

                    <span>Kelas</span>

                </a>
            </li>

            <!-- TUGAS -->
            <li>
                <a href="/pengumpulan-tugas"
                    class="flex items-center gap-2 hover:text-purple-200 transition">

                    <i class="fa-solid fa-folder-open"></i>

                    <span>Tugas</span>

                </a>
            </li>

            <!-- CALENDAR -->
            <li>
                <a href="/calendar"
                    class="flex items-center gap-2 hover:text-purple-200 transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span>Calendar</span>

                </a>
            </li>

            <!-- ABSENSI -->
            <li>
                <a href="/rekap"
                    class="flex items-center gap-2 hover:text-purple-200 transition">

                    <i class="fa-solid fa-clipboard-check"></i>

                    <span>Absensi</span>

                </a>
            </li>



        </ul>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-5">

           @include('siswa.notifikasi-modal')


        <!-- SETTINGS -->
        <a href="/settings"
            class="w-11 h-11 rounded-xl bg-purple-800 hover:bg-purple-700 flex items-center justify-center transition">

            <i class="fa-solid fa-gear"></i>

        </a>

        <!-- PROFILE -->
        <div class="flex items-center gap-3 bg-white/10 px-4 py-2 rounded-2xl">

            <!-- ICON -->
            <div class="w-11 h-11 rounded-full bg-white/20 flex items-center justify-center">

                <i class="fa-solid fa-user"></i>

            </div>

            <!-- INFO -->
            <div>

                <p class="font-semibold leading-none">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-purple-200 mt-1">
                    Siswa
                </p>

            </div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="ml-3 w-10 h-10 rounded-xl bg-red-500 hover:bg-red-600 flex items-center justify-center transition">

                    <i class="fa-solid fa-right-from-bracket"></i>

                </button>

            </form>

        </div>

    </div>
</nav>

<script>
    function toggleClassroom() {
        const menu = document.getElementById('classroomMenu');

        const arrow = document.getElementById('arrow');

        menu.classList.toggle('hidden');

        if (menu.classList.contains('hidden')) {

            arrow.classList.remove('rotate-180');

        } else {

            arrow.classList.add('rotate-180');

        }
    }
</script>