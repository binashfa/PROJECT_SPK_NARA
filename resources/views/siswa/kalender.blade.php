<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FULLCALENDAR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased">
        
    <style>
    /* ========================================================
    FULLCALENDAR MODERN CLEAN
    ======================================================== */
    .fc {
        height: 100% !important;
        min-height: 560px;
        font-family: inherit;
        padding-top: 6px;
    }

    /* ========================================================
    GRID BORDER (SOFT)
    ======================================================== */
    .fc-theme-standard td,
    .fc-theme-standard th {
        border: 1px solid #f1f5f9;
    }

    /* ===================================================== ===
    TOOLBAR (ANTI NABRAK)
    ======================================================== */
    .fc-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 12px;
    }

    /* LEFT (TITLE AREA) */
    .fc-toolbar-chunk:first-child {
        margin-right: auto;
        background: transparent !important;
        padding: 0 !important;
    }

    /* SPACING */
    .fc-toolbar.fc-header-toolbar {
        margin-top: 8px;
        margin-bottom: 20px;
        padding: 0 6px;
    }

    /* ========================================================
    TITLE (MURNI JUDUL BUKAN BUTTON)
    ======================================================== */
    .fc .fc-toolbar-title {
        font-size: 22px;
        font-weight: 700;
        color: #105666;
        background: transparent !important;
        padding: 0 !important;
        border: none !important;
        border-radius: 0 !important;
        box-shadow: none !important;
        outline: none !important;
    }

    /* MENETRALKAN TOTAL STYLE & HOVER TOMBOL BAWAAN PADA JUDUL */
    .fc-customTitle-button {
        background: transparent !important;
        background-color: transparent !important;
        background-image: none !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
        cursor: default !important;
        transition: none !important;
        pointer-events: none !important; 
    }

    /* MEMATIKAN STATE SISA (HOVER, FOCUS, ACTIVE, SELECTION) */
    .fc-customTitle-button:hover,
    .fc-customTitle-button:focus,
    .fc-customTitle-button:active,
    .fc-button-primary:not(:disabled):active,
    .fc-button-primary:not(:disabled).fc-button-active,
    .fc-customTitle-button *, 
    .fc-customTitle-button *:hover {
        background: transparent !important;
        background-color: transparent !important;
        background-image: none !important;
        box-shadow: none !important;
        border: none !important;
        outline: none !important;
        color: #105666 !important;
    }

    /* ========================================================
    BUTTON GROUP (KANAN SAJA - MONTH, WEEK, DAY)
    ======================================================== */
    .fc-toolbar-chunk:last-child .fc-button-group {
        display: flex !important;
        gap: 4px !important; 
        background: #f1f5f9;
        padding: 4px;
        border-radius: 14px;
    }

    /* TOMBOL DEFAULT STATE (TIDAK AKTIF) */
    .fc-toolbar-chunk:last-child .fc-button {
        background: transparent !important;
        color: #105666 !important;
        border: none !important;
        border-radius: 10px !important;
        padding: 6px 14px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        text-transform: capitalize;
        transition: all 0.2s ease;
        margin: 0 !important;
        box-shadow: none !important;
    }

    /* HOVER HANYA PADA TOMBOL YANG TIDAK AKTIF */
    .fc-toolbar-chunk:last-child .fc-button:not(.fc-button-active):hover {
        background: rgba(16, 86, 102, 0.08) !important; /* Efek hover halus transparan */
        color: #105666 !important;
    }

    /* STATE AKTIF (MENANDAKAN HALAMAN YANG SEDANG DIPILIH) */
    .fc-toolbar-chunk:last-child .fc-button.fc-button-active {
        background: #105666 !important; /* Warna gelap utama */
        color: white !important;         /* Teks putih kontras */
        font-weight: 700 !important;
        box-shadow: 0 4px 12px rgba(16, 86, 102, 0.15) !important; /* Efek bayangan tipis agar stand-out */
    }

    /* ========================================================
    HEADER HARI
    ======================================================== */
    .fc-col-header-cell {
        background: #fafafa;
        padding: 10px 0;
    }

    .fc-col-header-cell-cushion {
        font-size: 12px;
        font-weight: 600;
        color: #9ca3af;
    }

    /* ========================================================
    MONTH VIEW
    ======================================================== */
    .fc-daygrid-day-number {
        color: #6b7280;
        font-size: 13px;
        font-weight: 500;
        padding: 6px;
    }

    .fc-daygrid-day {
        height: 95px;
    }

    /* HARI INI */
    .fc-day-today {
        background: #f9fdf8 !important;
    }

    /* ========================================================
    TIMEGRID FIX
    ======================================================== */
    .fc-timegrid-axis {
        width: 75px !important;
        min-width: 75px !important;
        background: #fafafa;
        border-right: 1px solid #f1f5f9;
    }

    .fc-timegrid-axis-cushion {
        font-size: 12px;
        color: #6b7280;
    }

    .fc-timegrid-slot {
        height: 65px !important;
    }

    .fc-timegrid-col {
        padding: 0 4px;
    }

    .fc-timegrid-event {
        border-radius: 10px !important;
        padding: 6px 10px !important;
        overflow: hidden;
    }

    .fc-timegrid-body {
        overflow: auto !important;
    }

    /* ========================================================
    EVENT GLOBAL (SUDAH DIPERBAIKI - ANTI TABRAKAN WARNA)
    ======================================================== */
    .fc-event {
        background-color: #eef6f6 !important; /* Background soft teal/cyan pastel */
        border-left: 4px solid #105666 !important; /* Aksen garis vertikal tegas di sisi kiri */
        border-top: none !important;
        border-right: none !important;
        border-bottom: none !important;
        border-radius: 6px !important;
        padding: 5px 8px !important;
        transition: all 0.2s ease-in-out;
    }

    /* MENGUBAH WARNA TEKS EVENT */
    .fc-event-title, 
    .fc-event-main,
    .fc-event-main-frame,
    .fc-event-title-container {
        color: #105666 !important; 
        font-size: 12px !important;
        font-weight: 600 !important;
    }

    /* KUSTOMISASI BULLET DOT UNG DI DALAM EVENT */
    .fc-daygrid-event-dot {
        border-color: #839958 !important; 
        border-width: 4px !important;
        margin-right: 6px !important;
    }

    /* HOVER EFFECT PADA EVENT CARD */
    .fc-event:hover {
        background-color: #e2eeee !important; /* Sedikit lebih gelap saat kursor lewat */
        transform: translateY(-1px); /* Efek sedikit mengangkat */
        box-shadow: 0 2px 6px rgba(16, 86, 102, 0.08) !important;
    }

    /* ========================================================
    SCROLLER & SCROLLBAR
    ======================================================== */
    .fc-scroller {
        overflow: auto !important;
    }

    .custom-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scroll::-webkit-scrollbar-thumb {
        background: rgba(16, 86, 102, 0.3);
        border-radius: 999px;
    }

    .custom-scroll::-webkit-scrollbar-thumb:hover {
        background: rgba(16, 86, 102, 0.5);
    }
    </style>
