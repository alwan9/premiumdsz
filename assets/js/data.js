/**
 * Premium Designz - Master Data Store
 * Pure JavaScript Data Layer
 */

const SITE_SETTINGS = {
    Judul: "Solusi Desain Grafis dan Identitas Visual Profesional untuk Brand Anda",
    Deskripsi: "Studio kreatif dan marketplace penyedia jasa desain logo, kemasan, media promosi, UI/UX, dan perlengkapan identitas visual dengan standar estetika tinggi dan pengerjaan tepat waktu.",
    whatsapp: "0851-6817-4679",
    whatsapp_raw: "6285168174679",
    email: "designzpremium@gmail.com",
    hours: "Setiap Hari: 09.00 - 23.00 WIB",
    links: {
        instagram: "https://www.instagram.com/premiumdsz/",
        tiktok: "https://www.tiktok.com/@premium.designz",
        shopee: "https://shopee.co.id/premium_dz",
        fiverr: "https://www.fiverr.com/premiumdz",
        lynk: "https://lynk.id/premiumdsz"
    }
};

const CATEGORIES = [
    {
        Id_kategori: 1,
        Nama_kategori: "Banner & Spanduk",
        Des_kategori: "Media promosi luar ruang, banner wisuda, banner UMKM, stand booth event, dan materi visual promosi.",
        icon_name: "lucide:flag"
    },
    {
        Id_kategori: 2,
        Nama_kategori: "Packaging & Kemasan",
        Des_kategori: "Desain standing pouch snack, boks kemasan produk, hampers, dan packaging retail siap cetak.",
        icon_name: "lucide:box"
    },
    {
        Id_kategori: 3,
        Nama_kategori: "Logo & Branding",
        Des_kategori: "Identitas visual, logo custom bisnis, logo racing, filosofi warna, dan typography branding.",
        icon_name: "lucide:sparkles"
    },
    {
        Id_kategori: 4,
        Nama_kategori: "UI/UX & Web",
        Des_kategori: "Desain interface mobile app Android & iOS, website company profile, landing page, dan Figma mockup.",
        icon_name: "lucide:layout"
    },
    {
        Id_kategori: 5,
        Nama_kategori: "Label & Stiker",
        Des_kategori: "Desain label botol, stiker toples makanan, tag produk UMKM, dan packaging jar siap cetak.",
        icon_name: "lucide:tag"
    },
    {
        Id_kategori: 6,
        Nama_kategori: "Jersey & Apparel",
        Des_kategori: "Desain jersey olahraga custom, esport gaming, seragam tim, komunitas, dan apparel merchandise.",
        icon_name: "lucide:shirt"
    },
    {
        Id_kategori: 7,
        Nama_kategori: "Foto & Redesain AI",
        Des_kategori: "Penyempurnaan gambar AI, redesain artwork, editing foto studio produk, dan koreksi detail visual.",
        icon_name: "lucide:image"
    },
    {
        Id_kategori: 8,
        Nama_kategori: "Poster & Flyer",
        Des_kategori: "Materi promosi poster infografis digital, flyer acara, dan grafis informasi terstruktur.",
        icon_name: "lucide:file-text"
    },
    {
        Id_kategori: 9,
        Nama_kategori: "Dokumen & PPT",
        Des_kategori: "Desain PowerPoint presentasi profesional, slide seminar/kuliah, dan desain Curriculum Vitae (CV) menarik.",
        icon_name: "lucide:presentation"
    }
];

const SOFTWARE_TOOLS = [
    {
        Id_software: 1,
        Nama_software: "Adobe Photoshop",
        Logo_url: "assets/software/adobe_photoshop.png",
        Des_software: "Software standar industri untuk editing raster, manipulasi visual, koreksi warna, mockup photorealistic, dan compositing grafis tingkat lanjut."
    },
    {
        Id_software: 2,
        Nama_software: "Adobe Illustrator",
        Logo_url: "assets/software/Adobe_Illustrator.png",
        Des_software: "Aplikasi desain grafis vektor profesional untuk pembuatan logo presisi, icon, layout kemasan siap cetak, dan artwork resolusi tak terbatas."
    },
    {
        Id_software: 3,
        Nama_software: "CorelDRAW",
        Logo_url: "assets/software/coreldraw.png",
        Des_software: "Software desain grafis berbasis vektor yang sangat populer untuk industri percetakan, banner outdoor, packaging, dan apparel jersey."
    },
    {
        Id_software: 4,
        Nama_software: "Figma",
        Logo_url: "assets/software/figma.png",
        Des_software: "Platform desain UI/UX berbasis cloud untuk perancangan interface mobile app, website company profile, wireframing, dan interactive prototyping."
    },
    {
        Id_software: 5,
        Nama_software: "Canva",
        Logo_url: "assets/software/canva.png",
        Des_software: "Aplikasi desain grafis modern yang fleksibel untuk pembuatan konten media sosial, flyer digital, presentasi kilat, dan materi promosi visual."
    },
    {
        Id_software: 6,
        Nama_software: "PowerPoint (PPT)",
        Logo_url: "assets/software/powerpoint.png",
        Des_software: "Software presentasi profesional untuk menyusun deck bisnis, slide pitching investor, infografis data terstruktur, dan template seminar."
    },
    {
        Id_software: 7,
        Nama_software: "SketchUp",
        Logo_url: "assets/software/sketchup.png",
        Des_software: "Software modeling 3D untuk visualisasi mockup stan booth, display pameran event, dan arsitektur visual produk 3 dimensi."
    }
];

