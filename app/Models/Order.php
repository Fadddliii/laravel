<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'address',
        'quantity',
        'product_name',
        'total_price',
    ];
}
