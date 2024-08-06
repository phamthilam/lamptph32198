<?php

namespace App\Http\Controllers\client;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class OrderController extends Controller
{
   public function save(Request $request) {
    $totalAmount = 0;
    $dataItem = [];
    foreach (session('cart') as $variantID => $item) {
        $totalAmount += $item['quantity'] * ($item['price']);

        $dataItem[] = [
            'product_variant_id' => $variantID,
            'quatity' => $item['quantity'],
            'product_name' => $item['name'],
            'product_image' => $item['image'],
            'product_price' => $item['price'],
            'variant_size_name' => $item['size']['name'],
            'variant_color_name' => $item['color']['name'],
        ];
    }
    $userid=User::query()->where('email',$request->user_email)->firstOrFail();
    
    
    $order = Order::query()->create([
        'user_id' => $userid->id,
        'user_name' => \request('user_name'),
        'user_email' => \request('user_email'),
        'user_phone' => \request('user_phone'),
        'user_address' => \request('user_address'),
        'total_price' => $totalAmount,
    ]);

    foreach ($dataItem as $item) {
        $item['order_id'] = $order->id;

        OrderItem::query()->create($item);
    };

session()->forget('cart');
return redirect()->route('showShop');
 }
}
