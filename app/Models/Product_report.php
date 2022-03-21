<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_report extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_type',
        'quantity',
        'price',
        'section',
        'in_out',
    ];

}
