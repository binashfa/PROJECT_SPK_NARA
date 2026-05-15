<!-- NOTIFICATION -->
<div class="relative">

    <!-- BUTTON -->
    <button
        onclick="toggleNotif(event)"
        class="relative w-10 h-10 rounded-full flex items-center justify-center transition
        hover:bg-[#105666] hover:text-white text-[#105666]">

        <i class="fa-solid fa-bell"></i>

        <!-- BADGE -->
        <span
            class="absolute -top-1 -right-1 text-white text-[10px] w-5 h-5 rounded-full flex items-center justify-center font-bold"
            style="background-color:#D3968C;">

            3

        </span>

    </button>

    <!-- MODAL -->
    <div id="notifModal"
        class="hidden absolute right-0 mt-4 w-[340px] rounded-2xl shadow-xl overflow-hidden z-50 border"
        style="background-color:white;">

        <!-- HEADER -->
        <div class="p-4 flex items-center justify-between border-b">

            <div>
                <h2 class="text-sm font-bold" style="color:#105666;">
                    Notifications
                </h2>

                <p class="text-xs text-gray-400">
                    Update terbaru
                </p>
            </div>

            <i class="fa-solid fa-bell text-[#105666]"></i>

        </div>

        <!-- LIST -->
        <div class="max-h-[300px] overflow-y-auto">

            <!-- ITEM -->
            <div class="p-4 flex gap-3 hover:bg-gray-50 transition">

                <div class="w-9 h-9 rounded-full flex items-center justify-center"
                     style="background-color:#105666; color:white;">
                    <i class="fa-solid fa-folder-open text-xs"></i>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        Deadline Tugas
                    </p>

                    <p class="text-xs text-gray-500">
                        Tugas UI/UX berakhir besok
                    </p>

                    <p class="text-[10px] mt-1 text-gray-400">
                        2 menit lalu
                    </p>
                </div>

            </div>

            <!-- ITEM -->
            <div class="p-4 flex gap-3 hover:bg-gray-50 transition">

                <div class="w-9 h-9 rounded-full flex items-center justify-center"
                     style="background-color:#839958; color:white;">
                    <i class="fa-solid fa-check text-xs"></i>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        Absensi berhasil
                    </p>

                    <p class="text-xs text-gray-500">
                        Kehadiran sudah tercatat
                    </p>

                    <p class="text-[10px] mt-1 text-gray-400">
                        1 jam lalu
                    </p>
                </div>

            </div>

            <!-- ITEM -->
            <div class="p-4 flex gap-3 hover:bg-gray-50 transition">

                <div class="w-9 h-9 rounded-full flex items-center justify-center"
                     style="background-color:#D3968C; color:white;">
                    <i class="fa-solid fa-book text-xs"></i>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-800">
                        Materi baru
                    </p>

                    <p class="text-xs text-gray-500">
                        Guru upload materi terbaru
                    </p>

                    <p class="text-[10px] mt-1 text-gray-400">
                        Kemarin
                    </p>
                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <div class="p-3 border-t">

            <button
                class="w-full py-2 rounded-full text-sm font-medium transition text-white"
                style="background-color:#105666;"
                onmouseover="this.style.backgroundColor='#839958'"
                onmouseout="this.style.backgroundColor='#105666'">

                Lihat Semua

            </button>

        </div>

    </div>

</div>

<!-- SCRIPT -->
<script>
    function toggleNotif(event) {
        event.stopPropagation();
        document.getElementById('notifModal').classList.toggle('hidden');
    }

    document.addEventListener('click', function(e) {
        const modal = document.getElementById('notifModal');

        if (!e.target.closest('#notifModal')) {
            modal.classList.add('hidden');
        }
    });
</script>