<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::all();
        return view('kriteria.index', compact('data'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        Kriteria::create($request->all());
        return redirect('/kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->update($request->all());
        return redirect('/kriteria');
    }

    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect('/kriteria');
    }
}
