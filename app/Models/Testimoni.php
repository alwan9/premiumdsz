<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $primaryKey = 'Id_testimoni';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Judul',
        'Foto_url',
    ];

    protected $appends = [
        'image_url',
        'display_title',
    ];

    public function getImageUrlAttribute(): string
    {
        if (empty($this->Foto_url)) {
            return asset('assets/testimoni/6cbaeec1-2b90-4301-bbf6-20f37fc48781_0000s_0000_6cbaeec1-2b90-4301-bbf6-20f37fc48781Artboard_1.jpg');
        }

        if (str_starts_with($this->Foto_url, 'http://') || str_starts_with($this->Foto_url, 'https://')) {
            return $this->Foto_url;
        }

        if (str_starts_with($this->Foto_url, 'assets/')) {
            return asset($this->Foto_url);
        }

        return asset('assets/testimoni/'.$this->Foto_url);
    }

    public function getDisplayTitleAttribute(): string
    {
        return $this->Judul ?? 'Testimoni Klien';
    }
}
