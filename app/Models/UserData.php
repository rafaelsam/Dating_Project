<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_phone_number',
        'user_location',
        'user_gender',
        'user_age',
        'soulMate_location',
        'soulMate_Age',
        'soulMate_gender'
    ];
}