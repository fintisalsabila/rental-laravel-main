<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Pelanggan::all();
        return view('pages.pelanggan.index', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        Pelanggan::create($request->all());
        return redirect()->route('pelanggan.index')->with('success', 'Berhasil menambah data pelanggan.');
    }

    public function show($id)
    {
        $item = Pelanggan::findOrFail($id);
        return view('pages.pelanggan.detail', compact('item'));
    }

    public function edit($id)
    {
        $item = Pelanggan::findOrFail($id);
        return view('pages.pelanggan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
        ]);

        $item = Pelanggan::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Berhasil memperbarui data pelanggan.');
    }

    public function destroy($id)
    {
        $item = Pelanggan::findOrFail($id);
        $item->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Berhasil menghapus data pelanggan.');
    }
}
