<?php

namespace App\Models\Trip;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function logs()
    {
        return $this->hasMany(TripLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
