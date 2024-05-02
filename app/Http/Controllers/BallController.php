<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\User;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BallController extends Controller
{

    // direct profile Page
    public function profilePage(){
        $data = AppliedJob::select("applied_jobs.*",'listed_jobs.companyName','listed_jobs.position', 'listed_jobs.location', 'listed_jobs.CompanyLogo as img')
        ->join('listed_jobs','applied_jobs.job_id','listed_jobs.id')
        ->where("client_id",Auth::user()->id)->paginate(9);
// dd($data->toArray());
        return view("layouts.profilePage",compact(['data']));
    }
    // direct edit Profile Page
    public function editProfilePage(){
        return view("layouts.editProfilePage");
    }
// direct edit password page
public function editPasswordPage(){
    return view("layouts.editPassword");
}






// edit Profile
    public function editProfile( Request $request){
      $data = $this->getUpdatableData($request);
if($request->hasFile("img")){
    if(Auth::user()->img !== null){
        // dd(Auth::user()->img);
        Storage::delete("public/".Auth::user()->img);
    }
$path =uniqid()."kks".$request->file("img")->getClientOriginalName();
$request->file("img")->storeAs("public/".$path);
$data['img']= $path;
}
$id = Auth::user()->id;
User::where("id",$id)->update($data);
return redirect()->route("profilePage");
    }
    private function getUpdatableData($request){
        $validatingRules = [
  "name" => ["required"],
  "email" => ["email", 'required'],
  "phone"=> ["required"],
  "gender" => ["required"],
        ];
        Validator::make($request->all(),$validatingRules)->validate();
        return [
            "name" => $request->name,
            "email"=> $request->email,
            "phone"=> $request->phone,
            "gender"=> $request->gender,
        ];
    }



    // updatePassword
    public function updatePassword(Request $request){
        // dd($request->all());
        $oldPassword = $request->oldPassword;
       $password = Auth::user()->password;
       if(!Hash::check($oldPassword, $password)){
        return redirect()->route("editPasswordPage")->with(['oldPasswordFail'=> "Your password dones not match."]);
       }
        $data = $this->getUpdatablePassword($request);
       User::where('id', Auth::user()->id)->update($data);
       return redirect()->route("profilePage")->with(['passwordChanged'=> "User Password Changed"]);
    }


    private function getUpdatablePassword($request){
$validatingRules = [
    "oldPassword"=> ["required"],
    "newPassword"=> ['required', 'same:confirmPassword', 'min:10', 'max:15'],
    'confirmPassword'=> ['required','same:newPassword']
];
Validator::make($request->all(),$validatingRules)->validate();
return [
    'password'=> Hash::make($request->newPassword)
];
    }
}
