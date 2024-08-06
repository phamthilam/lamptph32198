<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable=[
        'category_id',
        'image', 
        'name',
        'price',
        'description',
    ];
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function variants()
    {
        return $this->hasMany(ProductVarisant::class);
    }
}
