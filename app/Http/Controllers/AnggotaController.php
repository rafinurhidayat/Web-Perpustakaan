<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_anggota' => 'required|unique:anggotas',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Anggota::create([
            'nama' => $request->nama,
            'no_anggota' => $request->no_anggota,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nama' => 'required',
            'no_anggota' => 'required|unique:anggotas,no_anggota,' . $anggota->id,
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus');
    }
}
