<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool{
        return $this->isactive;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'isactive',
        'empid',
        'uniqueid', // Assuming you want this to be mass assignable
        'gender',
        'idcard',
        'phone',
        'email', // Assuming there's an 'email' column (not included in the schema)
        'POB',
        'DOB',
        'address',
        'joindate',
        'companyid',
        'photo', // Assuming photo storage is handled outside the model
        'isadmin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'DOB' => 'date',
        'joindate' => 'date',
        'isadmin' => 'boolean',
    ];
}
