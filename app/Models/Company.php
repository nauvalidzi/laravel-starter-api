<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'name',
        'catch_phrase',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'website',
        'latitude',
        'longitude'
    ];
}
