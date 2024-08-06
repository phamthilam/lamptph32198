<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function detailPro($id)
    {
        $product = Product::query()->with('variants')->where('id', $id)->first();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();

        return view('client.detailpro', compact('product', 'colors', 'sizes'));
    }
}
