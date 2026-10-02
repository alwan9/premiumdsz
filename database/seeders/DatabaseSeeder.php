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

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application database.
     */
    public function run(): void
    {
        // 1. Settings
        Setting::create([
            'Judul' => 'Solusi Desain Grafis dan Identitas Visual Profesional untuk Brand Anda',
            'Deskripsi' => 'Studio kreatif dan marketplace penyedia jasa desain logo, kemasan, media promosi, UI/UX, dan perlengkapan identitas visual dengan standar estetika tinggi dan pengerjaan tepat waktu.',
        ]);

        // 2. Users (Admin)
        User::create([
            'Nama_user' => 'Admin Premium Design',
            'Username' => 'admin',
            'Email' => 'designzpremium@gmail.com',
            'Profile_url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
            'password' => Hash::make('password123'),
        ]);

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
            $createdKategoris[$k['Nama_kategori']] = Kategori::create($k);
        }

        // 4. Layanan (Paket Jasa / Pricing Tiers)
        $layananBanner = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Banner & Media Promosi',
            'Benefit' => "• Desain original dan custom sesuai kebutuhan\n• Layout rapi dan mudah dibaca\n• File siap cetak (PDF, JPG, PNG) & Mentahan HD\n• Revisi sesuai kesepakatan",
            'Des_layanan' => 'Jasa pembuatan banner wisuda, banner promosi UMKM, event toko, hingga media iklan outdoor.',
        ]);

        $layananPackaging = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Kemasan Box & Pouch',
            'Benefit' => "• Pola dieline presisi sesuai ukuran boks/pouch\n• 3D Mockup realistis untuk presentasi produk\n• Format warna siap cetak percetakan\n• Revisi sesuai kesepakatan",
            'Des_layanan' => 'Perancangan desain kemasan pouch makanan ringan, boks hampers, skincare, dan produk UMKM.',
        ]);

        $layananLogo = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Logo & Brand Identity',
            'Benefit' => "• Desain logo custom original dari awal (no template)\n• Mockup aplikasi logo & konsep warna/tipografi\n• File resolusi tinggi siap digital dan cetak\n• Konsultasi desain sebelum order",
            'Des_layanan' => 'Perancangan logo bisnis, logo racing, online shop, UMKM, dan identitas visual perusahaan.',
        ]);

        $layananUiUx = Layanan::create([
            'Nama_layanan' => 'Layanan UI/UX App & Website Figma',
            'Benefit' => "• Tampilan modern, clean, dan user-friendly\n• File design Figma editable & auto-layout\n• Interactive clickable prototype\n• User flow & struktur halaman terorganisir",
            'Des_layanan' => 'Perancangan antarmuka digital mobile app Android/iOS, website landing page, dan sistem dashboard.',
        ]);

        $layananJersey = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Jersey & Custom Apparel',
            'Benefit' => "• Desain original menyesuaikan karakter tim / komunitas\n• File siap cetak sublimasi / konveksi (CDR/EPS/PSD/PDF)\n• Mockup apparel depan & belakang\n• Revisi sesuai kesepakatan",
            'Des_layanan' => 'Desain jersey futsal, esport, komunitas motor/gowes, dan seragam apparel custom.',
        ]);

        $layananAiFoto = Layanan::create([
            'Nama_layanan' => 'Layanan Redesain AI & Foto Produk Studio',
            'Benefit' => "• Penyempurnaan detail gambar AI & komposisi warna\n• Editing foto studio produk agar siap marketplace & promosi\n• File resolusi tinggi digital & cetak\n• Pengerjaan rapi dan cepat",
            'Des_layanan' => 'Penyempurnaan artwork AI generator dan sentuhan editing foto produk untuk meningkatkan konversi penjualan.',
        ]);

        $layananLabel = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Label & Stiker Produk',
            'Benefit' => "• Penyesuaian ukuran & bentuk label toples/botol/kemasan\n• Tata letak informasi produk & logo yang proporsional\n• Mockup label realistis & file siap cetak\n• Revisi sesuai kesepakatan",
            'Des_layanan' => 'Pembuatan label stiker produk makanan ringan, toples kue, botol minuman, dan kemasan homemade.',
        ]);

        $layananDokumen = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Dokumen, CV & PowerPoint PPT',
            'Benefit' => "• Desain slide PPT presentasi interaktif & terstruktur\n• Format CV ATS-friendly & visual profesional\n• File master editable siap digunakan\n• Pengerjaan cepat & rapi",
            'Des_layanan' => 'Layanan desain slide presentasi bisnis/seminar dan pembuatan curriculum vitae profesional.',
        ]);

        $layananPoster = Layanan::create([
            'Nama_layanan' => 'Layanan Desain Poster & Infografis Digital',
            'Benefit' => "• Visualisasi data infografis informatif & estetik\n• Tampilan poster atraktif untuk event atau kampanye digital\n• File siap dipublikasikan ke media sosial & cetak\n• Revisi sesuai kesepakatan",
            'Des_layanan' => 'Pembuatan poster digital, infografis promosi bisnis, pengumuman instansi, dan publikasi event.',
        ]);

        // 5. 16 Produk Digital Sesuai Request Lengkap
        $produks = [
            // 1. Banner Wisuda
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'CUMA 40RB !!! Jasa Desain Banner Wisuda Custom – Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain banner media iklan custom yang dibuat sesuai kebutuhan bisnis, konsep promosi, dan identitas brand kamu. Setiap desain dibuat secara original dan disesuaikan dengan tujuan penggunaan, bukan sekadar menggunakan template, sehingga hasil akhir memiliki tampilan yang unik dan profesional.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Tampilan modern, menarik, dan profesional\n• Layout informasi rapi dan mudah dipahami\n• Desain menyesuaikan konsep brand dan target pasar\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• File siap digunakan untuk digital maupun cetak (PDF, JPG, dan PNG)\n\nCocok Untuk:\n• Banner Promosi Produk\n• Banner Event & Acara\n• Banner Diskon & Promo Toko\n• Banner Marketplace & Online Shop\n• Banner Sosial Media\n• Banner Bisnis UMKM\n• Banner Seminar & Pendidikan\n• Banner Campaign Marketing\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan kebutuhan desain banner dan konsep yang ingin dibuat.\n2. Kirim Brief & Referensi - Berikan informasi ukuran banner, isi teks, logo, foto produk, warna brand, serta referensi desain jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain dan harga sesuai kebutuhan, lalu lakukan pemesanan melalui Shopee.\n4. Proses & Revisi - Desain akan dikerjakan, preview diberikan untuk proses revisi, kemudian file final dikirim setelah desain disetujui.\n\nPENTING!!\n- Desain yang dipesan merupakan PRODUK DIGITAL. Harga tidak termasuk biaya cetak atau produk fisik.\n- Harga produk di Shopee digunakan untuk memudahkan proses checkout.\n- Harga akhir dapat disesuaikan berdasarkan tingkat kerumitan desain, ukuran banner, jumlah desain, serta kebutuhan tambahan pelanggan.\n- Setiap desain dibuat secara custom berdasarkan brief yang disepakati. Silakan konsultasikan kebutuhan Anda untuk mendapatkan estimasi harga yang tepat.",
            ],

            // 2. Kemasan Box
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Box / Packing Professional - Premium',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Premium Designz menyediakan jasa desain custom box packaging yang dibuat sesuai konsep, karakter produk, dan kebutuhan bisnis kamu. Setiap desain dibuat secara original dan custom, bukan sekadar menggunakan template, sehingga hasil akhir dapat menyesuaikan branding serta kebutuhan produksi.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Layout desain disesuaikan dengan ukuran dan bentuk box\n• Tampilan profesional dan mendukung branding produk\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi (CDR, EPS, PSD)\n• File siap cetak (PDF, JPG, PNG)\n\nCocok Untuk:\n• Box makanan & minuman\n• Packaging snack & cookies\n• Box hampers & gift\n• Box kosmetik & skincare\n• Box produk UMKM\n• Packaging elektronik & merchandise\n• Produk custom brand\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan jenis produk dan kebutuhan desain yang diinginkan.\n2. Kirim Brief & Referensi - Berikan informasi ukuran box, bahan, konsep desain, logo, dan referensi jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.\n\nPENTING!!\n- Desain yang dipesan merupakan PRODUK DIGITAL, harga tidak termasuk biaya cetak atau produk fisik.\n- Harga di Shopee digunakan untuk memudahkan proses checkout.\n- Harga akhir dapat menyesuaikan tingkat kerumitan desain, ukuran box, jumlah sisi desain, serta kebutuhan tambahan pelanggan.\n- Setiap desain dibuat secara custom sesuai brief yang telah disepakati.\n- Silakan konsultasikan kebutuhan desain terlebih dahulu untuk mendapatkan estimasi harga dan layanan yang sesuai.",
            ],

            // 3. Redesain AI
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Redesain AI - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Premium Designz menyediakan jasa redesain dan penyempurnaan gambar AI yang dibuat sesuai konsep, kebutuhan, dan referensi yang kamu inginkan. Hasil gambar AI dapat dikembangkan kembali agar tampil lebih sesuai dengan kebutuhan desain, baik dari segi komposisi, warna, elemen, maupun detail visual.\n\nKeunggulan Layanan:\n• Redesain custom sesuai kebutuhan\n• Penyempurnaan hasil gambar AI\n• Penyesuaian komposisi dan elemen visual\n• Penyesuaian warna dan detail desain\n• Penambahan atau pengurangan elemen\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• File siap digunakan untuk digital maupun cetak\n\nCocok Untuk:\n• Redesain Gambar AI\n• Penyempurnaan Artwork AI\n• Poster\n• Ilustrasi\n• Konten Sosial Media\n• Artwork & Visual\n• Kebutuhan Branding\n• Kebutuhan Digital & Cetak\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan gambar AI dan perubahan yang diinginkan.\n2. Kirim Gambar, Brief & Referensi - Berikan gambar AI, detail perubahan, konsep, serta referensi jika tersedia.\n3. Diskusi & Order - Tentukan konsep redesain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Redesain & Revisi - Desain dikembangkan sesuai brief, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.",
            ],

            // 4. Jersey Custom
            [
                'kategori' => 'Jersey & Apparel',
                'layanan' => $layananJersey->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Jersey Custom Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Desain Jersey Custom – Premium Designz\n\nPremium Designz menyediakan jasa desain jersey custom yang dibuat khusus sesuai kebutuhan kamu. Setiap desain dibuat secara original dan menyesuaikan konsep, warna, karakter, serta identitas yang ingin ditampilkan. Bukan sekadar menggunakan template, sehingga hasil desain dapat memiliki ciri khas tersendiri.\n\nKeunggulan layanan:\n• Desain original dan custom sesuai kebutuhan\n• Konsep desain menyesuaikan karakter tim atau brand\n• Tampilan jersey lebih profesional dan modern\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• Siap digunakan untuk kebutuhan produksi (PDF, JPG, dan PNG)\n\nCocok untuk:\n• Jersey Futsal & Sepak Bola\n• Jersey Esports & Gaming\n• Jersey Komunitas\n• Jersey Gowes & Cycling\n• Jersey Event & Turnamen\n• Jersey Keluarga / Gathering\n• Jersey Brand & Merchandise\n• Seragam Tim Custom\n• UMKM dan Bisnis Apparel\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan kebutuhan, jenis jersey, dan konsep desain yang ingin dibuat.\n2. Kirim Brief & Referensi - Berikan informasi seperti logo, warna, nama tim, nomor punggung, model jersey, ukuran, serta referensi desain jika ada.\n3. Diskusi & Order - Tentukan konsep desain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses & Revisi - Desain akan dikerjakan, preview diberikan untuk proses revisi, lalu file final dikirim setelah desain disetujui.\n\nPENTING!!\nDesain yang dipesan merupakan PRODUK DIGITAL. Harga tidak termasuk biaya produksi atau jersey fisik.\nHarga produk di Shopee digunakan untuk memudahkan proses checkout.\nHarga akhir dapat menyesuaikan tingkat kerumitan desain, jumlah item, serta kebutuhan tambahan pelanggan.\nSetiap desain dibuat secara custom berdasarkan brief yang disepakati.\nSilakan konsultasikan kebutuhan kamu terlebih dahulu untuk mendapatkan estimasi harga yang sesuai.",
            ],

            // 5. Kemasan Plastik & Pouch
            [
                'kategori' => 'Packaging & Kemasan',
                'layanan' => $layananPackaging->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Kemasan Plastik, Pouch, Snack Premium | Custom Packaging Profesional',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Desain Pouch Snack Custom – Premium Designz\n\nIngin kemasan snack usaha kamu terlihat lebih menarik, profesional, dan bikin produk lebih standout?\nKemasan menjadi salah satu hal pertama yang dilihat pelanggan. Dengan desain pouch yang menarik dan sesuai karakter produk, snack kamu bisa terlihat lebih profesional serta memiliki identitas brand yang lebih kuat.\nPremium Designz menyediakan jasa desain pouch snack custom yang dibuat sesuai dengan konsep, karakter produk, dan kebutuhan usaha kamu. Setiap desain dibuat secara custom, bukan sekadar menggunakan template, sehingga hasilnya dapat disesuaikan dengan identitas brand yang kamu inginkan.\n\nKeunggulan layanan:\n• Desain original dan custom\n• Informasi produk mudah dibaca\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi / Mentahan (CDR, EPS, PSD)\n• Siap digunakan untuk kebutuhan cetak (PDF, JPG, dan PNG)\n\nCocok untuk:\n• Keripik & Kerupuk\n• Snack & Makanan Ringan\n• Cookies & Kue Kering\n• Permen & Camilan\n• Produk Homemade\n• UMKM Kuliner\n• Brand Makanan Lokal\n• Produk Snack Custom\n\nCara Pemesanan:\n1. Chat Premium Designz — Sampaikan kebutuhan dan jenis desain yang diinginkan.\n2. Kirim Brief & Referensi — Sertakan detail, ukuran, materi, dan referensi jika ada.\n3. Diskusi & Order — Tentukan konsep dan harga, lalu lakukan pemesanan melalui Shopee.\n4. Proses & Revisi — Desain dikerjakan, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.\n\nPENTING!!\n- Desain yang dipesan merupakan PRODUK DIGITAL. Harga tidak termasuk biaya cetak atau produk fisik.\n- Harga produk di Shopee digunakan untuk memudahkan proses checkout.\n- Harga akhir dapat disesuaikan dengan tingkat kerumitan desain, jumlah halaman/item, serta kebutuhan tambahan pelanggan.\n- Setiap desain dibuat secara custom sesuai brief yang disepakati. Silakan konsultasikan kebutuhan Anda untuk mendapatkan estimasi harga yang tepat.",
            ],

            // 6. Logo Promo 10K
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'PROMO!!! MULAI DARI 10K!! JASA DESAIN LOGO Professional Logo Design Service',
                'No_wa' => '085168174679',
                'Stok_produk' => 30,
                'Des_produk' => "Jasa Desain Logo Custom Profesional – Premium Designz\n\nLogo bukan sekadar gambar, tetapi bagian penting dari identitas visual yang membuat sebuah brand lebih mudah dikenali.\nPremium Designz menyediakan jasa desain logo custom yang dibuat sesuai konsep, karakter, dan kebutuhan kamu. Setiap logo dirancang dari awal berdasarkan brief dan referensi yang diberikan, bukan sekadar menggunakan template.\n\nYang Kamu Dapatkan:\n• Desain logo custom sesuai kebutuhan\n• Konsep warna, bentuk, dan tipografi yang disesuaikan\n• Preview desain sebelum final\n• Mockup logo untuk melihat gambaran penggunaan\n• File final berkualitas tinggi\n• Cocok untuk kebutuhan digital maupun cetak\n• Revisi sesuai ketentuan layanan\n• Konsultasi desain sebelum order\n\nCocok Untuk:\n• Brand & Bisnis\n• UMKM\n• Produk & Jasa\n• Online Shop\n• Personal Branding\n• Komunitas & Organisasi\n• Event & Project\n• Dan kebutuhan lainnya",
            ],

            // 7. Editing Foto Studio
            [
                'kategori' => 'Foto & Redesain AI',
                'layanan' => $layananAiFoto->Id_Layanan,
                'Nama_produk' => 'Jasa Desain dan Editing Foto Studio Produk',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain dan editing foto produk yang dibuat agar produk kamu terlihat lebih menarik, profesional, dan siap digunakan untuk kebutuhan promosi. Foto dapat disesuaikan dengan background, komposisi, pencahayaan, serta konsep visual yang sesuai dengan karakter produk dan kebutuhan bisnis kamu.\nSetiap desain dibuat secara custom berdasarkan foto produk, konsep, dan referensi yang diberikan, sehingga hasil akhir dapat disesuaikan dengan identitas brand serta media yang digunakan.\n\nKeunggulan Layanan:\n• Editing foto produk custom sesuai kebutuhan\n• Penyesuaian background dan komposisi\n• Penyesuaian warna, pencahayaan, dan detail produk\n• Konsep foto disesuaikan dengan karakter produk\n• Tampilan profesional untuk kebutuhan promosi\n• Revisi sesuai ketentuan\n• File berkualitas tinggi\n• File siap digunakan untuk digital maupun marketplace\n\nCocok Untuk:\n• Foto Produk Marketplace\n• Foto Produk Media Sosial\n• Produk Makanan & Minuman\n• Produk Skincare & Kosmetik\n• Produk Fashion & Aksesoris\n• Produk UMKM\n• Katalog Produk\n\nCara Pemesanan:\n1. Pilih layanan dan lakukan pemesanan melalui Shopee.\n2. Sampaikan Brief - Setelah melakukan pemesanan, kirim foto produk, konsep, ukuran, dan referensi yang dibutuhkan melalui fitur chat Shopee.\n3. Proses Editing - Foto produk akan dikerjakan sesuai brief dan kebutuhan yang telah disampaikan.\n4. Preview & Revisi - Preview hasil akan diberikan untuk proses revisi sesuai ketentuan layanan.\n5. File Final - File final akan dikirim setelah desain selesai dan disetujui.",
            ],

            // 8. UI UX Mobile App
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI UX Mobile App Custom Professional',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Des_produk' => "Premium Designz menyediakan jasa desain UI/UX Mobile App dan Website custom yang dibuat berdasarkan kebutuhan bisnis, karakter brand, dan tujuan pengguna. Setiap desain dibuat secara original, bukan sekadar menggunakan template, sehingga hasil akhir dapat disesuaikan dengan konsep produk digital yang kamu inginkan.\n\nKeunggulan Layanan:\n• Desain UI/UX original dan custom sesuai kebutuhan\n• Tampilan modern, clean, dan user-friendly\n• User flow dan struktur halaman yang terorganisir\n• Desain menggunakan Figma dengan kualitas profesional\n• Revisi sesuai kesepakatan\n• File design lengkap dan editable (Figma)\n• Prototype interaktif untuk presentasi dan pengembangan\n\nCocok Untuk:\n• Aplikasi Mobile Android & iOS\n• Website Company Profile\n• Landing Page Produk\n• E-Commerce & Marketplace\n• Dashboard Admin / SaaS\n• Sistem Informasi & Aplikasi Bisnis\n• Startup dan Produk Digital\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan kebutuhan aplikasi atau website yang ingin dibuat.\n2. Kirim Brief & Referensi - Berikan informasi tujuan produk, jumlah halaman, fitur, konsep desain, logo, dan referensi jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain, jumlah halaman, dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, prototype diberikan untuk evaluasi, lalu file final dikirim setelah disetujui.\n\nPENTING!!\n- Desain yang dipesan merupakan PRODUK DIGITAL, harga tidak termasuk biaya coding, pengembangan aplikasi, atau pembuatan website.\n- Harga di Shopee digunakan untuk memudahkan proses checkout.\n- Harga akhir dapat menyesuaikan jumlah halaman, kompleksitas fitur, kebutuhan prototype, serta permintaan tambahan pelanggan.\n- Setiap desain dibuat secara custom sesuai brief yang telah disepakati.\n- Silakan konsultasikan kebutuhan desain terlebih dahulu untuk mendapatkan estimasi harga dan layanan yang sesuai.",
            ],

            // 9. Desain CV
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain CV - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 35,
                'Des_produk' => "Premium Designz menyediakan jasa desain CV custom yang dibuat sesuai kebutuhan, bidang pekerjaan, dan karakter profesional kamu. Setiap desain dibuat secara original dan custom, bukan sekadar menggunakan template, sehingga tampilan CV dapat disesuaikan dengan informasi, gaya visual, serta kebutuhan penggunaannya.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai kebutuhan\n• Layout CV rapi, terstruktur, dan mudah dibaca\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain disesuaikan dengan bidang dan kebutuhan CV\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• File siap digunakan untuk digital maupun cetak\n\nCocok Untuk:\n• CV Lamaran Kerja\n• CV Fresh Graduate\n• CV Mahasiswa\n• CV Magang\n• CV Organisasi\n• CV Profesional\n• CV Freelance\n• CV Portofolio\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan kebutuhan dan jenis CV yang diinginkan.\n2. Kirim Data & Referensi - Berikan data diri, pengalaman, pendidikan, foto, serta referensi desain jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.",
            ],

            // 10. Poster Infografis Digital
            [
                'kategori' => 'Poster & Flyer',
                'layanan' => $layananPoster->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Poster Infografis Digital',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Jasa desain poster dan infografis digital dengan layanan profesional.\n\nKeunggulan Layanan:\n• Desain poster original & custom sesuai konsep acara atau promosi\n• Visualisasi data infografis yang mudah dipahami dan informatif\n• Komposisi warna dan tipografi menarik serta berkarakter\n• File resolusi tinggi siap diposting di media sosial atau dicetak\n• Revisi sesuai kesepakatan layanan\n\nCocok Untuk:\n• Poster Event & Seminar\n• Infografis Edukasi & Kampanye Bisnis\n• Poster Promosi Toko & Online Shop\n• Pengumuman Instansi & Organisasi",
            ],

            // 11. Label Produk
            [
                'kategori' => 'Label & Stiker',
                'layanan' => $layananLabel->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Label Produk - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 25,
                'Des_produk' => "Jasa Desain Label UMKM & Produk Custom – Premium Designz\n\nIngin label produk kamu terlihat lebih menarik, rapi, dan profesional?\nLabel menjadi salah satu elemen penting pada kemasan yang membantu pelanggan mengenali produk sekaligus memberikan informasi yang dibutuhkan. Dengan desain label yang sesuai, tampilan produk dapat terlihat lebih menarik dan memiliki karakter visual yang lebih kuat.\nPremium Designz menyediakan jasa desain label UMKM dan produk custom yang dibuat sesuai dengan konsep, karakter produk, dan kebutuhan usaha kamu. Setiap desain dibuat secara custom, sehingga dapat disesuaikan dengan ukuran, bentuk, serta identitas visual produk.\n\nLayanan yang tersedia:\n• Desain label produk custom\n• Desain label makanan & snack\n• Desain label toples & kemasan\n• Penyesuaian ukuran dan bentuk label\n• Penempatan logo dan informasi produk\n• Penyesuaian warna, ilustrasi, dan tipografi\n• Preview desain sebelum final\n• Mockup label pada kemasan\n• File siap cetak dalam format PDF, JPG, dan PNG\n• Desain disesuaikan dengan konsep dan identitas produk\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan label menarik & profesional\n• Layout rapi dan proporsional\n• Informasi produk mudah dibaca\n• Bisa request konsep, warna, dan tema\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• Siap digunakan untuk kebutuhan cetak\n\nCocok untuk:\n• UMKM & Produk Lokal\n• Makanan & Minuman\n• Snack & Camilan\n• Cookies & Kue\n• Produk Homemade\n• Produk dalam Toples\n• Online Shop\n• Berbagai Produk UMKM",
            ],

            // 12. Logo Racing
            [
                'kategori' => 'Logo & Branding',
                'layanan' => $layananLogo->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Logo Racing - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Premium Designz menyediakan jasa desain logo racing custom yang dibuat sesuai karakter, konsep, dan identitas tim atau brand kamu. Setiap desain dibuat secara original dan custom, sehingga dapat menampilkan karakter racing yang kuat serta menyesuaikan kebutuhan penggunaan pada kendaraan, merchandise, maupun media lainnya.\n\nKeunggulan Layanan:\n• Desain original dan custom sesuai konsep\n• Konsep visual sporty dan racing\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain dapat disesuaikan dengan karakter tim atau brand\n• Preview desain dan mockup\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• File siap digunakan untuk digital maupun cetak\n\nCocok Untuk:\n• Racing Team\n• Komunitas Otomotif\n• Bengkel\n• Motor & Mobil\n• Jersey Racing\n• Sticker & Livery\n• Merchandise\n• Brand Otomotif\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan nama tim/brand dan konsep logo yang diinginkan.\n2. Kirim Brief & Referensi - Berikan nama, warna, karakter, konsep, serta referensi desain jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.",
            ],

            // 13. Desain PPT
            [
                'kategori' => 'Dokumen & PPT',
                'layanan' => $layananDokumen->Id_Layanan,
                'Nama_produk' => 'Jasa Desain PPT - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Premium Designz menyediakan jasa desain PowerPoint custom yang dibuat sesuai materi, tema, dan kebutuhan presentasi kamu. Setiap desain dibuat dengan memperhatikan layout, warna, tipografi, serta elemen visual agar materi presentasi terlihat lebih rapi, menarik, dan mudah dipahami.\n\nKeunggulan Layanan:\n• Desain slide custom sesuai kebutuhan\n• Layout rapi dan terstruktur\n• Penyesuaian warna, tipografi, dan elemen visual\n• Desain disesuaikan dengan tema presentasi\n• Visualisasi informasi agar lebih menarik\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• File PPT siap digunakan\n\nCocok Untuk:\n• Presentasi Kuliah\n• Presentasi Sekolah\n• Tugas\n• Seminar\n• Proposal\n• Presentasi Bisnis\n• Company Profile\n• Presentasi Organisasi\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan jumlah slide dan kebutuhan desain presentasi.\n2. Kirim Materi & Referensi - Berikan materi PPT, tema, identitas visual, dan referensi desain jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, preview diberikan untuk revisi, lalu file final dikirim setelah disetujui.",
            ],

            // 14. Banner UMKM
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Banner UMKM - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 20,
                'Des_produk' => "Jasa Desain Banner UMKM Custom – Premium Designz\n\nIngin banner usaha kamu terlihat lebih menarik, profesional, dan mudah menarik perhatian pelanggan?\nBanner menjadi salah satu media penting untuk memperkenalkan usaha, produk, maupun promo kepada pelanggan. Dengan desain yang tepat, informasi dapat disampaikan dengan lebih jelas sekaligus membuat tampilan usaha terlihat lebih profesional.\nPremium Designz menyediakan jasa desain banner UMKM custom yang dibuat sesuai dengan konsep, karakter usaha, dan kebutuhan kamu. Setiap desain dibuat secara custom, bukan sekadar menggunakan template, sehingga hasilnya dapat disesuaikan dengan identitas visual usaha.\n\nLayanan yang tersedia:\n• Desain banner UMKM custom\n• Banner promosi produk & jasa\n• Banner toko & usaha\n• Penyesuaian ukuran banner\n• Penempatan logo dan informasi usaha\n• Penyesuaian warna, ilustrasi, dan tipografi\n• Preview desain sebelum final\n• File siap cetak dalam format PDF, JPG, dan PNG\n• Desain disesuaikan dengan konsep dan identitas usaha\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan menarik & profesional\n• Layout rapi dan proporsional\n• Informasi mudah dibaca\n• Bisa request konsep, warna, dan tema\n• Revisi sesuai kesepakatan\n• File berkualitas tinggi\n• Siap digunakan untuk kebutuhan digital maupun cetak\n\nCocok untuk:\n• UMKM & Online Shop\n• Toko & Usaha Lokal\n• Produk Makanan & Minuman\n• Jasa & Layanan\n• Promo Produk\n• Event & Bazaar\n• Stand Usaha\n• Kebutuhan Promosi Lainnya",
            ],

            // 15. Booth UMKM
            [
                'kategori' => 'Banner & Spanduk',
                'layanan' => $layananBanner->Id_Layanan,
                'Nama_produk' => 'Jasa Desain Booth UMKM - Premium Designz',
                'No_wa' => '085168174679',
                'Stok_produk' => 15,
                'Des_produk' => "Jasa Desain Booth Jualan Custom – Premium Designz\n\nIngin booth jualan kamu terlihat lebih menarik, profesional, dan punya tampilan yang lebih menonjol?\nTampilan booth menjadi salah satu hal yang dapat menarik perhatian pelanggan. Desain yang terstruktur dan sesuai dengan karakter usaha dapat membantu membuat booth terlihat lebih rapi, informatif, dan menarik.\nPremium Designz menyediakan jasa desain booth jualan custom yang dibuat sesuai dengan konsep, ukuran, karakter usaha, dan kebutuhan kamu. Desain dibuat secara custom agar tampilan booth dapat disesuaikan dengan identitas usaha yang diinginkan.\n\nLayanan yang tersedia:\n• Desain booth jualan custom\n• Desain tampilan depan dan area booth\n• Desain banner booth\n• Penyesuaian warna, ilustrasi, dan tipografi\n• Penempatan logo dan informasi usaha\n• Penyesuaian desain dengan ukuran booth\n• Preview desain sebelum final\n• Mockup booth\n• File siap digunakan untuk kebutuhan produksi\n\nKeunggulan layanan:\n• Desain original dan custom\n• Tampilan booth menarik & profesional\n• Layout rapi dan proporsional\n• Konsep disesuaikan dengan karakter usaha\n• Bisa request konsep, warna, dan tema\n• Revisi sesuai kesepakatan\n• Preview dan mockup desain\n• Konsultasi konsep desain\n\nCocok untuk:\n• Booth Makanan & Minuman\n• UMKM & Usaha Lokal\n• Bazaar & Event\n• Stand Sekolah & Kampus\n• Pameran\n• Jajanan & Snack\n• Usaha Rumahan\n• Kebutuhan Booth Lainnya",
            ],

            // 16. UI UX Website Custom
            [
                'kategori' => 'UI/UX & Web',
                'layanan' => $layananUiUx->Id_Layanan,
                'Nama_produk' => 'Jasa Desain UI UX Website Custom Professional | Figma Design',
                'No_wa' => '085168174679',
                'Stok_produk' => 10,
                'Des_produk' => "Premium Designz menyediakan jasa desain UI/UX Mobile App dan Website custom yang dibuat berdasarkan kebutuhan bisnis, karakter brand, dan tujuan pengguna. Setiap desain dibuat secara original, bukan sekadar menggunakan template, sehingga hasil akhir dapat disesuaikan dengan konsep produk digital yang kamu inginkan.\n\nKeunggulan Layanan:\n• Desain UI/UX original dan custom sesuai kebutuhan\n• Tampilan modern, clean, dan user-friendly\n• User flow dan struktur halaman yang terorganisir\n• Desain menggunakan Figma dengan kualitas profesional\n• Revisi sesuai kesepakatan\n• File design lengkap dan editable (Figma)\n• Prototype interaktif untuk presentasi dan pengembangan\n\nCocok Untuk:\n• Website Company Profile\n• Landing Page Produk\n• E-Commerce & Marketplace\n• Dashboard Admin / SaaS\n• Sistem Informasi & Aplikasi Bisnis\n• Startup dan Produk Digital\n\nCara Pemesanan:\n1. Chat Premium Designz - Sampaikan kebutuhan aplikasi atau website yang ingin dibuat.\n2. Kirim Brief & Referensi - Berikan informasi tujuan produk, jumlah halaman, fitur, konsep desain, logo, dan referensi jika tersedia.\n3. Diskusi & Order - Tentukan konsep desain, jumlah halaman, dan harga, kemudian lakukan pemesanan melalui Shopee.\n4. Proses Desain & Revisi - Desain dibuat sesuai brief, prototype diberikan untuk evaluasi, lalu file final dikirim setelah disetujui.\n\nPENTING!!\n- Desain yang dipesan merupakan PRODUK DIGITAL, harga tidak termasuk biaya coding, pengembangan aplikasi, atau pembuatan website.\n- Harga di Shopee digunakan untuk memudahkan proses checkout.\n- Harga akhir dapat menyesuaikan jumlah halaman, kompleksitas fitur, kebutuhan prototype, serta permintaan tambahan pelanggan.\n- Setiap desain dibuat secara custom sesuai brief yang telah disepakati.\n- Silakan konsultasikan kebutuhan desain terlebih dahulu untuk mendapatkan estimasi harga dan layanan yang sesuai.",
            ],
        ];

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

        foreach ($reviews as $rev) {
            Testimoni::create([
                'Judul' => $rev['Judul'],
                'Foto_url' => $rev['Foto_url'],
            ]);
        }

        // 6. Portofolio
        $this->call(PortofolioSeeder::class);
    }
}
