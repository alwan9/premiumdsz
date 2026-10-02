<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with(['produkDigital', 'produk'])->latest('Id_Layanan')->paginate(10);

        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        $produks = ProdukDigital::all();

        return view('admin.layanan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama_layanan' => 'required|string|max:255',
            'Id_produk' => 'nullable|exists:produk_digital,Id_produk',
            'Benefit' => 'nullable|string',
            'Des_layanan' => 'nullable|string',
        ]);

        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Paket layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        $produks = ProdukDigital::all();

        return view('admin.layanan.edit', compact('layanan', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $validated = $request->validate([
            'Nama_layanan' => 'required|string|max:255',
            'Id_produk' => 'nullable|exists:produk_digital,Id_produk',
            'Benefit' => 'nullable|string',
            'Des_layanan' => 'nullable|string',
        ]);

        $layanan->update($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Paket layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('admin.layanan.index')->with('success', 'Paket layanan berhasil dihapus.');
    }
}
