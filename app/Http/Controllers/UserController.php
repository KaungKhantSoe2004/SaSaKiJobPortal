<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

// userList
public function userList(Request $request)
{

    $data = User::when($request->key , function($query){
        $key = request('key');
        $query->where('name','like','%'.$key.'%');
    })
    ->where("role",'user')->paginate(8);
    // dd($data->toArray());
    return view('layouts.admin.userList',compact('data'));
}

// toAdmin
public function userToAdmin(Request $request){
    $id = $request->id;
    User::where("id",$id)->update(['role'=>'admin']);
    return redirect()->route("admin#userList")->with(['userPromoted'=> "user Roll .".$id." account promoted to admin"]);
}



}
