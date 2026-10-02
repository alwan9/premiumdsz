<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukDigital extends Model
{
    use HasFactory;

    protected $table = 'produk_digital';

    protected $primaryKey = 'Id_produk';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Id_kategori',
        'Id_layanan',
        'Nama_produk',
        'No_wa',
        'Stok_produk',
        'Des_produk',
    ];

    protected $appends = [
        'image_url',
        'average_rating',
        'whatsapp_link',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'Id_kategori', 'Id_kategori');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'Id_layanan', 'Id_Layanan');
    }

    public function getWhatsappLinkAttribute(): string
    {
        $phone = preg_replace('/[^0-9]/', '', $this->No_wa ?? '');
        if (empty($phone)) {
            $phone = '6285168174679';
        } elseif (str_starts_with($phone, '0')) {
            $phone = '62'.substr($phone, 1);
        }
        $message = urlencode('Halo Premium Design, saya ingin memesan jasa/produk desain: '.$this->Nama_produk);

        return "https://wa.me/{$phone}?text={$message}";
    }

    public function getAverageRatingAttribute(): float
    {
        return 5.0;
    }

    /**
     * Mappping list gambar dari folder public/assets
     */
    public static function availableAssetImages(): array
    {
        return [
            'kemasan' => [
                'kemasan1.jpg',
                'kemasan2.jpg',
                'kemasan3.jpg',
                'kemasan4.jpg',
                'kemasan5.jpg',
                'box1.jpg',
                'box2.jpg',
                'box3.jpg',
            ],
            'banner' => [
                'bannerumkm1.jpg',
                'bannerumkm2.jpg',
                'promo/bannerwhatsappartboard1copy2.jpg',
                'promo/bannerwhatsappartboard1copy3.jpg',
                'promo/bannerwhatsappartboard1copy4.jpg',
                'promo/bannerwhatsappartboard1copy5.jpg',
                'promo/bannerwhatsappartboard1copy6.jpg',
                'booth1.jpg',
                'booth2.jpg',
            ],
            'label' => [
                'labelumkm1.jpg',
                'labelumkm2.jpg',
            ],
            'dokumen' => [
                'jasacv1.jpg',
                'jasacv2.jpg',
                'jasacv3.jpg',
                'jasacv4.jpg',
                'jasappt1.jpg',
                'jasappt2.jpg',
                'jasappt3.jpg',
                'jasappt4.jpg',
            ],
            'design' => [
                'repairfoto1.jpg',
                'repairfoto2.jpg',
                'editfotonormaltostudio.jpg',
                'editfotonormaltostudio1.jpg',
                'editfotonormaltostudio2.jpg',
                'editfotonormaltostudio3.jpg',
                'editfotonormaltostudio4.jpg',
            ],
        ];
    }

    /**
     * Get image URL based on product name / category / ID
     */
    public function getImageUrlAttribute(): string
    {
        $name = strtolower($this->Nama_produk ?? '');
        $catName = strtolower($this->kategori->Nama_kategori ?? '');

        // 1. CV Lamaran
        if (str_contains($name, 'cv') || str_contains($name, 'curriculum vitae')) {
            return asset('assets/jasacv1.jpg');
        }

        // 2. PPT Presentasi
        if (str_contains($name, 'ppt') || str_contains($name, 'powerpoint') || str_contains($name, 'presentasi')) {
            return asset('assets/jasappt1.jpg');
        }

        // 3. Kemasan Box / Packing
        if (str_contains($name, 'box') || str_contains($name, 'packing') || str_contains($name, 'hampers')) {
            return asset('assets/box1.jpg');
        }

        // 4. Kemasan Plastik / Pouch / Snack
        if (str_contains($name, 'pouch') || str_contains($name, 'snack') || (str_contains($name, 'kemasan') && ! str_contains($name, 'box'))) {
            return asset('assets/kemasan2.jpg');
        }

        // 5. Booth Jualan UMKM
        if (str_contains($name, 'booth') || str_contains($name, 'gerobak')) {
            return asset('assets/booth1.jpg');
        }

        // 6. Banner Wisuda
        if (str_contains($name, 'wisuda')) {
            return asset('assets/bannerumkm2.jpg');
        }

        // 7. Banner UMKM / Spanduk
        if (str_contains($name, 'banner') || str_contains($name, 'spanduk')) {
            return asset('assets/bannerumkm1.jpg');
        }

        // 8. Label / Stiker Produk
        if (str_contains($name, 'label') || str_contains($name, 'stiker')) {
            return asset('assets/labelumkm1.jpg');
        }

        // 9. Jersey & Apparel
        if (str_contains($name, 'jersey') || str_contains($name, 'kaos') || str_contains($catName, 'jersey')) {
            return asset('assets/repairfoto2.jpg');
        }

        // 10. Redesain AI & Repair
        if (str_contains($name, 'redesain') || str_contains($name, 'ai') || str_contains($name, 'repair')) {
            return asset('assets/repairfoto1.jpg');
        }

        // 11. Editing Foto Studio
        if (str_contains($name, 'studio') || str_contains($name, 'editing foto') || str_contains($name, 'foto produk')) {
            return asset('assets/editfotonormaltostudio1.jpg');
        }

        // 12. Poster Infografis Digital
        if (str_contains($name, 'poster') || str_contains($name, 'infografis') || str_contains($catName, 'poster')) {
            return asset('assets/editfotonormaltostudio3.jpg');
        }

        // 13. UI/UX Mobile App / Website
        if (str_contains($name, 'ui') || str_contains($name, 'ux') || str_contains($name, 'figma') || str_contains($name, 'app') || str_contains($name, 'website')) {
            return asset('assets/editfotonormaltostudio2.jpg');
        }

        // 14. Logo Racing
        if (str_contains($name, 'racing')) {
            return asset('assets/editfotonormaltostudio4.jpg');
        }

        // 15. Logo & Brand Umum
        if (str_contains($name, 'logo') || str_contains($catName, 'logo')) {
            return asset('assets/editfotonormaltostudio.jpg');
        }

        return asset('assets/kemasan1.jpg');
    }

    /**
     * Gallery previews for product detail page, fully synchronized with product title
     */
    public function getGalleryUrlsAttribute(): array
    {
        $primary = $this->image_url;
        $name = strtolower($this->Nama_produk ?? '');
        $catName = strtolower($this->kategori->Nama_kategori ?? '');

        $matchedFiles = [];

        if (str_contains($name, 'cv') || str_contains($name, 'curriculum vitae')) {
            $matchedFiles = ['jasacv1.jpg', 'jasacv2.jpg', 'jasacv3.jpg', 'jasacv4.jpg'];
        } elseif (str_contains($name, 'ppt') || str_contains($name, 'powerpoint') || str_contains($name, 'presentasi')) {
            $matchedFiles = ['jasappt1.jpg', 'jasappt2.jpg', 'jasappt3.jpg', 'jasappt4.jpg'];
        } elseif (str_contains($name, 'box') || str_contains($name, 'packing')) {
            $matchedFiles = ['box1.jpg', 'box2.jpg', 'box3.jpg', 'kemasan1.jpg'];
        } elseif (str_contains($name, 'pouch') || str_contains($name, 'snack') || (str_contains($name, 'kemasan') && ! str_contains($name, 'box'))) {
            $matchedFiles = ['kemasan2.jpg', 'kemasan1.jpg', 'kemasan3.jpg', 'kemasan4.jpg', 'kemasan5.jpg'];
        } elseif (str_contains($name, 'booth') || str_contains($name, 'gerobak')) {
            $matchedFiles = ['booth1.jpg', 'booth2.jpg', 'bannerumkm1.jpg'];
        } elseif (str_contains($name, 'wisuda')) {
            $matchedFiles = ['bannerumkm2.jpg', 'promo/bannerwhatsappartboard1copy2.jpg', 'promo/bannerwhatsappartboard1copy3.jpg', 'bannerumkm1.jpg'];
        } elseif (str_contains($name, 'banner') || str_contains($name, 'spanduk')) {
            $matchedFiles = ['bannerumkm1.jpg', 'promo/bannerwhatsappartboard1copy4.jpg', 'promo/bannerwhatsappartboard1copy5.jpg', 'promo/bannerwhatsappartboard1copy6.jpg'];
        } elseif (str_contains($name, 'label') || str_contains($name, 'stiker')) {
            $matchedFiles = ['labelumkm1.jpg', 'labelumkm2.jpg'];
        } elseif (str_contains($name, 'jersey') || str_contains($name, 'kaos')) {
            $matchedFiles = ['repairfoto2.jpg', 'repairfoto1.jpg'];
        } elseif (str_contains($name, 'redesain') || str_contains($name, 'ai') || str_contains($name, 'repair')) {
            $matchedFiles = ['repairfoto1.jpg', 'repairfoto2.jpg', 'editfotonormaltostudio.jpg'];
        } elseif (str_contains($name, 'studio') || str_contains($name, 'editing foto')) {
            $matchedFiles = ['editfotonormaltostudio1.jpg', 'editfotonormaltostudio2.jpg', 'editfotonormaltostudio3.jpg'];
        } elseif (str_contains($name, 'racing')) {
            $matchedFiles = ['editfotonormaltostudio4.jpg', 'editfotonormaltostudio.jpg'];
        } elseif (str_contains($name, 'ui') || str_contains($name, 'ux') || str_contains($name, 'figma') || str_contains($name, 'website') || str_contains($name, 'app')) {
            $matchedFiles = ['editfotonormaltostudio2.jpg', 'editfotonormaltostudio3.jpg', 'editfotonormaltostudio.jpg'];
        } elseif (str_contains($name, 'poster') || str_contains($name, 'infografis')) {
            $matchedFiles = ['editfotonormaltostudio3.jpg', 'editfotonormaltostudio2.jpg', 'editfotonormaltostudio.jpg'];
        } elseif (str_contains($name, 'logo')) {
            $matchedFiles = ['editfotonormaltostudio.jpg', 'editfotonormaltostudio4.jpg'];
        } else {
            $matchedFiles = ['kemasan1.jpg', 'kemasan2.jpg', 'box1.jpg'];
        }

        $result = [];
        foreach ($matchedFiles as $f) {
            $u = asset('assets/'.$f);
            if (! in_array($u, $result)) {
                $result[] = $u;
            }
        }

        if (! in_array($primary, $result)) {
            array_unshift($result, $primary);
        }

        return $result;
    }
}
