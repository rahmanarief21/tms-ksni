<?php

namespace App\Models\Car;

use App\Models\Trip\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
    
}
