<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClienteProducto extends Model
{
    protected $table = 'productos_cliente';
    protected $fillable = ['idCliente', 'idProducto'];


    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'id');
    }

    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class, 'id');
    }
}
