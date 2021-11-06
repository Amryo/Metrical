<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'country',
        'city',
        'mobile_number',
        'image_url',
        'type',
        'status',
        'code',
        'email_verified_at'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tenant()
    {
        return $this->hasOne(Tenant::class, 'user_id');
    }
    public function owner()
    {
        return $this->hasOne(Owner::class, 'user_id');
    }
}
