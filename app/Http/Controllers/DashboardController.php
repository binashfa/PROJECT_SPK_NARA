<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tugas;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Nilai;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function siswaDashboard()
    {
        // AMBIL SEMUA EVENT
        $events = Event::orderBy('date', 'asc')->get();

        return view('siswa.kalender', compact('events'));
    }

    // API CALENDAR
    public function getEvents()
    {
        $events = Event::all();

        $data = [];

        foreach ($events as $event) {

            $data[] = [

                'id' => $event->id,

                'title' => $event->title,

                'start' => $event->date . 'T' . $event->start_time,

                'end' => $event->date . 'T' . $event->end_time,

                'description' => $event->description,

                'backgroundColor' => '#9333ea',

                'borderColor' => '#9333ea',
            ];
        }

        return response()->json($data);
    }

    public function filterEvents(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $events = Event::whereMonth('date', $month)
            ->whereYear('date', $year)
            ->get();

        return response()->json($events);
    }

    public function pengumpulanTugas()
    {
        $tugas = Tugas::with('kelas')->latest()->get();

        $kelas = Kelas::all();

        return view('siswa.tugas', compact('tugas', 'kelas'));
    }

    public function storeEvent(Request $request)
    {
        Event::create([

            'title' => $request->title,

            'date' => $request->date,

            'start_time' => $request->start_time,

            'end_time' => $request->end_time,

            'type' => $request->type,

            'description' => $request->description,

        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update([

            'title' => $request->title,

            'description' => $request->description,

            'date' => $request->date,

            'start_time' => $request->start_time,

            'end_time' => $request->end_time,

        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function deleteEvent($id)
    {
        Event::findOrFail($id)->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function dashboardSiswa()
    {
        // TUGAS
        $tugas = Tugas::with('kelas')
            ->latest()
            ->take(3)
            ->get();

        // TOTAL TUGAS
        $totalTugas = Tugas::count();

        // TOTAL KELAS
        $totalKelas = Kelas::count();

        // KEHADIRAN
        $totalAbsensi = Absensi::count();

        $hadir = Absensi::where('status', 'hadir')->count();

        $persentaseKehadiran = $totalAbsensi
            ? round(($hadir / $totalAbsensi) * 100)
            : 0;

        // JADWAL HARI INI
        $jadwalHariIni = Kelas::whereNotNull('start_time')
            ->orderBy('start_time')
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'tugas',
            'totalTugas',
            'totalKelas',
            'persentaseKehadiran',
            'jadwalHariIni'
        ));
    }

    public function detailTugas($id)
    {
        $tugas = Tugas::with('kelas')->findOrFail($id);

        return view('siswa.detail-tugas', compact('tugas'));
    }

    public function uploadTugas(Request $request, $id)
    {
        $request->validate([
            'file_tugas' => 'required|file|mimes:pdf,doc,docx,zip,rar,jpg,png|max:10000'
        ]);

        $tugas = Tugas::findOrFail($id);

        // HAPUS FILE LAMA
        if ($tugas->file_tugas) {

            Storage::disk('public')->delete(
                'tugas/' . $tugas->file_tugas
            );
        }

        // FILE BARU
        $file = $request->file('file_tugas');

        $filename = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('tugas', $filename, 'public');

        // UPDATE DB
        $tugas->update([

            'file_tugas' => $filename,

            'status' => 'selesai'

        ]);

        return redirect()
            ->back()
            ->with('success', 'Tugas berhasil diupload');
    }

    public function kelas()
    {
        $kelas = Kelas::all();

        return view('siswa.kelas', compact('kelas'));
    }

    public function detailKelas($id)
    {
        // kelas
        $kelas = Kelas::findOrFail($id);

        // materi
        $materis = Materi::where('kelas_id', $id)
            ->latest()
            ->get();

        // nilai siswa login
        $nilais = Nilai::where('kelas_id', $id)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        // absensi siswa login
        $absensis = Absensi::where('kelas_id', $id)
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('siswa.detail-kelas', compact(
            'kelas',
            'materis',
            'nilais',
            'absensis'
        ));
    }

    public function settings()
{
    return view('siswa.setting');
}
}
