<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\ProdukDigital;
use App\Models\Setting;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first();
        $kategoris = Kategori::withCount('produkDigital')->get();

        $query = ProdukDigital::with(['kategori', 'layanan']);

        // Filter Kategori
        $selectedKategori = $request->query('kategori');
        if ($selectedKategori && $selectedKategori !== 'all') {
            $query->where('Id_kategori', $selectedKategori);
        }

        // Pencarian Kata Kunci
        $search = $request->query('q');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Nama_produk', 'like', "%{$search}%")
                    ->orWhere('Des_produk', 'like', "%{$search}%");
            });
        }

        // Pengurutan (Sorting)
        $sort = $request->query('sort', 'latest');
        if ($sort === 'oldest') {
            $query->oldest('Id_produk');
        } elseif ($sort === 'stock_high') {
            $query->orderByDesc('Stok_produk');
        } else {
            $query->latest('Id_produk');
        }

        $produks = $query->paginate(9)->withQueryString();
        $totalSemuaProduk = ProdukDigital::count();

        return view('marketplace.index', compact(
            'setting',
            'kategoris',
            'produks',
            'selectedKategori',
            'search',
            'sort',
            'totalSemuaProduk'
        ));
    }
}
