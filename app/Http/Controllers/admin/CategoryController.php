<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
        $listCate=category::query()->get();
        return view('admin.category.index',compact('listCate'));
    }
    public function addCategory(){
        return view('admin.category.add');
    }
    public function addPostCategory(Request $request){
        $data=[
            'name'=>$request->name
        ];
        category::query()->insert($data);
        return redirect()->route('admin.category.listCategory');
    }
    public function editCategory($id){
        $cate=category::query()->findOrFail($id);
        return view('admin.category.edit',compact('cate'));
    }
    public function editPostCategory(Request $request,$id){
        $cate=category::query()->findOrFail($id);
        $data=[
            'name'=>$request->name
        ];
        $cate->update($data);
        return redirect()->route('admin.category.listCategory');
    }
    public function deleteCate($id){
        $cate=category::query()->findOrFail($id);
        $cate->delete();
        return redirect()->route('admin.category.listCategory');
    }
}
