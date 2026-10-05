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
        sample_product_id: 1
    },
    {
        Id_Layanan: 2,
        Nama_layanan: "Layanan Desain Kemasan Box & Pouch",
        Des_layanan: "Perancangan desain kemasan pouch makanan ringan, boks hampers, skincare, dan produk UMKM.",
        Benefit: "• Pola dieline presisi sesuai ukuran boks/pouch\n• 3D Mockup realistis untuk presentasi produk\n• Format warna siap cetak percetakan\n• Revisi sesuai kesepakatan",
        sample_product_id: 4
    },
    {
        Id_Layanan: 3,
        Nama_layanan: "Layanan Desain Logo & Brand Identity",
        Des_layanan: "Perancangan logo bisnis, logo racing, online shop, UMKM, dan identitas visual perusahaan.",
        Benefit: "• Desain logo custom original dari awal (no template)\n• Mockup aplikasi logo & konsep warna/tipografi\n• File resolusi tinggi siap digital dan cetak\n• Konsultasi desain sebelum order",
        sample_product_id: 5
    },
    {
        Id_Layanan: 4,
        Nama_layanan: "Layanan UI/UX App & Website Figma",
        Des_layanan: "Perancangan antarmuka digital mobile app Android/iOS, website landing page, dan sistem dashboard.",
        Benefit: "• Tampilan modern, clean, dan user-friendly\n• File design Figma editable & auto-layout\n• Interactive clickable prototype\n• User flow & struktur halaman terorganisir",
        sample_product_id: 8
    },
    {
        Id_Layanan: 5,
        Nama_layanan: "Layanan Desain Jersey & Custom Apparel",
        Des_layanan: "Desain jersey futsal, esport, komunitas motor/gowes, dan seragam apparel custom.",
        Benefit: "• Desain original menyesuaikan karakter tim / komunitas\n• File siap cetak sublimasi / konveksi (CDR/EPS/PSD/PDF)\n• Mockup apparel depan & belakang\n• Revisi sesuai kesepakatan",
        sample_product_id: 10
    },
    {
        Id_Layanan: 6,
        Nama_layanan: "Layanan Redesain AI & Foto Produk Studio",
        Des_layanan: "Penyempurnaan artwork AI generator dan sentuhan editing foto produk untuk meningkatkan konversi penjualan.",
        Benefit: "• Penyempurnaan detail gambar AI & komposisi warna\n• Editing foto studio produk agar siap marketplace & promosi\n• File resolusi tinggi digital & cetak\n• Pengerjaan rapi dan cepat",
        sample_product_id: 11
    },
    {
        Id_Layanan: 7,
        Nama_layanan: "Layanan Desain Label & Stiker Produk",
        Des_layanan: "Pembuatan label stiker produk makanan ringan, toples kue, botol minuman, dan kemasan homemade.",
        Benefit: "• Penyesuaian ukuran & bentuk label toples/botol/kemasan\n• Tata letak informasi produk & logo yang proporsional\n• Mockup label realistis & file siap cetak\n• Revisi sesuai kesepakatan",
        sample_product_id: 9
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
        Nama_layanan: "Layanan Desain Flyer Promosi, Pamflet & Brosur Bisnis",
        Des_layanan: "Pembuatan flyer promo, pamflet bisnis, brosur event, dan publikasi media promosi cetak/digital.",
        Benefit: "• Visualisasi materi promosi informatif & estetik\n• Tampilan flyer atraktif untuk event atau kampanye bisnis\n• File siap dipublikasikan ke media sosial & cetak\n• Revisi sesuai kesepakatan",
        sample_product_id: 13
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
        Nama_produk: "Jasa Desain Banner & Spanduk UMKM Promosi Toko",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Desain spanduk dan banner outdoor untuk toko fisik, gerai kuliner, banner wisuda, dan event promo UMKM. Layout jelas, warna kontras menarik perhatian, dan informasi produk mudah dibaca dari kejauhan.",
        image_url: "assets/coverbannerumkm2.jpg",
        gallery_urls: [
            "assets/coverbannerumkm2.jpg",
            "assets/bannerumkm1.jpg"
        ],
        software_ids: [1, 3, 2, 5]
    },
    {
        Id_produk: 2,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain Stand Booth Jualan & Pameran UMKM",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "2-3 Hari",
        Des_produk: "Desain visual gerobak jualan portable, booth pameran mall/event, dan stand branding usaha agar terlihat lebih menonjol, rapi, dan profesional di hadapan calon pembeli.",
        image_url: "assets/coverbooth2.jpg",
        gallery_urls: [
            "assets/coverbooth2.jpg",
            "assets/booth1.jpg"
        ],
        software_ids: [1, 3, 2, 7]
    },
    {
        Id_produk: 3,
        Id_kategori: 1,
        Id_layanan: 1,
        Nama_produk: "Jasa Desain X-Banner & Roll Banner Promosi Event",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1 Hari",
        Des_produk: "Desain standing X-Banner vertikal dan Roll-Up Banner untuk media promosi di depan toko, seminar kampus, resepsi, maupun booth expo pameran industri.",
        image_url: "assets/coverxbanner_(1).jpg",
        gallery_urls: [
            "assets/coverxbanner_(1).jpg",
            "assets/xbanner_(3).jpg",
            "assets/xbanner_(4).jpg"
        ],
        software_ids: [1, 3, 2, 5]
    },
    {
        Id_produk: 4,
        Id_kategori: 2,
        Id_layanan: 2,
        Nama_produk: "Jasa Desain Kemasan Standing Pouch Snack & Makanan Ringan",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "2 Hari",
        Des_produk: "Desain pouch snack makanan ringan, keripik, biji kopi, bumbu masak, dan produk olahan UMKM. Tampilan visual appetizing yang meningkatkan daya tarik konsumen di rak supermarket.",
        image_url: "assets/coverjasapouch_(2).jpg",
        gallery_urls: [
            "assets/coverjasapouch_(2).jpg",
            "assets/jasapouch_(1).jpg"
        ],
        software_ids: [3, 2, 1]
    },
    {
        Id_produk: 5,
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
        Id_produk: 6,
        Id_kategori: 3,
        Id_layanan: 3,
        Nama_produk: "Jasa Redesain Logo Vektor & Racing Team Custom",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "1-2 Hari",
        Des_produk: "Desain logo gaya racing bernuansa tajam dan agresif untuk tim balap, komunitas motor, esport squad, serta tracing ulang logo buram menjadi file vektor HD.",
        image_url: "assets/coverrepairlogo_(2).jpg",
        gallery_urls: [
            "assets/coverrepairlogo_(2).jpg",
            "assets/repairlogo_(1).jpg"
        ],
        software_ids: [2, 3]
    },
    {
        Id_produk: 7,
        Id_kategori: 4,
        Id_layanan: 4,
        Nama_produk: "Jasa Desain UI/UX Mobile App Android & iOS Figma",
        No_wa: "085168174679",
        Stok_produk: 10,
        Estimasi: "3-5 Hari",
        Des_produk: "Perancangan UI/UX aplikasi mobile Android dan iOS di Figma dengan sistem auto-layout, atomic components, flow pengguna terstruktur, dan interactive prototype.",
        image_url: "assets/covermobileuiux_(2).jpg",
        gallery_urls: [
            "assets/covermobileuiux_(2).jpg",
            "assets/mobileuiux_(1).jpg"
        ],
        software_ids: [4]
    },
    {
        Id_produk: 8,
        Id_kategori: 4,
        Id_layanan: 4,
        Nama_produk: "Jasa Desain UI/UX Website Company Profile & Landing Page",
        No_wa: "085168174679",
        Stok_produk: 10,
        Estimasi: "3-5 Hari",
        Des_produk: "Desain UI/UX website company profile responsif desktop, tablet, dan mobile. Menggunakan layout modern berbasis grid Figma yang memudahkan proses slicing developer.",
        image_url: "assets/coverwebuiux_(2).jpg",
        gallery_urls: [
            "assets/coverwebuiux_(2).jpg",
            "assets/webuiux_(1).jpg",
            "assets/webuiux_(3).jpg",
            "assets/webuiux_(4).jpg"
        ],
        software_ids: [4]
    },
    {
        Id_produk: 9,
        Id_kategori: 5,
        Id_layanan: 7,
        Nama_produk: "Jasa Desain Label Botol & Stiker Toples Produk UMKM",
        No_wa: "085168174679",
        Stok_produk: 30,
        Estimasi: "1 Hari",
        Des_produk: "Desain stiker label toples kue kering, label botol sirup/jus, tag jar bumbu, dan segel kemasan produk UMKM siap potong (die cut) dengan komposisi warna memikat.",
        image_url: "assets/coverlabelumkm1.jpg",
        gallery_urls: [
            "assets/coverlabelumkm1.jpg",
            "assets/labelumkm2.jpg",
            "assets/labelumkm.jpg"
        ],
        software_ids: [1, 3, 2]
    },
    {
        Id_produk: 10,
        Id_kategori: 6,
        Id_layanan: 5,
        Nama_produk: "Jasa Desain Jersey Custom Futsal, Esport & Apparel",
        No_wa: "085168174679",
        Stok_produk: 15,
        Estimasi: "2 Hari",
        Des_produk: "Desain pola baju jersey printing sublimasi untuk tim futsal, sepak bola, basket, esport, kaos komunitas, dan merchandise distro lengkap dengan pola cetak konveksi.",
        image_url: "assets/coverjasajersey_(3).jpg",
        gallery_urls: [
            "assets/coverjasajersey_(3).jpg",
            "assets/jasajersey_(1).jpg",
            "assets/jasajersey_(2).jpg"
        ],
        software_ids: [1, 3, 2]
    },
    {
        Id_produk: 11,
        Id_kategori: 7,
        Id_layanan: 6,
        Nama_produk: "Jasa Editing Foto Produk Normal to Studio Marketplace",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Transformasi foto jepretan kamera ponsel menjadi foto katalog studio mewah berkelas: hapus background, koreksi bayangan natural, lighting dramatis, dan touch-up warna.",
        image_url: "assets/covereditfotonormaltostudio1.jpg",
        gallery_urls: [
            "assets/covereditfotonormaltostudio1.jpg",
            "assets/editfotonormaltostudio.jpg",
            "assets/editfotonormaltostudio2.jpg",
            "assets/editfotonormaltostudio3.jpg",
            "assets/editfotonormaltostudio4.jpg"
        ],
        software_ids: [1]
    },
    {
        Id_produk: 12,
        Id_kategori: 7,
        Id_layanan: 6,
        Nama_produk: "Jasa Redesain Gambar AI & Repair Restorasi Foto",
        No_wa: "085168174679",
        Stok_produk: 20,
        Estimasi: "1-2 Hari",
        Des_produk: "Penyempurnaan gambar artwork AI yang mengalami distorsi jari/wajah, pewarnaan foto lama hitam putih, dan restorasi foto resolusi rendah menjadi tajam kembali.",
        image_url: "assets/coverrepairfoto1.jpg",
        gallery_urls: [
            "assets/coverrepairfoto1.jpg",
            "assets/repairfoto2.jpg"
        ],
        software_ids: [1]
    },
    {
        Id_produk: 13,
        Id_kategori: 8,
        Id_layanan: 9,
        Nama_produk: "Jasa Desain Flyer Promosi, Pamflet & Brosur Bisnis",
        No_wa: "085168174679",
        Stok_produk: 25,
        Estimasi: "1 Hari",
        Des_produk: "Desain flyer promo diskon, brosur lipat penawaran jasa, dan pamflet event fisik maupun format digital story Instagram resolusi tajam.",
        image_url: "assets/coverjasaflyer_(2).jpg",
        gallery_urls: [
            "assets/coverjasaflyer_(2).jpg",
            "assets/jasaflyer_(1).jpg"
        ],
        software_ids: [5, 1, 3, 2]
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
        image_url: "assets/coverjasacv2.jpg",
        gallery_urls: [
            "assets/coverjasacv2.jpg",
            "assets/jasacv1.jpg",
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
        image_url: "assets/coverjasapowerpoint_(2).jpg",
        gallery_urls: [
            "assets/coverjasapowerpoint_(2).jpg",
            "assets/jasapowerpoint_(1).jpg",
            "assets/jasapowerpoint_(3).jpg",
            "assets/jasapowerpoint_(4).jpg"
        ],
        software_ids: [6, 5, 4]
    }
];

