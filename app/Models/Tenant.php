<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function rent()
    {
        return $this->hasMany(Rent::class, 'tenant_id', 'id');
    }
}
