<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Absensi Online</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-[#f5f5f7] min-h-screen">

    <!-- NAVBAR -->
    @include('siswa.navbar')

    <!-- MAIN -->
    <div class="p-6 bg-[#f5f5f7] min-h-screen flex items-center justify-center">

        <div class="w-full max-w-5xl bg-white rounded-[45px] p-10 shadow-sm relative overflow-hidden">

            <!-- HEADER -->
            <div class="grid grid-cols-4 pb-5 border-b text-gray-500 text-sm font-semibold">

                <p>KELAS</p>
                <p>JAM MASUK</p>
                <p>JAM SELESAI</p>
                <p>STATUS</p>

            </div>

            <!-- LIST -->
            <div class="divide-y">

                @foreach($kelas as $item)

                <div class="grid grid-cols-4 items-center py-6">

                    <!-- KELAS -->
                    <div class="flex items-center gap-4">

                        <!-- ICON -->
                        <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center shrink-0">

                            <i class="fa-solid fa-book text-purple-600 text-lg"></i>

                        </div>

                        <!-- INFO -->
                        <div>

                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $item->nama_kelas }}
                            </h3>

                            <p class="text-gray-400 text-sm">
                                ID : {{ $item->id }}
                            </p>

                        </div>

                    </div>

                    <!-- JAM MASUK -->
                    <div>

                        <div class="border border-gray-300 rounded-2xl px-5 py-4 inline-block text-gray-700 font-medium">

                            {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}

                        </div>

                    </div>

                    <!-- JAM SELESAI -->
                    <div>

                        <div class="border border-gray-300 rounded-2xl px-5 py-4 inline-block text-gray-700 font-medium">

                            {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}

                        </div>

                    </div>

                    <!-- STATUS -->
                    <div>

                        <button
                            data-id="{{ $item->id }}"
                            onclick="selectClass(this.dataset.id)"
                            class="kelasBtn border border-purple-500 text-purple-600 hover:bg-purple-600 hover:text-white transition px-5 py-4 rounded-2xl font-medium">

                            Pilih

                        </button>

                    </div>

                </div>

                @endforeach

            </div>

            <!-- STATUS BOX -->
            <div id="locationStatus"
                class="mt-8 hidden p-5 rounded-2xl font-medium">
            </div>

            <!-- IZIN MODAL -->
            <div id="izinModal"
                class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-6">

                <div class="bg-white w-full max-w-xl rounded-[35px] p-8">

                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-red-500">
                                Upload Surat Izin
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Anda berada di luar area sekolah
                            </p>

                        </div>

                        <button
                            onclick="closeIzinModal()"
                            class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                    <!-- ALERT -->
                    <div class="bg-red-50 border border-red-100 text-red-600 rounded-2xl p-4 mb-6 text-sm">

                        Upload surat izin/sakit untuk melakukan absensi.

                    </div>

                    <!-- INPUT -->
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        File Surat
                    </label>

                    <input
                        type="file"
                        id="suratIzin"
                        accept="image/*,.pdf"
                        class="w-full border border-gray-300 rounded-2xl p-3 bg-white">

                    <!-- BUTTON -->
                    <button
                        onclick="uploadIzin()"
                        class="mt-6 w-full bg-yellow-500 hover:bg-yellow-600 text-white py-4 rounded-2xl font-semibold transition">

                        Upload Surat Izin

                    </button>

                </div>

            </div>

            <!-- ABSEN BUTTON -->
            <button id="absenBtn"
                onclick="checkLocation()"
                class="mt-6 hidden bg-purple-600 hover:bg-purple-700 text-white px-8 py-4 rounded-2xl font-semibold transition">

                Lanjutkan Absensi

            </button>

            <!-- CAMERA MODAL -->
            <div id="cameraModal"
                class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-6">

                <div class="bg-white w-full max-w-3xl rounded-[35px] p-6">

                    <!-- HEADER -->
                    <div class="flex items-center justify-between mb-5">

                        <div>

                            <h2 class="text-2xl font-bold text-gray-800">
                                Kamera Realtime
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Pastikan wajah terlihat jelas
                            </p>

                        </div>

                        <button
                            onclick="closeCameraModal()"
                            class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition">

                            <i class="fa-solid fa-xmark"></i>

                        </button>

                    </div>

                    <!-- VIDEO -->
                    <div class="rounded-3xl overflow-hidden bg-black h-[400px]">

                        <video id="video"
                            autoplay
                            playsinline
                            class="w-full h-full object-cover">
                        </video>

                    </div>

                    <!-- BUTTON -->
                    <button onclick="takeAttendance()"
                        class="mt-6 w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-2xl font-semibold transition">

                        Ambil Foto & Absen

                    </button>

                </div>

            </div>

        </div>

    </div>

    <div id="schoolData"
        data-lat="{{ $setting->school_lat }}"
        data-lng="{{ $setting->school_lng }}"
        data-radius="{{ $setting->max_radius }}">
    </div>

    <!-- MODAL HASIL ABSEN -->
    <div id="resultModal"
        class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">

        <div class="bg-white w-[500px] rounded-[35px] p-8">

            <h2 class="text-3xl font-bold text-green-600 mb-6">
                Absensi Berhasil
            </h2>

            <!-- FOTO -->
            <img id="resultImage"
                class="w-full h-72 object-cover rounded-3xl mb-5">

            <!-- INFO -->
            <div class="space-y-3 text-gray-700">

                <p>
                    <span class="font-semibold">Status:</span>
                    Hadir
                </p>

                <p>
                    <span class="font-semibold">Kelas:</span>
                    <span id="resultClass"></span>
                </p>

                <p>
                    <span class="font-semibold">Alamat:</span>
                    <span id="resultAddress"></span>
                </p>

                <p>
                    <span class="font-semibold">Jam:</span>
                    <span id="resultTime"></span>
                </p>

            </div>

            <!-- BUTTON -->
            <button onclick="closeModal()"
                class="mt-6 w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-2xl">

                Tutup

            </button>

        </div>

    </div>

    <script>
        const school = document.getElementById('schoolData');

        const schoolLat = parseFloat(school.dataset.lat);
        const schoolLng = parseFloat(school.dataset.lng);
        const maxRadius = parseFloat(school.dataset.radius);

        let latitude = null;
        let longitude = null;
        let selectedClass = null;

        const video = document.getElementById('video');

        // PILIH KELAS
        function selectClass(kelas) {
            selectedClass = kelas;

            document.getElementById('absenBtn')
                .classList.remove('hidden');

            document.querySelectorAll('.kelasBtn')
                .forEach(btn => {

                    btn.classList.remove(
                        'border-purple-500',
                        'bg-purple-50'
                    );

                });

            event.currentTarget.classList.add(
                'border-purple-500',
                'bg-purple-50'
            );
        }

        // CEK LOKASI
        function checkLocation() {
            const statusBox = document.getElementById('locationStatus');

            navigator.geolocation.getCurrentPosition(position => {

                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                let distance = getDistance(
                    latitude,
                    longitude,
                    schoolLat,
                    schoolLng
                );

                // JIKA JAUH
                if (distance > maxRadius) {

                    statusBox.className =
                        'mt-6 bg-red-100 text-red-700 p-5 rounded-2xl font-medium';

                    statusBox.innerHTML =
                        'Anda terlalu jauh dari sekolah. Upload surat izin/sakit.';

                    statusBox.classList.remove('hidden');

                    // tampilkan upload izin
                    document.getElementById('izinModal')
                        .classList.remove('hidden');

                    return;
                }

                // JIKA DEKAT
                statusBox.className =
                    'mt-6 bg-green-100 text-green-700 p-5 rounded-2xl font-medium';

                statusBox.innerHTML =
                    'Lokasi valid. Kamera berhasil diaktifkan.';

                statusBox.classList.remove('hidden');

                // TAMPILKAN CAMERA
                document.getElementById('cameraModal')
                    .classList.remove('hidden');

                // AKSES KAMERA
                navigator.mediaDevices.getUserMedia({
                        video: true
                    })
                    .then(stream => {

                        video.srcObject = stream;

                    });

            });
        }

        // HITUNG JARAK
        function getDistance(lat1, lon1, lat2, lon2) {
            let R = 6371e3;

            let φ1 = lat1 * Math.PI / 180;
            let φ2 = lat2 * Math.PI / 180;

            let Δφ = (lat2 - lat1) * Math.PI / 180;
            let Δλ = (lon2 - lon1) * Math.PI / 180;

            let a =
                Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                Math.cos(φ1) * Math.cos(φ2) *
                Math.sin(Δλ / 2) * Math.sin(Δλ / 2);

            let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            return R * c;
        }

        // ABSEN
        async function takeAttendance() {
            const canvas = document.createElement('canvas');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const context = canvas.getContext('2d');

            context.drawImage(video, 0, 0);

            let image = canvas.toDataURL('image/png');

            let response = await fetch('/absensi/store', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                body: JSON.stringify({

                    image: image,
                    latitude: latitude,
                    longitude: longitude,
                    kelas: selectedClass

                })

            });

            let result = await response.json();

            if (result.success) {

                // TAMPILKAN BOX
                document.getElementById('resultModal')
                    .classList.remove('hidden');

                // FOTO
                document.getElementById('resultImage')
                    .src = image;

                // KELAS
                document.getElementById('resultClass')
                    .innerHTML = selectedClass;

                // ALAMAT
                document.getElementById('resultAddress')
                    .innerHTML = result.address;

                // JAM
                document.getElementById('resultTime')
                    .innerHTML = result.time;

                closeCameraModal();

            } else {

                alert(result.message);

            }
        }

        async function uploadIzin() {

            let fileInput = document.getElementById('suratIzin');

            if (!fileInput.files.length) {

                alert('Upload surat terlebih dahulu');

                return;
            }

            let formData = new FormData();

            formData.append('surat', fileInput.files[0]);

            let response = await fetch('/absensi/izin', {

                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                body: formData

            });

            let result = await response.json();

            if (result.success) {

                alert('Surat izin berhasil dikirim');

                window.location.href = '/rekap';

            } else {

                alert(result.message);

            }
        }

        function closeModal() {

            document.getElementById('resultModal')
                .classList.add('hidden');

            window.location.href = '/rekap';
        }

        function closeCameraModal() {

            document.getElementById('cameraModal')
                .classList.add('hidden');

            // stop kamera
            if (video.srcObject) {

                video.srcObject.getTracks().forEach(track => track.stop());

            }
        }

        function closeIzinModal() {

            document.getElementById('izinModal')
                .classList.add('hidden');

            window.location.href = '/rekap';

        }
    </script>
</body>

</html>