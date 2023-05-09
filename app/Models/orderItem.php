<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $fillable = [
        'orders_id',
        'proudcts_id',
        'quantity',
        'price'
    ];
}
