<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = ProdukDigital::with(['kategori', 'layanan']);

        if ($request->filled('kategori')) {
            $query->where('Id_kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('Nama_produk', 'like', "%{$search}%")
                    ->orWhere('Des_produk', 'like', "%{$search}%");
            });
        }

        $produks = $query->latest('Id_produk')->paginate(10)->withQueryString();
        $kategoris = Kategori::all();

        return view('admin.produk.index', compact('produks', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $layanans = Layanan::all();

        return view('admin.produk.create', compact('kategoris', 'layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama_produk' => 'required|string|max:255',
            'Id_kategori' => 'required|exists:kategori,Id_kategori',
            'Id_layanan' => 'nullable|exists:layanan,Id_Layanan',
            'No_wa' => 'nullable|string|max:30',
            'Stok_produk' => 'required|integer|min:0',
            'Estimasi' => 'nullable|string|max:100',
            'Des_produk' => 'nullable|string',
        ]);

        ProdukDigital::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk digital / karya berhasil ditambahkan ke katalog.');
    }

    public function show($id)
    {
        $produk = ProdukDigital::with(['kategori', 'layanan'])->findOrFail($id);

        return view('admin.produk.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = ProdukDigital::findOrFail($id);
        $kategoris = Kategori::all();
        $layanans = Layanan::all();

        return view('admin.produk.edit', compact('produk', 'kategoris', 'layanans'));
    }

    public function update(Request $request, $id)
    {
        $produk = ProdukDigital::findOrFail($id);

        $validated = $request->validate([
            'Nama_produk' => 'required|string|max:255',
            'Id_kategori' => 'required|exists:kategori,Id_kategori',
            'Id_layanan' => 'nullable|exists:layanan,Id_Layanan',
            'No_wa' => 'nullable|string|max:30',
            'Stok_produk' => 'required|integer|min:0',
            'Estimasi' => 'nullable|string|max:100',
            'Des_produk' => 'nullable|string',
        ]);

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = ProdukDigital::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk digital berhasil dihapus.');
    }
}
