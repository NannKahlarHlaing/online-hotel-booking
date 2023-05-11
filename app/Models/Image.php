<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'roomType_id'];
     public function room_type()
     {
       return $this->belongsTo('App\Models\RoomType', 'id');
     }
}
