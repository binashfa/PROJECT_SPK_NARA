<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Online</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gradient-to-b from-white via-[#fdfafa] to-[#faf6f6] min-h-screen antialiased text-gray-800">

    @include('siswa.navbar')

    <main class="max-w-7xl mx-auto px-6 pt-[40px] pb-16">

        <div class="mb-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 text-sm font-medium text-[#105666] bg-white px-4 py-2 rounded-xl shadow-sm border border-gray-100 transition hover:shadow-md hover:bg-[#f9fdf8]">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <div class="bg-gradient-to-br from-[#F7F4D5] via-[#f3f0d0] to-[#f9f6e2] rounded-[30px] p-8 border border-[#ece8c9] mb-8 relative overflow-hidden">
            
            <div class="absolute top-0 left-0 w-full h-[4px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

            <div class="absolute -top-16 -left-16 w-40 h-40 bg-[#105666]/10 blur-3xl rounded-full"></div>
            <div class="absolute -bottom-16 -right-16 w-40 h-40 bg-[#D3968C]/10 blur-3xl rounded-full"></div>

            <div class="flex flex-col md:flex-row justify-between gap-6 relative z-10">
                <div>
                    <h1 class="text-3xl md:text-4xl font-black text-[#105666] mb-2">
                        Absensi Online
                    </h1>
                    <p class="text-gray-600 text-sm md:text-base max-w-md">
                        Lakukan kehadiran harian dan pantau aktivitas absensi secara real-time.
                    </p>
                </div>

                <div class="hidden md:flex items-center justify-center">
                    <div class="w-20 h-20 bg-white/60 backdrop-blur-md rounded-2xl flex items-center justify-center shadow-inner border border-white/50">
                        <i class="fa-solid fa-calendar-check text-[#105666] text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-4 pb-5 border-b border-gray-100 text-gray-400 text-[11px] uppercase tracking-wider font-semibold px-2">
            <p>Kelas</p>
            <p>Jam Masuk</p>
            <p>Jam Selesai</p>
            <p>Status</p>
        </div>

        <div class="divide-y divide-gray-100 mb-6">
            @foreach($kelas as $item)
                <div class="grid grid-cols-4 items-center py-6 transition hover:bg-[#f9fdf8] rounded-2xl px-2">
                    
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-[#eef6f6] flex items-center justify-center shrink-0 text-[#105666] transition group-hover:bg-[#105666] group-hover:text-white">
                            <i class="fa-solid fa-book text-sm"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-800">
                                {{ $item->nama_kelas }}
                            </h3>
                            <p class="text-gray-400 text-xs">
                                ID : {{ $item->id }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <div class="inline-block px-4 py-2 rounded-xl bg-[#f1f5f9] text-gray-700 text-sm font-medium">
                            {{ \Carbon\Carbon::parse($item->start_time)->format('H:i') }}
                        </div>
                    </div>

                    <div>
                        <div class="inline-block px-4 py-2 rounded-xl bg-[#f1f5f9] text-gray-700 text-sm font-medium">
                            {{ \Carbon\Carbon::parse($item->end_time)->format('H:i') }}
                        </div>
                    </div>

                    <div>
                        <button data-id="{{ $item->id }}" onclick="selectClass(this.dataset.id)" class="kelasBtn px-5 py-2.5 rounded-xl text-sm font-semibold border border-[#105666]/30 text-[#105666] transition-all duration-300 hover:bg-[#105666] hover:text-white hover:shadow-sm hover:-translate-y-[1px]">
                            Pilih
                        </button>
                    </div>

                </div>
            @endforeach
        </div>

        <div id="locationStatus" class="mt-8 hidden p-5 rounded-2xl font-medium border border-gray-100 bg-white shadow-sm"></div>

        <button id="absenBtn" onclick="checkLocation()" class="mt-6 hidden px-8 py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#0d4b59] hover:to-[#105666] transition-all duration-300 hover:-translate-y-[2px] hover:shadow-md">
            Lanjutkan Absensi
        </button>

        <div id="izinModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center p-6">
            <div class="bg-white w-full max-w-xl rounded-[32px] p-8 relative overflow-hidden">
                
                <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-[#105666]">
                            Upload Surat Izin
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Anda berada di luar area sekolah
                        </p>
                    </div>
                    <button onclick="closeIzinModal()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition flex items-center justify-center">
                        <i class="fa-solid fa-xmark text-gray-600"></i>
                    </button>
                </div>

                <div class="bg-[#fff1f1] border border-[#f8d7da] text-[#D3968C] rounded-2xl p-4 mb-6 text-sm font-medium">
                    Upload surat izin/sakit untuk melakukan absensi.
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        File Surat
                    </label>
                    <input type="file" id="suratIzin" accept="image/*,.pdf" class="w-full border border-gray-200 rounded-xl px-4 py-3 bg-[#fafafa] text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#105666]/30 transition">
                </div>

                <button onclick="uploadIzin()" class="w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#0d4b59] hover:to-[#105666] transition-all duration-300 hover:-translate-y-[2px] hover:shadow-md">
                    Upload Surat Izin
                </button>

            </div>
        </div>

        <div id="cameraModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center p-6">
            <div class="bg-white w-full max-w-3xl rounded-[32px] p-6 relative overflow-hidden">
                
                <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-xl font-bold text-[#105666]">
                            Kamera Realtime
                        </h2>
                        <p class="text-sm text-gray-500 mt-1">
                            Pastikan wajah terlihat jelas
                        </p>
                    </div>
                    <button onclick="closeCameraModal()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 transition flex items-center justify-center">
                        <i class="fa-solid fa-xmark text-gray-600"></i>
                    </button>
                </div>

                <div class="rounded-2xl overflow-hidden bg-black h-[400px]">
                    <video id="video" autoplay playsinline class="w-full h-full object-cover"></video>
                </div>

                <button onclick="takeAttendance()" class="mt-6 w-full py-3.5 rounded-xl font-semibold text-white bg-gradient-to-r from-[#105666] to-[#0d4b59] hover:from-[#0d4b59] hover:to-[#105666] transition-all duration-300 hover:-translate-y-[2px] hover:shadow-md">
                    Ambil Foto & Absen
                </button>

            </div>
        </div>

        <div id="resultModal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-center justify-center p-6">
            <div class="bg-white w-full max-w-[500px] rounded-[32px] p-8 relative overflow-hidden">
                
                <div class="absolute top-0 left-0 w-full h-[3px] bg-gradient-to-r from-[#105666] via-[#839958] to-[#D3968C]"></div>

                <h2 class="text-2xl font-bold text-[#105666] mb-6">
                    Absensi Berhasil
                </h2>

                <img id="resultImage" class="w-full h-64 object-cover rounded-2xl mb-5" alt="Hasil Absensi">

                <div class="space-y-3 text-gray-700 text-sm">
                    <p>
                        <span class="font-semibold text-gray-500">Status:</span>
                        <span class="text-[#105666] font-semibold">Hadir</span>
                    </p>
                    <p>
                        <span class="font-semibold text-gray-500">Kelas:</span>
                        <span id="resultClass"></span>
                    </p>
                    <p>
                        <span class="font-semibold text-gray-500">Alamat:</span>
                        <span id="resultAddress"></span>
                    </p>
                    <p>
                        <span class="font-semibold text-gray-500">Jam:</span>
                        <span id="resultTime"></span>
                    </p>
                </div>

                <button onclick="closeModal()" class="mt-6 w-full py-3 rounded-xl font-semibold text-white bg-gradient-to-r from-[#839958] to-[#105666] hover:from-[#105666] hover:to-[#839958] transition-all duration-300 hover:-translate-y-[2px] hover:shadow-md">
                    Tutup
                </button>

            </div>
        </div>

        <div id="schoolData" 
             data-lat="{{ $setting->school_lat }}" 
             data-lng="{{ $setting->school_lng }}" 
             data-radius="{{ $setting->max_radius }}">
        </div>

    </main>

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

            document.getElementById('absenBtn').classList.remove('hidden');

            document.querySelectorAll('.kelasBtn').forEach(btn => {
                btn.classList.remove('border-purple-500', 'bg-purple-50');
            });

            event.currentTarget.classList.add('border-purple-500', 'bg-purple-50');
        }

        // CEK LOKASI
        function checkLocation() {
            const statusBox = document.getElementById('locationStatus');

            navigator.geolocation.getCurrentPosition(position => {
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;

                let distance = getDistance(latitude, longitude, schoolLat, schoolLng);

                // JIKA JAUH
                if (distance > maxRadius) {
                    statusBox.className = 'mt-6 bg-red-100 text-red-700 p-5 rounded-2xl font-medium';
                    statusBox.innerHTML = 'Anda terlalu jauh dari sekolah. Upload surat izin/sakit.';
                    statusBox.classList.remove('hidden');

                    // Tampilkan upload izin
                    document.getElementById('izinModal').classList.remove('hidden');
                    return;
                }

                // JIKA DEKAT
                statusBox.className = 'mt-6 bg-green-100 text-green-700 p-5 rounded-2xl font-medium';
                statusBox.innerHTML = 'Lokasi valid. Kamera berhasil diaktifkan.';
                statusBox.classList.remove('hidden');

                // TAMPILKAN CAMERA
                document.getElementById('cameraModal').classList.remove('hidden');

                // AKSES KAMERA
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(stream => {
                        video.srcObject = stream;
                    });
            });
        }

        // HITUNG JARAK (HAVERSINE FORMULA)
        function getDistance(lat1, lon1, lat2, lon2) {
            let R = 6371e3; // metres
            let φ1 = lat1 * Math.PI / 180;
            let φ2 = lat2 * Math.PI / 180;
            let Δφ = (lat2 - lat1) * Math.PI / 180;
            let Δλ = (lon2 - lon1) * Math.PI / 180;

            let a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                    Math.cos(φ1) * Math.cos(φ2) *
                    Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
            let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

            return R * c;
        }

        // AMBIL FOTO & PROSES ABSEN
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
                // TAMPILKAN BOX RESULT MODAL
                document.getElementById('resultModal').classList.remove('hidden');

                // ISI DATA KE MODAL
                document.getElementById('resultImage').src = image;
                document.getElementById('resultClass').innerHTML = selectedClass;
                document.getElementById('resultAddress').innerHTML = result.address;
                document.getElementById('resultTime').innerHTML = result.time;

                closeCameraModal();
            } else {
                alert(result.message);
            }
        }

        // PROSES UPLOAD SURAT IZIN
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

        // UTILITY CLOSING MODALS
        function closeModal() {
            document.getElementById('resultModal').classList.add('hidden');
            window.location.href = '/rekap';
        }

        function closeCameraModal() {
            document.getElementById('cameraModal').classList.add('hidden');
            // stop track streaming kamera
            if (video.srcObject) {
                video.srcObject.getTracks().forEach(track => track.stop());
            }
        }

        function closeIzinModal() {
            document.getElementById('izinModal').classList.add('hidden');
            window.location.href = '/rekap';
        }
    </script>
</body>

</html>