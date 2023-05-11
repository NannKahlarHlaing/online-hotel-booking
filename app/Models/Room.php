<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_no', 'roomType_id', 'status'];

    public function room_type(){
        return $this->belongTo('App\Models\RoomType', 'id');
    }
}