</head>

<body class="bg-[#f5f5f7] min-h-screen antialiased">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN CONTAINER -->
    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <!-- HEADER HERO -->
        <header class="mb-10">
            <div class="w-full bg-gradient-to-br from-[#105666] to-[#0d4b59] rounded-[32px] p-8 md:p-12 flex items-center justify-between shadow-lg relative overflow-hidden">
                
                <!-- Glow Decorative Background -->
                <div class="absolute top-0 right-0 w-80 h-80 bg-[#839958]/20 rounded-full blur-3xl -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-1/3 w-60 h-60 bg-[#D3968C]/10 rounded-full blur-3xl"></div>

                <!-- Hero Text -->
                <div class="relative z-10 space-y-2">

                    <span class="inline-flex items-center gap-2 bg-white/10 text-[#F7F4D5] text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm tracking-wider uppercase">
                        <i class="fa-solid fa-calendar-check text-xs text-[#839958] animate-pulse"></i>
                        Jadwal Aktif
                    </span>

                    <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">
                        Kalender Kegiatan
                    </h1>

                    <p class="text-gray-200 text-sm md:text-base font-medium max-w-md">
                        Pantau dan kelola jadwal pelajaran, tugas, serta kegiatan akademik dalam satu kalender terpusat.
                    </p>

                </div>

                <!-- Hero Icon -->
                <div class="hidden lg:flex relative z-10 items-center justify-center pr-6">
                    <div class="w-24 h-24 bg-white/10 backdrop-blur-md rounded-3xl shadow-inner flex items-center justify-center border border-white/20 transform rotate-6 hover:rotate-0 transition duration-300">
                        <i class="fa-solid fa-calendar-days text-[#F7F4D5] text-4xl"></i>
                    </div>
                </div>

            </div>
        </header>

        <!-- GRID WRAPPER -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- LEFT SIDEBAR: UPCOMING EVENTS -->
            <div class="lg:col-span-4 flex flex-col space-y-4 h-[700px]">

                <!-- HEADER HERO -->
                <div class="w-full rounded-2xl px-5 py-4 flex items-center justify-between 
                            bg-gradient-to-br from-[#F7F4D5] via-[#f3f0d0] to-[#f9f6e2] 
                            border border-[#ece8c9] relative overflow-hidden shrink-0">

                    <!-- ACCENT -->
                    <div class="absolute top-0 left-0 w-full h-[3px] 
                                bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                    <!-- GLOW -->
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-[#105666]/10 blur-3xl rounded-full"></div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

                    <!-- TEXT -->
                    <div class="relative z-10">
                        <h1 class="text-lg font-bold text-[#105666]">Upcoming Events</h1>
                        <p class="text-xs text-gray-600 mt-0.5">Don’t miss schedule</p>
                    </div>

                    <!-- ICON -->
                    <div class="w-10 h-10 rounded-xl bg-white/60 backdrop-blur-sm 
                                flex items-center justify-center text-[#105666]">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                </div>

                <!-- SCROLL AREA -->
                <div class="overflow-y-auto pr-1 custom-scroll flex-1">
                    <div id="upcomingEvents" class="space-y-3">
                        @foreach($events as $event)
                        <!-- CARD ITEM -->
                        <div class="p-4 rounded-xl border border-gray-100 
                                    bg-white/80 backdrop-blur-sm
                                    transition-all duration-300 
                                    hover:bg-[#f9fdf8] hover:border-[#839958]/40 relative overflow-hidden">

                            <!-- ACCENT LINE -->
                            <div class="absolute top-0 left-0 w-full h-[3px] 
                                        bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                            <!-- TOP -->
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <div class="w-2 h-2 rounded-full bg-[#839958]"></div>
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} • {{ $event->start_time }}
                            </div>

                            <!-- TITLE -->
                            <h2 class="text-sm font-bold text-gray-800 mb-1 leading-snug">
                                {{ $event->title }}
                            </h2>

                            <!-- DESCRIPTION -->
                            <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">
                                {{ $event->description }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- RIGHT CONTENT: CALENDAR -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[32px] p-6 border border-gray-100 shadow-sm relative overflow-hidden">
                    <!-- ACCENT -->
                    <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>
                    <!-- GLOW -->
                    <div class="absolute -top-16 -right-16 w-32 h-32 bg-[#839958]/10 blur-3xl rounded-full"></div>
                    <div class="absolute -bottom-16 -left-16 w-32 h-32 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

                    <!-- HEADER -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 relative z-10">
                        <div>
                            <h2 class="text-xl font-bold text-[#105666]">Kalender Academic</h2>
                            <p class="text-sm text-gray-500">Jadwal kegiatan & deadline siswa</p>
                        </div>

                        <!-- MODAL BUTTON SEKARANG MENYATU DISINI AGAR SERASI -->
                        <button onclick="openCalendarModal()" class="flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-[#eef6f6] text-[#105666] text-xs font-bold hover:bg-[#105666] hover:text-white transition self-start sm:self-auto shadow-sm">
                            <i class="fa-solid fa-filter"></i>
                            Pilih Bulan
                        </button>
                    </div>

                    <!-- CALENDAR AREA -->
                    <div id="calendar" class="relative z-10"></div>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL FILTER BULAN -->
    <div id="calendarModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-[380px] rounded-[28px] p-6 shadow-xl border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

            <h2 class="text-xl font-bold text-[#105666] mb-6">Pilih Bulan & Tahun</h2>

            <div class="mb-5">
                <label class="block text-sm text-gray-500 mb-2">Bulan</label>
                <select id="monthSelect" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-[#105666]/30 transition">
                    <option value="0">January</option>
                    <option value="1">February</option>
                    <option value="2">March</option>
                    <option value="3">April</option>
                    <option value="4">May</option>
                    <option value="5">June</option>
                    <option value="6">July</option>
                    <option value="7">August</option>
                    <option value="8">September</option>
                    <option value="9">October</option>
                    <option value="10">November</option>
                    <option value="11">December</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm text-gray-500 mb-2">Tahun</label>
                <input type="number" id="yearSelect" value="2026" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-[#105666]/30 transition">
            </div>

            <div class="flex justify-end gap-3">
                <button onclick="closeCalendarModal()" class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-sm font-medium">Batal</button>
                <button onclick="changeCalendarDate()" class="px-5 py-2 rounded-xl text-white text-sm font-semibold bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#D3968C] hover:to-[#c9847a] transition-all duration-300">Terapkan</button>
            </div>
        </div>
    </div>

    <!-- MODAL FORM EVENT -->
    <input type="hidden" id="eventId">

    <div id="eventModal"
        class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">

        <div class="bg-white w-full max-w-[400px] rounded-[28px] p-7 shadow-lg border border-gray-100 relative overflow-hidden">

            <!-- ACCENT -->
            <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-[#105666] mb-6">
                Tambah Event
            </h2>

            <!-- FORM -->
            <div class="space-y-4">

                <input type="text" id="eventTitle" placeholder="Nama event"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 
                        bg-[#fafafa] text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-[#105666]/30 transition">

                <textarea id="eventDescription" placeholder="Deskripsi"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 
                        bg-[#fafafa] text-gray-700 h-24 resize-none
                        focus:outline-none focus:ring-2 focus:ring-[#105666]/30 transition"></textarea>

                <input type="date" id="eventDate"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 
                        bg-[#fafafa] text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-[#105666]/30">

                <div class="grid grid-cols-2 gap-3">
                    <input type="time" id="eventStart"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 
                            bg-[#fafafa] text-gray-700
                            focus:outline-none focus:ring-2 focus:ring-[#105666]/30">

                    <input type="time" id="eventEnd"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 
                            bg-[#fafafa] text-gray-700
                            focus:outline-none focus:ring-2 focus:ring-[#105666]/30">
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center mt-6">

                <!-- DELETE -->
                <button id="deleteBtn"
                    class="hidden px-5 py-2.5 rounded-xl 
                        bg-[#fff1f1] text-[#D3968C] font-semibold
                        hover:bg-[#ffe4e4] transition">
                    Delete
                </button>

                <div class="flex gap-3 ml-auto">

                    <!-- CANCEL -->
                    <button onclick="closeEventModal()"
                        class="px-5 py-2.5 rounded-xl 
                            bg-gray-100 text-gray-600
                            hover:bg-gray-200 transition">
                        Cancel
                    </button>

                    <!-- SAVE -->
                    <button id="saveBtn" onclick="saveEvent()"
                        class="px-6 py-2.5 rounded-xl font-semibold text-white
                            bg-gradient-to-r from-[#105666] to-[#0d4b59]
                            hover:from-[#0d4b59] hover:to-[#105666]
                            transition-all duration-300
                            hover:-translate-y-[2px] hover:shadow-md">
                        Save
                    </button>

                </div>

            </div>

        </div>
    </div>

    <!-- CONFIRM DELETE MODAL -->
    <div id="confirmModal"
        class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-[9999] flex items-center justify-center">

        <div class="bg-white w-[320px] rounded-2xl p-6 shadow-lg border border-gray-100">

            <h3 class="text-lg font-bold text-[#105666] mb-3">
                Hapus Event?
            </h3>

            <p class="text-sm text-gray-500 mb-6">
                Data yang dihapus tidak bisa dikembalikan.
            </p>

            <div class="flex justify-end gap-3">

                <button onclick="closeConfirm()"
                    class="px-4 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">
                    Batal
                </button>

                <button onclick="handleDelete()"
                    class="px-4 py-2 rounded-xl 
                        bg-[#fff1f1] text-[#D3968C] 
                        hover:bg-[#ffe4e4]">
                    Hapus
                </button>

            </div>

        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {

        const deleteBtn = document.getElementById("deleteBtn");

        if (deleteBtn) {
            deleteBtn.addEventListener("click", function (e) {
                e.preventDefault();
                openConfirm();
            });
        }

    });

    function openConfirm() {
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeConfirm() {
        document.getElementById('confirmModal').classList.add('hidden');
    }

    function handleDelete() {
        closeConfirm();
        deleteEvent(); // function kamu
    }
    </script>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');

            // INIT CALENDAR
            window.calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: '100%',
                displayEventTime: false,
                headerToolbar: {
                    left: 'customTitle', 
                    center: '',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                customButtons: {
                    customTitle: {
                        text: '',
                        click: function() {
                        }
                    }
                },
                buttonText: {
                    dayGridMonth: 'Month',
                    timeGridWeek: 'Week',
                    timeGridDay: 'Day'
                },
                events: '/calendar-events',
                dateClick: function(info) {
                    document.getElementById('eventId').value = '';
                    document.getElementById('eventTitle').value = '';
                    document.getElementById('eventDescription').value = '';
                    document.getElementById('eventStart').value = '';
                    document.getElementById('eventEnd').value = '';
                    document.getElementById('eventDate').value = info.dateStr;
                    document.getElementById('deleteBtn').classList.add('hidden');
                    document.getElementById('saveBtn').innerText = 'Save';
                    document.querySelector('#eventModal h2').innerText = 'Tambah Event';
                    document.getElementById('eventModal').classList.remove('hidden');
                },
                eventClick: function(info) {
                    let event = info.event;
                    document.getElementById('eventModal').classList.remove('hidden');
                    document.getElementById('eventId').value = event.id;
                    document.getElementById('eventTitle').value = event.title;
                    document.getElementById('eventDescription').value = event.extendedProps.description ?? '';
                    document.getElementById('eventDate').value = event.startStr.split('T')[0];
                    document.getElementById('eventStart').value = event.startStr.split('T')[1]?.substring(0, 5) ?? '';
                    document.getElementById('eventEnd').value = event.endStr?.split('T')[1]?.substring(0, 5) ?? '';
                    document.getElementById('deleteBtn').classList.remove('hidden');
                    document.getElementById('saveBtn').innerText = 'Update';
                    document.querySelector('#eventModal h2').innerText = 'Edit Event';
                },
                eventColor: '#9333ea',
                eventBorderColor: '#9333ea',
                eventTextColor: '#fff'
            });

            calendar.render();

            // OPEN CALENDAR MODAL
            window.openCalendarModal = function() {
                document.getElementById('calendarModal').classList.remove('hidden');
            }

            // CLOSE MONTH MODAL
            window.closeCalendarModal = function() {
                document.getElementById('calendarModal').classList.add('hidden');
            }

            // CHANGE MONTH
            window.changeCalendarDate = async function() {
                let month = parseInt(document.getElementById('monthSelect').value) + 1;
                let year = document.getElementById('yearSelect').value;
                let date = new Date(year, month - 1, 1);
                calendar.gotoDate(date);

                let response = await fetch(`/events/filter?month=${month}&year=${year}`);
                let events = await response.json();
                let container = document.getElementById('upcomingEvents');
                container.innerHTML = '';

                events.forEach(event => {
                    container.innerHTML += `
                    <div class="bg-white p-4 rounded-xl border border-gray-100 transition-all duration-300 hover:bg-[#f9fdf8] hover:border-[#839958]/40 relative overflow-hidden shadow-sm">
                        <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center gap-2 text-xs text-gray-400">
                                <div class="w-2 h-2 rounded-full bg-[#839958]"></div>
                                ${event.date} • ${event.start_time}
                            </div>
                            <i class="fa-solid fa-ellipsis text-gray-300 text-sm"></i>
                        </div>
                        <h2 class="text-sm font-bold text-gray-800 mb-1 leading-snug">${event.title}</h2>
                        <p class="text-xs text-gray-500 leading-relaxed line-clamp-2">${event.description ?? ''}</p>
                    </div>`;
                });

                closeCalendarModal();
            }

            function updateCustomTitle() {
                let title = calendar.view.title;
                let btn = document.querySelector('.fc-customTitle-button');
                if (btn) {
                    btn.innerHTML = `<span class="text-xl font-bold text-[#105666] select-none">${title}</span>`;
                }
            }

            updateCustomTitle();
            calendar.on('datesSet', function() {
                updateCustomTitle();
            });

            // CLOSE EVENT MODAL
            window.closeEventModal = function() {
                document.getElementById('eventModal').classList.add('hidden');
            }

            // SAVE / UPDATE EVENT
            window.saveEvent = async function() {
                let id = document.getElementById('eventId').value;
                let title = document.getElementById('eventTitle').value;
                let description = document.getElementById('eventDescription').value;
                let date = document.getElementById('eventDate').value;
                let start = document.getElementById('eventStart').value;
                let end = document.getElementById('eventEnd').value;

                let url = '/events/store';
                let method = 'POST';

                if (id) {
                    url = `/events/update/${id}`;
                    method = 'PUT';
                }

                let response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        title: title,
                        description: description,
                        date: date,
                        start_time: start,
                        end_time: end,
                        type: 'event'
                    })
                });

                let result = await response.json();
                if (result.success) {
                    calendar.refetchEvents();
                    closeEventModal();
                    location.reload();
                }
            }

            // VALIDASI DELETE
            function openConfirm() 
            {
                document.getElementById('confirmModal').classList.remove('hidden');}
            function closeConfirm() 
            {
                document.getElementById('confirmModal').classList.add('hidden');}
            function handleDelete() 
            {
                deleteEvent(); 
                // closeConfirm();
            }

            // DELETE EVENT
            window.deleteEvent = async function() {
                let id = document.getElementById('eventId').value;
                if (!id) return;

                let response = await fetch(`/events/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                let result = await response.json();
                if (result.success) {
                    calendar.refetchEvents();
                    closeEventModal();
                    location.reload();
                }
            }
        });
    </script>
</body>

</html>