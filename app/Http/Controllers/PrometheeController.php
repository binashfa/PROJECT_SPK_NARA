<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kriteria;
use App\Models\Nilai;

class PrometheeController extends Controller
{
    public function hitung()
    {
        $siswa = Siswa::with('nilai')->get();
        $kriteria = Kriteria::all();

        $hasil = [];

        foreach ($siswa as $a) {
            $leaving = 0;
            $entering = 0;

            foreach ($siswa as $b) {
                if ($a->id == $b->id) continue;

                $preferensi = 0;

                foreach ($kriteria as $k) {
                    $nilaiA = Nilai::where('siswa_id', $a->id)
                        ->where('kriteria_id', $k->id)->value('nilai') ?? 0;

                    $nilaiB = Nilai::where('siswa_id', $b->id)
                        ->where('kriteria_id', $k->id)->value('nilai') ?? 0;

                    $selisih = $nilaiA - $nilaiB;

                    // fungsi preferensi sederhana
                    if ($k->tipe == 'benefit') {
                        $p = $selisih > 0 ? 1 : 0;
                    } else {
                        $p = $selisih < 0 ? 1 : 0;
                    }

                    $preferensi += $p * $k->bobot;
                }

                $leaving += $preferensi;
                $entering += (1 - $preferensi);
            }

            $net = $leaving - $entering;

            $hasil[] = [
                'nama' => $a->nama,
                'leaving' => $leaving,
                'entering' => $entering,
                'net' => $net
            ];
        }

        // sorting ranking
        usort($hasil, function ($a, $b) {
            return $b['net'] <=> $a['net'];
        });

        $labels = [];
        $values = [];

        foreach ($hasil as $h) {
            $labels[] = $h['nama'];
            $values[] = $h['net'];
        }

        return view('promethee.index', compact('hasil', 'labels', 'values'));
    }
}
