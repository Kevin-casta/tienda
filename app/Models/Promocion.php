<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promocion extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
