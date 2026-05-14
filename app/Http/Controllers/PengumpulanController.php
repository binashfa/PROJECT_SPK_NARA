<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class PengumpulanController extends Controller
{
    public function index()
    {
        $data = Pengumpulan::with('siswa', 'tugas')->get();
        return view('pengumpulan.index', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $filePath = $request->file('file')->store('tugas');

        Pengumpulan::create([
            'siswa_id' => Auth::user()->id,
            'tugas_id' => $request->tugas_id,
            'file' => $filePath
        ]);

        return back()->with('success', 'Tugas berhasil dikumpulkan');
    }

    public function beriNilai(Request $request, $id)
    {
        $data = Pengumpulan::find($id);

        // simpan nilai ke pengumpulan
        $data->update([
            'nilai' => $request->nilai
        ]);

        // 🔥 ambil kriteria "Nilai Tugas"
        $kriteria = Kriteria::where('nama', 'Nilai Tugas')->first();

        if ($kriteria) {
            // 🔥 masuk ke tabel nilai (SPK)
            Nilai::updateOrCreate(
                [
                    'siswa_id' => $data->siswa_id,
                    'kriteria_id' => $kriteria->id
                ],
                [
                    'nilai' => $request->nilai
                ]
            );
        }

        return back()->with('success', 'Nilai berhasil diberikan & masuk ke SPK');
    }
}
