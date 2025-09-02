<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AlmacenProducto extends Model
{
    //
    protected $table = 'productos_almacenes';

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id');
    }
    public function almacen(): BelongsTo
    {
        return $this->belongsTo(Almacen::class, 'id');
    }
}
