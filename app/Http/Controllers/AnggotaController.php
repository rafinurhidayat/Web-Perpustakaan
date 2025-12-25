<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    /**
     * Tampilkan daftar anggota milik user login
     */
    public function index()
    {
        $anggotas = Anggota::where('user_id', Auth::id())->get();
        return view('anggota.index', compact('anggotas'));
    }

    /**
     * Form tambah anggota
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Simpan data anggota
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required',
            'no_anggota' => 'required|unique:anggotas,no_anggota',
            'alamat'     => 'required',
            'no_hp'      => 'required',
        ]);

        Anggota::create([
            'user_id'    => Auth::id(),   // 🔥 WAJIB
            'nama'       => $request->nama,
            'no_anggota' => $request->no_anggota,
            'alamat'     => $request->alamat,
            'no_hp'      => $request->no_hp,
        ]);

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function edit($id)
{
    $anggota = Anggota::findOrFail($id);
    return view('anggota.edit', compact('anggota'));
}

/**
     * Edit data anggota
     */
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'no_anggota' => 'required|unique:anggotas,no_anggota,' . $id,
        'alamat' => 'required',
        'no_hp' => 'required',
    ]);

    $anggota = Anggota::findOrFail($id);
    $anggota->update($request->all());

    return redirect()->route('anggota.index')
        ->with('success', 'Data anggota berhasil diupdate');
}

/**
     * Hapus data anggota
     */
public function destroy($id)
{
    $anggota = Anggota::findOrFail($id);
    $anggota->delete();

    return redirect()->route('anggota.index')
        ->with('success', 'Data anggota berhasil dihapus');
}


}
