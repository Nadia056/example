<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $table = 'clients';

    public function producto(): HasMany
    {
        return $this->hasMany(ClienteProducto::class, 'idCliente');
    }
}
