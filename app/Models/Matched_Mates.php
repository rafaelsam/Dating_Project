<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matched_Mates extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_phone',
        'user_location',
        'soulmate_name',
        'soulmate_phone',
        'soulMate_location'     
    ];
}