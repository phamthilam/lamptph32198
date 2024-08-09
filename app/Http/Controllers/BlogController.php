<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog(){
        return view('admin.blog.create');
    }
    public function addPostBlog(BlogRequest $request) {
        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'category'=>$request->category,
        ];
        Blog::query()->create($data);
        return view('admin.blog.create');
    }
}
