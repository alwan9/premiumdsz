<?php

namespace App\Http\Controllers;

use App\Models\ProdukDigital;
use App\Models\Setting;

class ProductController extends Controller
{
    public function show($id)
    {
        $produk = ProdukDigital::with(['kategori', 'layanan'])->findOrFail($id);
        $setting = Setting::first();

        $relatedProducts = ProdukDigital::with('kategori')
            ->where('Id_kategori', $produk->Id_kategori)
            ->where('Id_produk', '!=', $produk->Id_produk)
            ->take(3)
            ->get();

        return view('products.show', compact('produk', 'setting', 'relatedProducts'));
    }
}
