<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['employee_id','department_id','staff_id','salary_id', 'leave_id', 'payroll_date','report','amount'];
}
