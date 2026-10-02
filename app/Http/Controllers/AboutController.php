<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use App\Models\Setting;
use App\Models\Testimoni;

class AboutController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $totalProduk = ProdukDigital::count();
        $totalKategori = Kategori::count();
        $totalLayanan = Layanan::count();
        $avgRating = 5.0;
        $totalTestimoni = Testimoni::count();
        $kategoris = Kategori::all();

        return view('about', compact(
            'setting',
            'totalProduk',
            'totalKategori',
            'totalLayanan',
            'avgRating',
            'totalTestimoni',
            'kategoris'
        ));
    }
}
