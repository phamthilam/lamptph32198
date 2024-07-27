<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if (Auth::user()->type=='admin') {
             return $next($request);   // route ddc di tiep
            } else{
                return redirect()->route('showLogin')->with([
                    'message'=>'Bạn không có quyền'
                ]); 
            }
        } else{
            return redirect()->route('showLogin')->with([
                'message'=>'bạn phải đăng nhập trước'
            ]);
        }
    }
}
