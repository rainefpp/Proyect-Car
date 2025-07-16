<?php

namespace App\Models;
use app\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    public function productos()
    {
        return $this->hasMany(Producto::class, 'transmission_id');
    }
}
