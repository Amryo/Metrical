<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function community()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }

    public function toArray()
    {

        $title = 'title_' . strval($this->name . app()->getLocale());
        $description = 'description_' . strval($this->name . app()->getLocale());

        return [
            'title' => $this->$title,
            'description' => $this->$description,
            'address' => $this->address,
            'community_id' => $this->community_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'community_id' => $this->community_id,
        ];
    }
}
