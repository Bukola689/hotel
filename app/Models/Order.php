<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['item_id', 'customer_id', 'cost', 'quantity', 'order_date', 'status', 'user_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
