<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Promo::truncate();
        Schema::enableForeignKeyConstraints();

        $promos = [
            [
                'Judul' => 'Promo Spesial Banner & Desain Promosi UMKM',
                'Foto_promo' => 'banner promo (1).jpg',
                'Url_promo' => 'https://api.whatsapp.com/send/?phone=6285168174679&text='.rawurlencode('Halo Premium Design, saya ingin klaim Promo Banner & Media Promosi UMKM.'),
                'is_active' => true,
            ],
            [
                'Judul' => 'Diskon Paket Branding & Logo Eksklusif',
                'Foto_promo' => 'banner promo (2).jpg',
                'Url_promo' => 'https://api.whatsapp.com/send/?phone=6285168174679&text='.rawurlencode('Halo Premium Design, saya ingin konsultasi Promo Paket Branding & Logo.'),
                'is_active' => true,
            ],
            [
                'Judul' => 'Penawaran Spesial Kemasan & Standing Pouch',
                'Foto_promo' => 'banner promo (3).jpg',
                'Url_promo' => 'https://api.whatsapp.com/send/?phone=6285168174679&text='.rawurlencode('Halo Premium Design, saya ingin info Promo Desain Kemasan & Pouch.'),
                'is_active' => true,
            ],
            [
                'Judul' => 'Promo Bundling Desain Media Sosial & Apparel',
                'Foto_promo' => 'banner promo (4).jpg',
                'Url_promo' => 'https://api.whatsapp.com/send/?phone=6285168174679&text='.rawurlencode('Halo Premium Design, saya tertarik dengan Promo Bundling Desain Media Sosial & Apparel.'),
                'is_active' => true,
            ],
        ];

        foreach ($promos as $promo) {
            Promo::create($promo);
        }
    }
}
