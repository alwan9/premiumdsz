<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo';

    protected $primaryKey = 'Id_promo';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Judul',
        'Foto_promo',
        'Url_promo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'image_url',
        'target_url',
    ];

    /**
     * Get image URL for promo banner.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->Foto_promo)) {
            return asset('assets/other/logo_warna.png');
        }

        if (str_starts_with($this->Foto_promo, 'http://') || str_starts_with($this->Foto_promo, 'https://')) {
            return $this->Foto_promo;
        }

        if (str_starts_with($this->Foto_promo, 'assets/')) {
            return asset($this->Foto_promo);
        }

        return asset('assets/promo/'.ltrim($this->Foto_promo, '/'));
    }

    /**
     * Get resolved target URL for promo action.
     */
    public function getTargetUrlAttribute(): string
    {
        if (! empty($this->Url_promo)) {
            return $this->Url_promo;
        }

        $defaultMessage = rawurlencode('Halo Premium Design, saya ingin klaim promo: '.($this->Judul ?? 'Promo Spesial'));

        return 'https://api.whatsapp.com/send/?phone=6285168174679&text='.$defaultMessage;
    }
}
