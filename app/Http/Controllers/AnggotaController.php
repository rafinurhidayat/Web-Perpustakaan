<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::latest()->get();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'no_anggota' => 'required|unique:anggotas,no_anggota',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        Anggota::create([
            'nama' => $validated['nama'],
            'no_anggota' => $validated['no_anggota'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'user_id' => Auth::id(),
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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        $anggota->update($validated);

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
