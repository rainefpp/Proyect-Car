<?php

namespace App\Models;
use app\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Displacement extends Model
{
    public function productos()
    {
        return $this->hasMany(Producto::class, 'displacement_id');
    }
}
