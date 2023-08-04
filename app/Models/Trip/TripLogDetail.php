<?php

namespace App\Models\Trip;

use App\Models\Place\Place;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripLogDetail extends Model
{
    use HasFactory;

    public function typeLog()
    {
        return $this->belongsTo(TripLogType::class);
    }
    
    public function logPlace()

    {
        return $this->belongsTo(Place::class);
    }
}
