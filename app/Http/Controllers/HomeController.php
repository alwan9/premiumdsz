<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use App\Models\Promo;
use App\Models\Setting;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $setting = Setting::first() ?? new Setting([
            'Judul' => 'Premium Design Studio & Marketplace',
            'Deskripsi' => 'Studio kreatif dan marketplace desain digital premium. Kami merancang UI/UX modern, identitas visual, aset 3D, dan branding eksklusif.',
        ]);

        $promos = Promo::where('is_active', true)->latest('Id_promo')->get();

        $kategoris = Kategori::withCount('produkDigital')->get();

        $selectedKategori = $request->query('kategori');
        $query = ProdukDigital::with(['kategori', 'layanan']);

        if ($selectedKategori && $selectedKategori !== 'all') {
            $query->where('Id_kategori', $selectedKategori);
        }

        $search = $request->query('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Nama_produk', 'like', "%{$search}%")
                    ->orWhere('Des_produk', 'like', "%{$search}%");
            });
        }

        // Acak setiap refresh jika tidak mencari secara spesifik
        $produks = ($search || ($selectedKategori && $selectedKategori !== 'all'))
            ? $query->latest('Id_produk')->get()
            : $query->inRandomOrder()->get();

        $layanans = Layanan::with('produkDigital')->latest('Id_Layanan')->get();
        $testimonis = Testimoni::inRandomOrder()->take(9)->get();

        $averageRating = 5.0;
        $totalReviews = Testimoni::count();

        return view('home', compact(
            'setting',
            'promos',
            'kategoris',
            'produks',
            'layanans',
            'testimonis',
            'selectedKategori',
            'search',
            'averageRating',
            'totalReviews'
        ));
    }
}
