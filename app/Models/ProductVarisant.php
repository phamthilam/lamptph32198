<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVarisant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_variants';
    protected $fillable = [
        'product_id',
        'product_size_id',
        'product_color_id',
        'quatity',
    ];
    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }
}
