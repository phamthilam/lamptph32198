<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegister(){
        return view('client.register');
    }
    public function register(Request $request)
    {
        $check=User::where('email',$request->email)->exists();
        if (!$check) {
            if ($request->password === $request->password_confirm) {
            $data = [
            'name' => $request->name,
            'email' =>$request->email ,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
        ];
        $user=User::create($data);
        Auth::login($user);
        $request->session()->regenerate();
        
    return redirect()->intended('/');
        } else{
            return redirect()->back()->with([
                'message'=>'password không khớp'

            ]);
        }
        } else {
            return redirect()->back()->with([
                'message'=>'Email đã được đăng ký'

            ]);
        }
        
       
    }
}
