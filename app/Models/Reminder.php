<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['booking_id','type','details','reminder_date', 'status'];
}