const SERVICES = [
    {
        Id_Layanan: 1,
        Nama_layanan: "Layanan Desain Banner & Media Promosi",
        Des_layanan: "Jasa pembuatan banner wisuda, banner promosi UMKM, event toko, hingga media iklan outdoor.",
        Benefit: "• Desain original dan custom sesuai kebutuhan\n• Layout rapi dan mudah dibaca\n• File siap cetak (PDF, JPG, PNG) & Mentahan HD\n• Revisi sesuai kesepakatan",
        sample_product_id: 2
    },
    {
        Id_Layanan: 2,
        Nama_layanan: "Layanan Desain Kemasan Box & Pouch",
        Des_layanan: "Perancangan desain kemasan pouch makanan ringan, boks hampers, skincare, dan produk UMKM.",
        Benefit: "• Pola dieline presisi sesuai ukuran boks/pouch\n• 3D Mockup realistis untuk presentasi produk\n• Format warna siap cetak percetakan\n• Revisi sesuai kesepakatan",
        sample_product_id: 5
    },
    {
        Id_Layanan: 3,
        Nama_layanan: "Layanan Desain Logo & Brand Identity",
        Des_layanan: "Perancangan logo bisnis, logo racing, online shop, UMKM, dan identitas visual perusahaan.",
        Benefit: "• Desain logo custom original dari awal (no template)\n• Mockup aplikasi logo & konsep warna/tipografi\n• File resolusi tinggi siap digital dan cetak\n• Konsultasi desain sebelum order",
        sample_product_id: 9
    },
    {
        Id_Layanan: 4,
        Nama_layanan: "Layanan UI/UX App & Website Figma",
        Des_layanan: "Perancangan antarmuka digital mobile app Android/iOS, website landing page, dan sistem dashboard.",
        Benefit: "• Tampilan modern, clean, dan user-friendly\n• File design Figma editable & auto-layout\n• Interactive clickable prototype\n• User flow & struktur halaman terorganisir",
        sample_product_id: 19
    },
    {
        Id_Layanan: 5,
        Nama_layanan: "Layanan Desain Jersey & Custom Apparel",
        Des_layanan: "Desain jersey futsal, esport, komunitas motor/gowes, dan seragam apparel custom.",
        Benefit: "• Desain original menyesuaikan karakter tim / komunitas\n• File siap cetak sublimasi / konveksi (CDR/EPS/PSD/PDF)\n• Mockup apparel depan & belakang\n• Revisi sesuai kesepakatan",
        sample_product_id: 11
    },
    {
        Id_Layanan: 6,
        Nama_layanan: "Layanan Redesain AI & Foto Produk Studio",
        Des_layanan: "Penyempurnaan artwork AI generator dan sentuhan editing foto produk untuk meningkatkan konversi penjualan.",
        Benefit: "• Penyempurnaan detail gambar AI & komposisi warna\n• Editing foto studio produk agar siap marketplace & promosi\n• File resolusi tinggi digital & cetak\n• Pengerjaan rapi dan cepat",
        sample_product_id: 12
    },
    {
        Id_Layanan: 7,
        Nama_layanan: "Layanan Desain Label & Stiker Produk",
        Des_layanan: "Pembuatan label stiker produk makanan ringan, toples kue, botol minuman, dan kemasan homemade.",
        Benefit: "• Penyesuaian ukuran & bentuk label toples/botol/kemasan\n• Tata letak informasi produk & logo yang proporsional\n• Mockup label realistis & file siap cetak\n• Revisi sesuai kesepakatan",
        sample_product_id: 8
    },
    {
        Id_Layanan: 8,
        Nama_layanan: "Layanan Desain Dokumen, CV & PowerPoint PPT",
        Des_layanan: "Layanan desain slide presentasi bisnis/seminar dan pembuatan curriculum vitae profesional.",
        Benefit: "• Desain slide PPT presentasi interaktif & terstruktur\n• Format CV ATS-friendly & visual profesional\n• File master editable siap digunakan\n• Pengerjaan cepat & rapi",
        sample_product_id: 14
    },
    {
        Id_Layanan: 9,
        Nama_layanan: "Layanan Desain Poster & Infografis Digital",
        Des_layanan: "Pembuatan poster digital, infografis promosi bisnis, pengumuman instansi, dan publikasi event.",
        Benefit: "• Visualisasi data infografis informatif & estetik\n• Tampilan poster atraktif untuk event atau kampanye digital\n• File siap dipublikasikan ke media sosial & cetak\n• Revisi sesuai kesepakatan",
        sample_product_id: 17
    }
];

