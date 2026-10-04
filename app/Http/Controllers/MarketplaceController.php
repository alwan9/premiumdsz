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

        // Pengurutan (Sorting) - Default diacak tiap refresh
        $sort = $request->query('sort', 'random');
        if ($sort === 'oldest') {
            $query->oldest('Id_produk');
        } elseif ($sort === 'latest') {
            $query->latest('Id_produk');
        } elseif ($sort === 'stock_high') {
            $query->orderByDesc('Stok_produk');
        } else {
            $query->inRandomOrder();
        }

        $produks = $query->paginate(9)->withQueryString();
        $totalSemuaProduk = ProdukDigital::count();

        if ($request->ajax()) {
            $html = view('marketplace._grid', compact(
                'setting',
                'kategoris',
                'produks',
                'selectedKategori',
                'search',
                'sort',
                'totalSemuaProduk'
            ))->render();

            return response()->json([
                'status' => 'success',
                'html' => $html,
                'total' => $produks->total(),
                'selectedKategori' => $selectedKategori,
                'search' => $search,
                'sort' => $sort,
            ]);
        }

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
