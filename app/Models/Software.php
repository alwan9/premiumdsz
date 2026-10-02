<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Software extends Model
{
    use HasFactory;

    protected $table = 'software';

    protected $primaryKey = 'Id_software';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Nama_software',
        'Logo_url',
        'Des_software',
    ];

    protected $appends = [
        'logo_full_url',
    ];

    public function produks(): BelongsToMany
    {
        return $this->belongsToMany(ProdukDigital::class, 'produk_software', 'Id_software', 'Id_produk');
    }

    public function getLogoFullUrlAttribute(): string
    {
        if (empty($this->Logo_url)) {
            return asset('assets/other/logo_warna.png');
        }

        if (str_starts_with($this->Logo_url, 'http://') || str_starts_with($this->Logo_url, 'https://')) {
            return $this->Logo_url;
        }

        if (file_exists(public_path($this->Logo_url))) {
            return asset($this->Logo_url);
        }

        if (file_exists(public_path('assets/software/'.basename($this->Logo_url)))) {
            return asset('assets/software/'.basename($this->Logo_url));
        }

        if (file_exists(public_path('storage/'.$this->Logo_url))) {
            return asset('storage/'.$this->Logo_url);
        }

        return asset($this->Logo_url);
    }
}
