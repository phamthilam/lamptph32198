<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
   public function listUser(){
    $listUser=User::query()->paginate(5);
    return view('admin.users.index',compact('listUser'));
   }
   public function addUser(){
   return  view('admin.users.add');
   }
   public function addPostUser(Request $request){
    $data=[
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'phone'=>$request->phone,
        'password'=>$request->password,
    ];
    User::query()->create($data);
    return redirect()->route('admin.user.listUser');
   }
public function editUser($id){
    $user=User::query()->findOrFail($id);
    return view('admin.users.edit',compact('user'));
}
public function editPostUser($id,EditUserRequest $request){
    $user=User::query()->findOrFail($id);
    $data=[
        'name'=>$request->name,
        'email'=>$request->email,
        'address'=>$request->address,
        'phone'=>$request->phone,
        'type'=>$request->type,
    ];
    $user->update($data);
    return back();
}

   public function deleteUser($id){
    $user=User::query()->findOrFail($id);
    $user->delete();
    return redirect()->route('admin.user.listUser');
   }
   
}
