<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tugas;
use App\Models\Absensi;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Http\Request;
use App\Models\Pengumpulan;

class GuruController extends Controller
{
    // DASHBOARD
    public function dashboardGuru()
    {
        $kelas = Kelas::all();

        return view('guru.dashboard', compact('kelas'));
    }

    // HALAMAN TUGAS
    public function kelas()
    {
        $kelas = Kelas::all();

        $tugas = Tugas::with('kelas')->latest()->get();

        $absensi = Absensi::with([
            'kelas',
            'user'
        ])->latest()->get();

        return view('guru.kelas', compact(
            'kelas',
            'tugas',
            'absensi'
        ));
    }

    public function detailKelas($id)
    {
        $kelas = Kelas::findOrFail($id);

        // AMBIL TUGAS BERDASARKAN KELAS
        $tugas = Tugas::where('kelas_id', $id)->get();

        // AMBIL ABSENSI BERDASARKAN KELAS
        $absensi = Absensi::where('kelas_id', $id)->get();

        return view('guru.detail-kelas', compact(
            'kelas',
            'tugas',
            'absensi'
        ));
    }

    public function absensi($id, Request $request)
    {
        $kelas = Kelas::findOrFail($id);

        // TANGGAL YANG DIPILIH
        $tanggal = $request->tanggal ?? date('Y-m-d');

        // AMBIL SISWA
        $siswa = User::where('kelas_id', $id)
            ->where('role', 'siswa')
            ->get();

        // AMBIL DATA ABSENSI SESUAI TANGGAL
        $dataAbsensi = Absensi::where('kelas_id', $id)
            ->where('tanggal', $tanggal)
            ->get()
            ->keyBy('user_id');

        return view('guru.absensi', compact(
            'kelas',
            'siswa',
            'tanggal',
            'dataAbsensi'
        ));
    }

    public function storeAbsensi(Request $request)
    {
        foreach ($request->status as $userId => $status) {

            Absensi::create([

                'user_id' => $userId,
                'kelas_id' => $request->kelas_id,
                'status' => $status,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan[$userId] ?? null

            ]);
        }

        return back()->with('success', 'Absensi berhasil disimpan');
    }

    // HALAMAN MATERI
    public function materi($id)
    {
        $kelas = Kelas::findOrFail($id);

        $materi = Materi::where(
            'kelas_id',
            $id
        )->latest()->get();

        return view(
            'guru.detail-materi',
            compact(
                'kelas',
                'materi'
            )
        );
    }

    // SIMPAN MATERI
    public function storeMateri(Request $request)
    {
        // VALIDASI
        $request->validate([

            'judul' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx|max:20480'
        ]);

        // UPLOAD FILE
        $fileName = time() . '.' .
            $request->file('file_materi')->extension();

        $request->file('file_materi')->move(
            public_path('materi'),
            $fileName
        );

        // SIMPAN DATABASE
        Materi::create([

            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $fileName
        ]);

        return back()->with(
            'success',
            'Materi berhasil ditambahkan'
        );
    }

    public function deleteMateri($id)
    {
        $materi = Materi::findOrFail($id);

        // HAPUS FILE
        $path = public_path('materi/' . $materi->file);

        if (file_exists($path)) {
            unlink($path);
        }

        $materi->delete();

        return back()->with(
            'success',
            'Materi berhasil dihapus'
        );
    }

    public function simpanNilai(Request $request)
    {
        $pengumpulan = Pengumpulan::findOrFail(
            $request->pengumpulan_id
        );

        $pengumpulan->update([

            'nilai' => $request->nilai,
            'catatan' => $request->catatan
        ]);

        return back()->with(
            'success',
            'Nilai berhasil disimpan'
        );
    }

    public function tugas($id)
    {
        $kelas = Kelas::findOrFail($id);

        // AMBIL TUGAS
        $tugas = Tugas::where(
            'kelas_id',
            $id
        )->latest()->get();

        // AMBIL PENGUMPULAN SISWA
        $pengumpulan = Pengumpulan::with([
            'siswa',
            'tugas'
        ])->get();

        return view(
            'guru.pengumpulan',
            compact(
                'kelas',
                'tugas',
                'pengumpulan'
            )
        );
    }

    public function storeTugas(Request $request)
    {
        $request->validate([

            'judul' => 'required',
            'deadline' => 'required',
            'file_tugas' => 'required'
        ]);

        // UPLOAD FILE
        $fileName = time() . '.' .
            $request->file('file_tugas')->extension();

        $request->file('file_tugas')->move(
            public_path('tugas'),
            $fileName
        );

        // SIMPAN DATABASE
        Tugas::create([

            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'deadline' => $request->deadline,
            'file_tugas' => $fileName
        ]);

        return back()->with(
            'success',
            'Tugas berhasil dibuat'
        );
    }

    public function detailTugas($id)
    {
        $tugas = Tugas::findOrFail($id);

        $pengumpulan = Pengumpulan::with([
            'siswa'
        ])
            ->where('tugas_id', $id)
            ->get();

        return view(
            'guru.detail-penilaian',
            compact(
                'tugas',
                'pengumpulan'
            )
        );
    }
}
