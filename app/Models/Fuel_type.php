<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Product;
class Fuel_type extends Model
{
    public function productos()
    {
        return $this->hasMany(Producto::class, 'fuel_type_id');
    }
}
