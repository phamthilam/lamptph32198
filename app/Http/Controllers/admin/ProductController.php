<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\category;
use App\Models\ProductSize;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use App\Models\ProductVarisant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function listProducts(){
        $data=Product::query()->with(['category'])->get();
        return view('admin.products.index',compact('data'));
    }
    public function addProduct(){
        $category = category::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        return view('admin.products.add',compact('category', 'colors', 'sizes'));
    }
    public function addPostProduct(Request $request) {
        $dataProduct = $request->except(['product_variants','_token']);
        if (!empty($dataProduct['image'])) {
            $dataProduct['image'] = Storage::put('products',  $dataProduct['image']);
        }
      
       $product = Product::query()->create($dataProduct);
        $dataProductVariantsTmp = $request->product_variants;
        $dataProductVariants = [];
        foreach ($dataProductVariantsTmp as $key => $item) {
            $tmp = explode('-', $key);
            $dataProductVariants[] = [
                'product_size_id' => $tmp[0],
                'product_color_id' => $tmp[1],
                'quatity' => $item['quatity'],
                'product_id' => $product->id
            ]; 
          
        }   
        foreach ($dataProductVariants as $item) {
            ProductVarisant::query()->create($item);
        } 
            return redirect()->route('admin.products.listProducts');
          
    }
    
    public function editProduct($id){
        $product=Product::query()->findOrFail($id);
        $product->load([
            'category',
            'variants',
        ]);
        $category = category::query()->pluck('name', 'id')->all();
        $colors = ProductColor::query()->pluck('name', 'id')->all();
        $sizes = ProductSize::query()->pluck('name', 'id')->all();
        return view('admin.products.edit',compact('product','category','colors','sizes'));
    }
    public function upadteProduct(Request $request,$id) {
        $dataProduct = $request->except(['product_variants','_token']);
        $model=Product::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $dataProduct['image'] = Storage::put('products', $request->file('image'));

        }
        $imageCurrent=$model->image;
        $model->update($dataProduct);
        if ($request->hasFile('image') && $imageCurrent && Storage::exists($imageCurrent)) {
            Storage::delete($imageCurrent);
        }
        $dataProductVariants = $request->product_variants;
        foreach ($dataProductVariants as $key=>$item) {
            $tmp = explode('-', $key);
            $item += ['product_id' => $model->id];

            ProductVarisant::query()->updateOrCreate(
                [
                    'product_id' => $item['product_id'],
                    'product_size_id' => $tmp[0],
                    'product_color_id' =>  $tmp[1],
                ],
                $item
            );
        } 
            return back();
          
    }
    public function deleteProduct($id) {
        $variants = ProductVarisant::query()->where('product_id',$id)->get();
        // dd($variants);
        foreach ($variants as $variant) {
            // dd($variant);
            $variant->delete();
        }
        $product = Product::query()->findOrFail($id);
        $product->delete();
        return back();
    }
}
