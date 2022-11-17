<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'userInfo_name',
        'userInfo_phone_number',
        'userInfo_location',
        'userInfo_gender',
        'userInfo_age'  
    ];
}
