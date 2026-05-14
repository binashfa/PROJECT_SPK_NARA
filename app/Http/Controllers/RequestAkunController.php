<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RequestAkun;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RequestAkunController extends Controller
{
    // form request (public)
    public function create()
    {
        return view('auth.request');
    }

    // simpan request (public)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:request_akuns,email',
            'role' => 'required'
        ]);

        RequestAkun::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role
        ]);

        return back()->with('success', 'Request berhasil dikirim!');
    }

    // list request (admin)
    public function index()
    {
        $data = RequestAkun::all();
        return view('admin.request', compact('data'));
    }

    // approve request (admin)
    public function approve($id)
    {
        $req = RequestAkun::findOrFail($id);

        // buat user otomatis (password default)
        User::create([
            'name' => $req->nama,
            'email' => $req->email,
            'password' => Hash::make('12345678'),
            'role' => $req->role
        ]);

        $req->update(['status' => 'approved']);

        return back()->with('success', 'Akun berhasil dibuat!');
    }

    // reject request (admin)
    public function reject($id)
    {
        $req = RequestAkun::findOrFail($id);
        $req->update(['status' => 'rejected']);

        return back()->with('success', 'Request ditolak');
    }
}
