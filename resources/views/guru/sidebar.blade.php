<!-- FONT AWESOME -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="w-64 min-h-screen bg-purple-900 text-white p-5 flex flex-col">

    <!-- TOP -->
    <div>

        <!-- LOGO -->
        <h2 class="text-3xl font-bold mb-10 tracking-wide">
            NARA
        </h2>

        <!-- MENU -->
        <ul class="space-y-3">

            <!-- DASHBOARD -->
            <li>
                <a href="/guru-dashboard"
                    class="flex items-center gap-3 hover:bg-purple-700 p-3 rounded-xl transition">

                    <i class="fa-solid fa-house"></i>

                    <span>Dashboard</span>

                </a>
            </li>

            <!-- KELAS -->
            <li>
                <a href="/kelas"
                    class="flex items-center gap-3 hover:bg-purple-700 p-3 rounded-xl transition">

                    <i class="fa-solid fa-book-open"></i>

                    <span>Kelas</span>

                </a>
            </li>

            <!-- CALENDAR -->
            <li>
                <a href="/calendar-guru"
                    class="flex items-center gap-3 hover:bg-purple-700 p-3 rounded-xl transition">

                    <i class="fa-solid fa-calendar-days"></i>

                    <span>Calendar</span>

                </a>
            </li>

            <!-- NOTIFIKASI -->
            <li>
                <a href="/notifikasi"
                    class="flex items-center gap-3 hover:bg-purple-700 p-3 rounded-xl transition">

                    <i class="fa-solid fa-bell"></i>

                    <span>Notifikasi</span>

                </a>
            </li>

        </ul>

    </div>

    <!-- BOTTOM -->
    <div class="mt-auto pt-8 space-y-3 border-t border-purple-700">

        <!-- SETTINGS -->
        <a href="/settings"
            class="flex items-center gap-3 bg-purple-800 hover:bg-purple-700 p-3 rounded-xl transition">

            <i class="fa-solid fa-gear"></i>

            <span>Settings</span>

        </a>

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="w-full flex items-center gap-3 bg-red-500 hover:bg-red-600 p-3 rounded-xl transition">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</div>