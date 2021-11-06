<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'community_id',
        'passport_copy',
        'visa_copy',
        'unit_number',
    ];
}
