<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PrometheeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\RequestAkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// HALAMAN REGISTER
Route::get('/register', [AuthController::class, 'register']);

// PROSES REGISTER
Route::post('/register-process', [AuthController::class, 'registerProcess'])
    ->name('register.process');

// ================== REQUEST AKUN (PUBLIC) ==================
Route::get('/request-akun', [RequestAkunController::class, 'create']);
Route::post('/request-akun', [RequestAkunController::class, 'store']);

// ================== SUPERADMIN ==================
Route::middleware(['auth', 'role:superadmin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    });

    Route::resource('/siswa', SiswaController::class);
    Route::resource('/kriteria', KriteriaController::class);

    Route::get('/promethee', [PrometheeController::class, 'hitung']);

    // TAMBAHAN REQUEST AKUN
    Route::get('/admin/request-akun', [RequestAkunController::class, 'index']);
    Route::post('/admin/request-akun/{id}/approve', [RequestAkunController::class, 'approve']);
    Route::post('/admin/request-akun/{id}/reject', [RequestAkunController::class, 'reject']);
});


// ================== GURU ==================
Route::middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/guru-dashboard', [GuruController::class, 'dashboardGuru']);

    Route::get('/guru/kelas', [GuruController::class, 'kelas']);
    Route::get('/guru/kelas/{id}', [GuruController::class, 'detailKelas']);

    Route::get('/guru/absensi/{id}', [GuruController::class, 'absensi']);
    Route::post('/guru/absensi/store', [GuruController::class, 'storeAbsensi']);
    Route::get('/guru/kelas/{id}/absensi', [GuruController::class, 'absensiKelas']);

    Route::get('/guru/materi/{id}', [GuruController::class, 'materi']);
    Route::post('/guru/materi/store', [GuruController::class, 'storeMateri']);
    Route::get('/guru/materi/delete/{id}', [GuruController::class, 'deleteMateri']);

    Route::get('/guru/tugas/{id}', [GuruController::class, 'tugas']);
    Route::post('/guru/tugas/store', [GuruController::class, 'storeTugas']);
    Route::post('/guru/nilai/store', [GuruController::class, 'simpanNilai']);
    Route::get('/guru/tugas/detail/{id}', [GuruController::class, 'detailTugas']);
});


// ================== SISWA ==================
Route::middleware(['auth', 'role:siswa'])->group(function () {

    Route::get('/siswa-dashboard', [DashboardController::class, 'dashboardSiswa']);

    Route::get('/calendar', [DashboardController::class, 'siswaDashboard']);
    Route::get('/calendar-events', [DashboardController::class, 'getEvents']);
    Route::get('/events/filter', [DashboardController::class, 'filterEvents']);
    Route::post('/events/store', [DashboardController::class, 'storeEvent']);
    Route::put('/events/update/{id}', [DashboardController::class, 'updateEvent']);
    Route::delete('/events/delete/{id}', [DashboardController::class, 'deleteEvent']);

    Route::get('/pengumpulan-tugas', [DashboardController::class, 'pengumpulanTugas']);
    Route::get('/tugas/{id}', [DashboardController::class, 'detailTugas']);
    Route::post('/tugas/{id}/upload', [DashboardController::class, 'uploadTugas']);

    Route::get('/rekap', [AbsensiController::class, 'rekap']);
    Route::get('/absensi', [AbsensiController::class, 'index']);
    Route::post('/absensi/izin', [AbsensiController::class, 'izin']);
    Route::post('/absensi/store', [AbsensiController::class, 'store']);

    Route::get('/kelas', [DashboardController::class, 'kelas']);
    Route::get('/kelas/{id}', [DashboardController::class, 'detailKelas']);

    Route::get('/settings', [DashboardController::class, 'settings']);
});
