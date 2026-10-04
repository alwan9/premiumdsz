<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'Id_kategori';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Nama_kategori',
        'Des_kategori',
    ];

    public function produkDigital(): HasMany
    {
        return $this->hasMany(ProdukDigital::class, 'Id_kategori', 'Id_kategori');
    }

    /**
     * Get contextual Iconify icon for the category.
     */
    public function getIconNameAttribute(): string
    {
        $name = strtolower($this->Nama_kategori ?? '');

        return match (true) {
            str_contains($name, 'banner') || str_contains($name, 'spanduk') => 'lucide:flag',
            str_contains($name, 'pack') || str_contains($name, 'kemasan') || str_contains($name, 'box') || str_contains($name, 'pouch') => 'lucide:package',
            str_contains($name, 'logo') || str_contains($name, 'brand') => 'lucide:award',
            str_contains($name, 'ui') || str_contains($name, 'ux') || str_contains($name, 'web') || str_contains($name, 'app') => 'lucide:layout',
            str_contains($name, 'label') || str_contains($name, 'stiker') || str_contains($name, 'sticker') => 'lucide:tags',
            str_contains($name, 'jersey') || str_contains($name, 'apparel') || str_contains($name, 'kaos') || str_contains($name, 'baju') => 'lucide:shirt',
            str_contains($name, 'foto') || str_contains($name, 'ai') || str_contains($name, 'redesain') => 'lucide:wand-2',
            str_contains($name, 'poster') || str_contains($name, 'flyer') || str_contains($name, 'brosur') => 'lucide:file-text',
            str_contains($name, 'ppt') || str_contains($name, 'dokumen') || str_contains($name, 'cv') || str_contains($name, 'presentasi') => 'lucide:presentation',
            default => 'lucide:palette',
        };
    }
}
