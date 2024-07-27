<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProducts(){
        return view('admin.products.index');
    }
    public function addProduct(){
        return view('admin.products.add');
    }
    public function editProduct(){
        return view('admin.products.edit');
    }
}
