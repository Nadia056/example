<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    //
    protected $table= 'products';
    protected $fillable = ['nombre', 'descripcion', 'cantidad', 'precio'];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(ClienteProducto::class, 'idProducto');
    }

}
