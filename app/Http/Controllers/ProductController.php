<?php

namespace App\Http\Controllers;

use App\Models\ProdukDigital;
use App\Models\Setting;

class ProductController extends Controller
{
    public function show($id)
    {
        $produk = ProdukDigital::with(['kategori', 'layanan', 'software'])->findOrFail($id);
        $setting = Setting::first();

        $relevantProducts = ProdukDigital::with(['kategori', 'software'])
            ->where('Id_kategori', $produk->Id_kategori)
            ->where('Id_produk', '!=', $produk->Id_produk)
            ->latest('Id_produk')
            ->take(12)
            ->get();

        $latestProducts = ProdukDigital::with(['kategori', 'software'])
            ->where('Id_produk', '!=', $produk->Id_produk)
            ->latest('Id_produk')
            ->take(12)
            ->get();

        // Keep $relatedProducts as alias to $relevantProducts for fallback compatibility
        $relatedProducts = $relevantProducts;

        return view('products.show', compact('produk', 'setting', 'relatedProducts', 'relevantProducts', 'latestProducts'));
    }
}
