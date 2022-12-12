<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = []; 

    protected $fillable = ['room_number','room_type_id','ac_no_ac','food', 'bed_count','chargers_for_cancellation','rent','phone_number','file_upload','email','status'];

    public function roomtype()
    {
        return $this->hasMany(RoomType::class);
    }
}
