<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio';

    protected $fillable = [
        'nama',
        'kategori',
        'url',
        'deskripsi',
    ];

    protected $appends = [
        'image_url',
    ];

    /**
     * Get full image asset URL.
     */
    public function getImageUrlAttribute(): string
    {
        if (empty($this->url)) {
            return asset('assets/other/logo_warna.png');
        }

        if (str_starts_with($this->url, 'http://') || str_starts_with($this->url, 'https://')) {
            return $this->url;
        }

        if (str_starts_with($this->url, 'assets/')) {
            return asset($this->url);
        }

        return asset('assets/portofolio/'.ltrim($this->url, '/'));
    }
}
