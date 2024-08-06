<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'product_variant_id',
        'quatity',
        'product_name',
        'product_img_thumbnail',
        'product_price',
        'variant_size_name',
        'variant_color_name',
    ];
}
