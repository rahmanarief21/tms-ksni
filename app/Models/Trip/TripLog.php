<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripLog extends Model
{
    use HasFactory;

    public function detailLogs()
    {
        return $this->hasMany(TripLogDetail::class);
    }
}
