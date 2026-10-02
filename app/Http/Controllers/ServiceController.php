<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Setting;

class ServiceController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $layanans = Layanan::with(['produkDigital', 'produk'])->latest('Id_Layanan')->get();

        return view('services.index', compact('setting', 'layanans'));
    }
}
