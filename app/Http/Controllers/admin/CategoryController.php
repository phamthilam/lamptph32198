<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
        return view('admin.category.index');
    }
    public function addCategory(){
        return view('admin.category.add');
    }
    public function editCategory(){
        return view('admin.category.edit');
    }
}
