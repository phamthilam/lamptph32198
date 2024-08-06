<?php

namespace App\Http\Controllers\client;

use App\Models\User;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{

    public function showlogin(){
        return view('client.login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt([ 
            'email'=>$request->email,
            'password'=>$request->password,

        ])) {
            $user = Auth::user();
            session(['name' => $user->name]);
           
            //dang nhap thanh cong
            if(Auth::user()->type=='admin'){
                return redirect()->route('admin.products.listProducts');
            } else  {
                return redirect()->intended('/');
            }
            
        } else{
            //dawng nhap that bai
            return redirect()->back()->with([
                'message'=>'email hoặc pasword không đúng'
            ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('showLogin')->with([
            'message'=>'Đăng xuất thành công'
        ]);
    }
    public function showforgotpassword()
    {
       return view('client.forgotpassword');
    }
    public function sendMail(Request $request){
        $user = User::where('email', $request->email)->first();
         $email=$request->email;
        if ($user) {
             $password=$user->password;
            Mail::to($email)->send(new ContactEmail($password));
            return redirect()->route('showLogin');
        } else {
            return redirect()->route('showforgotpassword')->with([
                'message'=>'ko tồn tại email này'
            ]);
        }
        
    }
    
}
