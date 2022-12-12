<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $guarded = []; 

    protected $fillable = ['department_id', 'amount', 'bonus'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
