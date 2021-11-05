<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    
}
