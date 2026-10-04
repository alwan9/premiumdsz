<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'Estimasi',
        'Des_produk',
    ];

    protected $appends = [
        'custom_id',
        'image_url',
        'average_rating',
        'whatsapp_link',
    ];

    public function getCustomIdAttribute(): string
    {
        return 'JS-'.str_pad((string) $this->Id_produk, 4, '0', STR_PAD_LEFT);
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'Id_kategori', 'Id_kategori');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'Id_layanan', 'Id_Layanan');
    }

    public function software(): BelongsToMany
    {
        return $this->belongsToMany(Software::class, 'produk_software', 'Id_produk', 'Id_software');
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
                'box1.jpg',
                'box2.jpg',
                'box3.jpg',
                'jasapouch_(1).jpg',
                'jasapouch_(2).jpg',
                'kemasan1.jpg',
                'kemasan2.jpg',
                'kemasan3.jpg',
                'kemasan4.jpg',
                'kemasan5.jpg',
            ],
            'banner' => [
                'bannerumkm1.jpg',
                'bannerumkm2.jpg',
                'booth1.jpg',
                'booth2.jpg',
                'xbanner_(1).jpg',
                'xbanner_(3).jpg',
                'xbanner_(4).jpg',
            ],
            'logo' => [
                'jasalogo_(1).jpg',
                'jasalogo_(2).jpg',
                'repairlogo_(1).jpg',
                'repairlogo_(2).jpg',
            ],
            'jersey' => [
                'jasajersey_(1).jpg',
                'jasajersey_(2).jpg',
                'jasajersey_(3).jpg',
            ],
            'uiux' => [
                'mobileuiux_(1).jpg',
                'mobileuiux_(2).jpg',
                'webuiux_(1).jpg',
                'webuiux_(2).jpg',
                'webuiux_(3).jpg',
                'webuiux_(4).jpg',
            ],
            'poster_flyer' => [
                'jasaflyer_(1).jpg',
                'jasaflyer_(2).jpg',
                'portofolio_Artboard_1_copy_11.jpg',
                'portofolio_Artboard_1_copy_9.jpg',
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
                'jasapowerpoint_(1).jpg',
                'jasapowerpoint_(2).jpg',
                'jasapowerpoint_(3).jpg',
                'jasapowerpoint_(4).jpg',
            ],
            'foto_ai' => [
                'editfotonormaltostudio.jpg',
                'editfotonormaltostudio1.jpg',
                'editfotonormaltostudio2.jpg',
                'editfotonormaltostudio3.jpg',
                'editfotonormaltostudio4.jpg',
                'repairfoto1.jpg',
                'repairfoto2.jpg',
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

        // 1. CV & Resume
        if (str_contains($name, 'cv') || str_contains($name, 'curriculum vitae') || str_contains($name, 'resume')) {
            return asset('assets/jasacv1.jpg');
        }

        // 2. PPT Presentasi
        if (str_contains($name, 'ppt') || str_contains($name, 'powerpoint') || str_contains($name, 'presentasi')) {
            return asset('assets/jasapowerpoint_(1).jpg');
        }

        // 3. X-Banner & Roll Banner
        if (str_contains($name, 'xbanner') || str_contains($name, 'x-banner') || str_contains($name, 'roll banner') || str_contains($name, 'roll-up')) {
            return asset('assets/xbanner_(1).jpg');
        }

        // 4. Stand Booth & Gerobak UMKM
        if (str_contains($name, 'booth') || str_contains($name, 'gerobak') || str_contains($name, 'stand booth') || str_contains($name, 'stan pameran')) {
            return asset('assets/booth1.jpg');
        }

        // 5. Banner Wisuda
        if (str_contains($name, 'wisuda')) {
            return asset('assets/bannerumkm2.jpg');
        }

        // 6. Banner UMKM & Spanduk
        if (str_contains($name, 'banner') || str_contains($name, 'spanduk')) {
            return asset('assets/bannerumkm1.jpg');
        }

        // 7. Kemasan Box / Packing
        if (str_contains($name, 'box') || str_contains($name, 'packing') || str_contains($name, 'karton') || str_contains($name, 'hampers')) {
            return asset('assets/box1.jpg');
        }

        // 8. Kemasan Standing Pouch / Snack
        if (str_contains($name, 'pouch') || str_contains($name, 'snack')) {
            return asset('assets/jasapouch_(1).jpg');
        }

        // 9. Packaging & Kemasan Produk Custom
        if (str_contains($name, 'kemasan') || str_contains($name, 'packaging')) {
            return asset('assets/kemasan1.jpg');
        }

        // 10. Label & Stiker Produk
        if (str_contains($name, 'label') || str_contains($name, 'stiker')) {
            return asset('assets/labelumkm1.jpg');
        }

        // 11. Jersey & Apparel
        if (str_contains($name, 'jersey') || str_contains($name, 'kaos') || str_contains($name, 'apparel') || str_contains($catName, 'jersey')) {
            return asset('assets/jasajersey_(1).jpg');
        }

        // 12. Editing Foto Studio
        if (str_contains($name, 'studio') || (str_contains($name, 'edit') && str_contains($name, 'foto'))) {
            return asset('assets/editfotonormaltostudio1.jpg');
        }

        // 13. Redesain Logo & Logo Racing
        if (str_contains($name, 'racing') || (str_contains($name, 'repair') && str_contains($name, 'logo')) || (str_contains($name, 'redesain') && str_contains($name, 'logo'))) {
            return asset('assets/repairlogo_(1).jpg');
        }

        // 14. Redesain AI & Repair Foto
        if (str_contains($name, 'repair foto') || str_contains($name, 'restorasi') || str_contains($name, 'gambar ai') || str_contains($name, 'redesain gambar') || (str_contains($name, 'ai') && ! str_contains($name, 'desain') && ! str_contains($name, 'logo'))) {
            return asset('assets/repairfoto1.jpg');
        }

        // 15. Logo & Brand Identity
        if (str_contains($name, 'logo') || str_contains($catName, 'logo') || str_contains($name, 'branding')) {
            return asset('assets/jasalogo_(1).jpg');
        }

        // 16. Flyer & Brosur
        if (str_contains($name, 'flyer') || str_contains($name, 'brosur') || str_contains($name, 'pamflet')) {
            return asset('assets/jasaflyer_(1).jpg');
        }

        // 17. Poster & Infografis Digital
        if (str_contains($name, 'poster') || str_contains($name, 'infografis') || str_contains($catName, 'poster')) {
            return asset('assets/portofolio_Artboard_1_copy_11.jpg');
        }

        // 18. UI/UX Mobile App
        if (str_contains($name, 'mobile') || str_contains($name, 'android') || str_contains($name, 'ios')) {
            return asset('assets/mobileuiux_(1).jpg');
        }

        // 19. UI/UX Website & Landing Page
        if (str_contains($name, 'website') || str_contains($name, 'landing') || str_contains($name, 'figma') || str_contains($catName, 'ui/ux') || str_contains($name, 'ui/ux') || str_contains($name, 'ui ux')) {
            return asset('assets/webuiux_(1).jpg');
        }

        return asset('assets/kemasan1.jpg');
    }

    /**
     * Gallery previews for product detail page, fully synchronized with product title and renamed asset files
     */
    public function getGalleryUrlsAttribute(): array
    {
        $primary = $this->image_url;
        $name = strtolower($this->Nama_produk ?? '');
        $catName = strtolower($this->kategori->Nama_kategori ?? '');

        $matchedFiles = [];

        if (str_contains($name, 'cv') || str_contains($name, 'curriculum vitae') || str_contains($name, 'resume')) {
            $matchedFiles = ['jasacv1.jpg', 'jasacv2.jpg', 'jasacv3.jpg', 'jasacv4.jpg'];
        } elseif (str_contains($name, 'ppt') || str_contains($name, 'powerpoint') || str_contains($name, 'presentasi')) {
            $matchedFiles = ['jasapowerpoint_(1).jpg', 'jasapowerpoint_(2).jpg', 'jasapowerpoint_(3).jpg', 'jasapowerpoint_(4).jpg'];
        } elseif (str_contains($name, 'xbanner') || str_contains($name, 'x-banner') || str_contains($name, 'roll banner')) {
            $matchedFiles = ['xbanner_(1).jpg', 'xbanner_(3).jpg', 'xbanner_(4).jpg'];
        } elseif (str_contains($name, 'booth') || str_contains($name, 'gerobak') || str_contains($name, 'stand')) {
            $matchedFiles = ['booth1.jpg', 'booth2.jpg'];
        } elseif (str_contains($name, 'wisuda')) {
            $matchedFiles = ['bannerumkm2.jpg', 'bannerumkm1.jpg', 'xbanner_(1).jpg'];
        } elseif (str_contains($name, 'banner') || str_contains($name, 'spanduk')) {
            $matchedFiles = ['bannerumkm1.jpg', 'bannerumkm2.jpg', 'xbanner_(3).jpg', 'xbanner_(4).jpg'];
        } elseif (str_contains($name, 'box') || str_contains($name, 'packing') || str_contains($name, 'karton') || str_contains($name, 'hampers')) {
            $matchedFiles = ['box1.jpg', 'box2.jpg', 'box3.jpg'];
        } elseif (str_contains($name, 'pouch') || str_contains($name, 'snack')) {
            $matchedFiles = ['jasapouch_(1).jpg', 'jasapouch_(2).jpg'];
        } elseif (str_contains($name, 'kemasan') || str_contains($name, 'packaging')) {
            $matchedFiles = ['kemasan1.jpg', 'kemasan2.jpg', 'kemasan3.jpg', 'kemasan4.jpg', 'kemasan5.jpg'];
        } elseif (str_contains($name, 'label') || str_contains($name, 'stiker')) {
            $matchedFiles = ['labelumkm1.jpg', 'labelumkm2.jpg'];
        } elseif (str_contains($name, 'jersey') || str_contains($name, 'kaos') || str_contains($name, 'apparel') || str_contains($catName, 'jersey')) {
            $matchedFiles = ['jasajersey_(1).jpg', 'jasajersey_(2).jpg', 'jasajersey_(3).jpg'];
        } elseif (str_contains($name, 'studio') || (str_contains($name, 'edit') && str_contains($name, 'foto'))) {
            $matchedFiles = ['editfotonormaltostudio1.jpg', 'editfotonormaltostudio2.jpg', 'editfotonormaltostudio3.jpg', 'editfotonormaltostudio4.jpg', 'editfotonormaltostudio.jpg'];
        } elseif (str_contains($name, 'repair foto') || str_contains($name, 'restorasi') || (str_contains($name, 'ai') && ! str_contains($name, 'logo')) || (str_contains($name, 'redesain') && ! str_contains($name, 'logo'))) {
            $matchedFiles = ['repairfoto1.jpg', 'repairfoto2.jpg'];
        } elseif (str_contains($name, 'racing') || (str_contains($name, 'repair') && str_contains($name, 'logo')) || (str_contains($name, 'redesain') && str_contains($name, 'logo'))) {
            $matchedFiles = ['repairlogo_(1).jpg', 'repairlogo_(2).jpg'];
        } elseif (str_contains($name, 'logo') || str_contains($catName, 'logo') || str_contains($name, 'branding')) {
            $matchedFiles = ['jasalogo_(1).jpg', 'jasalogo_(2).jpg'];
        } elseif (str_contains($name, 'flyer') || str_contains($name, 'brosur') || str_contains($name, 'pamflet')) {
            $matchedFiles = ['jasaflyer_(1).jpg', 'jasaflyer_(2).jpg'];
        } elseif (str_contains($name, 'poster') || str_contains($name, 'infografis') || str_contains($catName, 'poster')) {
            $matchedFiles = ['portofolio_Artboard_1_copy_11.jpg', 'portofolio_Artboard_1_copy_9.jpg'];
        } elseif (str_contains($name, 'mobile') || (str_contains($name, 'aplikasi') && ! str_contains($name, 'web'))) {
            $matchedFiles = ['mobileuiux_(1).jpg', 'mobileuiux_(2).jpg'];
        } elseif (str_contains($name, 'website') || str_contains($name, 'web') || str_contains($name, 'landing') || str_contains($name, 'figma') || str_contains($catName, 'ui/ux')) {
            $matchedFiles = ['webuiux_(1).jpg', 'webuiux_(2).jpg', 'webuiux_(3).jpg', 'webuiux_(4).jpg'];
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
