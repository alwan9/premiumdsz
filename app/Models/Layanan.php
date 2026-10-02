<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $primaryKey = 'Id_Layanan';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Id_produk',
        'Nama_layanan',
        'Benefit',
        'Des_layanan',
    ];

    public function produkDigital(): HasMany
    {
        return $this->hasMany(ProdukDigital::class, 'Id_layanan', 'Id_Layanan');
    }

    public function produk(): BelongsTo
    {
        return $this->belongsTo(ProdukDigital::class, 'Id_produk', 'Id_produk');
    }
}
