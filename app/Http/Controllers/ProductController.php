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
            ->latest('Id_produk')
            ->take(4)
            ->get();

        // If less than 4 items in same category, supplement with latest products
        if ($relatedProducts->count() < 4) {
            $supplement = ProdukDigital::with('kategori')
                ->where('Id_produk', '!=', $produk->Id_produk)
                ->whereNotIn('Id_produk', $relatedProducts->pluck('Id_produk'))
                ->latest('Id_produk')
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->merge($supplement);
        }

        return view('products.show', compact('produk', 'setting', 'relatedProducts'));
    }
}
