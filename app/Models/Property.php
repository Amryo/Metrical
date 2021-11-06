<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Property extends Model
{
    use HasFactory;

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    public function rent()
    {
        return $this->hasMany(Rent::class, 'property_id', 'id');
    }
    public function amenity()
    {
        return $this->belongsToMany(Amenity::class, 'amenities_properties ', 'property_id', 'amenity_id');
    }


    public function toArray()
    {
        $name = 'name_' . strval($this->name . app()->getLocale());
        $description = 'description_' . strval($this->name . app()->getLocale());

        $rentNow = Rent::where('id', $this->id)->exists();
        return [
            'id' => $this->id,
            'name' => $this->$name,
            'description' => $this->$description,
            'area' => $this->area,
            'reference' => $this->reference,
            'feminizations' => $this->feminizations,
            'type' => $this->type,
            'offer_type' => $this->offer_type,
            'is_shortterm' => $this->is_shortterm,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'date_added' => $this->date_added,
            'address' => $this->address,
            'status' => $this->status,
            'price' => $this->price,
            'gate' => $this->gate,
            'community_id' => $this->community_id,
            'owner_id' => $this->owner_id,
            'city' => $this->city,
            'rent_now' => $rentNow,
            'current_rent' => $rentNow ? Rent::where('id', $this->id)->get() : false,
        ];
    }
}
