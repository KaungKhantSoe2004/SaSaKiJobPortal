<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{



   public function getBlogs(){
    $data = Blog::get();
    $paginatedData = Blog::orderBy("id", 'asc')->paginate(6);
// dd($paginatedData->toArray()["data"]);
// $paginatedData = $paginatedData->toArray()["data"];
// return view('layouts.Blog', compact("paginatedData"));
return view("layouts.Blog", compact("paginatedData"));
    // dd($randomData->toArray());
    // dd($data->toArray());
   }

public function blogUserDetails(){
    $id = request("id");
    $data = Blog::where("id",$id)->first();

    return view("layouts.blogDetails", compact("data"));
}

   private function addBlogPrivately($request){
    $validatingRules = [
        "title" => "required|unique:blogs,title",
        "description"=> "required|min:20",
        "price"=> "required",
        "img"=> "required|mimes:jpeg,jpg,png,gi"
    ];

Validator::make($request->all(), $validatingRules )->validate();
return [
    "title"=> $request->title,
    "description"=> $request->description,
    "price"=>$request->price,

];
   }

// admin
public function blogList(){
    $data = Blog::paginate(8);
return view('layouts.admin.blogList',compact(['data']));
}

// blogAdd page
public function blogAddPage(){
    return view('layouts.admin.blogAdd');
}


// addBlog
public function addBlog(Request $request){
    $data = $this->getCreatableBlog($request);
    $path = uniqid().'kksBlog'.$request->file("img")->getClientOriginalName();
    $request->file('img')->storeAs('public',$path);
    $data["img"]= $path;
    Blog::create($data);
    return redirect()->route('admin#blogList')->with(['created'=> 'Blog Created']);
}

private function getCreatableBlog($request){
    $validatingRules = [
        'img'=>['required', 'mimes:jpeg,jpg,png,gi'],
        "title"=> ['required'],
        'description'=> ['required']
    ];
    Validator::make($request->all(),$validatingRules)->validate();
    return [
'title'=> $request->title,
'description'=> $request->description
    ];
}

// blogDelete
public function blogDelete(Request $request){
    $id = $request->id;
    $previousImg = Blog::where("id",$id)->first()->img;
if($previousImg !== null){
Storage::delete('public/'.$previousImg);
}
    Blog::where("id",$id)->delete();
    return redirect()->route('admin#blogList')->with(["deleted"=> "Blog Deleted"]);
}
// blogDetails
public function blogDetails(Request $request){
$id = $request->id;
$data = Blog::where("id",$id)->first();
return view('layouts.admin.blogDetails',compact('data'));
}
// blogEditPage
public function blogEditPage(Request $request){
    $id = $request->id;
$data = Blog::where("id",$id)->first();
return view("layouts.admin.blogEdit", compact('data'));
}
// admin#blogUpdate
public function blogUpdate(Request $request){
    // dd($request->all());
    $data = $this->getCreatableBlog($request);
    $id = $request->id;
    if($request->file('img') !== null){
        $previousImg = Blog::where("id",$id)->first()->img;
        if($previousImg !== null){
        Storage::delete('public/'.$previousImg);
        }
        $path = uniqid().'kksBlog'.$request->file("img")->getClientOriginalName();
        $request->file('img')->storeAs('public',$path);
        $data["img"]= $path;
    }
Blog::where('id',$id)->update($data);
return redirect()->route('admin#blogList')->with(['updated'=>"Blog No.(".$id.') updated']);
}

}
