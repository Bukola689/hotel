<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $guaeded = [];

    protected $fillable = ['name','d_o_b','gender','phone_number','image','email','speciality','address'];
}
