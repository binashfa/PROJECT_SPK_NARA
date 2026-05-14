<!-- NOTIFICATION -->
<div class="relative">

    <!-- BUTTON -->
    <button
        onclick="toggleNotif(event)"
        class="relative w-11 h-11 rounded-xl bg-purple-800 hover:bg-purple-700 flex items-center justify-center transition">

        <i class="fa-solid fa-bell"></i>

        <!-- BADGE -->
        <span
            class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold">

            3

        </span>

    </button>

    <!-- MODAL -->
    <div id="notifModal"
        class="hidden absolute right-0 mt-4 w-[380px] bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden z-50">

        <!-- HEADER -->
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">

            <div>

                <h2 class="text-lg font-bold text-gray-800">
                    Notifications
                </h2>

                <p class="text-xs text-gray-400 mt-1">
                    Notifikasi terbaru kamu
                </p>

            </div>

            <div
                class="w-10 h-10 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center">

                <i class="fa-solid fa-bell"></i>

            </div>

        </div>

        <!-- LIST -->
        <div class="max-h-[400px] overflow-y-auto">

            <!-- ITEM -->
            <div class="p-5 border-b border-gray-100 hover:bg-gray-50 transition">

                <div class="flex items-start gap-4">

                    <div
                        class="w-12 h-12 rounded-2xl bg-red-100 text-red-500 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-folder-open"></i>

                    </div>

                    <div>

                        <h3 class="font-semibold text-gray-800 mb-1">
                            Deadline Tugas
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Tugas UI/UX akan berakhir besok.
                        </p>

                        <p class="text-xs text-gray-400 mt-2">
                            2 menit lalu
                        </p>

                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="p-5 border-b border-gray-100 hover:bg-gray-50 transition">

                <div class="flex items-start gap-4">

                    <div
                        class="w-12 h-12 rounded-2xl bg-green-100 text-green-500 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-clipboard-check"></i>

                    </div>

                    <div>

                        <h3 class="font-semibold text-gray-800 mb-1">
                            Absensi Berhasil
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Absensi hari ini berhasil direkam.
                        </p>

                        <p class="text-xs text-gray-400 mt-2">
                            1 jam lalu
                        </p>

                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="p-5 hover:bg-gray-50 transition">

                <div class="flex items-start gap-4">

                    <div
                        class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-500 flex items-center justify-center shrink-0">

                        <i class="fa-solid fa-book"></i>

                    </div>

                    <div>

                        <h3 class="font-semibold text-gray-800 mb-1">
                            Materi Baru
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Guru menambahkan materi Matematika baru.
                        </p>

                        <p class="text-xs text-gray-400 mt-2">
                            Kemarin
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="p-4 border-t border-gray-100 bg-gray-50">

            <button
                class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-2xl font-medium transition">

                Lihat Semua Notifikasi

            </button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
    function toggleNotif(event) {

        event.stopPropagation();

        document.getElementById('notifModal')
            .classList.toggle('hidden');

    }

    // close ketika klik luar
    document.addEventListener('click', function(e) {

        const modal = document.getElementById('notifModal');

        if (!e.target.closest('#notifModal')) {

            modal.classList.add('hidden');

        }

    });
</script>