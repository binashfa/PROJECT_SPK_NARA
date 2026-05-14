<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth; 
use App\Models\Kriteria;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        $kriteria = Kriteria::all();

        return view('nilai.index', compact('siswa', 'kriteria'));
    }

    public function store(Request $request)
    {
        foreach ($request->nilai as $siswa_id => $kriteriaData) {
            foreach ($kriteriaData as $kriteria_id => $value) {

                Nilai::updateOrCreate(
                    [
                        'siswa_id' => $siswa_id,
                        'kriteria_id' => $kriteria_id
                    ],
                    [
                        'nilai' => $value
                    ]
                );
            }
        }

        return redirect('/nilai')->with('success', 'Nilai berhasil disimpan');
    }

    public function siswa()
    {
        $siswa_id = Auth::user()->id;

        // nilai dari tugas
        $tugas = Pengumpulan::with('tugas')
            ->where('siswa_id', $siswa_id)
            ->get();

        // nilai SPK
        $nilai = Nilai::with('kriteria')
            ->where('siswa_id', $siswa_id)
            ->get();

        return view('nilai.siswa', compact('tugas', 'nilai'));
    }
}
