/**
 * Premium Designz - Complete Internationalization (i18n) Engine
 * Bilingual Client-Side Translation & AI/Google Translate Bridge
 * Ultra-Fast, Zero-Dependency, Offline-Resilient Architecture
 */

(function() {
    'use strict';

    // =========================================================================
    // 1. MASTER I18N DICTIONARY (ID & EN 100% PARITY)
    // =========================================================================
    const DICTIONARY = {
        id: {
            // Topbar & Info
            "topbar.badge": "Jasa Desain Grafis & Marketplace Resmi",
            "topbar.sub": "Pengerjaan Tepat Waktu & File Master Lengkap Siap Cetak",
            "topbar.wa": "WhatsApp: 0851-6817-4679",

            // Navbar
            "nav.home": "Home",
            "nav.portfolio": "Portofolio",
            "nav.portfolio_gallery": "Galeri Portofolio",
            "nav.marketplace": "Jasa Desain",
            "nav.marketplace_catalog": "Marketplace Jasa Desain",
            "nav.order_steps": "Cara Pemesanan",
            "nav.about_contact": "Tentang & Kontak",
            "nav.select_language": "Pilih Bahasa",
            "nav.language": "Bahasa",

            // Hero Section
            "hero.title": "Solusi Desain Grafis Profesional untuk Meningkatkan Kredibilitas Brand",
            "hero.subtitle": "Jelajahi katalog portofolio kami, pilih paket desain siap pakai, atau konsultasikan kebutuhan kustom Anda langsung dengan tim desainer kami.",
            "hero.cta_wa": "Konsultasi via WhatsApp",
            "hero.cta_explore": "Eksplor Katalog Marketplace",
            "hero.tools_title": "Software Desain yang Kami Kuasai",

            // Promo Section
            "promo.title": "Promo & Penawaran Eksklusif",
            "promo.subtitle": "Manfaatkan penawaran khusus dan diskon paket desain pilihan untuk mendongkrak penjualan brand Anda.",
            "promo.prev": "Promo Sebelumnya",
            "promo.next": "Promo Berikutnya",
            "promo.claim_btn": "Klaim Promo via WhatsApp",

            // Keunggulan / Value Proposition
            "features.badge": "Standar Kualitas Studio",
            "features.title": "Standar Desain Visual Profesional untuk Meningkatkan Nilai Brand",
            "features.subtitle": "Kami menggabungkan kreativitas orisinal, ketelitian teknis, dan pemahaman identitas pasar untuk menghasilkan karya desain yang memikat konsumen serta memperkuat posisi bisnis Anda.",
            "features.f1": "Desain Orisinal & Eksklusif",
            "features.f2": "File Master Lengkap Siap Pakai",
            "features.f3": "Pengerjaan Cepat & Tepat Waktu",
            "features.f4": "Komunikasi WhatsApp Cepat",
            "features.cta_consult": "Konsultasi Sekarang",
            "features.cta_portfolio": "Lihat Galeri Portofolio",

            // Categories Section
            "categories.badge": "Eksplorasi Jasa",
            "categories.title": "Kategori Desain Pilihan",
            "categories.view_all": "Lihat Semua Kategori",
            "categories.total": "Total {count} Kategori",
            "categories.open_marketplace": "Buka Marketplace",
            "categories.modal_badge": "Daftar Lengkap",
            "categories.modal_title": "Semua Kategori Desain",
            "categories.modal_subtitle": "Pilih kategori untuk melihat semua karya dan layanan terkait",
            "categories.modal_search_placeholder": "Cari kategori desain...",
            "categories.modal_empty": "Kategori yang Anda cari tidak ditemukan.",

            // Category Names
            "cat.1": "Banner & Spanduk",
            "cat.2": "Packaging & Kemasan",
            "cat.3": "Logo & Branding",
            "cat.4": "UI/UX & Web",
            "cat.5": "Label & Stiker",
            "cat.6": "Jersey & Apparel",
            "cat.7": "Foto & Redesain AI",
            "cat.8": "Poster & Flyer",
            "cat.9": "Dokumen & PPT",

            // Portfolio Showcase
            "portfolio.badge": "Portofolio & Marketplace",
            "portfolio.title": "Katalog Karya Desain Pilihan",
            "portfolio.subtitle": "Koleksi proyek desain terbaru yang siap dipesan atau dikustomisasi.",
            "portfolio.view_all_products": "Buka Semua Produk",
            "portfolio.hero_title": "Tingkatkan Kredibilitas & Penjualan Brand Anda dengan Desain Visual Berkualitas",
            "portfolio.hero_subtitle": "Lebih dari 1.295+ projek desain grafis telah dipercaya dan terbukti sukses membantu pertumbuhan berbagai brand, UMKM, korporat, hingga kreator di seluruh Indonesia.",
            "portfolio.search_placeholder": "Cari karya desain (contoh: Logo, Box, Jersey, UI, Menu)...",
            "portfolio.filter_results": "Hasil filter:",
            "portfolio.filter_cat": "Kategori \"{cat}\"",
            "portfolio.filter_keyword": "Kata kunci: \"{query}\"",
            "portfolio.found_count": "({count} hasil ditemukan)",
            "portfolio.reset_filter": "Reset Filter",
            "portfolio.empty_title": "Tidak ada karya yang cocok",
            "portfolio.empty_desc": "Coba ubah kata kunci pencarian atau pilih kategori lain.",
            "portfolio.btn_show_all": "Tampilkan Semua Portofolio",
            "portfolio.zoom_modal_title": "Pratinjau Portofolio",
            "portfolio.zoom_in": "Perbesar",
            "portfolio.zoom_out": "Perkecil",
            "portfolio.zoom_reset": "Reset Zoom",
            "portfolio.zoom_order_similar": "Pesan Desain Serupa di WhatsApp",
            "portfolio.pills_all": "Semua",
            "portfolio.pills_logo": "Logo",
            "portfolio.pills_packaging": "Kemasan",
            "portfolio.pills_banner": "Banner",
            "portfolio.pills_uiux": "UI/UX",
            "portfolio.pills_poster": "Poster",
            "portfolio.pills_jersey": "Jersey",
            "portfolio.pills_label": "Label",
            "portfolio.pills_photo": "Foto AI",
            "portfolio.pills_ppt": "PPT & CV",
            "portfolio.cta_custom_title": "Punya Konsep Desain Sendiri untuk Brand Anda?",
            "portfolio.cta_custom_desc": "Konsultasikan kebutuhan logo, kemasan produk, banner promosi, UI/UX, maupun jersey custom bersama tim desainer profesional kami. Revisi fleksibel, pengerjaan cepat, dan file master lengkap siap cetak.",
            "portfolio.cta_custom_btn_wa": "Konsultasi Gratis di WhatsApp",
            "portfolio.cta_custom_btn_market": "Lihat Katalog Marketplace",

            // Marketplace Catalog
            "marketplace.header_badge": "Katalog Desain & Jasa",
            "marketplace.header_title": "Marketplace Karya & Layanan Desain",
            "marketplace.header_subtitle": "Pilih kategori desain yang Anda butuhkan, lihat rincian spesifikasi, dan lakukan pemesanan cepat langsung ke WhatsApp tim desainer kami.",
            "marketplace.search_placeholder": "Cari nama desain, kebutuhan, atau kata kunci...",
            "marketplace.all_categories": "Semua Kategori",
            "marketplace.sort_latest": "Urutkan: Terbaru",
            "marketplace.sort_oldest": "Urutkan: Terlama",
            "marketplace.sort_stock": "Urutkan: Stok Terbanyak",
            "marketplace.showing_count": "Menampilkan {count} produk/jasa",
            "marketplace.cat_label": "Kategori: {name}",
            "marketplace.keyword_label": "Kata kunci: \"{query}\"",
            "marketplace.empty_title": "Tidak ada produk atau jasa yang cocok",
            "marketplace.empty_desc": "Coba ubah kata kunci pencarian Anda atau pilih kategori lainnya.",
            "marketplace.btn_show_all": "Tampilkan Semua Produk",
            "marketplace.btn_detail": "Detail",
            "marketplace.btn_order": "Pesan",
            "marketplace.sidebar_title": "Kategori Desain",
            "marketplace.order_via_market": "Order via Marketplace",

            // Product Detail Page
            "product_detail.breadcrumb_home": "Home",
            "product_detail.breadcrumb_market": "Marketplace",
            "product_detail.zoom_hint": "Klik untuk memperbesar tampilan desain",
            "product_detail.high_res_badge": "Master Siap Cetak",
            "product_detail.preview_variations": "Pratinjau Variasi & Karya (Auto Slide)",
            "product_detail.desc_title": "Deskripsi & Ruang Lingkup Karya",
            "product_detail.toggle_open": "Buka",
            "product_detail.toggle_close": "Tutup",
            "product_detail.order_direct": "Pemesanan Langsung",
            "product_detail.package_label": "Paket:",
            "product_detail.can_select_software": "Bisa Pilih Software",
            "product_detail.software_options": "Pilihan",
            "product_detail.spec_cat": "Kategori",
            "product_detail.spec_turnaround": "Estimasi Pengerjaan",
            "product_detail.spec_status": "Status Layanan",
            "product_detail.spec_status_val": "Tersedia & Siap Order",
            "product_detail.spec_output": "Format Output",
            "product_detail.spec_output_val": "Disesuaikan / SVG / PDF / PNG 300 DPI",
            "product_detail.btn_wa_order": "Pesan Sekarang via WhatsApp",
            "product_detail.consult_fast": "Konsultasi Cepat & Respon Ramah",
            "product_detail.payment_note": "Pembayaran aman via WhatsApp, Shopee, atau Fiverr.",
            "product_detail.store_shopee": "Toko Shopee",
            "product_detail.store_fiverr": "Fiverr Gig",
            "product_detail.how_to_order_title": "Cara Pemesanan Produk Ini",
            "product_detail.step1_title": "1. Pilih Produk & Hubungi WhatsApp",
            "product_detail.step1_desc": "Klik tombol WhatsApp di atas untuk langsung terhubung dengan desainer kami.",
            "product_detail.step2_title": "2. Kirim Materi & Brief Desain",
            "product_detail.step2_desc": "Sampaikan konsep, teks, ukuran, atau referensi desain yang Anda inginkan.",
            "product_detail.step3_title": "3. Pengerjaan & Pengiriman File",
            "product_detail.step3_desc": "Desain dikerjakan sesuai antrean dan file master lengkap dikirimkan tepat waktu.",
            "product_detail.guarantee_title": "Jaminan Kualitas & Revisi",
            "product_detail.guarantee_desc": "Kami berkomitmen memberikan hasil desain terbaik dengan revisi proporsional hingga Anda puas dengan hasilnya.",
            "product_detail.related_badge": "Rekomendasi Terkait",
            "product_detail.related_title": "Karya & Jasa Serupa di Kategori Ini",
            "product_detail.tab_relevant": "Paling Relevan",
            "product_detail.tab_latest": "Terbaru",
            "product_detail.empty_related": "Belum ada karya serupa lainnya di kategori ini.",
            "product_detail.view_all_related": "Lihat Semua",

            // Order Steps Section
            "steps.badge": "Langkah Pemesanan",
            "steps.title": "Cara Mudah Pesan Desain",
            "steps.subtitle": "Proses pemesanan cepat dan anti ribet melalui 5 langkah simpel:",
            "steps.s1_title": "Pilih Jenis Desain",
            "steps.s1_desc": "Pilih desain yang Anda butuhkan dari katalog produk kami.",
            "steps.s2_title": "Konsultasi via WhatsApp",
            "steps.s2_desc": "Kirimkan konsep, referensi gambar, atau teks yang ingin dibuat.",
            "steps.s3_title": "Bayar DP Awal",
            "steps.s3_desc": "Lakukan pembayaran DP untuk langsung memulai antrean pengerjaan.",
            "steps.s4_title": "Pengerjaan & Revisi",
            "steps.s4_desc": "Desain kami buat dan sesuaikan sampai hasilnya pas dengan keinginan Anda.",
            "steps.s5_title": "Pelunasan & Terima File",
            "steps.s5_desc": "Lakukan pelunasan dan terima seluruh file master siap pakai (AI, PDF, PNG, dll).",
            "steps.cta_order": "Pesan Sekarang via WhatsApp",
            "steps.cta_catalog": "Katalog Layanan",

            // Payment Section
            "payment.badge": "Metode Pembayaran",
            "payment.title": "Menerima Pembayaran Seluruh Bank, E-Wallet, QRIS & PayPal",
            "payment.subtitle": "Transaksi cepat, aman, dan terpercaya untuk pemesanan lokal maupun internasional.",

            // Testimonials Section
            "testi.badge": "Bukti Screenshot & Kepuasan Klien",
            "testi.title": "Testimoni Nyata Portofolio",
            "testi.subtitle": "Geser untuk melihat bukti screenshot review chat & kepuasan hasil desain klien.",
            "testi.reviews_count": "(9 Review)",
            "testi.open_full": "Buka Foto Penuh",
            "testi.lightbox_title": "Bukti Testimoni Klien",

            // CTA Banner
            "cta.title": "Siap Memulai Proyek Desain Anda Bersama Kami?",
            "cta.subtitle": "Diskusikan konsep merek, kebutuhan media promosi, atau desain kemasan Anda. Tim kami siap merespons dengan cepat melalui WhatsApp.",
            "cta.btn_wa": "Hubungi via WhatsApp",
            "cta.btn_market": "Eksplor Katalog Marketplace",

            // About & Contact Page
            "about.badge": "Profil Studio & Konsultasi",
            "about.title": "Tentang Kami & Kontak",
            "about.subtitle": "Studio desain grafis dan marketplace penyedia solusi identitas visual profesional yang memadukan kejelasan fungsi, estetika modern, dan layanan konsultasi responsif.",
            "about.vision_badge": "Visi Kerja Studio",
            "about.vision_title": "Membangun Citra Merek yang Kuat dan Kredibel Melalui Desain Tepat Sasaran",
            "about.vision_p1": "Premium Design hadir untuk menjawab kebutuhan para pelaku usaha, kreator, dan organisasi yang menginginkan materi visual berkualitas tinggi tanpa proses yang rumit.",
            "about.vision_p2": "Kami meyakini bahwa desain yang baik bukan sekadar hiasan visual, melainkan alat komunikasi strategis yang mampu menumbuhkan kepercayaan konsumen dan memperkuat posisi brand di pasar.",
            "about.stats_title": "Ringkasan Statistik Studio",
            "about.stats_portfolio": "Katalog Portofolio",
            "about.stats_cats": "Spesialisasi Kategori",
            "about.stats_packages": "Paket Layanan Siap Pakai",
            "about.stats_satisfaction": "Kepuasan Klien",
            "about.principles_badge": "Prinsip Kerja",
            "about.principles_title": "Standar yang Kami Terapkan di Setiap Proyek",
            "about.p1_title": "Konseptual dan Terarah",
            "about.p1_desc": "Setiap elemen desain memiliki alasan yang jelas, disesuaikan dengan target audiens dan nilai merek klien.",
            "about.p2_title": "Kesiapan Cetak & Digital",
            "about.p2_desc": "Penataan warna CMYK/RGB, resolusi 300 DPI, dan format file master yang terstruktur rapi untuk vendor percetakan.",
            "about.p3_title": "Transparansi dan Ketepatan",
            "about.p3_desc": "Rincian paket jelas tanpa biaya tersembunyi, disertai jadwal penyelesaian proyek yang dapat diandalkan.",
            "about.contact_badge": "Saluran Resmi",
            "about.contact_title": "Informasi Kontak Studio",
            "about.contact_subtitle": "Pilih saluran komunikasi yang paling nyaman bagi Anda. Kami menyarankan WhatsApp untuk respon tercepat.",
            "about.wa_card_title": "WhatsApp Studio (Rekomendasi)",
            "about.wa_card_desc": "Respon langsung dari desainer pada jam operasional kerja.",
            "about.wa_card_btn": "Mulai Chat WhatsApp",
            "about.email_card_title": "Email Resmi",
            "about.hours_card_title": "Jam Operasional",
            "about.hours_val": "Setiap Hari: 09.00 - 23.00 WIB",
            "about.loc_card_title": "Wilayah Layanan",
            "about.loc_val": "Online Seluruh Indonesia & Internasional",
            "about.social_channels": "Marketplace & Official Channels",
            "about.link_hub_btn": "Buka Lynk.id Link Hub (Semua Tautan)",
            "about.form_badge": "Formulir Pesan",
            "about.form_title": "Kirimkan Rencana Proyek Desain",
            "about.form_subtitle": "Isi rincian awal berikut, sistem kami akan langsung menyusun pesan otomatis ke WhatsApp desainer kami.",
            "about.form_name": "Nama Lengkap",
            "about.form_name_ph": "Nama Anda...",
            "about.form_email": "Alamat Email",
            "about.form_email_ph": "nama@email.com",
            "about.form_service": "Kebutuhan Jasa Desain",
            "about.form_service_opt_select": "-- Pilih Kategori Desain --",
            "about.form_msg": "Pesan / Detail Kebutuhan Desain",
            "about.form_msg_ph": "Jelaskan jenis usaha, target waktu penyelesaian, atau referensi gaya desain yang diinginkan...",
            "about.form_submit": "Kirimkan ke WhatsApp Studio",
            "about.form_alert_required": "Mohon lengkapi semua data formulir yang bertanda bintang (*).",
            "about.opt_logo": "Logo & Brand Identity",
            "about.opt_packaging": "Desain Kemasan & Packaging",
            "about.opt_banner": "Materi Promosi, Banner & Poster",
            "about.opt_catalog": "Brosur, Katalog & Company Profile",
            "about.opt_uiux": "UI/UX Website & Aplikasi Mobile",
            "about.opt_jersey": "Jersey & Apparel Desain",
            "about.opt_vector": "Repair / Vektorisasi Desain Lama",
            "about.opt_other": "Kebutuhan Desain Lainnya",

            // Footer
            "footer.desc": "Studio desain grafis & marketplace penyedia identitas visual profesional, logo, kemasan, banner, dan UI/UX modern dengan standar tinggi.",
            "footer.nav_title": "Navigasi Cepat",
            "footer.contact_title": "Kontak Studio",
            "footer.copyright": "© 2026 Premium Design Studio. All rights reserved.",
            "footer.nav_home": "Home Utama",
            "footer.nav_portfolio": "Katalog Portofolio",
            "footer.nav_marketplace": "Marketplace Desain",
            "footer.nav_steps": "Cara Pemesanan",
            "footer.nav_about": "Tentang & Kontak",

            // Security & Protection Engine
            "security.modal_title": "Perlindungan Hak Cipta & Aset",
            "security.modal_desc": "Seluruh karya desain, gambar, dan aset visual pada platform <strong>Premium Designz</strong> dilindungi oleh hak cipta.<br>Dilarang menyalin, mengunduh tanpa lisensi, atau memodifikasi aset ini.",
            "security.btn_understand": "Saya Mengerti & Tutup",
            "security.toast_text": "Aksi ini dinonaktifkan demi perlindungan hak cipta",
            "security.toast_screenshot": "Tangkapan layar (Screenshot) dinonaktifkan",
            "security.toast_print": "Pencetakan dokumen dan halaman dinonaktifkan",
            "security.toast_save": "Penyimpanan halaman dinonaktifkan",
            "security.toast_copy": "Penyalinan teks dibatasi hak cipta",
            "security.toast_rightclick": "Klik kanan dinonaktifkan demi perlindungan aset",
            "security.toast_image": "Aset dan karya visual dilindungi hak cipta",
            "security.toast_xss": "Karakter skrip berbahaya dihapus secara otomatis.",
            "security.tab_inactive": "Jangan lupa pesan desainmu! - Premium Designz",
            "security.clipboard_warn": "Konten dilindungi hak cipta Premium Designz.",

            // Common / Miscellaneous
            "common.loading": "Memuat...",
            "common.close": "Tutup",
            "common.back": "Kembali",
            "common.scroll_to_top": "Scroll ke Atas",
            "common.wa_consult_msg": "Halo Premium Design, saya ingin konsultasi kebutuhan desain.",
            "common.wa_order_prefix": "Halo Premium Design, saya ingin memesan jasa/produk desain: ",
            "common.detail": "Detail",
            "common.order": "Pesan",
            "common.design": "Desain",
            "common.view_all": "Lihat Semua",
            "testimonials.badge": "Bukti Screenshot & Kepuasan Klien",
            "testimonials.title": "Testimoni Nyata Portofolio",
            "testimonials.subtitle": "Geser untuk melihat bukti screenshot review chat & kepuasan hasil desain klien.",
            "testimonials.reviews_count": "(9 Review)",
            "testimonials.open_full": "Buka Foto Penuh",
            "testimonials.modal_title": "Bukti Testimoni Klien",
            "aria.previous_slide": "Slide Sebelumnya",
            "aria.next_slide": "Slide Berikutnya",
            "aria.previous": "Sebelumnya",
            "aria.next": "Berikutnya",
            "aria.select_language": "Pilih Bahasa",
            "aria.toggle_nav": "Toggle navigasi",
            "aria.scroll_top": "Scroll ke Atas",
            "cta.whatsapp": "Hubungi via WhatsApp",
            "cta.explore": "Eksplor Katalog Marketplace",
            "steps.order_now": "Pesan Sekarang via WhatsApp",
            "steps.service_catalog": "Katalog Layanan",
            "footer.instagram": "Instagram @premiumdsz",
            "footer.tiktok": "TikTok @premium.designz",
            "footer.shopee": "Shopee Official Store",
            "footer.fiverr": "Fiverr Global Orders",
            "footer.quick_nav": "Navigasi Cepat",
            "footer.contact_studio": "Kontak Studio",
            "footer.hours": "09:00 - 23:00 WIB",
            "footer.rights": "© 2026 Premium Design Studio. All rights reserved.",
            "nav.how_to_order": "Cara Pemesanan",
            "nav.about": "Tentang & Kontak",
            "nav.services": "Jasa Desain",
            "nav.marketplace_services": "Marketplace Jasa Desain",
            "security.modal_close": "Saya Mengerti & Tutup",
            "security.toast_default": "Aksi ini dinonaktifkan demi perlindungan hak cipta",
            "topbar.tagline": "Jasa Desain Grafis & Marketplace Resmi",
            "topbar.usp": "Pengerjaan Tepat Waktu & File Master Lengkap Siap Cetak",
            "topbar.wa_consult": "WhatsApp: 0851-6817-4679",
            "marketplace.badge": "Katalog Desain & Jasa",
            "marketplace.title": "Marketplace Karya & Layanan Desain",
            "marketplace.subtitle": "Pilih kategori desain yang Anda butuhkan, lihat rincian spesifikasi, dan lakukan pemesanan cepat langsung ke WhatsApp tim desainer kami.",
            "marketplace.clear_search": "Hapus pencarian",
            "marketplace.cat_all_count": "Semua Kategori (14)",
            "marketplace.cat_1_count": "Banner & Spanduk (2)",
            "marketplace.cat_2_count": "Packaging & Kemasan (2)",
            "marketplace.cat_3_count": "Logo & Branding (2)",
            "marketplace.cat_4_count": "UI/UX & Web (1)",
            "marketplace.cat_5_count": "Label & Stiker (2)",
            "marketplace.cat_6_count": "Jersey & Apparel (1)",
            "marketplace.cat_7_count": "Foto & Redesain AI (1)",
            "marketplace.cat_8_count": "Poster & Flyer (2)",
            "marketplace.cat_9_count": "Dokumen & PPT (1)",
            "marketplace.sidebar_cat_title": "Kategori Desain",
            "cat.all": "Semua Kategori",
            "cat.all_pill": "Semua",
            "cat.logo_pill": "Logo",
            "cat.packaging_pill": "Kemasan",
            "cat.banner_pill": "Banner",
            "cat.uiux_pill": "UI/UX",
            "cat.poster_pill": "Poster",
            "cat.jersey_pill": "Jersey",
            "cat.label_pill": "Label",
            "cat.foto_pill": "Foto AI",
            "cat.ppt_pill": "PPT & CV",
            "marketplace.order_via_mp": "Order via Marketplace",
            "marketplace.shopee_store": "Shopee Official Store",
            "marketplace.fiverr_orders": "Fiverr Global Orders",
            "marketplace.lynk_portfolio": "Lynk.id Portfolio Link",
            "portfolio_page.hero_title": "Tingkatkan Kredibilitas & Penjualan Brand Anda dengan Desain Visual Berkualitas",
            "portfolio_page.hero_subtitle": "Lebih dari 1.295+ projek desain grafis telah dipercaya dan terbukti sukses membantu pertumbuhan berbagai brand, UMKM, korporat, hingga kreator di seluruh Indonesia.",
            "portfolio_page.search_placeholder": "Cari karya desain (contoh: Logo, Box, Jersey, UI, Menu)...",
            "portfolio_page.reset_search": "Reset Filter",
            "portfolio_page.cta_title": "Punya Konsep Desain Sendiri untuk Brand Anda?",
            "portfolio_page.cta_subtitle": "Konsultasikan kebutuhan logo, kemasan produk, banner promosi, UI/UX, maupun jersey custom bersama tim desainer profesional kami. Revisi fleksibel, pengerjaan cepat, dan file master lengkap siap cetak.",
            "portfolio_page.cta_wa": "Konsultasi Gratis di WhatsApp",
            "portfolio_page.cta_marketplace": "Lihat Katalog Marketplace",
            "portfolio_page.zoom_in": "Perbesar",
            "portfolio_page.zoom_out": "Perkecil",
            "portfolio_page.zoom_reset": "Reset Zoom",
            "portfolio_page.zoom_order_title": "Tertarik dengan Konsep Desain Ini?",
            "portfolio_page.zoom_order_text": "Pesan desain serupa atau modifikasi sesuai kebutuhan brand Anda langsung dengan desainer kami.",
            "portfolio_page.zoom_close": "Tutup",
            "portfolio_page.zoom_hint": "Klik 2x gambar untuk zoom cepat. Gunakan tombol di atas untuk navigasi.",
            "product_detail.enlarge_view": "Perbesar Tampilan",
            "product_detail.master_high_res": "Master Resolusi Tinggi",
            "product_detail.scope_desc": "Deskripsi & Ruang Lingkup Karya",
            "product_detail.collapse": "Tutup Rincian",
            "product_detail.direct_order": "Pemesanan Langsung",
            "product_detail.choose_software": "Bisa Pilih Software",
            "product_detail.software_option": "Pilihan",
            "product_detail.spec_category": "Kategori",
            "product_detail.spec_estimation": "Estimasi Pengerjaan",
            "product_detail.spec_days": "1 - 3 Hari Kerja",
            "product_detail.spec_status_available": "Tersedia & Siap Order",
            "product_detail.spec_format": "Format Output",
            "product_detail.spec_format_val": "Disesuaikan / SVG / PDF / PNG 300 DPI",
            "product_detail.order_whatsapp": "Pesan Sekarang via WhatsApp",
            "product_detail.shopee_store": "Toko Shopee",
            "product_detail.fiverr_gig": "Fiverr Gig",
            "product_detail.safe_payment": "Pembayaran aman via WhatsApp, Shopee, atau Fiverr.",
            "product_detail.rec_badge": "Rekomendasi Terkait",
            "product_detail.rec_title": "Karya & Jasa Serupa di Kategori Ini",
            "product_detail.slide_left": "Geser ke Kiri",
            "product_detail.slide_right": "Geser ke Kanan",
        },

        en: {
            // Topbar & Info
            "topbar.badge": "Professional Graphic Design & Official Visual Marketplace",
            "topbar.sub": "On-Time Delivery & Complete Print-Ready Master Files",
            "topbar.wa": "WhatsApp: +62 851-6817-4679",

            // Navbar
            "nav.home": "Home",
            "nav.portfolio": "Portfolio",
            "nav.portfolio_gallery": "Portfolio Gallery",
            "nav.marketplace": "Design Services",
            "nav.marketplace_catalog": "Design Services Marketplace",
            "nav.order_steps": "How to Order",
            "nav.about_contact": "About & Contact",
            "nav.select_language": "Select Language",
            "nav.language": "Language",

            // Hero Section
            "hero.title": "Professional Visual Design Solutions to Increase Brand Credibility",
            "hero.subtitle": "Browse our portfolio catalog, choose a ready-made design package, or discuss your custom needs directly with our team of designers.",
            "hero.cta_wa": "Consult via WhatsApp",
            "hero.cta_explore": "Explore Marketplace Catalog",
            "hero.tools_title": "Design Software We Master",

            // Promo Section
            "promo.title": "Exclusive Deals & Special Offers",
            "promo.subtitle": "Take advantage of special offers and design package discounts to boost your brand's market reach.",
            "promo.prev": "Previous Promo",
            "promo.next": "Next Promo",
            "promo.claim_btn": "Claim Promo via WhatsApp",

            // Keunggulan / Value Proposition
            "features.badge": "Studio Quality Standards",
            "features.title": "Professional Visual Design Standards to Elevate Your Brand Value",
            "features.subtitle": "We combine original creativity, technical precision, and market identity understanding to produce designs that captivate consumers and strengthen your business position.",
            "features.f1": "100% Original & Exclusive Designs",
            "features.f2": "Complete Print-Ready Master Files",
            "features.f3": "Fast Turnaround & Punctual Delivery",
            "features.f4": "Rapid WhatsApp Communication",
            "features.cta_consult": "Consult Now",
            "features.cta_portfolio": "View Portfolio Gallery",

            // Categories Section
            "categories.badge": "Service Exploration",
            "categories.title": "Featured Design Categories",
            "categories.view_all": "View All Categories",
            "categories.total": "Total {count} Categories",
            "categories.open_marketplace": "Open Marketplace",
            "categories.modal_badge": "Full Directory",
            "categories.modal_title": "All Design Categories",
            "categories.modal_subtitle": "Select a category to view all related artwork and services",
            "categories.modal_search_placeholder": "Search design category...",
            "categories.modal_empty": "No matching categories found.",

            // Category Names
            "cat.1": "Banners & Signage",
            "cat.2": "Packaging & Box Design",
            "cat.3": "Logo & Brand Identity",
            "cat.4": "UI/UX & Web Design",
            "cat.5": "Labels & Stickers",
            "cat.6": "Jersey & Apparel",
            "cat.7": "AI Photo & Redesign",
            "cat.8": "Posters & Flyers",
            "cat.9": "Documents & Presentations",

            // Portfolio Showcase
            "portfolio.badge": "Portfolio & Marketplace",
            "portfolio.title": "Featured Design Work Catalog",
            "portfolio.subtitle": "A collection of recent design projects ready to order or customize.",
            "portfolio.view_all_products": "View All Products",
            "portfolio.hero_title": "Elevate Brand Credibility & Boost Sales with High-Quality Visual Design",
            "portfolio.hero_subtitle": "Over 1,295+ graphic design projects trusted and proven to accelerate the growth of brands, MSMEs, corporates, and creators across the nation.",
            "portfolio.search_placeholder": "Search designs (e.g., Logo, Box, Jersey, UI, Menu)...",
            "portfolio.filter_results": "Filter results:",
            "portfolio.filter_cat": "Category \"{cat}\"",
            "portfolio.filter_keyword": "Keyword: \"{query}\"",
            "portfolio.found_count": "({count} results found)",
            "portfolio.reset_filter": "Reset Filter",
            "portfolio.empty_title": "No matching artwork found",
            "portfolio.empty_desc": "Try adjusting your search terms or select another category.",
            "portfolio.btn_show_all": "Show All Portfolios",
            "portfolio.zoom_modal_title": "Portfolio Preview",
            "portfolio.zoom_in": "Zoom In",
            "portfolio.zoom_out": "Zoom Out",
            "portfolio.zoom_reset": "Reset Zoom",
            "portfolio.zoom_order_similar": "Order Similar Design on WhatsApp",
            "portfolio.pills_all": "All",
            "portfolio.pills_logo": "Logo",
            "portfolio.pills_packaging": "Packaging",
            "portfolio.pills_banner": "Banner",
            "portfolio.pills_uiux": "UI/UX",
            "portfolio.pills_poster": "Poster",
            "portfolio.pills_jersey": "Jersey",
            "portfolio.pills_label": "Label",
            "portfolio.pills_photo": "AI Photo",
            "portfolio.pills_ppt": "PPT & CV",
            "portfolio.cta_custom_title": "Have a Custom Design Concept for Your Brand?",
            "portfolio.cta_custom_desc": "Discuss your custom logo, product packaging, promotional banners, UI/UX, or apparel designs directly with our team. Enjoy flexible revisions, swift turnaround, and complete print-ready master files.",
            "portfolio.cta_custom_btn_wa": "Free Consultation on WhatsApp",
            "portfolio.cta_custom_btn_market": "Explore Marketplace Catalog",

            // Marketplace Catalog
            "marketplace.header_badge": "Design Catalog & Services",
            "marketplace.header_title": "Creative Marketplace & Design Packages",
            "marketplace.header_subtitle": "Choose your required design category, review detailed specifications, and place instant orders directly via WhatsApp.",
            "marketplace.search_placeholder": "Search design names, needs, or keywords...",
            "marketplace.all_categories": "All Categories",
            "marketplace.sort_latest": "Sort: Newest",
            "marketplace.sort_oldest": "Sort: Oldest",
            "marketplace.sort_stock": "Sort: Highest Stock",
            "marketplace.showing_count": "Showing {count} products/services",
            "marketplace.cat_label": "Category: {name}",
            "marketplace.keyword_label": "Keyword: \"{query}\"",
            "marketplace.empty_title": "No matching products or services",
            "marketplace.empty_desc": "Try modifying your search query or select another category.",
            "marketplace.btn_show_all": "Show All Products",
            "marketplace.btn_detail": "Details",
            "marketplace.btn_order": "Order",
            "marketplace.sidebar_title": "Design Categories",
            "marketplace.order_via_market": "Order via Marketplace",

            // Product Detail Page
            "product_detail.breadcrumb_home": "Home",
            "product_detail.breadcrumb_market": "Marketplace",
            "product_detail.zoom_hint": "Click to expand image preview",
            "product_detail.high_res_badge": "Print-Ready Master",
            "product_detail.preview_variations": "Work Variations & Gallery (Auto Slide)",
            "product_detail.desc_title": "Scope of Work & Project Description",
            "product_detail.toggle_open": "Open",
            "product_detail.toggle_close": "Close",
            "product_detail.order_direct": "Direct Order",
            "product_detail.package_label": "Package:",
            "product_detail.can_select_software": "Selectable Software",
            "product_detail.software_options": "Options",
            "product_detail.spec_cat": "Category",
            "product_detail.spec_turnaround": "Estimated Turnaround",
            "product_detail.spec_status": "Service Availability",
            "product_detail.spec_status_val": "Available & Ready to Order",
            "product_detail.spec_output": "Output Format",
            "product_detail.spec_output_val": "Customized / SVG / PDF / PNG 300 DPI",
            "product_detail.btn_wa_order": "Order Now via WhatsApp",
            "product_detail.consult_fast": "Fast Consultation & Responsive Service",
            "product_detail.payment_note": "Secure payment via WhatsApp, Shopee, or Fiverr.",
            "product_detail.store_shopee": "Shopee Store",
            "product_detail.store_fiverr": "Fiverr Gig",
            "product_detail.how_to_order_title": "How to Order This Design",
            "product_detail.step1_title": "1. Select Package & Chat WhatsApp",
            "product_detail.step1_desc": "Click the WhatsApp button above to connect instantly with our lead designer.",
            "product_detail.step2_title": "2. Send Design Brief & References",
            "product_detail.step2_desc": "Share your branding concepts, texts, dimensions, or reference images.",
            "product_detail.step3_title": "3. Design Creation & File Delivery",
            "product_detail.step3_desc": "We execute the design with care and deliver all print-ready master files on schedule.",
            "product_detail.guarantee_title": "Quality & Revision Guarantee",
            "product_detail.guarantee_desc": "We are dedicated to delivering top-tier visual artwork with flexible revisions until you are completely satisfied.",
            "product_detail.related_badge": "Related Recommendations",
            "product_detail.related_title": "Similar Works & Services in This Category",
            "product_detail.tab_relevant": "Most Relevant",
            "product_detail.tab_latest": "Newest",
            "product_detail.empty_related": "No other similar artwork in this category yet.",
            "product_detail.view_all_related": "View All",

            // Order Steps Section
            "steps.badge": "Ordering Steps",
            "steps.title": "Simple Steps to Order Your Design",
            "steps.subtitle": "Fast, seamless, and hassle-free ordering in 5 simple steps:",
            "steps.s1_title": "Choose Design Type",
            "steps.s1_desc": "Select the visual package you need from our product catalog.",
            "steps.s2_title": "Consult via WhatsApp",
            "steps.s2_desc": "Share your concept, text contents, or reference images with our team.",
            "steps.s3_title": "Pay Initial Down Payment",
            "steps.s3_desc": "Complete the initial deposit to immediately queue your design project.",
            "steps.s4_title": "Design & Revisions",
            "steps.s4_desc": "We craft your design and refine it until it perfectly matches your vision.",
            "steps.s5_title": "Final Payment & File Delivery",
            "steps.s5_desc": "Complete the final payment and receive all master vector files (AI, PDF, PNG, etc).",
            "steps.cta_order": "Order Now via WhatsApp",
            "steps.cta_catalog": "Services Catalog",

            // Payment Section
            "payment.badge": "Payment Methods",
            "payment.title": "We Accept All Major Banks, E-Wallets, QRIS & PayPal",
            "payment.subtitle": "Fast, secure, and verified transactions for domestic and international clients.",

            // Testimonials Section
            "testi.badge": "Real Proof & Client Satisfaction",
            "testi.title": "Real Client Reviews & Testimonials",
            "testi.subtitle": "Slide to view verified chat reviews and client satisfaction screenshots.",
            "testi.reviews_count": "(9 Reviews)",
            "testi.open_full": "View Full Image",
            "testi.lightbox_title": "Client Review Screenshot",

            // CTA Banner
            "cta.title": "Ready to Start Your Design Project With Us?",
            "cta.subtitle": "Discuss your brand identity, promotional media, or custom packaging concepts. Our team is ready to assist promptly via WhatsApp.",
            "cta.btn_wa": "Contact via WhatsApp",
            "cta.btn_market": "Explore Marketplace Catalog",

            // About & Contact Page
            "about.badge": "Studio Profile & Consultation",
            "about.title": "About Us & Contact",
            "about.subtitle": "A premier graphic design studio and creative visual marketplace combining functional clarity, modern aesthetics, and responsive consultation.",
            "about.vision_badge": "Studio Vision",
            "about.vision_title": "Building Strong, High-Impact Brand Identities Through Purposeful Design",
            "about.vision_p1": "Premium Design is dedicated to empowering entrepreneurs, creators, and enterprises with premium visual materials without complicated workflows.",
            "about.vision_p2": "We believe that great design is more than mere decoration—it is a strategic communication asset that drives consumer trust and market leadership.",
            "about.stats_title": "Studio Key Statistics",
            "about.stats_portfolio": "Portfolio Items",
            "about.stats_cats": "Specialized Categories",
            "about.stats_packages": "Ready-to-Use Packages",
            "about.stats_satisfaction": "Client Satisfaction",
            "about.principles_badge": "Core Principles",
            "about.principles_title": "Our Professional Standards for Every Project",
            "about.p1_title": "Conceptual & Purpose-Driven",
            "about.p1_desc": "Every design element serves a distinct purpose, tailored to your target audience and core brand values.",
            "about.p2_title": "Print & Digital Readiness",
            "about.p2_desc": "Precision CMYK/RGB color management, 300 DPI resolution, and structured master files ready for print vendors.",
            "about.p3_title": "Transparency & Punctuality",
            "about.p3_desc": "Transparent pricing with no hidden fees, paired with dependable delivery schedules you can count on.",
            "about.contact_badge": "Official Channels",
            "about.contact_title": "Studio Contact Information",
            "about.contact_subtitle": "Select your preferred communication channel. We recommend WhatsApp for the fastest response.",
            "about.wa_card_title": "Studio WhatsApp (Recommended)",
            "about.wa_card_desc": "Direct response from lead designers during operational hours.",
            "about.wa_card_btn": "Start WhatsApp Chat",
            "about.email_card_title": "Official Email",
            "about.hours_card_title": "Working Hours",
            "about.hours_val": "Daily: 09:00 - 23:00 GMT+7",
            "about.loc_card_title": "Service Region",
            "about.loc_val": "Online Worldwide & Throughout Indonesia",
            "about.social_channels": "Marketplace & Official Channels",
            "about.link_hub_btn": "Open Lynk.id Link Hub (All Links)",
            "about.form_badge": "Message Form",
            "about.form_title": "Send Project Design Plan",
            "about.form_subtitle": "Fill out the initial details below, and our system will format your brief directly into our designer's WhatsApp.",
            "about.form_name": "Full Name",
            "about.form_name_ph": "Your Name...",
            "about.form_email": "Email Address",
            "about.form_email_ph": "name@email.com",
            "about.form_service": "Design Service Need",
            "about.form_service_opt_select": "-- Select Design Category --",
            "about.form_msg": "Message / Project Brief Details",
            "about.form_msg_ph": "Describe your business type, target deadline, or preferred design style references...",
            "about.form_submit": "Send to Studio WhatsApp",
            "about.form_alert_required": "Please fill out all required fields marked with (*).",
            "about.opt_logo": "Logo & Brand Identity",
            "about.opt_packaging": "Packaging & Box Design",
            "about.opt_banner": "Promo Materials, Banners & Posters",
            "about.opt_catalog": "Brochures, Catalogs & Company Profiles",
            "about.opt_uiux": "UI/UX Website & Mobile Apps",
            "about.opt_jersey": "Jersey & Custom Apparel",
            "about.opt_vector": "Vector Tracing / Old Design Repair",
            "about.opt_other": "Other Custom Design Inquiries",

            // Footer
            "footer.desc": "Graphic design studio & marketplace delivering professional brand identity, logos, packaging, banners, and modern UI/UX with high standards.",
            "footer.nav_title": "Quick Navigation",
            "footer.contact_title": "Studio Contact",
            "footer.copyright": "© 2026 Premium Design Studio. All rights reserved.",
            "footer.nav_home": "Home Main",
            "footer.nav_portfolio": "Portfolio Catalog",
            "footer.nav_marketplace": "Design Marketplace",
            "footer.nav_steps": "How to Order",
            "footer.nav_about": "About & Contact",

            // Security & Protection Engine
            "security.modal_title": "Copyright & Asset Protection",
            "security.modal_desc": "All design works, images, and visual assets on the <strong>Premium Designz</strong> platform are protected by copyright.<br>Copying, downloading without license, or modifying these assets is prohibited.",
            "security.btn_understand": "I Understand & Close",
            "security.toast_text": "This action is disabled for copyright protection",
            "security.toast_screenshot": "Screenshots are disabled",
            "security.toast_print": "Printing pages and documents is disabled",
            "security.toast_save": "Page saving is disabled",
            "security.toast_copy": "Text copying is protected by copyright",
            "security.toast_rightclick": "Right click is disabled for asset protection",
            "security.toast_image": "Visual assets and artworks are copyright protected",
            "security.toast_xss": "Harmful script characters were automatically removed.",
            "security.tab_inactive": "Don't forget to order your design! - Premium Designz",
            "security.clipboard_warn": "Content protected by Premium Designz copyright.",

            // Common / Miscellaneous
            "common.loading": "Loading...",
            "common.close": "Close",
            "common.back": "Back",
            "common.scroll_to_top": "Scroll to Top",
            "common.wa_consult_msg": "Hello Premium Design, I would like to consult on my design project.",
            "common.wa_order_prefix": "Hello Premium Design, I would like to order design service for: ",
            "common.detail": "Details",
            "common.order": "Order",
            "common.design": "Design",
            "common.view_all": "View All",
            "testimonials.badge": "Real Proof & Client Satisfaction",
            "testimonials.title": "Real Client Reviews & Testimonials",
            "testimonials.subtitle": "Slide to view verified chat reviews and client satisfaction screenshots.",
            "testimonials.reviews_count": "(9 Reviews)",
            "testimonials.open_full": "View Full Image",
            "testimonials.modal_title": "Client Review Screenshot",
            "aria.previous_slide": "Previous Slide",
            "aria.next_slide": "Next Slide",
            "aria.previous": "Previous",
            "aria.next": "Next",
            "aria.select_language": "Select Language",
            "aria.toggle_nav": "Toggle navigation",
            "aria.scroll_top": "Scroll to Top",
            "cta.whatsapp": "Contact via WhatsApp",
            "cta.explore": "Explore Marketplace Catalog",
            "steps.order_now": "Order Now via WhatsApp",
            "steps.service_catalog": "Services Catalog",
            "footer.instagram": "Instagram @premiumdsz",
            "footer.tiktok": "TikTok @premium.designz",
            "footer.shopee": "Shopee Official Store",
            "footer.fiverr": "Fiverr Global Orders",
            "footer.quick_nav": "Quick Navigation",
            "footer.contact_studio": "Studio Contact",
            "footer.hours": "09:00 - 23:00 GMT+7",
            "footer.rights": "© 2026 Premium Design Studio. All rights reserved.",
            "nav.how_to_order": "How to Order",
            "nav.about": "About & Contact",
            "nav.services": "Design Services",
            "nav.marketplace_services": "Design Services Marketplace",
            "security.modal_close": "I Understand & Close",
            "security.toast_default": "This action is disabled for copyright protection",
            "topbar.tagline": "Professional Graphic Design & Official Visual Marketplace",
            "topbar.usp": "On-Time Delivery & Complete Print-Ready Master Files",
            "topbar.wa_consult": "WhatsApp: +62 851-6817-4679",
            "marketplace.badge": "Design Catalog & Services",
            "marketplace.title": "Creative Marketplace & Design Packages",
            "marketplace.subtitle": "Choose your required design category, review detailed specifications, and place instant orders directly via WhatsApp.",
            "marketplace.clear_search": "Clear search",
            "marketplace.cat_all_count": "All Categories (14)",
            "marketplace.cat_1_count": "Banners & Signage (2)",
            "marketplace.cat_2_count": "Packaging & Box (2)",
            "marketplace.cat_3_count": "Logo & Branding (2)",
            "marketplace.cat_4_count": "UI/UX & Web (1)",
            "marketplace.cat_5_count": "Labels & Stickers (2)",
            "marketplace.cat_6_count": "Jersey & Apparel (1)",
            "marketplace.cat_7_count": "AI Photo & Redesign (1)",
            "marketplace.cat_8_count": "Posters & Flyers (2)",
            "marketplace.cat_9_count": "Documents & PPT (1)",
            "marketplace.sidebar_cat_title": "Design Categories",
            "cat.all": "All Categories",
            "cat.all_pill": "All",
            "cat.logo_pill": "Logo",
            "cat.packaging_pill": "Packaging",
            "cat.banner_pill": "Banner",
            "cat.uiux_pill": "UI/UX",
            "cat.poster_pill": "Poster",
            "cat.jersey_pill": "Jersey",
            "cat.label_pill": "Label",
            "cat.foto_pill": "AI Photo",
            "cat.ppt_pill": "PPT & CV",
            "marketplace.order_via_mp": "Order via Marketplace",
            "marketplace.shopee_store": "Shopee Official Store",
            "marketplace.fiverr_orders": "Fiverr Global Orders",
            "marketplace.lynk_portfolio": "Lynk.id Portfolio Link",
            "portfolio_page.hero_title": "Elevate Brand Credibility & Boost Sales with High-Quality Visual Design",
            "portfolio_page.hero_subtitle": "Over 1,295+ graphic design projects trusted and proven to accelerate the growth of brands, MSMEs, corporates, and creators across the nation.",
            "portfolio_page.search_placeholder": "Search designs (e.g., Logo, Box, Jersey, UI, Menu)...",
            "portfolio_page.reset_search": "Reset Filter",
            "portfolio_page.cta_title": "Have a Custom Design Concept for Your Brand?",
            "portfolio_page.cta_subtitle": "Discuss your custom logo, product packaging, promotional banners, UI/UX, or apparel designs directly with our team. Enjoy flexible revisions, swift turnaround, and complete print-ready master files.",
            "portfolio_page.cta_wa": "Free Consultation on WhatsApp",
            "portfolio_page.cta_marketplace": "Explore Marketplace Catalog",
            "portfolio_page.zoom_in": "Zoom In",
            "portfolio_page.zoom_out": "Zoom Out",
            "portfolio_page.zoom_reset": "Reset Zoom",
            "portfolio_page.zoom_order_title": "Interested in This Design Concept?",
            "portfolio_page.zoom_order_text": "Order a similar design or customize it to fit your brand identity directly with our lead designer.",
            "portfolio_page.zoom_close": "Close",
            "portfolio_page.zoom_hint": "Double click image to quickly zoom. Use top controls for navigation.",
            "product_detail.enlarge_view": "Enlarge View",
            "product_detail.master_high_res": "High-Resolution Master",
            "product_detail.scope_desc": "Scope of Work & Project Description",
            "product_detail.collapse": "Collapse Details",
            "product_detail.direct_order": "Direct Order",
            "product_detail.choose_software": "Selectable Software",
            "product_detail.software_option": "Options",
            "product_detail.spec_category": "Category",
            "product_detail.spec_estimation": "Estimated Turnaround",
            "product_detail.spec_days": "1 - 3 Business Days",
            "product_detail.spec_status_available": "Available & Ready to Order",
            "product_detail.spec_format": "Output Format",
            "product_detail.spec_format_val": "Customized / SVG / PDF / PNG 300 DPI",
            "product_detail.order_whatsapp": "Order Now via WhatsApp",
            "product_detail.shopee_store": "Shopee Store",
            "product_detail.fiverr_gig": "Fiverr Gig",
            "product_detail.safe_payment": "Secure payment via WhatsApp, Shopee, or Fiverr.",
            "product_detail.rec_badge": "Related Recommendations",
            "product_detail.rec_title": "Similar Works & Services in This Category",
            "product_detail.slide_left": "Slide Left",
            "product_detail.slide_right": "Slide Right",
        }
    };

    // =========================================================================
    // 2. TRANSLATION HELPER FUNCTIONS
    // =========================================================================
    function getSavedLanguage() {
        let lang = localStorage.getItem('site_lang');
        if (!lang) {
            const match = document.cookie.match(/(^|;\s*)googtrans=([^;]+)/);
            if (match) {
                const parts = decodeURIComponent(match[2]).split('/');
                lang = parts[parts.length - 1];
            }
        }
        return (lang === 'en') ? 'en' : 'id';
    }

    function setTranslateCookie(lang) {
        const domain = window.location.hostname;
        const cookieVal = (lang === 'en') ? '/id/en' : '/id/id';
        
        document.cookie = "googtrans=" + cookieVal + "; path=/;";
        document.cookie = "googtrans=" + cookieVal + "; path=/; domain=" + domain + ";";
        
        if (domain.includes('.')) {
            const domainParts = domain.split('.');
            if (domainParts.length >= 2) {
                const rootDomain = domainParts.slice(-2).join('.');
                document.cookie = "googtrans=" + cookieVal + "; path=/; domain=." + rootDomain + ";";
            }
        }
        
        if (lang === 'id') {
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + domain + ";";
        }
    }

    function t(key, params) {
        const lang = getSavedLanguage();
        let text = (DICTIONARY[lang] && DICTIONARY[lang][key]) || (DICTIONARY['id'] && DICTIONARY['id'][key]) || key;
        
        if (params && typeof params === 'object') {
            Object.keys(params).forEach(p => {
                text = text.replace(new RegExp('\\{' + p + '\\}', 'g'), params[p]);
            });
        }
        return text;
    }

    window.t = t;
    window._t = t;
    window.__t = t;
    window.getSavedLanguage = getSavedLanguage;

    // =========================================================================
    // 3. FULL DOM TRANSLATOR
    // =========================================================================
    function translateDOM(lang) {
        const targetLang = lang || getSavedLanguage();
        const dict = DICTIONARY[targetLang] || DICTIONARY['id'];

        // 1. Update HTML lang tag
        document.documentElement.lang = targetLang;

        // 2. Translate text nodes [data-i18n]
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dict[key] !== undefined) {
                el.textContent = dict[key];
            }
        });

        // 3. Translate inner HTML nodes [data-i18n-html]
        document.querySelectorAll('[data-i18n-html]').forEach(el => {
            const key = el.getAttribute('data-i18n-html');
            if (dict[key] !== undefined) {
                el.innerHTML = dict[key];
            }
        });

        // 4. Translate placeholders [data-i18n-placeholder]
        document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
            const key = el.getAttribute('data-i18n-placeholder');
            if (dict[key] !== undefined) {
                el.setAttribute('placeholder', dict[key]);
            }
        });

        // 5. Translate title tooltips [data-i18n-title]
        document.querySelectorAll('[data-i18n-title]').forEach(el => {
            const key = el.getAttribute('data-i18n-title');
            if (dict[key] !== undefined) {
                el.setAttribute('title', dict[key]);
            }
        });

        // 6. Translate aria-labels [data-i18n-aria-label]
        document.querySelectorAll('[data-i18n-aria-label]').forEach(el => {
            const key = el.getAttribute('data-i18n-aria-label');
            if (dict[key] !== undefined) {
                el.setAttribute('aria-label', dict[key]);
            }
        });

        // 7. Translate image alt [data-i18n-alt]
        document.querySelectorAll('[data-i18n-alt]').forEach(el => {
            const key = el.getAttribute('data-i18n-alt');
            if (dict[key] !== undefined) {
                el.setAttribute('alt', dict[key]);
            }
        });

        // 8. Update Document Title based on current page
        updateDocumentMeta(targetLang);
    }

    function updateDocumentMeta(lang) {
        const path = window.location.pathname.toLowerCase();
        if (lang === 'en') {
            if (path.includes('marketplace')) {
                document.title = "Graphic Design Catalog & Visual Marketplace - Premium Designz";
            } else if (path.includes('portofolio')) {
                document.title = "Graphic Design Portfolio Gallery - Premium Designz";
            } else if (path.includes('about')) {
                document.title = "About Us & Contact Studio - Premium Designz";
            } else if (path.includes('product-detail')) {
                // Maintained by app-pages.js dynamically
            } else {
                document.title = "Professional Graphic Design Services & Custom Visual Marketplace - Premium Designz";
            }
        } else {
            if (path.includes('marketplace')) {
                document.title = "Katalog Jasa Desain Grafis & Marketplace Portofolio - Premium Designz";
            } else if (path.includes('portofolio')) {
                document.title = "Galeri Portofolio Jasa Desain Grafis Profesional - Premium Designz";
            } else if (path.includes('about')) {
                document.title = "Tentang Kami & Kontak Studio - Premium Designz";
            } else if (path.includes('product-detail')) {
                // Maintained by app-pages.js dynamically
            } else {
                document.title = "Jasa Desain Grafis Profesional & Marketplace Desain Custom - Premium Designz";
            }
        }
    }

    // =========================================================================
    // 4. LANGUAGE SWITCHER UI CONTROLLER
    // =========================================================================
    function applyLanguageUI(lang) {
        const activeLang = lang || getSavedLanguage();

        // Update Desktop & Tablet Segmented Switcher Pills
        document.querySelectorAll('.lang-pill-btn').forEach(function(el) {
            const elLang = el.getAttribute('data-lang-pill');
            if (elLang === activeLang) {
                if (activeLang === 'en') {
                    el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-extrabold bg-brand-600 text-white shadow-sm border border-brand-500 transition-all duration-200 cursor-pointer select-none';
                } else {
                    el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-extrabold bg-white text-zinc-900 shadow-sm border border-zinc-200/90 transition-all duration-200 cursor-pointer select-none';
                }
            } else {
                el.className = 'lang-pill-btn px-2.5 py-1 rounded-lg text-xs font-semibold text-zinc-600 hover:text-zinc-900 hover:bg-white/60 border border-transparent transition-all duration-200 cursor-pointer select-none';
            }
        });

        // Update Mobile Tag
        const mobileTag = document.getElementById('mobile-current-lang-tag');
        if (mobileTag) {
            mobileTag.textContent = activeLang === 'en' ? 'EN' : 'ID';
            if (activeLang === 'en') {
                mobileTag.className = 'text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-brand-600 text-white shadow-xs';
            } else {
                mobileTag.className = 'text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full bg-brand-50 text-brand-700 border border-brand-200/60';
            }
        }

        // Update Mobile Buttons
        document.querySelectorAll('.mobile-lang-btn').forEach(function(el) {
            const elLang = el.getAttribute('data-mobile-lang');
            if (elLang === activeLang) {
                el.className = 'mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border border-brand-600 text-xs font-extrabold bg-brand-600 text-white shadow-sm ring-2 ring-brand-400/30 transition-all duration-200 cursor-pointer';
            } else {
                el.className = 'mobile-lang-btn flex items-center justify-center py-2 px-3 rounded-xl border border-zinc-200 text-xs font-bold bg-zinc-50 text-zinc-700 hover:bg-zinc-100 transition-all duration-200 cursor-pointer shadow-2xs';
            }
        });

        // Translate DOM Elements
        translateDOM(activeLang);

        // Notify app-pages.js & other dynamic modules to re-render in active language
        window.dispatchEvent(new CustomEvent('languageChanged', { detail: { lang: activeLang } }));
    }

    // =========================================================================
    // 5. GOOGLE TRANSLATE / AI BRIDGE INTEGRATION
    // =========================================================================
    window._googleTranslateScriptLoaded = false;

    function loadGoogleTranslateScript() {
        if (window._googleTranslateScriptLoaded) return;
        window._googleTranslateScriptLoaded = true;
        const script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        script.async = true;
        document.body.appendChild(script);
    }

    window.googleTranslateElementInit = function() {
        if (typeof google === 'undefined' || !google.translate) return;
        
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'id,en',
            autoDisplay: false
        }, 'google_translate_element');
        
        setTimeout(function() {
            const currentLang = getSavedLanguage();
            applyLanguageUI(currentLang);
        }, 200);
    };

    window.changeSiteLanguage = function(lang) {
        const targetLang = (lang === 'en') ? 'en' : 'id';
        localStorage.setItem('site_lang', targetLang);
        setTranslateCookie(targetLang);
        applyLanguageUI(targetLang);

        // Bridge to Google Translate widget if loaded
        const select = document.querySelector('.goog-te-combo');
        if (select) {
            select.value = targetLang;
            select.dispatchEvent(new Event('change'));
        } else if (targetLang === 'en' && !window._googleTranslateScriptLoaded) {
            loadGoogleTranslateScript();
        }
    };

    // =========================================================================
    // 6. AUTO-INIT ON LOAD
    // =========================================================================
    document.addEventListener('DOMContentLoaded', function() {
        const savedLang = getSavedLanguage();
        applyLanguageUI(savedLang);

        if (savedLang === 'en') {
            setTranslateCookie('en');
            if ('requestIdleCallback' in window) {
                requestIdleCallback(loadGoogleTranslateScript, { timeout: 2000 });
            } else {
                setTimeout(loadGoogleTranslateScript, 1500);
            }
        }
    });

})();
