<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripLogType extends Model
{
    use HasFactory;

    public function listLogs()
    {
        return $this->hasMany(TripLogDetail::class);
    }
}