const PROMOS = [
    {
        Id_promo: 1,
        Judul: "Promo Spesial Banner & Desain Promosi UMKM",
        image_url: "assets/promo/banner promo (1).jpg",
        target_url: "https://api.whatsapp.com/send/?phone=6285168174679&text=" + encodeURIComponent("Halo Premium Design, saya ingin klaim Promo Banner & Media Promosi UMKM.")
    },
    {
        Id_promo: 2,
        Judul: "Diskon Paket Branding & Logo Eksklusif",
        image_url: "assets/promo/banner promo (2).jpg",
        target_url: "https://api.whatsapp.com/send/?phone=6285168174679&text=" + encodeURIComponent("Halo Premium Design, saya ingin konsultasi Promo Paket Branding & Logo.")
    },
    {
        Id_promo: 3,
        Judul: "Penawaran Spesial Kemasan & Standing Pouch",
        image_url: "assets/promo/banner promo (3).jpg",
        target_url: "https://api.whatsapp.com/send/?phone=6285168174679&text=" + encodeURIComponent("Halo Premium Design, saya ingin info Promo Desain Kemasan & Pouch.")
    },
    {
        Id_promo: 4,
        Judul: "Promo Bundling Desain Media Sosial & Apparel",
        image_url: "assets/promo/banner promo (4).jpg",
        target_url: "https://api.whatsapp.com/send/?phone=6285168174679&text=" + encodeURIComponent("Halo Premium Design, saya tertarik dengan Promo Bundling Desain Media Sosial & Apparel.")
    }
];

const TESTIMONIALS = [
    {
        Id_testimoni: 1,
        Judul: "Testimoni Desain Kemasan Standing Pouch Kopi",
        display_title: "Kemasan Standing Pouch Kopi",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0000_6cbaeec1-2b90-4301-bbf6-20f37fc48781artboard1.jpg"
    },
    {
        Id_testimoni: 2,
        Judul: "Testimoni Desain Box Kosmetik & Serum",
        display_title: "Desain Box Kosmetik & Serum",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0001_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0007_layer0.jpg"
    },
    {
        Id_testimoni: 3,
        Judul: "Testimoni Desain Banner & Spanduk UMKM",
        display_title: "Desain Banner & Spanduk UMKM",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0002_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0006_eadbf863-a0cf-4fa8-a300-.jpg"
    },
    {
        Id_testimoni: 4,
        Judul: "Testimoni UI/UX Design & Landing Page",
        display_title: "UI/UX Design & Landing Page",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0003_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0005_92cb19d8-f7ee-4d3e-97c5-.jpg"
    },
    {
        Id_testimoni: 5,
        Judul: "Testimoni Brand Identity & Logo Monogram",
        display_title: "Brand Identity & Logo Monogram",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0004_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0004_d39d3d08-e900-4b71-aea4-.jpg"
    },
    {
        Id_testimoni: 6,
        Judul: "Testimoni Restorasi & Redesign Logo Vektor",
        display_title: "Restorasi & Redesign Logo Vektor",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0005_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0003_33739a87-240a-4ff8-a721-.jpg"
    },
    {
        Id_testimoni: 7,
        Judul: "Testimoni Desain Label & Packaging Snack",
        display_title: "Desain Label & Packaging Snack",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0006_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0002_d9f6f67b-1e6e-46df-bc86-.jpg"
    },
    {
        Id_testimoni: 8,
        Judul: "Testimoni Banner Promo WhatsApp & Medsos",
        display_title: "Banner Promo WhatsApp & Medsos",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0007_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0001_9ccac676-67c5-4707-9758-.jpg"
    },
    {
        Id_testimoni: 9,
        Judul: "Testimoni Desain Apparel & Graphic Kaos",
        display_title: "Desain Apparel & Graphic Kaos",
        image_url: "assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0008_6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0000_ff66305a-eab7-4185-8ced-.jpg"
    }
];

