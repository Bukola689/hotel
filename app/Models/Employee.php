<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name', 'd_o_b', 'gender', 'nationality', 'state', 'phone_number', 'image','hire_date', 'email', 'address',];

}
