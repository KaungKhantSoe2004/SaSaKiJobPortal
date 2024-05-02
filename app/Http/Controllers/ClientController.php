<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\ListedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

// insert Data into database
class ClientController extends Controller
{


//     public function NewClient(Request $request){
// dd($request->all());
// dd(Auth::attempt($request()->only(["signInEmail", "signInName"])));
// if(Auth::attempt(["name"=> $request->signInName,"email"=>$request->signInEmail])){
//        dd(true);
// }
// if($request->login){
//     dd(true);
// }
// $ValidatingRules = [
//     "signInName"=> "required|min:10|unique:clients,name",
//     "signInEmail"=>  "required|email|unique:clients,email",
//     "signInAge"=> "required",
//     "signInPhone"=> "required|min:10|",
//     "signInGender"=> "required"
// ];
// Validator::make($request->all(), $ValidatingRules )->validate();
// $hashedPassword = password_hash($request->password, PASSWORD_BCRYPT);
// // dd(password_verify($request->password, $hashedPassword));

// $data = $this->postData($request);
// $data["password"]= $hashedPassword;

// Client::create($data);
// return redirect("/");
//     }

    private function postData($request){
        return [
         "name"=> $request->signInName,
         "email"=> $request->signInEmail,
         "age"=> $request->signInAge,
         "phone"=> $request->signInPhone,
         "gender"=> $request->signInGender,
         "jobs_filled"=> 0
        ];
    }


    // About Get
public function GetAbout(){
    $data = User::paginate(3);
  $jobCount = ListedJob::get()->count();

    return view("layouts.about", compact("data",'jobCount'));
}

    // client Get
    public function GetClient(Request $request){


       $data = User::paginate(3);
       $jobs = ListedJob::when($request->all() !== [],function($query){
        $query->where('position','like','%'.request('title').'%')
        // ->orWhere('companyName','like','%'.request('title').'%')
        ->where("location",'like','%'.request('location').'%')
        ->where('type','like','%'.request('type').'%');
       })
       ->paginate(5);
       $jobCount = ListedJob::get()->count();



       return view('layouts.home', compact("data", "jobs",'jobCount'));
    // return   redirect("/", compact("data"));
    //    dd($data);
    }
}
