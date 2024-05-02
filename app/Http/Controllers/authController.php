<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //
    public function dashboard(){
        // return "<h2>ok pr</h2>";
 if(Auth::user()->role === "admin"){
    // dd(Auth::user()->role);
return redirect()->route("admin#adminList");
 } else if(Auth::user()->role === "user"){
    // dd(Auth::user()->role);
    return redirect()->route("getClient");
 }

    }
}
