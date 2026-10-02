<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('contact', compact('setting'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'layanan' => 'required|string|max:255',
            'pesan' => 'required|string|max:1000',
        ]);

        $text = "Halo Premium Design,\nSaya ingin konsultasi proyek desain.\n\nNama: ".$validated['nama']."\nEmail: ".$validated['email']."\nKebutuhan Jasa: ".$validated['layanan']."\nPesan: ".$validated['pesan'];
        $waUrl = 'https://api.whatsapp.com/send/?phone=6285168174679&text='.urlencode($text);

        return redirect()->away($waUrl);
    }
}
