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

        // 5. 16 Produk Digital
        $produks = [
            // 1. Banner Wisuda
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'CUMA 40RB !!! Jasa Desain Banner Wisuda Custom – Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain banner media iklan custom yang dibuat sesuai kebutuhan bisnis, konsep promosi, dan identitas brand kamu. Setiap desain dibuat secara original dan disesuaikan dengan tujuan penggunaan, bukan sekadar menggunakan template, sehingga hasil akhir memiliki tampilan yang unik dan profesional.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Tampilan modern, menarik, dan profesional\n• Layout informasi rapi dan mudah dipahami\n• Desain menyesuaikan konsep brand dan target pasar\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• File siap digunakan untuk digital maupun cetak (PDF, JPG, dan PNG)",
            ],

            // 2. Kemasan Box
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Box / Packing Professional - Premium',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Premium Designz menyediakan jasa desain custom box packaging yang dibuat sesuai konsep, karakter produk, dan kebutuhan bisnis kamu. Setiap desain dibuat secara original dan custom, bukan sekadar menggunakan template, sehingga hasil akhir dapat menyesuaikan branding serta kebutuhan produksi.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Layout desain disesuaikan dengan ukuran dan bentuk box\n• Tampilan profesional dan mendukung branding produk\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi (CDR, EPS, PSD)\n• File siap cetak (PDF, JPG, PNG)",
            ],

            // 3. Redesain AI
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Redesain AI - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Premium Designz menyediakan jasa redesain dan penyempurnaan gambar AI yang dibuat sesuai konsep, kebutuhan, dan referensi yang kamu inginkan. Hasil gambar AI dapat dikembangkan kembali agar tampil lebih sesuai dengan kebutuhan desain, baik dari segi komposisi, warna, elemen, maupun detail visual.\n\nKeunggulan Layanan:\n• Redesain custom sesuai kebutuhan\n• Penyempurnaan hasil gambar AI\n• Penyesuaian komposisi dan elemen visual\n• Penyesuaian warna dan detail desain\n• Penambahan atau pengurangan elemen\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• File siap digunakan untuk digital maupun cetak",
            ],

            // 4. Jersey Custom
            [
                'kategori' => 'Jersey & Apparel',
                'layanan' => $layananJersey->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Jersey Custom Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Premium Designz menyediakan jasa desain jersey custom yang dibuat khusus sesuai kebutuhan kamu. Setiap desain dibuat secara original dan menyesuaikan konsep, warna, karakter, serta identitas yang ingin ditampilkan.\n\nKeunggulan layanan:\n• Desain original dan custom sesuai kebutuhan\n• Konsep desain menyesuaikan karakter tim atau brand\n• Tampilan jersey lebih profesional dan modern\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• Siap digunakan untuk kebutuhan produksi (PDF, JPG, dan PNG)",
            ],

            // 5. Kemasan Plastik & Pouch
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Plastik, Pouch, Snack Premium | Custom Packaging Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Ingin kemasan snack usaha kamu terlihat lebih menarik, profesional, dan bikin produk lebih standout?\nPremium Designz menyediakan jasa desain pouch snack custom yang dibuat sesuai dengan konsep, karakter produk, dan kebutuhan usaha kamu.\n\nKeunggulan layanan:\n• Desain original dan custom\n• Informasi produk mudah dibaca\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• Siap digunakan untuk kebutuhan cetak (PDF, JPG, dan PNG)",
            ],

            // 6. Logo Promo 10K
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'PROMO!!! MULAI DARI 10K!! JASA DESAIN LOGO Professional Logo Design Service',
                'No_wa' => '085168174679',
                'Stok_produk' => 30,
                'Des_produk' => "Logo bukan sekadar gambar, tetapi bagian penting dari identitas visual yang membuat sebuah brand lebih mudah dikenali.\nPremium Designz menyediakan jasa desain logo custom yang dibuat sesuai konsep, karakter, dan kebutuhan kamu.\n\nYang Kamu Dapatkan:\n• Desain logo custom sesuai kebutuhan\n• Konsep warna, bentuk, dan tipografi yang disesuaikan\n• Preview desain sebelum final\n• Mockup logo untuk melihat gambaran penggunaan\n• File final berkualitas tinggi",
            ],

            // 7. Editing Foto Studio
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Desain dan Editing Foto Studio Produk',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain dan editing foto produk yang dibuat agar produk kamu terlihat lebih menarik, profesional, dan siap digunakan untuk kebutuhan promosi.\n\nKeunggulan Layanan:\n• Editing foto produk custom sesuai kebutuhan\n• Penyesuaian background dan komposisi\n• Penyesuaian warna, pencahayaan, dan detail produk\n• Konsep foto disesuaikan dengan karakter produk\n• Tampilan profesional untuk kebutuhan promosi\n• Revisi sesuai ketentuan\n• File berkualitas tinggi",
            ],

            // 8. UI UX Mobile App
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI UX Mobile App Custom Professional',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Des_produk' => "Premium Designz menyediakan jasa desain UI/UX Mobile App dan Website custom yang dibuat berdasarkan kebutuhan bisnis, karakter brand, dan tujuan pengguna.\n\nKeunggulan Layanan:\n• Desain UI/UX original dan custom sesuai kebutuhan\n• Tampilan modern, clean, dan user-friendly\n• User flow dan struktur halaman yang terorganisir\n• Desain menggunakan Figma dengan kualitas profesional\n• Revisi sesuai kesepakatan\n• File design lengkap dan editable (Figma)\n• Prototype interaktif untuk presentasi dan pengembangan",
            ],

            // 9. Desain CV
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain CV - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 35,
                'Des_produk' => "Premium Designz menyediakan jasa desain CV custom yang dibuat sesuai kebutuhan, bidang pekerjaan, dan karakter profesional kamu.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Layout CV rapi, terstruktur, dan mudah dibaca\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain disesuaikan dengan bidang dan kebutuhan CV\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi",
            ],

            // 10. Poster Infografis Digital
            [
                'kategori' => 'Poster & Flyer',
                'layanan' => $layananPoster->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Poster Infografis Digital',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Jasa desain poster dan infografis digital dengan layanan profesional.\n\nKeunggulan Layanan:\n• Desain poster original & custom sesuai konsep acara atau promosi\n• Visualisasi data infografis yang mudah dipahami dan informatif\n• Komposisi warna dan tipografi menarik serta berkarakter\n• File resolusi tinggi siap diposting di media sosial atau dicetak\n• Revisi sesuai kesepakatan layanan",
            ],

            // 11. Label Produk
            [
                'kategori' => 'Label & Stiker',
                'layanan' => $layananLabel->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Label Produk - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Ingin label produk kamu terlihat lebih menarik, rapi, dan profesional?\nPremium Designz menyediakan jasa desain label UMKM dan produk custom yang dibuat sesuai dengan konsep, karakter produk, dan kebutuhan usaha kamu.\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan label menarik & profesional\n• Layout rapi dan proporsional\n• Informasi produk mudah dibaca\n• Bisa request konsep, warna, dan tema\n• Revisi sesuai kesepakatan",
            ],

            // 12. Logo Racing
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Logo Racing - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Premium Designz menyediakan jasa desain logo racing custom yang dibuat sesuai karakter, konsep, dan identitas tim atau brand kamu.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai konsep\n• Konsep visual sporty dan racing\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain dapat disesuaikan dengan karakter tim atau brand\n• Preview desain dan mockup\n• Revisi sesuai kesepakatan",
            ],

            // 13. Desain PPT
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain PPT - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain PowerPoint custom yang dibuat sesuai materi, tema, dan kebutuhan presentasi kamu.\n\nKeunggulan Layanan:\n• Desain slide custom sesuai kebutuhan\n• Layout rapi dan terstruktur\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain disesuaikan dengan tema presentasi\n• Visualisasi informasi agar lebih menarik\n• Revisi sesuai kesepakatan\n• File PPT siap digunakan",
            ],

            // 14. Banner UMKM
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Banner UMKM - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Banner menjadi salah satu media penting untuk memperkenalkan usaha, produk, maupun promo kepada pelanggan.\nPremium Designz menyediakan jasa desain banner UMKM custom yang dibuat sesuai dengan konsep, karakter usaha, dan kebutuhan kamu.\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan menarik & profesional\n• Layout rapi dan proporsional\n• Informasi mudah dibaca\n• Bisa request konsep, warna, dan tema\n• Revisi sesuai kesepakatan",
            ],

            // 15. Booth UMKM
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Booth UMKM - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Ingin booth jualan kamu terlihat lebih menarik, profesional, dan punya tampilan yang lebih menonjol?\nPremium Designz menyediakan jasa desain booth jualan custom yang dibuat sesuai dengan konsep, ukuran, karakter usaha, dan kebutuhan kamu.\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan booth menarik & profesional\n• Layout rapi dan proporsional\n• Konsep disesuaikan dengan karakter usaha\n• Preview dan mockup desain",
            ],

            // 16. UI UX Website Custom
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI UX Website Custom Professional | Figma Design',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Des_produk' => "Premium Designz menyediakan jasa desain UI/UX Website responsif custom yang dibuat berdasarkan kebutuhan bisnis, karakter brand, dan tujuan pengguna.\n\nKeunggulan Layanan:\n• Desain UI/UX original dan custom sesuai kebutuhan\n• Tampilan modern, clean, dan user-friendly\n• User flow dan struktur halaman yang terorganisir\n• Desain menggunakan Figma dengan kualitas profesional\n• Revisi sesuai kesepakatan\n• File design lengkap dan editable (Figma)",
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
        if (isset($createdProducts[0])) {
            $layananBanner->update(['Id_produk' => $createdProducts[0]->Id_produk]);
        }
        if (isset($createdProducts[1])) {
            $layananPackaging->update(['Id_produk' => $createdProducts[1]->Id_produk]);
        }
        if (isset($createdProducts[5])) {
            $layananLogo->update(['Id_produk' => $createdProducts[5]->Id_produk]);
        }
        if (isset($createdProducts[7])) {
            $layananUiUx->update(['Id_produk' => $createdProducts[7]->Id_produk]);
        }
        if (isset($createdProducts[3])) {
            $layananJersey->update(['Id_produk' => $createdProducts[3]->Id_produk]);
        }
        if (isset($createdProducts[2])) {
            $layananAiFoto->update(['Id_produk' => $createdProducts[2]->Id_produk]);
        }
        if (isset($createdProducts[10])) {
            $layananLabel->update(['Id_produk' => $createdProducts[10]->Id_produk]);
        }
        if (isset($createdProducts[8])) {
            $layananDokumen->update(['Id_produk' => $createdProducts[8]->Id_produk]);
        }
        if (isset($createdProducts[9])) {
            $layananPoster->update(['Id_produk' => $createdProducts[9]->Id_produk]);
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
