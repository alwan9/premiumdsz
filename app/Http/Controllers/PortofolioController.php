<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Setting;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display portfolio showcase page.
     */
    public function index(Request $request)
    {
        $setting = Setting::first() ?? new Setting([
            'Judul' => 'Portofolio Desain Grafis & Karya Visual Kreatif',
            'Deskripsi' => 'Galeri karya desain logo, kemasan, branding, banner, UI/UX website, poster, dan jersey custom dari Premium Designz.',
        ]);

        $query = Portofolio::query();

        // Filter by Category
        $selectedKategori = $request->query('kategori');
        if ($selectedKategori && $selectedKategori !== 'all') {
            $query->where('kategori', $selectedKategori);
        }

        // Search by Name or Description
        $search = $request->query('search');
        if (! empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        // Get Representative Categories for clean navigation
        $representativeCategories = [
            'Logo & Branding',
            'Packaging & Kemasan',
            'Banner & Spanduk',
            'UI/UX & Web',
            'Poster & Flyer',
            'Jersey & Apparel',
            'Social Media',
        ];

        $kategoriCounts = Portofolio::selectRaw('kategori, count(*) as count')
            ->whereIn('kategori', $representativeCategories)
            ->groupBy('kategori')
            ->orderByDesc('count')
            ->pluck('count', 'kategori');

        if ($kategoriCounts->isEmpty()) {
            $kategoriCounts = Portofolio::selectRaw('kategori, count(*) as count')
                ->groupBy('kategori')
                ->orderByDesc('count')
                ->take(6)
                ->pluck('count', 'kategori');
        }

        $totalCount = Portofolio::count();

        // Paginate results (100 items per page)
        $portofolios = $query->latest('id')->paginate(100)->withQueryString();

        if ($request->ajax()) {
            $html = view('portofolio._grid', compact(
                'portofolios',
                'kategoriCounts',
                'selectedKategori',
                'search',
                'totalCount',
                'setting'
            ))->render();

            return response()->json([
                'status' => 'success',
                'html' => $html,
                'items' => $portofolios->items(),
                'total' => $portofolios->total(),
                'count' => $portofolios->count(),
                'search' => $search,
                'selectedKategori' => $selectedKategori,
            ]);
        }

        return view('portofolio.index', compact(
            'portofolios',
            'kategoriCounts',
            'selectedKategori',
            'search',
            'totalCount',
            'setting'
        ));
    }
}
