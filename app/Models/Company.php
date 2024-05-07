<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $fillable = [
        'code',
        'name',
        'address',
        'contactno',
        'headerlogo',
        'footerlogo',
        'simplelogo',
        'isdefault',
        'isactive',
    ];

    protected $casts = [
        'isdefault' => 'boolean',
        'isactive' => 'boolean',
    ];
}
