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
}
