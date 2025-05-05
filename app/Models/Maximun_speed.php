<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Product;

class Maximun_speed extends Model
{
    public function productos()
    {
        return $this->hasMany(Producto::class, 'maximun_speed_id');
    }
}
