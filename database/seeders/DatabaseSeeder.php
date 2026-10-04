<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\ProdukDigital;
use App\Models\Setting;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application database.
     */
    public function run(): void
    {
        // 1. Settings
        Setting::updateOrCreate(
            ['Id_setting' => 1],
            [
                'Judul' => 'Solusi Desain Grafis dan Identitas Visual Profesional untuk Brand Anda',
                'Deskripsi' => 'Studio kreatif dan marketplace penyedia jasa desain logo, kemasan, media promosi, UI/UX, dan perlengkapan identitas visual dengan standar estetika tinggi dan pengerjaan tepat waktu.',
            ]
        );

        // 2. Users (Admin)
        User::updateOrCreate(
            ['Username' => 'admin'],
            [
                'Nama_user' => 'Admin Premium Design',
                'Email' => 'designzpremium@gmail.com',
                'Profile_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                'password' => Hash::make('password123'),
            ]
        );

        // 3. Kategori Desain (Sesuai Produk Real Marketplace)
        $kategoriList = [
            ['Nama_kategori' => 'Banner & Spanduk', 'Des_kategori' => 'Media promosi luar ruang, banner wisuda, banner UMKM, stand booth event, dan materi visual promosi.'],
            ['Nama_kategori' => 'Packaging & Kemasan', 'Des_kategori' => 'Desain standing pouch snack, boks kemasan produk, hampers, dan packaging retail siap cetak.'],
            ['Nama_kategori' => 'Logo & Branding', 'Des_kategori' => 'Identitas visual, logo custom bisnis, logo racing, filosofi warna, dan typography branding.'],
            ['Nama_kategori' => 'UI/UX & Web', 'Des_kategori' => 'Desain interface mobile app Android & iOS, website company profile, landing page, dan Figma mockup.'],
            ['Nama_kategori' => 'Label & Stiker', 'Des_kategori' => 'Desain label botol, stiker toples makanan, tag produk UMKM, dan packaging jar siap cetak.'],
            ['Nama_kategori' => 'Jersey & Apparel', 'Des_kategori' => 'Desain jersey olahraga custom, esport gaming, seragam tim, komunitas, dan apparel merchandise.'],
            ['Nama_kategori' => 'Foto & Redesain AI', 'Des_kategori' => 'Penyempurnaan gambar AI, redesain artwork, editing foto studio produk, dan koreksi detail visual.'],
            ['Nama_kategori' => 'Poster & Flyer', 'Des_kategori' => 'Materi promosi poster infografis digital, flyer acara, dan grafis informasi terstruktur.'],
            ['Nama_kategori' => 'Dokumen & PPT', 'Des_kategori' => 'Desain PowerPoint presentasi profesional, slide seminar/kuliah, dan desain Curriculum Vitae (CV) menarik.'],
        ];

        $createdKategoris = [];
        foreach ($kategoriList as $k) {
            $createdKategoris[$k['Nama_kategori']] = Kategori::updateOrCreate(
                ['Nama_kategori' => $k['Nama_kategori']],
                ['Des_kategori' => $k['Des_kategori']]
            );
        }

        // 4. Layanan (Paket Jasa / Pricing Tiers)
        $layananBanner = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Banner & Media Promosi'],
            [
                'Benefit' => "• Desain original dan custom sesuai kebutuhan\n• Layout rapi dan mudah dibaca\n• File siap cetak (PDF, JPG, PNG) & Mentahan HD\n• Revisi sesuai kesepakatan",
                'Des_layanan' => 'Jasa pembuatan banner wisuda, banner promosi UMKM, event toko, hingga media iklan outdoor.',
            ]
        );

        $layananPackaging = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Kemasan Box & Pouch'],
            [
                'Benefit' => "• Pola dieline presisi sesuai ukuran boks/pouch\n• 3D Mockup realistis untuk presentasi produk\n• Format warna siap cetak percetakan\n• Revisi sesuai kesepakatan",
                'Des_layanan' => 'Perancangan desain kemasan pouch makanan ringan, boks hampers, skincare, dan produk UMKM.',
            ]
        );

        $layananLogo = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Logo & Brand Identity'],
            [
                'Benefit' => "• Desain logo custom original dari awal (no template)\n• Mockup aplikasi logo & konsep warna/tipografi\n• File resolusi tinggi siap digital dan cetak\n• Konsultasi desain sebelum order",
                'Des_layanan' => 'Perancangan logo bisnis, logo racing, online shop, UMKM, dan identitas visual perusahaan.',
            ]
        );

        $layananUiUx = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan UI/UX App & Website Figma'],
            [
                'Benefit' => "• Tampilan modern, clean, dan user-friendly\n• File design Figma editable & auto-layout\n• Interactive clickable prototype\n• User flow & struktur halaman terorganisir",
                'Des_layanan' => 'Perancangan antarmuka digital mobile app Android/iOS, website landing page, dan sistem dashboard.',
            ]
        );

        $layananJersey = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Jersey & Custom Apparel'],
            [
                'Benefit' => "• Desain original menyesuaikan karakter tim / komunitas\n• File siap cetak sublimasi / konveksi (CDR/EPS/PSD/PDF)\n• Mockup apparel depan & belakang\n• Revisi sesuai kesepakatan",
                'Des_layanan' => 'Desain jersey futsal, esport, komunitas motor/gowes, dan seragam apparel custom.',
            ]
        );

        $layananAiFoto = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Redesain AI & Foto Produk Studio'],
            [
                'Benefit' => "• Penyempurnaan detail gambar AI & komposisi warna\n• Editing foto studio produk agar siap marketplace & promosi\n• File resolusi tinggi digital & cetak\n• Pengerjaan rapi dan cepat",
                'Des_layanan' => 'Penyempurnaan artwork AI generator dan sentuhan editing foto produk untuk meningkatkan konversi penjualan.',
            ]
        );

        $layananLabel = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Label & Stiker Produk'],
            [
                'Benefit' => "• Penyesuaian ukuran & bentuk label toples/botol/kemasan\n• Tata letak informasi produk & logo yang proporsional\n• Mockup label realistis & file siap cetak\n• Revisi sesuai kesepakatan",
                'Des_layanan' => 'Pembuatan label stiker produk makanan ringan, toples kue, botol minuman, dan kemasan homemade.',
            ]
        );

        $layananDokumen = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Dokumen, CV & PowerPoint PPT'],
            [
                'Benefit' => "• Desain slide PPT presentasi interaktif & terstruktur\n• Format CV ATS-friendly & visual profesional\n• File master editable siap digunakan\n• Pengerjaan cepat & rapi",
                'Des_layanan' => 'Layanan desain slide presentasi bisnis/seminar dan pembuatan curriculum vitae profesional.',
            ]
        );

        $layananPoster = Layanan::updateOrCreate(
            ['Nama_layanan' => 'Layanan Desain Poster & Infografis Digital'],
            [
                'Benefit' => "• Visualisasi data infografis informatif & estetik\n• Tampilan poster atraktif untuk event atau kampanye digital\n• File siap dipublikasikan ke media sosial & cetak\n• Revisi sesuai kesepakatan",
                'Des_layanan' => 'Pembuatan poster digital, infografis promosi bisnis, pengumuman instansi, dan publikasi event.',
            ]
        );

        // 5. Produk Digital (Sesuai dengan Semua File Aset di public/assets)
        $produks = [
            // 1. Banner Wisuda
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Banner Wisuda & Ucapan Selamat Custom',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain banner wisuda eksklusif, estetik, dan berkesan untuk sahabat, pasangan, maupun keluarga. Dibuat custom dengan layout foto elegan, pilihan tipografi modern, dan file mentahan siap cetak resolusi tinggi.',
            ],

            // 2. Banner UMKM & Spanduk
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Banner & Spanduk UMKM Promosi Toko',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Estimasi' => '1-2 Hari',
                'Des_produk' => 'Desain spanduk dan banner outdoor untuk toko fisik, gerai kuliner, dan event promo UMKM. Layout jelas, warna kontras menarik perhatian, dan informasi produk mudah dibaca dari kejauhan.',
            ],

            // 3. Stand Booth & Gerobak UMKM
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Stand Booth Jualan & Pameran UMKM',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Estimasi' => '2-3 Hari',
                'Des_produk' => 'Desain visual gerobak jualan portable, booth pameran mall/event, dan stand branding usaha agar terlihat lebih menonjol, rapi, dan profesional di hadapan calon pembeli.',
            ],

            // 4. X-Banner & Roll Banner
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain X-Banner & Roll Banner Promosi Event',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain standing X-Banner vertikal dan Roll-Up Banner untuk media promosi di depan toko, seminar kampus, resepsi, maupun booth expo pameran industri.',
            ],

            // 5. Kemasan Box / Packing
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Box / Packing Karton Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Estimasi' => '2-3 Hari',
                'Des_produk' => 'Perancangan desain pola dieline box kemasan produk retail, kotak kue/makanan, box hampers, dan packaging karton kardus dengan ukuran presisi standar pabrik percetakan.',
            ],

            // 6. Kemasan Standing Pouch Snack
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Standing Pouch Snack & Makanan Ringan',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Estimasi' => '2 Hari',
                'Des_produk' => 'Desain pouch snack makanan ringan, keripik, biji kopi, bumbu masak, dan produk olahan UMKM. Tampilan visual appetizing yang meningkatkan daya tarik konsumen di rak supermarket.',
            ],

            // 7. Packaging & Kemasan Produk Custom
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Packaging & Kemasan Produk Custom Eksklusif',
                'No_wa' => '085168174679',
                'Stok_produk' => 18,
                'Estimasi' => '2-3 Hari',
                'Des_produk' => 'Desain kemasan botol minuman, jar skincare/kosmetik, kaleng biskuit, dan bungkus produk custom dengan render 3D mockup realistis siap presentasi.',
            ],

            // 8. Label & Stiker Produk UMKM
            [
                'kategori' => 'Label & Stiker',
                'layanan' => $layananLabel->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Label Botol & Stiker Toples Produk UMKM',
                'No_wa' => '085168174679',
                'Stok_produk' => 30,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain stiker label toples kue kering, label botol sirup/jus, tag jar bumbu, dan segel kemasan produk UMKM siap potong (die cut) dengan komposisi warna memikat.',
            ],

            // 9. Logo & Brand Identity
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Logo & Brand Identity Bisnis Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Estimasi' => '2-3 Hari',
                'Des_produk' => 'Perancangan logo custom original (no template), filosofi warna, tipografi, dan buku panduan brand guideline untuk online shop, korporat, startup, dan UMKM.',
            ],

            // 10. Redesain Logo & Logo Racing
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'Jasa Redesain Logo Vektor & Racing Team Custom',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Estimasi' => '1-2 Hari',
                'Des_produk' => 'Desain logo gaya racing bernuansa tajam dan agresif untuk tim balap, komunitas motor, esport squad, serta tracing ulang logo buram menjadi file vektor HD.',
            ],

            // 11. Jersey & Apparel Custom
            [
                'kategori' => 'Jersey & Apparel',
                'layanan' => $layananJersey->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Jersey Custom Futsal, Esport & Apparel',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Estimasi' => '2 Hari',
                'Des_produk' => 'Desain pola baju jersey printing sublimasi untuk tim futsal, sepak bola, basket, esport, kaos komunitas, dan merchandise distro lengkap dengan pola cetak konveksi.',
            ],

            // 12. Editing Foto Studio Produk
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Editing Foto Produk Normal to Studio Marketplace',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Transformasi foto jepretan kamera ponsel menjadi foto katalog studio mewah berkelas: hapus background, koreksi bayangan natural, lighting dramatis, dan touch-up warna.',
            ],

            // 13. Redesain AI & Repair Foto
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Redesain Gambar AI & Repair Restorasi Foto',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Estimasi' => '1-2 Hari',
                'Des_produk' => 'Penyempurnaan gambar artwork AI yang mengalami distorsi jari/wajah, pewarnaan foto lama hitam putih, dan restorasi foto resolusi rendah menjadi tajam kembali.',
            ],

            // 14. CV & Resume ATS Friendly
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain CV & Resume Lamaran Kerja ATS-Friendly',
                'No_wa' => '085168174679',
                'Stok_produk' => 35,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain curriculum vitae profesional modern yang lulus uji screening ATS (Applicant Tracking System), layout rapi, pemilihan tipografi jelas, dan format PDF siap kirim HRD.',
            ],

            // 15. PowerPoint PPT Presentasi
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Slide Presentasi PowerPoint (PPT) Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Estimasi' => '1-2 Hari',
                'Des_produk' => 'Pembuatan deck presentasi PowerPoint interaktif untuk pitching bisnis, sidang tugas akhir skripsi, company profile interaktif, dan slide seminar profesional.',
            ],

            // 16. Flyer & Brosur Promosi
            [
                'kategori' => 'Poster & Flyer',
                'layanan' => $layananPoster->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Flyer Promosi, Pamflet & Brosur Bisnis',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain flyer promo diskon, brosur lipat penawaran jasa, dan pamflet event fisik maupun format digital story Instagram resolusi tajam.',
            ],

            // 17. Poster & Infografis Digital
            [
                'kategori' => 'Poster & Flyer',
                'layanan' => $layananPoster->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Poster Acara & Infografis Edukasi Digital',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Estimasi' => '1 Hari',
                'Des_produk' => 'Desain poster pengumuman resmi, poster konser/webinar, serta visualisasi data infografis informatif yang padat konten namun tetap enak dipandang.',
            ],

            // 18. UI/UX Mobile App
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI/UX Mobile App Android & iOS Figma',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Estimasi' => '3-5 Hari',
                'Des_produk' => 'Perancangan UI/UX aplikasi mobile Android dan iOS di Figma dengan sistem auto-layout, atomic components, flow pengguna terstruktur, dan interactive prototype.',
            ],

            // 19. UI/UX Website & Landing Page
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI/UX Website Company Profile & Landing Page',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Estimasi' => '3-5 Hari',
                'Des_produk' => 'Desain UI/UX website company profile responsif desktop, tablet, dan mobile. Menggunakan layout modern berbasis grid Figma yang memudahkan proses slicing developer.',
            ],
        ];

        // Truncate produk_digital to ensure clean synchronization
        Schema::disableForeignKeyConstraints();
        ProdukDigital::truncate();
        Schema::enableForeignKeyConstraints();

        $createdProducts = [];
        foreach ($produks as $p) {
            $katModel = $createdKategoris[$p['kategori']] ?? $createdKategoris['Packaging & Kemasan'];
            $created = ProdukDigital::create([
                'Id_kategori' => $katModel->Id_kategori,
                'Id_layanan' => $p['layanan'],
                'Nama_produk' => $p['Nama_produk'],
                'No_wa' => $p['No_wa'],
                'Stok_produk' => $p['Stok_produk'],
                'Estimasi' => $p['Estimasi'] ?? '1-2 Hari',
                'Des_produk' => $p['Des_produk'],
            ]);
            $createdProducts[] = $created;
        }

        // Hubungkan produk sampel ke layanan
        if (isset($createdProducts[1])) {
            $layananBanner->update(['Id_produk' => $createdProducts[1]->Id_produk]);
        }
        if (isset($createdProducts[4])) {
            $layananPackaging->update(['Id_produk' => $createdProducts[4]->Id_produk]);
        }
        if (isset($createdProducts[8])) {
            $layananLogo->update(['Id_produk' => $createdProducts[8]->Id_produk]);
        }
        if (isset($createdProducts[18])) {
            $layananUiUx->update(['Id_produk' => $createdProducts[18]->Id_produk]);
        }
        if (isset($createdProducts[10])) {
            $layananJersey->update(['Id_produk' => $createdProducts[10]->Id_produk]);
        }
        if (isset($createdProducts[11])) {
            $layananAiFoto->update(['Id_produk' => $createdProducts[11]->Id_produk]);
        }
        if (isset($createdProducts[7])) {
            $layananLabel->update(['Id_produk' => $createdProducts[7]->Id_produk]);
        }
        if (isset($createdProducts[13])) {
            $layananDokumen->update(['Id_produk' => $createdProducts[13]->Id_produk]);
        }
        if (isset($createdProducts[16])) {
            $layananPoster->update(['Id_produk' => $createdProducts[16]->Id_produk]);
        }

        // 6. Testimoni Klien Nyata & Bukti Review (9 Asset Testimoni)
        $reviews = [
            [
                'Judul' => 'Testimoni Desain Kemasan Standing Pouch Kopi',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0000_6cbaeec1-2b90-4301-bbf6-20f37fc48781artboard1.jpg',
            ],
            [
                'Judul' => 'Testimoni Desain Box Kosmetik & Serum',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0001_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0007_layer0.jpg',
            ],
            [
                'Judul' => 'Testimoni Desain Banner & Spanduk UMKM',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0002_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0006_eadbf863-a0cf-4fa8-a300-.jpg',
            ],
            [
                'Judul' => 'Testimoni UI/UX Design & Landing Page',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0003_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0005_92cb19d8-f7ee-4d3e-97c5-.jpg',
            ],
            [
                'Judul' => 'Testimoni Brand Identity & Logo Monogram',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0004_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0004_d39d3d08-e900-4b71-aea4-.jpg',
            ],
            [
                'Judul' => 'Testimoni Restorasi & Redesign Logo Vektor',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0005_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0003_33739a87-240a-4ff8-a721-.jpg',
            ],
            [
                'Judul' => 'Testimoni Desain Label & Packaging Snack',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0006_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0002_d9f6f67b-1e6e-46df-bc86-.jpg',
            ],
            [
                'Judul' => 'Testimoni Banner Promo WhatsApp & Medsos',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0007_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0001_9ccac676-67c5-4707-9758-.jpg',
            ],
            [
                'Judul' => 'Testimoni Desain Apparel & Graphic Kaos',
                'Foto_url' => '6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0008_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0000_ff66305a-eab7-4185-8ced-.jpg',
            ],
        ];

        Schema::disableForeignKeyConstraints();
        Testimoni::truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($reviews as $rev) {
            Testimoni::create([
                'Judul' => $rev['Judul'],
                'Foto_url' => $rev['Foto_url'],
            ]);
        }

        // 7. Portofolio
        $this->call(PortofolioSeeder::class);

        // 8. Software & Tools Mapping
        $this->call(SoftwareSeeder::class);

        // 9. Promo Banners
        $this->call(PromoSeeder::class);
    }
}
