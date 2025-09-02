<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Model
{
    use HasApiTokens;
    
    protected $table = 'clients';
    protected $fillable = ['Nombre'];

    public function producto(): HasMany
    {
        return $this->hasMany(ClienteProducto::class, 'idCliente');
    }
  
}
