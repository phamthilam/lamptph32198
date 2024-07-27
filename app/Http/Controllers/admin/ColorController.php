<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function listColor(){
        return view('admin.color.index');
    }
    public function addColor(){
        return view('admin.color.add');
    }
    public function editColor(){
        return view('admin.color.edit');
}
}
