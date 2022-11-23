<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'gender',
        'phone',
        'email',
        'joined',
        'bio'
    ];

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
