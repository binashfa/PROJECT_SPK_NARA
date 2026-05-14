<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Dashboard Siswa</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FULLCALENDAR -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
        /* =========================
       FULLCALENDAR
    ========================== */

        .fc {
            height: 100%;
        }

        .fc-theme-standard td,
        .fc-theme-standard th {
            border: 1px solid #e5e7eb;
        }

        .fc .fc-toolbar-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .fc-button {
            background: #9333ea !important;
            border: none !important;
            box-shadow: none !important;
            padding: 8px 14px !important;
            font-size: 14px !important;
            border-radius: 10px !important;
        }

        .fc-button:hover {
            background: #7e22ce !important;
        }

        .fc-button-active {
            background: #6b21a8 !important;
        }

        .fc-toolbar.fc-header-toolbar {
            margin-bottom: 20px;
        }

        .fc-daygrid-day-number {
            color: #6b7280;
            font-size: 14px;
            padding: 8px;
        }

        .fc-event {
            border: none !important;
            border-radius: 10px !important;
            padding: 2px 6px !important;
            font-size: 12px !important;
        }

        .fc-scroller {
            overflow: hidden !important;
        }

        /* =========================
       UPCOMING SCROLL
    ========================== */

        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            border-radius: 999px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #a78bfa;
        }
    </style>

</head>

