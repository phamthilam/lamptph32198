<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showLogin(){
        return view('client.login');
    }
    public function showHome(){
        return view('client.home');
    }
}
