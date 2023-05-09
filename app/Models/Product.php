<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected  $table = 'proudcts';
    protected $fillable=[
        'description',
        'price',
        'product_name',
        'img',
        'categories_id'
    ];
}
