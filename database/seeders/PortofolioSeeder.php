<?php

namespace Database\Seeders;

use App\Models\Portofolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Curated List of Premier Portfolio Items
        $curatedItems = [
            // Logo & Branding
            [
                'nama' => 'Mascot & Logo Branding - Kopi Ah Wordmark',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/a-bold-stacked-wordmark-logo-for-kopi-ah_6wWdF_z6TmiXXtJgjdqD-Q_Lzy1X5Z8TviWACE17xJsHw.png',
                'deskripsi' => 'Identitas visual dan tipografi modern untuk brand coffee shop kekinian.',
            ],
            [
                'nama' => 'Brand Identity - Salfox Sports Club',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/a-bold-and-energetic-sports-logo-for-sal_k8l4za1RQLCYMajZt59Ctw_VfD6S1W-QYm2DH5e9J2Qnw.png',
                'deskripsi' => 'Desain logo maskot dinamis & energetik untuk klub olahraga dan komunitas esport.',
            ],
            [
                'nama' => 'Logo Kuliner UMKM - Siomay Amoy',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/a-colorful-modern-logo-for-siomay-amoy-f_2QiXhE0iQB6zuokYyMDYEA_hRhBEwqsSbWv1Gpv0xnazg.png',
                'deskripsi' => 'Logo maskot kuliner tradisional berkarakter ramah dengan perpaduan warna atraktif.',
            ],
            [
                'nama' => 'Mascot Branding - Nasi Tempong Pedas',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/a-cute-chibi-style-mascot-for-nasi-tempo_VnrrriQKSYykmSaXAE2-1Q_Ko0V0wB8R1uNTAvswVOIeQ.png',
                'deskripsi' => 'Karakter maskot chibi lucu dan eye-catching untuk produk makanan cepat saji pedas.',
            ],
            [
                'nama' => 'Gaming & Esports Logo - Enryo Futuristic',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/a-futuristic-gaming-brand-logo-for-enryo_IA1KIBfNTJOvIwiNVCqibA_CQpJNT6aRVCCdyBbiYU48Q.png',
                'deskripsi' => 'Logo futuristik bertema cyber gaming dengan garis tajam dan efek neon glow.',
            ],
            [
                'nama' => 'Circular Badge Logo - Kangen Donat',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/circular-badge-logo-for-kangen-donat-wit_0nTLl0CaRgaJbI5V2NPznA_3WegRkwNQVqvH6ovIoXeAA.png',
                'deskripsi' => 'Desain badge vintage modern untuk toko bakery dan donat artisan.',
            ],
            [
                'nama' => 'Custom Emblem Logo - Seblak Instan Mama',
                'kategori' => 'Logo & Branding',
                'url' => 'assets/portofolio/modern-cute-logo-for-seblak-instan-mama-_3Fw1NHixQxKmrlyZg0amsQ_4DjwYvMHRhSKYiuVTnK85A.png',
                'deskripsi' => 'Logo kemasan makanan instan UMKM yang modern, menarik, dan mudah diingat konsumen.',
            ],

            // Packaging & Kemasan
            [
                'nama' => 'Packaging Box Eksklusif - Abdul Creative Studio',
                'kategori' => 'Packaging & Kemasan',
                'url' => 'assets/portofolio/DC 3359_mhdabdul31_Box.png',
                'deskripsi' => 'Desain boks kemasan retail elegan dengan panduan garis potong dan mockup 3D siap cetak.',
            ],
            [
                'nama' => 'Kotak Kemasan Produk - Yudhi Pratama Fotografer',
                'kategori' => 'Packaging & Kemasan',
                'url' => 'assets/portofolio/DC_4519_yudhipratamafotografer_Box.png',
                'deskripsi' => 'Desain premium hardcover gift box untuk merchandise dan paket foto studio.',
            ],
            [
                'nama' => 'Kemasan Retail Box - Pronov Store',
                'kategori' => 'Packaging & Kemasan',
                'url' => 'assets/portofolio/DC_5255_PRONOV_STORE_Box (2).png',
                'deskripsi' => 'Konsep kemasan produk modern dengan typography tegas dan layout informatif.',
            ],
            [
                'nama' => 'Stiker & Label Botol - Gung Dewi Label',
                'kategori' => 'Packaging & Kemasan',
                'url' => 'assets/portofolio/DC_5231_gungdewi182_LabelArtboard-1.png',
                'deskripsi' => 'Desain stiker toples makanan dan botol minuman dengan komposisi warna kontras.',
            ],
            [
                'nama' => 'Label Kosmetik & Skincare - Ellias Abo',
                'kategori' => 'Packaging & Kemasan',
                'url' => 'assets/portofolio/RV_32_Ellias Abo_Label.png',
                'deskripsi' => 'Label botol skincare estetik dengan sertifikasi izin edar dan barcode rapi.',
            ],

            // UI/UX & Website
            [
                'nama' => 'SaaS Dashboard UI/UX - MacBook Pro Mockup',
                'kategori' => 'UI/UX & Web',
                'url' => 'assets/portofolio/MacBook Pro 16_ - 1 (1).png',
                'deskripsi' => 'Desain web interface analitik SaaS dengan layout modern dan visual dashboard data.',
            ],
            [
                'nama' => 'E-Commerce Platform Web Portal UI',
                'kategori' => 'UI/UX & Web',
                'url' => 'assets/portofolio/MacBook Pro 16_ - 2 (4).png',
                'deskripsi' => 'User experience portal marketplace dengan navigasi intuitif dan conversion rate tinggi.',
            ],
            [
                'nama' => 'Creative Agency Landing Page Figma',
                'kategori' => 'UI/UX & Web',
                'url' => 'assets/portofolio/MacBook Pro 16_ - 6.png',
                'deskripsi' => 'Desain responsif landing page studio kreatif dengan tata letak visual modern.',
            ],
            [
                'nama' => 'Smart System Dashboard - TPST Digital Web',
                'kategori' => 'UI/UX & Web',
                'url' => 'assets/portofolio/tpst1 (1).png',
                'deskripsi' => 'Sistem monitoring IoT dan pengolahan limbah perkotaan berbasis web interface interaktif.',
            ],
            [
                'nama' => 'Mobile Application UI/UX - TPST Mobile App',
                'kategori' => 'UI/UX & Web',
                'url' => 'assets/portofolio/tpst_mobile1.png',
                'deskripsi' => 'Desain aplikasi mobile Android & iOS dengan flow pemesanan dan tracking penjemputan sampah.',
            ],

            // Banner & Spanduk
            [
                'nama' => 'Banner Promosi UMKM - Verlita Ratnasari',
                'kategori' => 'Banner & Spanduk',
                'url' => 'assets/portofolio/DC 3372_Verlita Ratnasari_desain_Banner.png',
                'deskripsi' => 'Spanduk promosi outdoor dengan resolusi tinggi siap cetak ukuran 3x1 meter.',
            ],
            [
                'nama' => 'Banner Stand Restoran - Salad Cuyy Fresh',
                'kategori' => 'Banner & Spanduk',
                'url' => 'assets/portofolio/DC_5273_saladcuyy_Banner.png',
                'deskripsi' => 'Banner x-banner display makanan sehat dengan ilustrasi menu yang menggugah selera.',
            ],
            [
                'nama' => 'Spanduk Toko & Usaha - DR Nila Banner',
                'kategori' => 'Banner & Spanduk',
                'url' => 'assets/portofolio/DR_2570_Nilas_Banner.png',
                'deskripsi' => 'Banner depan toko dengan penataan tipografi jelas dan nomor kontak jelas.',
            ],

            // Poster & Menu / Flyer
            [
                'nama' => 'Daftar Menu Restoran & Cafe - Obylare',
                'kategori' => 'Poster & Flyer',
                'url' => 'assets/portofolio/DC_3422_obylare_MenuArtboard-1.png',
                'deskripsi' => 'Desain buku menu lipat 2 dengan grid foto makanan estetik dan harga terstruktur.',
            ],
            [
                'nama' => 'Poster Menu Makanan - Soeg Cafe',
                'kategori' => 'Poster & Flyer',
                'url' => 'assets/portofolio/DC_3219_Soeg_Poster Menu2.png',
                'deskripsi' => 'Poster dinding menu andalan cafe dengan visual appetizing dan kontras warna hangat.',
            ],
            [
                'nama' => 'Brosur Penawaran Bisnis - Fendi Corporate',
                'kategori' => 'Poster & Flyer',
                'url' => 'assets/portofolio/DC_4502_Fendi_Brosur4.png',
                'deskripsi' => 'Brosur marketing lipat tiga (tri-fold) dengan tata letak korporat modern.',
            ],
            [
                'nama' => 'Flyer Promosi Digital - Aldrick Reyhan',
                'kategori' => 'Poster & Flyer',
                'url' => 'assets/portofolio/DC_5039_aldrick_reyhan_ramadhan_FlyerArtboard 1.jpg',
                'deskripsi' => 'Flyer selebaran digital resolusi tajam untuk promosi online dan media cetak A5.',
            ],
            [
                'nama' => 'Pricelist Katalog Menu - Mocci Snack',
                'kategori' => 'Poster & Flyer',
                'url' => 'assets/portofolio/Dc 4110_gwmocci_PriceList.png',
                'deskripsi' => 'Desain daftar harga modern dengan layout minimalis dan mudah dibaca di layar smartphone.',
            ],

            // Social Media & Feed
            [
                'nama' => 'Instagram Feed Series - Unlock Digital Talents',
                'kategori' => 'Social Media',
                'url' => 'assets/portofolio/DC_5110_bangkitdarmawan_Feeds--Unlock-Digital-Talents1.png',
                'deskripsi' => 'Template konten Instagram carousel edukasi dengan perpaduan warna neon tech.',
            ],
            [
                'nama' => 'Instagram Post Campaign - Yasui Cargo',
                'kategori' => 'Social Media',
                'url' => 'assets/portofolio/DC_4900_Yasui Cargo_Feeds.png',
                'deskripsi' => 'Desain feed Instagram bisnis logistik untuk meningkatkan engagement dan awareness brand.',
            ],
            [
                'nama' => 'Social Media Feed Promo - Limz Elektronik',
                'kategori' => 'Social Media',
                'url' => 'assets/portofolio/DR_1157_Limz-Elektronik_satuan9desainArtboard-1-copy-2.png',
                'deskripsi' => 'Grafis promosi diskon produk elektronik dengan aksen warna dinamis.',
            ],

            // Jersey & Apparel
            [
                'nama' => 'Custom Sport Jersey - Anie Candra Kirana',
                'kategori' => 'Jersey & Apparel',
                'url' => 'assets/portofolio/DC_4235_aniecandrakirana_Jersey (1).png',
                'deskripsi' => 'Pola desain jersey printing sublimasi depan-belakang dengan gradasi warna tajam.',
            ],
            [
                'nama' => 'Esport & Gaming Jersey - ErSport Custom',
                'kategori' => 'Jersey & Apparel',
                'url' => 'assets/portofolio/DC_4404_jersey_ersport _Menu.png',
                'deskripsi' => 'Desain seragam tim esport dengan motif geometris futuristik.',
            ],
            [
                'nama' => 'Cycling Jersey Apparel - Dhimas Rabiansyah',
                'kategori' => 'Jersey & Apparel',
                'url' => 'assets/portofolio/DR_1390_dhimasrabiansyah_jersey (1).png',
                'deskripsi' => 'Desain baju sepeda aero custom dengan penempatan logo sponsor presisi.',
            ],

            // Booth & Pameran
            [
                'nama' => 'Stand Booth Pameran 3 Sisi - Dapur Autentik',
                'kategori' => 'Booth & Stand',
                'url' => 'assets/portofolio/RV-12_dapur.autentik_Booth-3sisiArtboard-1-copy-3_1.png',
                'deskripsi' => 'Desain visual booth container pameran kuliner 3 sisi dengan penataan branding mencolok.',
            ],
            [
                'nama' => 'Event Booth Branding - Tasdek',
                'kategori' => 'Booth & Stand',
                'url' => 'assets/portofolio/DC_5024_tasdek18_BoothArtboard 1.jpg',
                'deskripsi' => 'Konsep visual booth portable untuk pameran franchise dan bazar UMKM.',
            ],
        ];

        // Insert Curated Items First
        $seededUrls = [];
        foreach ($curatedItems as $item) {
            $existing = Portofolio::where('url', $item['url'])->first();
            if (! $existing) {
                Portofolio::create($item);
            }
            $seededUrls[$item['url']] = true;
            $seededUrls[basename($item['url'])] = true;
        }

        // 2. Scan Directory public/assets/portofolio to Automatically Ingest Other High Quality Images
        $dir = public_path('assets/portofolio');
        if (File::isDirectory($dir)) {
            $files = File::files($dir);

            foreach ($files as $file) {
                $filename = $file->getFilename();
                $ext = strtolower($file->getExtension());

                if (! in_array($ext, ['png', 'jpg', 'jpeg', 'webp'])) {
                    continue;
                }

                // Check if already seeded in curated list
                $relativeUrl = 'assets/portofolio/'.$filename;
                if (isset($seededUrls[$filename]) || isset($seededUrls[$relativeUrl])) {
                    continue;
                }

                // Skip very small temp icons or huge files if necessary, or categorize them
                $category = 'Karya Desain';
                $lower = strtolower($filename);

                if (Str::contains($lower, ['logo', 'mascot', 'brand', 'emblem', 'badge'])) {
                    $category = 'Logo & Branding';
                } elseif (Str::contains($lower, ['box', 'label', 'kemasan', 'pouch', 'packaging'])) {
                    $category = 'Packaging & Kemasan';
                } elseif (Str::contains($lower, ['banner', 'spanduk', 'baliho'])) {
                    $category = 'Banner & Spanduk';
                } elseif (Str::contains($lower, ['macbook', 'ui', 'ux', 'web', 'mobile', 'tpst', 'mockup', 'app'])) {
                    $category = 'UI/UX & Web';
                } elseif (Str::contains($lower, ['jersey', 'apparel', 'baju'])) {
                    $category = 'Jersey & Apparel';
                } elseif (Str::contains($lower, ['booth', 'stand'])) {
                    $category = 'Booth & Stand';
                } elseif (Str::contains($lower, ['feed', 'reels', 'story', 'instagram', 'social'])) {
                    $category = 'Social Media';
                } elseif (Str::contains($lower, ['menu', 'poster', 'flyer', 'brosur', 'leaflet', 'pricelist'])) {
                    $category = 'Poster & Flyer';
                } else {
                    $category = 'Kreatif Visual';
                }

                // Generate clean human-readable name
                $cleanName = pathinfo($filename, PATHINFO_FILENAME);
                $cleanName = preg_replace('/[_\-\+]+/', ' ', $cleanName);
                $cleanName = preg_replace('/\s+/', ' ', $cleanName);
                $cleanName = Str::limit(trim($cleanName), 60);
                $cleanName = ucwords($cleanName);

                Portofolio::create([
                    'nama' => $cleanName,
                    'kategori' => $category,
                    'url' => $relativeUrl,
                    'deskripsi' => 'Karya portofolio visual profesional kategori '.$category.' oleh tim Premium Designz.',
                ]);
            }
        }
    }
}
