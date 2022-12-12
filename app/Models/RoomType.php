<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = []; 

    protected $fillable = ['name'];

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
