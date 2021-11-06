<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_en', 'name_gr', 'area', 'location_longitude', 'location_latitude', 'image_url', 'status', 'readness_percentage'];

    public function properties()
    {
        return $this->hasMany(Property::class, 'community_id', 'id');
    }
}