const PRODUCTS = [
    {
        Id_produk: 1,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain Banner Wisuda & Ucapan Selamat Custom",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1 Hari",
        Des_produk: "Desain banner wisuda eksklusif, estetik, dan berkesan untuk sahabat, pasangan, maupun keluarga. Dibuat custom dengan layout foto elegan, pilihan tipografi modern, dan file mentahan siap cetak resolusi tinggi.",
        image_url: "assets/bannerumkm2.jpg",
        gallery_urls: [
            "assets/bannerumkm2.jpg",
            "assets/bannerumkm1.jpg",
            "assets/xbanner_(1).jpg"
        ],
        software_ids: [1, 3, 2, 5]
    },
    {
        Id_produk: 2,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain Banner & Spanduk UMKM Promosi Toko",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1-2 Hari",
        Des_produk: "Desain spanduk dan banner outdoor untuk toko fisik, gerai kuliner, dan event promo UMKM. Layout jelas, warna kontras menarik perhatian, dan informasi produk mudah dibaca dari kejauhan.",
        image_url: "assets/bannerumkm1.jpg",
        gallery_urls: [
            "assets/bannerumkm1.jpg",
            "assets/bannerumkm2.jpg",
            "assets/xbanner_(3).jpg",
            "assets/xbanner_(4).jpg"
        ],
        software_ids: [1, 3, 2, 5]
    },
    {
        Id_produk: 3,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain Stand Booth Jualan & Pameran UMKM",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "2-3 Hari",
        Des_produk: "Desain visual gerobak jualan portable, booth pameran mall/event, dan stand branding usaha agar terlihat lebih menonjol, rapi, dan profesional di hadapan calon pembeli.",
        image_url: "assets/booth1.jpg",
        gallery_urls: [
            "assets/booth1.jpg",
            "assets/booth2.jpg"
        ],
        software_ids: [1, 3, 2, 7]
    },
    {
        Id_produk: 4,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain X-Banner & Roll Banner Promosi Event",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1 Hari",
        Des_produk: "Desain standing X-Banner vertikal dan Roll-Up Banner untuk media promosi di depan toko, seminar kampus, resepsi, maupun booth expo pameran industri.",
        image_url: "assets/xbanner_(1).jpg",
        gallery_urls: [
            "assets/xbanner_(1).jpg",
            "assets/xbanner_(3).jpg",
            "assets/xbanner_(4).jpg"
        ],
        software_ids: [1, 3, 2, 5]
    },
    {
        Id_produk: 5,
        Id_kategori: 2,
        Id_layanan: 2,
        Nama_produk: "Jasa Desain Kemasan Box / Packing Karton Profesional",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "2-3 Hari",
        Des_produk: "Perancangan desain pola dieline box kemasan produk retail, kotak kue/makanan, box hampers, dan packaging karton kardus dengan ukuran presisi standar pabrik percetakan.",
        image_url: "assets/box1.jpg",
        gallery_urls: [
            "assets/box1.jpg",
            "assets/box2.jpg",
            "assets/box3.jpg"
        ],
        software_ids: [2, 3, 1]
    },
    {
        Id_produk: 6,
        Id_kategori: 2,
        Id_layanan: 2,
        Nama_produk: "Jasa Desain Kemasan Standing Pouch Snack & Makanan Ringan",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "2 Hari",
        Des_produk: "Desain pouch snack makanan ringan, keripik, biji kopi, bumbu masak, dan produk olahan UMKM. Tampilan visual appetizing yang meningkatkan daya tarik konsumen di rak supermarket.",
        image_url: "assets/jasapouch_(1).jpg",
        gallery_urls: [
            "assets/jasapouch_(1).jpg",
            "assets/jasapouch_(2).jpg"
        ],
        software_ids: [3, 2, 1]
    },
    {
        Id_produk: 7,
        Id_kategori: 2,
        Id_layanan: 2,
        Nama_produk: "Jasa Desain Packaging & Kemasan Produk Custom Eksklusif",
        No_wa: "085168174679",
        Stok_produk: 18,
        Estimasi: "2-3 Hari",
        Des_produk: "Desain kemasan botol minuman, jar skincare/kosmetik, kaleng biskuit, dan bungkus produk custom dengan render 3D mockup realistis siap presentasi.",
        image_url: "assets/kemasan1.jpg",
        gallery_urls: [
            "assets/kemasan1.jpg",
            "assets/kemasan2.jpg",
            "assets/kemasan3.jpg",
            "assets/kemasan4.jpg",
            "assets/kemasan5.jpg"
        ],
        software_ids: [3, 2, 1]
    },
    {
        Id_produk: 8,
        Id_kategori: 5,
        Id_layanan: 7,
        Nama_produk: "Jasa Desain Label Botol & Stiker Toples Produk UMKM",
        No_wa: "085168174679",
        Stok_produk: 30,
        Estimasi: "1 Hari",
        Des_produk: "Desain stiker label toples kue kering, label botol sirup/jus, tag jar bumbu, dan segel kemasan produk UMKM siap potong (die cut) dengan komposisi warna memikat.",
        image_url: "assets/labelumkm1.jpg",
        gallery_urls: [
            "assets/labelumkm1.jpg",
            "assets/labelumkm2.jpg"
        ],
        software_ids: [1, 3, 2]
    },
    {
        Id_produk: 9,
        Id_kategori: 3,
        Id_layanan: 3,
        Nama_produk: "Jasa Desain Logo & Brand Identity Bisnis Profesional",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "2-3 Hari",
        Des_produk: "Perancangan logo custom original (no template), filosofi warna, tipografi, dan buku panduan brand guideline untuk online shop, korporat, startup, dan UMKM.",
        image_url: "assets/jasalogo_(1).jpg",
        gallery_urls: [
            "assets/jasalogo_(1).jpg",
            "assets/jasalogo_(2).jpg"
        ],
        software_ids: [2, 3]
    },
    {
        Id_produk: 10,
        Id_kategori: 3,
        Id_layanan: 3,
        Nama_produk: "Jasa Redesain Logo Vektor & Racing Team Custom",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "1-2 Hari",
        Des_produk: "Desain logo gaya racing bernuansa tajam dan agresif untuk tim balap, komunitas motor, esport squad, serta tracing ulang logo buram menjadi file vektor HD.",
        image_url: "assets/repairlogo_(1).jpg",
        gallery_urls: [
            "assets/repairlogo_(1).jpg",
            "assets/repairlogo_(2).jpg"
        ],
        software_ids: [2, 3]
    },
    {
        Id_produk: 11,
        Id_kategori: 6,
        Id_layanan: 5,
        Nama_produk: "Jasa Desain Jersey Custom Futsal, Esport & Apparel",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "2 Hari",
        Des_produk: "Desain pola baju jersey printing sublimasi untuk tim futsal, sepak bola, basket, esport, kaos komunitas, dan merchandise distro lengkap dengan pola cetak konveksi.",
        image_url: "assets/jasajersey_(1).jpg",
        gallery_urls: [
            "assets/jasajersey_(1).jpg",
            "assets/jasajersey_(2).jpg",
            "assets/jasajersey_(3).jpg"
        ],
        software_ids: [1, 3, 2]
    },
    {
        Id_produk: 12,
        Id_kategori: 7,
        Id_layanan: 6,
        Nama_produk: "Jasa Editing Foto Produk Normal to Studio Marketplace",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Transformasi foto jepretan kamera ponsel menjadi foto katalog studio mewah berkelas: hapus background, koreksi bayangan natural, lighting dramatis, dan touch-up warna.",
        image_url: "assets/editfotonormaltostudio1.jpg",
        gallery_urls: [
            "assets/editfotonormaltostudio1.jpg",
            "assets/editfotonormaltostudio2.jpg",
            "assets/editfotonormaltostudio3.jpg",
            "assets/editfotonormaltostudio4.jpg",
            "assets/editfotonormaltostudio.jpg"
        ],
        software_ids: [1]
    },
    {
        Id_produk: 13,
        Id_kategori: 7,
        Id_layanan: 6,
        Nama_produk: "Jasa Redesain Gambar AI & Repair Restorasi Foto",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1-2 Hari",
        Des_produk: "Penyempurnaan gambar artwork AI yang mengalami distorsi jari/wajah, pewarnaan foto lama hitam putih, dan restorasi foto resolusi rendah menjadi tajam kembali.",
        image_url: "assets/repairfoto1.jpg",
        gallery_urls: [
            "assets/repairfoto1.jpg",
            "assets/repairfoto2.jpg"
        ],
        software_ids: [1]
    },
    {
        Id_produk: 14,
        Id_kategori: 9,
        Id_layanan: 8,
        Nama_produk: "Jasa Desain CV & Resume Lamaran Kerja ATS-Friendly",
        No_wa: "085168174679",
        Stok_produk: 35,
        Estimasi: "1 Hari",
        Des_produk: "Desain curriculum vitae profesional modern yang lulus uji screening ATS (Applicant Tracking System), layout rapi, pemilihan tipografi jelas, dan format PDF siap kirim HRD.",
        image_url: "assets/jasacv1.jpg",
        gallery_urls: [
            "assets/jasacv1.jpg",
            "assets/jasacv2.jpg",
            "assets/jasacv3.jpg",
            "assets/jasacv4.jpg"
        ],
        software_ids: [1, 5, 3, 2]
    },
    {
        Id_produk: 15,
        Id_kategori: 9,
        Id_layanan: 8,
        Nama_produk: "Jasa Desain Slide Presentasi PowerPoint (PPT) Profesional",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1-2 Hari",
        Des_produk: "Pembuatan deck presentasi PowerPoint interaktif untuk pitching bisnis, sidang tugas akhir skripsi, company profile interaktif, dan slide seminar profesional.",
        image_url: "assets/jasapowerpoint_(1).jpg",
        gallery_urls: [
            "assets/jasapowerpoint_(1).jpg",
            "assets/jasapowerpoint_(2).jpg",
            "assets/jasapowerpoint_(3).jpg",
            "assets/jasapowerpoint_(4).jpg"
        ],
        software_ids: [6, 5, 4]
    },
    {
        Id_produk: 16,
        Id_kategori: 8,
        Id_layanan: 9,
        Nama_produk: "Jasa Desain Flyer Promosi, Pamflet & Brosur Bisnis",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Desain flyer promo diskon, brosur lipat penawaran jasa, dan pamflet event fisik maupun format digital story Instagram resolusi tajam.",
        image_url: "assets/jasaflyer_(1).jpg",
        gallery_urls: [
            "assets/jasaflyer_(1).jpg",
            "assets/jasaflyer_(2).jpg"
        ],
        software_ids: [5, 1, 3, 2]
    },
    {
        Id_produk: 17,
        Id_kategori: 8,
        Id_layanan: 9,
        Nama_produk: "Jasa Desain Poster Acara & Infografis Edukasi Digital",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Desain poster pengumuman resmi, poster konser/webinar, serta visualisasi data infografis informatif yang padat konten namun tetap enak dipandang.",
        image_url: "assets/portofolio_Artboard_1_copy_11.jpg",
        gallery_urls: [
            "assets/portofolio_Artboard_1_copy_11.jpg",
            "assets/portofolio_Artboard_1_copy_9.jpg"
        ],
        software_ids: [5, 1, 3, 2]
    },
    {
        Id_produk: 18,
        Id_kategori: 4,
        Id_layanan: 4,
        Nama_produk: "Jasa Desain UI/UX Mobile App Android & iOS Figma",
        No_wa: "085168174679",
        Stok_produk: 10,
        Estimasi: "3-5 Hari",
        Des_produk: "Perancangan UI/UX aplikasi mobile Android dan iOS di Figma dengan sistem auto-layout, atomic components, flow pengguna terstruktur, dan interactive prototype.",
        image_url: "assets/mobileuiux_(1).jpg",
        gallery_urls: [
            "assets/mobileuiux_(1).jpg",
            "assets/mobileuiux_(2).jpg"
        ],
        software_ids: [4]
    },
    {
        Id_produk: 19,
        Id_kategori: 4,
        Id_layanan: 4,
        Nama_produk: "Jasa Desain UI/UX Website Company Profile & Landing Page",
        No_wa: "085168174679",
        Stok_produk: 10,
        Estimasi: "3-5 Hari",
        Des_produk: "Desain UI/UX website company profile responsif desktop, tablet, dan mobile. Menggunakan layout modern berbasis grid Figma yang memudahkan proses slicing developer.",
        image_url: "assets/webuiux_(1).jpg",
        gallery_urls: [
            "assets/webuiux_(1).jpg",
            "assets/webuiux_(2).jpg",
            "assets/webuiux_(3).jpg",
            "assets/webuiux_(4).jpg"
        ],
        software_ids: [4]
    }
];

