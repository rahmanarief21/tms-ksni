<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    public $table = 'role_user';

    protected $fillable = [
        'role_id',
        'user_id'
    ];
}
