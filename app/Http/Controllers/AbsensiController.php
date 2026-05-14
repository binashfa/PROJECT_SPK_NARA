<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use App\Models\Absensi;
use App\Models\Kelas;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // HALAMAN
    public function index()
    {
        $setting = Setting::first();

        $kelas = Kelas::where('id', Auth::user()->kelas_id)->get();

        return view('siswa.absensi', compact(
            'setting',
            'kelas'
        ));
    }

    public function rekap()
    {
        $setting = Setting::first();

        // tanggal realtime
        $today = Carbon::now();

        // ambil absensi terbaru + relasi kelas
        $absensis = Absensi::with('kelas', 'user')
            ->latest()
            ->take(7)
            ->get();

        // statistik
        $total = Absensi::count();

        $hadir = Absensi::where('status', 'hadir')->count();
        $izin = Absensi::where('status', 'izin')->count();
        $alpha = Absensi::where('status', 'alpha')->count();

        $persenHadir = $total ? round(($hadir / $total) * 100) : 0;
        $persenIzin = $total ? round(($izin / $total) * 100) : 0;
        $persenAlpha = $total ? round(($alpha / $total) * 100) : 0;

        $todayAttendance = Absensi::where('user_id', Auth::id())
            ->whereDate('created_at', today())
            ->exists();

        return view('siswa.rekap', compact(
            'setting',
            'today',
            'absensis',
            'persenHadir',
            'persenIzin',
            'persenAlpha',
            'todayAttendance'
        ));
    }

    // SIMPAN ABSEN
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        // AMBIL SETTING
        $setting = Setting::first();

        // HITUNG JARAK
        $distance = $this->distance(
            $setting->school_lat,
            $setting->school_lng,
            $request->latitude,
            $request->longitude
        );

        // JIKA JAUH
        if ($distance > $setting->max_radius) {

            return response()->json([
                'success' => false,
                'message' => 'Anda berada terlalu jauh dari sekolah.'
            ]);
        }

        // BASE64 IMAGE
        $image = $request->image;

        $image = str_replace('data:image/png;base64,', '', $image);

        $image = str_replace(' ', '+', $image);

        $imageName = time() . '.png';

        Storage::disk('public')->put(
            'absensi/' . $imageName,
            base64_decode($image)
        );

        // SIMPAN DB
        Absensi::create([
            'user_id' => Auth::id(),
            'kelas_id' => Auth::user()->kelas_id,
            'foto' => $imageName,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => 'hadir'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Absensi berhasil!',
            'address' => 'Area Sekolah',
            'time' => Carbon::now()->format('H:i:s')
        ]);
    }

    // HITUNG JARAK GPS
    private function distance(
        float $lat1,
        float $lon1,
        float $lat2,
        float $lon2
    ): float {
        $earthRadius = 6371000;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public function izin(Request $request)
    {
        $request->validate([
            'surat' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $file = $request->file('surat');

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('izin', $filename, 'public');

        // SIMPAN ABSENSI IZIN
        Absensi::create([

            'user_id' => Auth::id(),

            'kelas_id' => Auth::user()->kelas_id,

            'foto' => $filename,

            'latitude' => 0,

            'longitude' => 0,

            'status' => 'izin'

        ]);

        return response()->json([

            'success' => true,

            'message' => 'Surat izin berhasil dikirim'

        ]);
    }
}