const PORTFOLIOS = [
    { id: 1, nama: "Asset 7@11x", kategori: "Logo & Branding", url: "assets/portofolio/Asset_7@11x.png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 2, nama: "UI/UX Interface Design - MacBook Pro 16 9", kategori: "UI/UX & Web", url: "assets/portofolio/MacBook_Pro_16_-_9.png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 3, nama: "Jersey Apparel Printing - RV 39 Palestin3 Jersey", kategori: "Jersey & Apparel", url: "assets/portofolio/RV_39_palestin3_Jersey_(1).png", deskripsi: "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz." },
    { id: 4, nama: "Ayam @2x 100", kategori: "Packaging & Kemasan", url: "assets/portofolio/ayam@2x-100.jpg", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 5, nama: "Ayam 1 @2x 100", kategori: "Packaging & Kemasan", url: "assets/portofolio/ayam_1@2x-100.jpg", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 6, nama: "Desain Banner Promosi - Banner", kategori: "Banner & Spanduk", url: "assets/portofolio/banner.png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 7, nama: "Desain Banner Promosi - Banner (1)", kategori: "Banner & Spanduk", url: "assets/portofolio/banner_(1).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 8, nama: "Desain Banner Promosi - Banner (2)", kategori: "Banner & Spanduk", url: "assets/portofolio/banner_(2).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 9, nama: "Desain Banner Promosi - Banner (3)", kategori: "Banner & Spanduk", url: "assets/portofolio/banner_(3).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 10, nama: "Desain Banner Promosi - Banner (4)", kategori: "Banner & Spanduk", url: "assets/portofolio/banner_(4).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 11, nama: "Stand Booth Pameran - Booth", kategori: "Banner & Spanduk", url: "assets/portofolio/booth.png", deskripsi: "Karya portofolio visual profesional kategori Booth & Stand oleh tim Premium Designz." },
    { id: 12, nama: "Stand Booth Pameran - Booth (2)", kategori: "Banner & Spanduk", url: "assets/portofolio/booth_(2).png", deskripsi: "Karya portofolio visual profesional kategori Booth & Stand oleh tim Premium Designz." },
    { id: 13, nama: "Stand Booth Pameran - Booth (3)", kategori: "Banner & Spanduk", url: "assets/portofolio/booth_(3).png", deskripsi: "Karya portofolio visual profesional kategori Booth & Stand oleh tim Premium Designz." },
    { id: 14, nama: "Kemasan Box Retail - Box", kategori: "Packaging & Kemasan", url: "assets/portofolio/box.png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 15, nama: "Kemasan Box Retail - Box (1)", kategori: "Packaging & Kemasan", url: "assets/portofolio/box_(1).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 16, nama: "Kemasan Box Retail - Box (2)", kategori: "Packaging & Kemasan", url: "assets/portofolio/box_(2).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 17, nama: "Kemasan Box Retail - Box (3)", kategori: "Packaging & Kemasan", url: "assets/portofolio/box_(3).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 18, nama: "Desain CV Profesional - CV (1)", kategori: "Dokumen & PPT", url: "assets/portofolio/cv_(1).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 19, nama: "Desain CV Profesional - CV (2)", kategori: "Dokumen & PPT", url: "assets/portofolio/cv_(2).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 20, nama: "Desain CV Profesional - CV (3)", kategori: "Dokumen & PPT", url: "assets/portofolio/cv_(3).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 21, nama: "Desain CV Profesional - CV (4)", kategori: "Dokumen & PPT", url: "assets/portofolio/cv_(4).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 22, nama: "Editing Foto Studio - Edit Foto Normal to Studio", kategori: "Foto & Redesain AI", url: "assets/portofolio/edit_foto_normal_to_studio.png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 23, nama: "Editing Foto Studio - Edit Foto Normal to Studio (1)", kategori: "Foto & Redesain AI", url: "assets/portofolio/edit_foto_normal_to_studio_(1).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 24, nama: "Editing Foto Studio - Edit Foto Normal to Studio (2)", kategori: "Foto & Redesain AI", url: "assets/portofolio/edit_foto_normal_to_studio_(2).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 25, nama: "Editing Foto Studio - Edit Foto Normal to Studio (3)", kategori: "Foto & Redesain AI", url: "assets/portofolio/edit_foto_normal_to_studio_(3).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 26, nama: "Editing Foto Studio - Edit Foto Normal to Studio (4)", kategori: "Foto & Redesain AI", url: "assets/portofolio/edit_foto_normal_to_studio_(4).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 27, nama: "Desain Flyer & Pamflet - Flyer (1)", kategori: "Poster & Flyer", url: "assets/portofolio/flyer_(1).png", deskripsi: "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz." },
    { id: 28, nama: "Desain Flyer & Pamflet - Flyer (2)", kategori: "Poster & Flyer", url: "assets/portofolio/flyer_(2).png", deskripsi: "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz." },
    { id: 29, nama: "Jersey Sport Custom - Jersey (1)", kategori: "Jersey & Apparel", url: "assets/portofolio/jersey_(1).png", deskripsi: "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz." },
    { id: 30, nama: "Jersey Sport Custom - Jersey (2)", kategori: "Jersey & Apparel", url: "assets/portofolio/jersey_(2).png", deskripsi: "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz." },
    { id: 31, nama: "Jersey Sport Custom - Jersey (3)", kategori: "Jersey & Apparel", url: "assets/portofolio/jersey_(3).png", deskripsi: "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz." },
    { id: 32, nama: "Kemasan Standing Pouch - Kemasan Pouch (1)", kategori: "Packaging & Kemasan", url: "assets/portofolio/kemasan_(1).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 33, nama: "Kemasan Standing Pouch - Kemasan Pouch (2)", kategori: "Packaging & Kemasan", url: "assets/portofolio/kemasan_(2).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 34, nama: "Kemasan Standing Pouch - Kemasan Pouch (3)", kategori: "Packaging & Kemasan", url: "assets/portofolio/kemasan_(3).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 35, nama: "Kemasan Standing Pouch - Kemasan Pouch (4)", kategori: "Packaging & Kemasan", url: "assets/portofolio/kemasan_(4).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 36, nama: "Kemasan Standing Pouch - Kemasan Pouch (5)", kategori: "Packaging & Kemasan", url: "assets/portofolio/kemasan_(5).png", deskripsi: "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz." },
    { id: 37, nama: "Label & Stiker Produk - Label (1)", kategori: "Label & Stiker", url: "assets/portofolio/label_(1).png", deskripsi: "Karya portofolio visual profesional kategori Label & Stiker oleh tim Premium Designz." },
    { id: 38, nama: "Label & Stiker Produk - Label (2)", kategori: "Label & Stiker", url: "assets/portofolio/label_(2).png", deskripsi: "Karya portofolio visual profesional kategori Label & Stiker oleh tim Premium Designz." },
    { id: 39, nama: "Logo Brand Identity - Logo (1)", kategori: "Logo & Branding", url: "assets/portofolio/logo_(1).png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 40, nama: "Logo Brand Identity - Logo (2)", kategori: "Logo & Branding", url: "assets/portofolio/logo_(2).png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 41, nama: "Logo Brand Identity - Logo (3)", kategori: "Logo & Branding", url: "assets/portofolio/logo_(3).png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 42, nama: "UI/UX Mobile App - Mobile UI/UX (1)", kategori: "UI/UX & Web", url: "assets/portofolio/mobile_uiux_(1).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 43, nama: "UI/UX Mobile App - Mobile UI/UX (2)", kategori: "UI/UX & Web", url: "assets/portofolio/mobile_uiux_(2).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 44, nama: "Desain PPT Presentasi - PPT (1)", kategori: "Dokumen & PPT", url: "assets/portofolio/ppt_(1).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 45, nama: "Desain PPT Presentasi - PPT (2)", kategori: "Dokumen & PPT", url: "assets/portofolio/ppt_(2).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 46, nama: "Desain PPT Presentasi - PPT (3)", kategori: "Dokumen & PPT", url: "assets/portofolio/ppt_(3).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 47, nama: "Desain PPT Presentasi - PPT (4)", kategori: "Dokumen & PPT", url: "assets/portofolio/ppt_(4).png", deskripsi: "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz." },
    { id: 48, nama: "Redesain Gambar AI - Repair Foto (1)", kategori: "Foto & Redesain AI", url: "assets/portofolio/repair_foto_(1).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 49, nama: "Redesain Gambar AI - Repair Foto (2)", kategori: "Foto & Redesain AI", url: "assets/portofolio/repair_foto_(2).png", deskripsi: "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz." },
    { id: 50, nama: "Redesain Logo Vektor - Repair Logo (1)", kategori: "Logo & Branding", url: "assets/portofolio/repair_logo_(1).png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 51, nama: "Redesain Logo Vektor - Repair Logo (2)", kategori: "Logo & Branding", url: "assets/portofolio/repair_logo_(2).png", deskripsi: "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz." },
    { id: 52, nama: "UI/UX Website - Web UI/UX (1)", kategori: "UI/UX & Web", url: "assets/portofolio/web_uiux_(1).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 53, nama: "UI/UX Website - Web UI/UX (2)", kategori: "UI/UX & Web", url: "assets/portofolio/web_uiux_(2).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 54, nama: "UI/UX Website - Web UI/UX (3)", kategori: "UI/UX & Web", url: "assets/portofolio/web_uiux_(3).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 55, nama: "UI/UX Website - Web UI/UX (4)", kategori: "UI/UX & Web", url: "assets/portofolio/web_uiux_(4).png", deskripsi: "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz." },
    { id: 56, nama: "Standing X-Banner - X-Banner (1)", kategori: "Banner & Spanduk", url: "assets/portofolio/xbanner_(1).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 57, nama: "Standing X-Banner - X-Banner (3)", kategori: "Banner & Spanduk", url: "assets/portofolio/xbanner_(3).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." },
    { id: 58, nama: "Standing X-Banner - X-Banner (4)", kategori: "Banner & Spanduk", url: "assets/portofolio/xbanner_(4).png", deskripsi: "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz." }
];

// Master Data Helper Functions
function getCategoryById(id) {
    return CATEGORIES.find(c => c.Id_kategori == id) || null;
}

function getCategoryByName(name) {
    if (!name) return null;
    const lower = name.toLowerCase().trim();
    return CATEGORIES.find(c => c.Nama_kategori.toLowerCase() === lower || c.Nama_kategori.toLowerCase().includes(lower)) || null;
}

function getServiceById(id) {
    return SERVICES.find(s => s.Id_Layanan == id) || null;
}

function getProductById(id) {
    const p = PRODUCTS.find(prod => prod.Id_produk == id);
    if (!p) return null;

    // Attach related objects
    const cat = getCategoryById(p.Id_kategori);
    const srv = getServiceById(p.Id_layanan);
    const softs = (p.software_ids || []).map(sid => SOFTWARE_TOOLS.find(s => s.Id_software == sid)).filter(Boolean);

    return {
        ...p,
        custom_id: 'JS-' + String(p.Id_produk).padStart(4, '0'),
        average_rating: 5.0,
        kategori: cat,
        layanan: srv,
        software: softs,
        whatsapp_link: "https://api.whatsapp.com/send/?phone=" + (p.No_wa || "6285168174679") + "&text=" + encodeURIComponent("Halo Premium Design, saya ingin memesan jasa/produk desain: " + p.Nama_produk)
    };
}

function getAllProductsWithRelations() {
    return PRODUCTS.map(p => getProductById(p.Id_produk));
}

function getRelevantProducts(currentId, categoryId, limit = 12) {
    const all = getAllProductsWithRelations();
    const sameCat = all.filter(p => p.Id_produk != currentId && p.Id_kategori == categoryId);
    return sameCat.slice(0, limit);
}

function getLatestProducts(currentId, limit = 12) {
    const all = getAllProductsWithRelations();
    const diff = all.filter(p => p.Id_produk != currentId);
    return diff.slice(0, limit);
}
