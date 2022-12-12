<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name', 'room_type_id','total_number','gender', 'id_card', 'checkin','checkin', 'date', 'time',' checkout','phone_number', 'email','image', 'message', 'address', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function room_type()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
