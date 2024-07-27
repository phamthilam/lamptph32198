<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function listSize(){
        return view('admin.Size.index');
    }
    public function addSize(){
        return view('admin.Size.add');
    }
    public function editSize(){
        return view('admin.Size.edit');
    }
}
