<?php

namespace App\Models\Place;

use App\Models\Trip\TripLogDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function logInPlace()
    {
        return $this->hasMany(TripLogDetail::class);
    }
}