<body class="bg-[#f5f5f7] min-h-screen">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <div class="p-10">

        <div class="grid grid-cols-12 gap-6 h-[calc(100vh-50px)]">

            <!-- LEFT -->
            <div class="col-span-4 flex flex-col h-[660px]">

                <!-- TITLE -->
                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Upcoming Events
                    </h1>

                    <p class="text-gray-400 mt-1">
                        Don’t miss schedule
                    </p>

                </div>

                <!-- SCROLL AREA -->
                <div class="overflow-y-auto pr-2 custom-scroll h-full">

                    <div id="upcomingEvents" class="space-y-4">

                        @foreach($events as $event)

                        <!-- CARD -->
                        <div class="bg-white p-4 rounded-2xl shadow-sm">

                            <!-- TOP -->
                            <div class="flex justify-between items-center mb-3">

                                <div class="flex items-center gap-2 text-xs text-gray-400">

                                    <!-- DOT -->
                                    <div class="w-2 h-2 rounded-full bg-purple-500"></div>

                                    {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                                    •
                                    {{ $event->start_time }}

                                </div>

                            </div>

                            <!-- TITLE -->
                            <h2 class="text-lg font-semibold text-gray-800 mb-1 leading-snug">

                                {{ $event->title }}

                            </h2>

                            <!-- DESCRIPTION -->
                            <p class="text-sm text-gray-400 leading-relaxed">

                                {{ $event->description }}

                            </p>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-span-8 h-full">

                <div class="bg-white rounded-3xl p-5 h-full shadow-sm overflow-hidden">

                    <div id="calendar" class="h-full"></div>

                    <input type="text" id="monthPicker">

                </div>

            </div>

        </div>

    </div>


    <!-- MODAL -->
    <div id="calendarModal"
        class="hidden fixed inset-0 bg-black/30 z-50 flex items-center justify-center">

        <div class="bg-white w-[350px] rounded-3xl p-6 shadow-2xl">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Select Month & Year
            </h2>

            <!-- MONTH -->
            <div class="mb-5">

                <label class="block text-sm text-gray-500 mb-2">
                    Month
                </label>

                <select id="monthSelect"
                    class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-purple-500">

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

            <!-- YEAR -->
            <div class="mb-6">

                <label class="block text-sm text-gray-500 mb-2">
                    Year
                </label>

                <input type="number"
                    id="yearSelect"
                    value="2026"
                    class="w-full border rounded-xl p-3 outline-none focus:ring-2 focus:ring-purple-500">

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3">

                <button
                    onclick="closeCalendarModal()"
                    class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">

                    Cancel

                </button>

                <button
                    onclick="changeCalendarDate()"
                    class="px-5 py-2 rounded-xl bg-purple-600 text-white hover:bg-purple-700">

                    Apply

                </button>

            </div>

        </div>

    </div>

    <input type="hidden" id="eventId">

    <div id="eventModal"
        class="hidden fixed inset-0 bg-black/30 z-50 flex items-center justify-center">

        <div class="bg-white w-[400px] rounded-3xl p-6 shadow-2xl">

            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                Tambah Event
            </h2>

            <div class="space-y-4">

                <input
                    type="text"
                    id="eventTitle"
                    placeholder="Nama event"
                    class="w-full border rounded-xl p-3">

                <textarea
                    id="eventDescription"
                    placeholder="Deskripsi"
                    class="w-full border rounded-xl p-3"></textarea>

                <input
                    type="date"
                    id="eventDate"
                    class="w-full border rounded-xl p-3">

                <div class="grid grid-cols-2 gap-3">

                    <input
                        type="time"
                        id="eventStart"
                        class="w-full border rounded-xl p-3">

                    <input
                        type="time"
                        id="eventEnd"
                        class="w-full border rounded-xl p-3">

                </div>

            </div>

            <div class="flex justify-between mt-6">

                <!-- DELETE -->
                <button
                    id="deleteBtn"
                    onclick="deleteEvent()"
                    class="hidden px-5 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600">

                    Delete

                </button>

                <div class="flex gap-3 ml-auto">

                    <!-- CANCEL -->
                    <button
                        onclick="closeEventModal()"
                        class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">

                        Cancel

                    </button>

                    <!-- SAVE / UPDATE -->
                    <button
                        id="saveBtn"
                        onclick="saveEvent()"
                        class="px-5 py-2 rounded-xl bg-purple-600 text-white hover:bg-purple-700">

                        Save

                    </button>

                </div>

            </div>

        </div>

    </div>

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

                            document
                                .getElementById('calendarModal')
                                .classList.remove('hidden');
                        }
                    }
                },

                buttonText: {

                    dayGridMonth: 'Month',

                    timeGridWeek: 'Week',

                    timeGridDay: 'Day'
                },

                // EVENTS
                events: '/calendar-events',

                // CLICK DATE = CREATE EVENT
                dateClick: function(info) {

                    // RESET FORM
                    document.getElementById('eventId').value = '';

                    document.getElementById('eventTitle').value = '';

                    document.getElementById('eventDescription').value = '';

                    document.getElementById('eventStart').value = '';

                    document.getElementById('eventEnd').value = '';

                    // SET DATE
                    document.getElementById('eventDate').value = info.dateStr;

                    // HIDE DELETE
                    document
                        .getElementById('deleteBtn')
                        .classList.add('hidden');

                    // BUTTON TEXT
                    document
                        .getElementById('saveBtn')
                        .innerText = 'Save';

                    // MODAL TITLE
                    document.querySelector('#eventModal h2')
                        .innerText = 'Tambah Event';

                    // OPEN MODAL
                    document
                        .getElementById('eventModal')
                        .classList.remove('hidden');
                },

                // CLICK EVENT = EDIT EVENT
                eventClick: function(info) {

                    let event = info.event;

                    // SHOW MODAL
                    document
                        .getElementById('eventModal')
                        .classList.remove('hidden');

                    // SET DATA
                    document.getElementById('eventId').value = event.id;

                    document.getElementById('eventTitle').value = event.title;

                    document.getElementById('eventDescription').value =
                        event.extendedProps.description ?? '';

                    document.getElementById('eventDate').value =
                        event.startStr.split('T')[0];

                    document.getElementById('eventStart').value =
                        event.startStr.split('T')[1]?.substring(0, 5) ?? '';

                    document.getElementById('eventEnd').value =
                        event.endStr?.split('T')[1]?.substring(0, 5) ?? '';

                    // SHOW DELETE BUTTON
                    document
                        .getElementById('deleteBtn')
                        .classList.remove('hidden');

                    // BUTTON TEXT
                    document
                        .getElementById('saveBtn')
                        .innerText = 'Update';

                    // MODAL TITLE
                    document.querySelector('#eventModal h2')
                        .innerText = 'Edit Event';
                },

                eventColor: '#9333ea',

                eventBorderColor: '#9333ea',

                eventTextColor: '#fff'

            });

            calendar.render();

            // CLOSE MONTH MODAL
            window.closeCalendarModal = function() {

                document
                    .getElementById('calendarModal')
                    .classList.add('hidden');
            }

            // CHANGE MONTH
            window.changeCalendarDate = async function() {

                let month = parseInt(
                    document.getElementById('monthSelect').value
                ) + 1;

                let year = document.getElementById('yearSelect').value;

                // MOVE CALENDAR
                let date = new Date(year, month - 1, 1);

                calendar.gotoDate(date);

                // FETCH EVENTS
                let response = await fetch(
                    `/events/filter?month=${month}&year=${year}`
                );

                let events = await response.json();

                let container = document.getElementById('upcomingEvents');

                container.innerHTML = '';

                // RENDER EVENTS
                events.forEach(event => {

                    container.innerHTML += `

            <div class="bg-white p-4 rounded-2xl shadow-sm">

                <div class="flex justify-between items-center mb-3">

                    <div class="flex items-center gap-2 text-xs text-gray-400">

                        <div class="w-2 h-2 rounded-full bg-purple-500"></div>

                        ${event.date} • ${event.start_time}

                    </div>

                    <i class="fa-solid fa-ellipsis text-gray-300 text-sm"></i>

                </div>

                <h2 class="text-lg font-semibold text-gray-800 mb-1">

                    ${event.title}

                </h2>

                <p class="text-sm text-gray-400">

                    ${event.description ?? ''}

                </p>

            </div>
            `;
                });

                closeCalendarModal();
            }

            // UPDATE HEADER TITLE
            function updateCustomTitle() {

                let title = calendar.view.title;

                let btn = document.querySelector('.fc-customTitle-button');

                if (btn) {

                    btn.innerHTML = `
                <span class="text-2xl font-bold text-gray-800 hover:text-purple-600 transition cursor-pointer">
                    ${title}
                </span>
            `;
                }
            }

            updateCustomTitle();

            calendar.on('datesSet', function() {

                updateCustomTitle();
            });

            // CLOSE EVENT MODAL
            window.closeEventModal = function() {

                document
                    .getElementById('eventModal')
                    .classList.add('hidden');
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

                // UPDATE MODE
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