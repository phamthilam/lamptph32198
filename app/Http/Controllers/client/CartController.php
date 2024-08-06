<?php

namespace App\Http\Controllers\client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVarisant;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function list() {
        $cart = session('cart');

        $totalAmount = 0;
        if (!empty($cart)) {
             foreach ($cart as $item) {
            $totalAmount += $item['quantity'] * $item['price'];
        }
        }
       

        return view('client.cart', compact('totalAmount'));
    }
    public function add(){
        $userName = session('name');
        if ($userName) {
             $product = Product::query()->findOrFail(\request('product_id'));
        $productVariant = ProductVarisant::query()
            ->with(['color', 'size'])
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
            ])
            ->firstOrFail();

        if (!isset( session('cart')[$productVariant->id] ) ) {
            $data = $product->toArray()
                + $productVariant->toArray()
                + ['quantity' => \request('quantity')];

            session()->put('cart.' . $productVariant->id,  $data);
        } else {
            $data = session('cart')[$productVariant->id];
            $data['quantity'] = \request('quantity');

            session()->put('cart.' . $productVariant->id,  $data);
        }

        return redirect()->route('list');
        } else{
            return redirect()->route('showLogin')->with([
                'message'=>'Bạn phải đăng nhập trước khi mua'
            ]);;
        }
      
    }
    public function checkout(){
       return view('client.checkout');
    }
    
}
