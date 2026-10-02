<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use App\Models\Testimoni;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = ProdukDigital::count();
        $totalKategori = Kategori::count();
        $totalLayanan = Layanan::count();
        $totalTestimoni = Testimoni::count();
        $totalStok = ProdukDigital::sum('Stok_produk');
        $avgRating = 5.0;

        $recentProduk = ProdukDigital::with(['kategori', 'layanan'])->latest('Id_produk')->take(5)->get();
        $recentTestimoni = Testimoni::latest('Id_testimoni')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalLayanan',
            'totalTestimoni',
            'totalStok',
            'avgRating',
            'recentProduk',
            'recentTestimoni'
        ));
    }
}
