# Dokumentasi Konversi: Laravel ke Pure HTML5, CSS3, Tailwind CSS & Vanilla JS

Proyek ini telah dikonversi secara menyeluruh dari arsitektur Laravel (Blade + Controllers + Eloquent) menjadi website statis murni berbasis **HTML5, CSS3, Tailwind CSS, dan Vanilla JavaScript**. Seluruh estetika visual, tata letak responsif, animasi, serta alur interaksi pengguna dipertahankan 100% identik (*pixel-perfect*).

---

## 1. Struktur Direktori Baru

```text
├── index.html                   # Halaman Utama (Beranda / Home)
├── MAPPING.md                   # Dokumentasi Konversi & Panduan Pemetaan
├── assets/
│   ├── css/
│   │   └── style.css            # Custom fonts, CSS tokens, shimmer animations, anti-copy protection
│   ├── js/
│   │   ├── data.js              # Database statis (Settings, Categories, Services, Software, Products, Portfolios, Testimonials)
│   │   ├── security.js          # Proteksi aset, shortcut prevention (F12, PrintScreen, Ctrl+S/P/U), watermark
│   │   ├── translate.js         # Multi-language switcher (Google Translate ID/EN)
│   │   ├── main.js              # Inisialisasi AOS, dynamic frosted navbar, mobile drawer, scroll-to-top
│   │   └── app-pages.js         # Logika interaktif halaman (Slider, Filter, Live Search, Lightbox Zoom, Form WA)
│   ├── brand/                   # Aset gambar kategori & brand
│   ├── software/                # Logo software (Photoshop, Illustrator, Blender, Figma, CorelDRAW, Canva, dll)
│   ├── portofolio/              # Aset gambar portofolio & ulasan testimoni
│   └── other/                   # Logo utama (logo_warna.png, logo_white.png, background texture)
└── pages/
    ├── portofolio.html          # Halaman Portofolio (Grid kategori + live search + lightbox zoom)
    ├── marketplace.html         # Halaman Marketplace (Filter kategori, search, sort harga/rating)
    ├── product-detail.html      # Halaman Detail Produk (?id=X, image slider, specs, WhatsApp CTA, carousel relevan)
    ├── services.html            # Halaman Paket Layanan & Price List (9 paket layanan + benefit checklist)
    ├── about.html               # Halaman Tentang Studio (Visi, statistik, 3 prinsip kerja)
    └── contact.html             # Halaman Kontak & Form pesan WhatsApp otomatis
```

---

## 2. Pemetaan File & Komponen

| Halaman / Fitur | File Laravel Asli (Blade / Controller) | File Statis Baru (HTML / JS) | Keterangan & Penyesuaian |
| :--- | :--- | :--- | :--- |
| **Home / Beranda** | `resources/views/home.blade.php`<br>`HomeController.php` | `index.html` | Hero header, dynamic promo modal, auto-slider portofolio & marketplace preview, testimonial carousel, trust badges. |
| **Portofolio** | `resources/views/portofolio/index.blade.php`<br>`PortofolioController.php` | `pages/portofolio.html` | Filter kategori dinamis, live search, counter item, fullscreen lightbox zoom modal. |
| **Marketplace** | `resources/views/marketplace/index.blade.php`<br>`MarketplaceController.php` | `pages/marketplace.html` | Sidebar filter kategori, pencarian produk, pengurutan (Terbaru, Populer, Harga), pagination grid. |
| **Detail Produk** | `resources/views/products/show.blade.php`<br>`ProductController.php` | `pages/product-detail.html?id=:id` | Auto-slide preview galeri, collapsible description, paket layanan & software badges, spesifikasi lengkap, carousel produk serupa. |
| **Paket Layanan** | `resources/views/services/index.blade.php`<br>`ServiceController.php` | `pages/services.html` | 9 kartu paket layanan dengan checklist benefit, tautan contoh implementasi, dan tombol direct pesan WA. |
| **Tentang Kami** | `resources/views/about.blade.php` | `pages/about.html` | Profil studio, visi kerja, kartu statistik (20+ portofolio, 8 kategori, 9 paket layanan, rating 5.0), dan prinsip kerja. |
| **Kontak** | `resources/views/contact.blade.php`<br>`ContactController.php` | `pages/contact.html` | Saluran resmi (WA 0851-6817-4679, Email, Jam Operasional, Shopee, Fiverr, Lynk.id) dan formulir pembuat chat WA otomatis. |
| **Header & Navbar** | `resources/views/components/navbar.blade.php` | Komponen Header terintegrasi di setiap file HTML + `assets/js/main.js` | Frosted glass effect saat scroll, active indicator, mobile drawer, translate switcher. |
| **Footer** | `resources/views/components/footer.blade.php` | Komponen Footer terintegrasi di setiap file HTML | Tautan cepat, channel marketplace, informasi kontak resmi studio, hak cipta. |
| **Keamanan & Proteksi** | `resources/views/components/asset-protection.blade.php` | `assets/js/security.js` | Anti inspect element / DevTools shortcut (F12, Ctrl+Shift+I/J/C), anti right-click, anti PrintScreen & copy. |
| **Multi Bahasa** | `resources/views/components/google-translate.blade.php` | `assets/js/translate.js` | Google Translate switcher (ID / EN) dengan sinkronisasi cookie & localStorage. |

---

## 3. Fitur Interaktif Frontend

1. **Database Statis Berbasis JavaScript (`assets/js/data.js`)**:
   - Seluruh data kategori, produk/jasa, galeri foto, software tools, paket layanan, testimoni, promo, dan konfigurasi studio dimuat secara modular.
   - Dilengkapi helper functions: `getProductById()`, `getCategoryById()`, `getProductsByCategory()`, `getRelatedProducts()`, `getLatestProducts()`.

2. **Detail Produk Fleksibel Melalui Query String**:
   - URL: `pages/product-detail.html?id=1` s/d `?id=20`.
   - Data otomatis diproses oleh fungsi `initProductDetailPage('../')` di `assets/js/app-pages.js`.

3. **Generator Pesan WhatsApp Interaktif**:
   - Mengubah submit formulir kontak menjadi format teks WhatsApp yang terstruktur dan langsung membuka aplikasi WhatsApp tujuan secara instan.

4. **Kemandirian Penuh (Standalone)**:
   - Dapat dibuka langsung via browser atau di-host di platform web statis mana pun (GitHub Pages, Vercel, Netlify, Cloudflare Pages, Nginx, Apache) tanpa memerlukan PHP runtime atau MySQL server.
