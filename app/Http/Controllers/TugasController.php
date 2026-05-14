<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        return view('tugas.index', compact('tugas'));
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $request)
    {
        Tugas::create($request->all());
        return redirect('/tugas');
    }

    public function dashboardGuru()
    {
        $tugas = Tugas::all();

        return view('guru.dashboard', compact('tugas'));
    }
}