const PORTFOLIOS = [
    {
        "id": 1,
        "nama": "Logo Identity Master Vector",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/Asset_7@11x.png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 2,
        "nama": "UI/UX Web Dashboard Interface",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/MacBook_Pro_16_-_9.png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 3,
        "nama": "Jersey Printing Custom Apparel",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/RV_39_palestin3_Jersey_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 4,
        "nama": "Ayam2x-100",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/ayam2x-100.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 5,
        "nama": "Ayam@2x-100",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/ayam@2x-100.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 6,
        "nama": "Ayam 12x-100",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/ayam_12x-100.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 7,
        "nama": "Ayam 1@2x-100",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/ayam_1@2x-100.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 8,
        "nama": "Banner",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/banner.png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 9,
        "nama": "Banner (1)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/banner_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 10,
        "nama": "Banner (2)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/banner_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 11,
        "nama": "Banner (3)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/banner_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 12,
        "nama": "Banner (4)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/banner_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 13,
        "nama": "Booth",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/booth.png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 14,
        "nama": "Booth (2)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/booth_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 15,
        "nama": "Booth (3)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/booth_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 16,
        "nama": "Box",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 17,
        "nama": "Box",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box.png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 18,
        "nama": "Box (1)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 19,
        "nama": "Box (2)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 20,
        "nama": "Box (3)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 21,
        "nama": "Box (4)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 22,
        "nama": "Box (5)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(5).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 23,
        "nama": "Box (6)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/box_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 24,
        "nama": "Feeds",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds.png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 25,
        "nama": "Feeds (1)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 26,
        "nama": "Feeds (1)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 27,
        "nama": "Feeds (10)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(10).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 28,
        "nama": "Feeds (11)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(11).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 29,
        "nama": "Feeds (12)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(12).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 30,
        "nama": "Feeds (13)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(13).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 31,
        "nama": "Feeds (14)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(14).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 32,
        "nama": "Feeds (15)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(15).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 33,
        "nama": "Feeds (16)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(16).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 34,
        "nama": "Feeds (17)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(17).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 35,
        "nama": "Feeds (18)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(18).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 36,
        "nama": "Feeds (19)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(19).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 37,
        "nama": "Feeds (2)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 38,
        "nama": "Feeds (2)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 39,
        "nama": "Feeds (20)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(20).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 40,
        "nama": "Feeds (21)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(21).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 41,
        "nama": "Feeds (22)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(22).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 42,
        "nama": "Feeds (23)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(23).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 43,
        "nama": "Feeds (24)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(24).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 44,
        "nama": "Feeds (3)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(3).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 45,
        "nama": "Feeds (3)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 46,
        "nama": "Feeds (4)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(4).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 47,
        "nama": "Feeds (4)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 48,
        "nama": "Feeds (5)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(5).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 49,
        "nama": "Feeds (5)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(5).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 50,
        "nama": "Feeds (6)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 51,
        "nama": "Feeds (7)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(7).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 52,
        "nama": "Feeds (8)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(8).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 53,
        "nama": "Feeds (9)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/feeds_(9).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 54,
        "nama": "Final",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/final.png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 55,
        "nama": "Flayer (1)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flayer_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 56,
        "nama": "Flayer (2)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flayer_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 57,
        "nama": "Flyer",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer.png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 58,
        "nama": "Flyer (1)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 59,
        "nama": "Flyer (1)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 60,
        "nama": "Flyer (10)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(10).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 61,
        "nama": "Flyer (10)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(10).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 62,
        "nama": "Flyer (11)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(11).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 63,
        "nama": "Flyer (11)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(11).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 64,
        "nama": "Flyer (12)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(12).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 65,
        "nama": "Flyer (13)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(13).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 66,
        "nama": "Flyer (14)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(14).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 67,
        "nama": "Flyer (15)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(15).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 68,
        "nama": "Flyer (16)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(16).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 69,
        "nama": "Flyer (17)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(17).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 70,
        "nama": "Flyer (18)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(18).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 71,
        "nama": "Flyer (19)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(19).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 72,
        "nama": "Flyer (2)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 73,
        "nama": "Flyer (2)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 74,
        "nama": "Flyer (20)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(20).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 75,
        "nama": "Flyer (21)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(21).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 76,
        "nama": "Flyer (22)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(22).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 77,
        "nama": "Flyer (23)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(23).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 78,
        "nama": "Flyer (24)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(24).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 79,
        "nama": "Flyer (25)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(25).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 80,
        "nama": "Flyer (26)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(26).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 81,
        "nama": "Flyer (27)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(27).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 82,
        "nama": "Flyer (28)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(28).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 83,
        "nama": "Flyer (29)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(29).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 84,
        "nama": "Flyer (3)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(3).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 85,
        "nama": "Flyer (3)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 86,
        "nama": "Flyer (30)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(30).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 87,
        "nama": "Flyer (31)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(31).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 88,
        "nama": "Flyer (32)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(32).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 89,
        "nama": "Flyer (33)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(33).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 90,
        "nama": "Flyer (34)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(34).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 91,
        "nama": "Flyer (35)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(35).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 92,
        "nama": "Flyer (36)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(36).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 93,
        "nama": "Flyer (37)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(37).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 94,
        "nama": "Flyer (38)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(38).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 95,
        "nama": "Flyer (39)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(39).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 96,
        "nama": "Flyer (4)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(4).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 97,
        "nama": "Flyer (4)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 98,
        "nama": "Flyer (5)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(5).PNG",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 99,
        "nama": "Flyer (5)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(5).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 100,
        "nama": "Flyer (6)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(6).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 101,
        "nama": "Flyer (6)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 102,
        "nama": "Flyer (7)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(7).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 103,
        "nama": "Flyer (7)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(7).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 104,
        "nama": "Flyer (8)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(8).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 105,
        "nama": "Flyer (8)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(8).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 106,
        "nama": "Flyer (9)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(9).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 107,
        "nama": "Flyer (9)",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/flyer_(9).png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 108,
        "nama": "Label",
        "kategori": "Label & Stiker",
        "url": "assets/portofolio/label.png",
        "deskripsi": "Karya portofolio visual profesional kategori Label & Stiker oleh tim Premium Designz."
    },
    {
        "id": 109,
        "nama": "Logo",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 110,
        "nama": "Logo",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo.png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 111,
        "nama": "Logo (1)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 112,
        "nama": "Logo (10)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(10).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 113,
        "nama": "Logo (11)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(11).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 114,
        "nama": "Logo (12)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(12).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 115,
        "nama": "Logo (13)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(13).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 116,
        "nama": "Logo (14)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(14).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 117,
        "nama": "Logo (15)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(15).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 118,
        "nama": "Logo (16)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(16).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 119,
        "nama": "Logo (17)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(17).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 120,
        "nama": "Logo (18)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(18).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 121,
        "nama": "Logo (19)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(19).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 122,
        "nama": "Logo (2)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 123,
        "nama": "Logo (2) Alt",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(2)_alt.png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 124,
        "nama": "Logo (20)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(20).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 125,
        "nama": "Logo (21)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(21).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 126,
        "nama": "Logo (3)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 127,
        "nama": "Logo (3) Alt",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(3)_alt.png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 128,
        "nama": "Logo (4)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 129,
        "nama": "Logo (4) Alt",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(4)_alt.png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 130,
        "nama": "Logo (5)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(5).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 131,
        "nama": "Logo (6)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 132,
        "nama": "Logo (7)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(7).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 133,
        "nama": "Logo (8)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(8).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 134,
        "nama": "Logo (9)",
        "kategori": "Logo & Branding",
        "url": "assets/portofolio/logo_(9).png",
        "deskripsi": "Karya portofolio visual profesional kategori Logo & Branding oleh tim Premium Designz."
    },
    {
        "id": 135,
        "nama": "Pakaian",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian.png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 136,
        "nama": "Pakaian (1)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 137,
        "nama": "Pakaian (2)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 138,
        "nama": "Pakaian (3)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 139,
        "nama": "Pakaian (4)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 140,
        "nama": "Pakaian (5)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(5).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 141,
        "nama": "Pakaian (6)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 142,
        "nama": "Pakaian (7)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(7).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 143,
        "nama": "Pakaian (8)",
        "kategori": "Jersey & Apparel",
        "url": "assets/portofolio/pakaian_(8).png",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 144,
        "nama": "Poster",
        "kategori": "Poster & Flyer",
        "url": "assets/portofolio/poster.png",
        "deskripsi": "Karya portofolio visual profesional kategori Poster & Flyer oleh tim Premium Designz."
    },
    {
        "id": 145,
        "nama": "Pouch (1)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/pouch_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 146,
        "nama": "Pouch (2)",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/pouch_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 147,
        "nama": "Desain Standing Pouch Seblak",
        "kategori": "Packaging & Kemasan",
        "url": "assets/portofolio/seblak.png",
        "deskripsi": "Karya portofolio visual profesional kategori Packaging & Kemasan oleh tim Premium Designz."
    },
    {
        "id": 148,
        "nama": "Ui Ux (1)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 149,
        "nama": "Ui Ux (10)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(10).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 150,
        "nama": "Ui Ux (11)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(11).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 151,
        "nama": "Ui Ux (12)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(12).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 152,
        "nama": "Ui Ux (13)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(13).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 153,
        "nama": "Ui Ux (14)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(14).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 154,
        "nama": "Ui Ux (15)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(15).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 155,
        "nama": "Ui Ux (16)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(16).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 156,
        "nama": "Ui Ux (17)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(17).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 157,
        "nama": "Ui Ux (2)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 158,
        "nama": "Ui Ux (3)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 159,
        "nama": "Ui Ux (4)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(4).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 160,
        "nama": "Ui Ux (5)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(5).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 161,
        "nama": "Ui Ux (6)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(6).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 162,
        "nama": "Ui Ux (7)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(7).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 163,
        "nama": "Ui Ux (8)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(8).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 164,
        "nama": "Ui Ux (9)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/ui_ux_(9).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 165,
        "nama": "Uiux (1)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/uiux_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 166,
        "nama": "Uiux (2)",
        "kategori": "UI/UX & Web",
        "url": "assets/portofolio/uiux_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori UI/UX & Web oleh tim Premium Designz."
    },
    {
        "id": 167,
        "nama": "Xbanner",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner.png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 168,
        "nama": "Xbanner (1)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 169,
        "nama": "Xbanner (1)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(1).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 170,
        "nama": "Xbanner (2)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 171,
        "nama": "Xbanner (2)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(2).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 172,
        "nama": "Xbanner (3)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(3).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 173,
        "nama": "Xbanner (3)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(3).png",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 174,
        "nama": "Xbanner (4)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(4).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 175,
        "nama": "Xbanner (5)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(5).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 176,
        "nama": "Xbanner (6)",
        "kategori": "Banner & Spanduk",
        "url": "assets/portofolio/xbanner_(6).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Banner & Spanduk oleh tim Premium Designz."
    },
    {
        "id": 177,
        "nama": "Curriculum Vitae ATS Professional",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasacv1.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 178,
        "nama": "Curriculum Vitae Modern Creative",
        "kategori": "Dokumen & PPT",
        "url": "assets/coverjasacv2.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 179,
        "nama": "Executive CV Template ATS",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasacv3.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 180,
        "nama": "Professional Resume Portfolio",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasacv4.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 181,
        "nama": "PowerPoint Business Pitch Deck (1)",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasapowerpoint_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 182,
        "nama": "PowerPoint Business Pitch Deck (2)",
        "kategori": "Dokumen & PPT",
        "url": "assets/coverjasapowerpoint_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 183,
        "nama": "PowerPoint Business Pitch Deck (3)",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasapowerpoint_(3).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 184,
        "nama": "PowerPoint Business Pitch Deck (4)",
        "kategori": "Dokumen & PPT",
        "url": "assets/jasapowerpoint_(4).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Dokumen & PPT oleh tim Premium Designz."
    },
    {
        "id": 185,
        "nama": "Edit Foto Normal to Studio Product (1)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/covereditfotonormaltostudio1.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 186,
        "nama": "Edit Foto Normal to Studio Product (2)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/editfotonormaltostudio2.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 187,
        "nama": "Edit Foto Normal to Studio Product (3)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/editfotonormaltostudio3.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 188,
        "nama": "Edit Foto Normal to Studio Product (4)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/editfotonormaltostudio4.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 189,
        "nama": "Redesign Artwork AI & Restoration (1)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/coverrepairfoto1.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 190,
        "nama": "Redesign Artwork AI & Restoration (2)",
        "kategori": "Foto & Redesain AI",
        "url": "assets/repairfoto2.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Foto & Redesain AI oleh tim Premium Designz."
    },
    {
        "id": 191,
        "nama": "Label Toples Makanan & Botol (1)",
        "kategori": "Label & Stiker",
        "url": "assets/coverlabelumkm1.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Label & Stiker oleh tim Premium Designz."
    },
    {
        "id": 192,
        "nama": "Label Toples Makanan & Botol (2)",
        "kategori": "Label & Stiker",
        "url": "assets/labelumkm2.jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Label & Stiker oleh tim Premium Designz."
    },
    {
        "id": 193,
        "nama": "Jersey Sublimation Printing (1)",
        "kategori": "Jersey & Apparel",
        "url": "assets/jasajersey_(1).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 194,
        "nama": "Jersey Sublimation Printing (2)",
        "kategori": "Jersey & Apparel",
        "url": "assets/jasajersey_(2).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    },
    {
        "id": 195,
        "nama": "Jersey Sublimation Printing (3)",
        "kategori": "Jersey & Apparel",
        "url": "assets/coverjasajersey_(3).jpg",
        "deskripsi": "Karya portofolio visual profesional kategori Jersey & Apparel oleh tim Premium Designz."
    }
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
    const currentLang = (typeof window !== 'undefined' && window.getSavedLanguage) ? window.getSavedLanguage() : 'id';
    const waPrefix = currentLang === 'en' 
        ? "Hello Premium Design, I would like to order design service for: " 
        : "Halo Premium Design, saya ingin memesan jasa/produk desain: ";

    return {
        ...p,
        custom_id: 'JS-' + String(p.Id_produk).padStart(4, '0'),
        average_rating: 5.0,
        kategori: cat,
        layanan: srv,
        software: softs,
        whatsapp_link: "https://api.whatsapp.com/send/?phone=" + (p.No_wa || "6285168174679") + "&text=" + encodeURIComponent(waPrefix + p.Nama_produk)
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

