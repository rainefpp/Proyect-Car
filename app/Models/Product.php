<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lunar\Models\Product as LunarProduct;
use app\Models\Maximun_speed;
use app\Models\Displacement;
use app\Models\Fuel_type;
use app\Models\Transmission;

class Product extends LunarProduct
{
    use HasFactory;

    public function maximunSpeed()
    {
        return $this->belongsTo(MaximunSpeed::class, 'maximun_speed_id');
    }

    public function displacement()
    {
        return $this->belongsTo(Displacement::class, 'displacement_id');
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }

    public function transmission()
    {
        return $this->belongsTo(Transmission::class, 'transmission_id');
    }
}
