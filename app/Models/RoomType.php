<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'occupancy', 'bed', 'size', 'price', 'description', 'facilities'];

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'roomType_id');
    }

    public function rooms()
    {
        return $this->hasMany('App\Models\Room', 'roomType_id');
    }
}
