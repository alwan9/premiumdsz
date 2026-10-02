<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $primaryKey = 'Id_setting';

    const CREATED_AT = 'Created_at';

    const UPDATED_AT = 'Update_at';

    protected $fillable = [
        'Judul',
        'Deskripsi',
    ];
}
