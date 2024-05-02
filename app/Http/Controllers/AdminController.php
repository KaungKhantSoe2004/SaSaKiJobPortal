<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

// change Password
public function changePasswordPage(){
    return view("layouts.admin.changePassword");
}
public function updatePassword(Request $request){
    $HashedValue = Auth::user()->password;
    if(Hash::check($request->old, $HashedValue) ){
        $data = $this->getChangablePass($request);
        User::where('id',Auth::user()->id)->update($data);
        return redirect()->route('admin#adminList')->with(['changedPass'=> "You have successfully changed Password"]);
    }else{
        return redirect()->route('admin#changePasswordPage')->with(['noPassword'=> "The old password you filled does not match the password"]);
    }

}
private function getChangablePass($request){
    $validatingRules = [
        'old'=> ['required'],
        'new'=> ['required', 'same:confirm'],
        'confirm'=> ['required', 'same:new']
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
        'password' => Hash::make($request->new)
    ];
}

    //directd admin list
    public function adminList(){
     $data =    User::where("role","admin")->paginate(7);

        return view("layouts.admin.admin",compact('data'));
    }

    // admin Delete
    public function adminDelete(Request $request){
$id = $request->id;

$previousImg = User::where("id",$id)->first()->img;
if($previousImg !== null){
Storage::delete('public/'.$previousImg);
}
User::where("id",$id)->delete();
return redirect()->route("admin#adminList")->with(['Deleted'=> " Roll .".$id." account deleted"]);
    }


    // adminToUser
public function adminToUser(Request $request){
    $id = $request->id;
    User::where("id",$id)->update(['role'=>'user']);
    return redirect()->route("admin#adminList")->with(['adminDemoted'=> "admin Roll .".$id." account demoted to user"]);
}

// admin Edit
public function adminEdit(Request $request){
$id = $request->id;
$data = User::where("id",$id)->first();
// dd($data->toArray());
return view("layouts.admin.adminEdit", compact("data"));
}


// admin Update
public function adminUpdate(Request $request){
// dd($request->all());
    $data = $this->getUpdatableData($request);
if($request->file("img")){
    $img = $request->file('img');
$id =$request->id;
$previousImg = User::where("id",$id)->first()->img;
if($previousImg !== null){
Storage::delete('public/'.$previousImg);
}
$fileName = uniqid().'kks'.$request->file('img')->getClientOriginalName();

$img->storeAs('public',$fileName);
$data['img']= $fileName;

}
User::where("id",$request->id)->update($data);
return redirect()->route('admin#adminList')->with(['adminUpdated'=>"Updated Admin Account"]);
}
// private funciton
private function getUpdatableData($request){
$validatingRules = [
    "name"=> ["required"],
    "email"=> ['required'],
    'phone'=>['required'],
    'gender'=> ['required'],
    "age"=>['required'],
    'img'=> ['mimes:jpeg,jpg,png,gi']
];
Validator::make($request->all(),$validatingRules)->validate();
return [
    'name' => $request->name,
    'email'=> $request->email,
    'phone'=> $request->phone,
    'gender'=>$request->gender,
    'age'=> $request->age
];
}
}
