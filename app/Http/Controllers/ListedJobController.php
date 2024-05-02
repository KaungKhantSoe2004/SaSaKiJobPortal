<?php

namespace App\Http\Controllers;

use App\Models\UserView;
use App\Models\ListedJob;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ListedJobController extends Controller
{
    public function PostJob(Request $request){
//  dd($request->all());

$ValidatingRules = [
    "companyName"=> "required",
    "position"=> "required",
    "description"=> "required",
    "location"=>"required",
    "salary"=>"required",
    "vacancy"=>"required",
    "experience"=>"required",
    "deadLine"=>"required",
    "gender"=>"required",
    "type"=>"required",
    "CompanyLogo"=>'required|image|mimes:jpeg,jpg,png,gif',
];
// dd('u');
Validator::make($request->all(), $ValidatingRules)->validate();
// dd('ik');
// $ValidatingRules = [
//     "companyName"=>"required",
//     "position"=>"required",
//     "salary"=> "required",
//     "vacancy"=>"required",
//     "experience"=> "required",
//     "deadLine"=>"required",
//     "location"=>"required",
//     "gender"=>"requried",
//     "type"=> "requried",
//     "description"=> "required",
//     "CompanyLogo"=> "required"
// ];
        $fileName =uniqid()."kks".$request->file("CompanyLogo")->getClientOriginalName();
        // $path = $request->file("CompanyLogo")->storeAs("images", $fileName, 'public');
        $request->file("CompanyLogo")->storeAs('public', $fileName );

$data = $this->postPrivateJob($request, $fileName);
// dd($request->toArray());
ListedJob::create($data);
return redirect("/");
    }

public function GetEachAboutJob($id){
$data = ListedJob::where("id", "$id")->first();
$userId = Auth::user()->id;
$postId = $id;
$newData  =[
    'user_id'=>$userId,
    'post_id'=>$postId
];

UserView::create($newData);
$views = UserView::where('post_id',$postId)->get()->count();
$appliedJob = AppliedJob::where('client_id',$userId)->where('job_id',$id)
->first();
$boo= true;
if($appliedJob === null){
    $boo = false;
}

    return view("layouts.AboutJobFromClient", compact(['data','views','boo']));
}

// applyJob
public function applyJob(){
    $job_id = request('id');
    $client_id = Auth::user()->id;
    $data = ['job_id'=>$job_id,
    'client_id'=> $client_id,
    'status'=> 'waiting',
    'fav'=>'any'
];
AppliedJob::create($data);
return back()->with(['applied'=> "Job Applied"]);
}

public function ReturnToHome(){
    return redirect("/");
}

public function GetAllListedJob(Request $request){
    $jobs = ListedJob::when($request->all() !== [],function($query){
        $query->where('position','like','%'.request('title').'%')
        // ->orWhere('companyName','like','%'.request('title').'%')
        ->where("location",'like','%'.request('location').'%')
        ->where('type','like','%'.request('type').'%');
       })
       ->paginate(3);
    // dd($jobs);
    return view("layouts.allListedJob", compact("jobs"));
}

private function postPrivateJob($request, $path){

    return[
"companyName"=> $request->companyName,
"position"=> $request->position,
"Description"=>$request->description,
"location"=> $request->location,
"salary"=>$request->salary,
"vacancy"=>$request->vacancy,
"experience"=>$request->experience,
"deadline"=> $request->deadLine,
"gender"=>$request->gender,
'type'=> $request->type,
'CompanyLogo'=> $path
    ];
}

// admin
// admin#mailList
public function jobList(Request $request){
 $data =    ListedJob::when(request('key'),function($query){
        $query->orWhere("companyName", 'like', '%'.request('key')."%")
        ->orWhere("position", 'like', '%'.request('key')."%")
        ->orWhere("type", 'like', '%'.request('key')."%")
        ->orWhere("location", 'like', '%'.request('key')."%");
    })
    ->paginate(8);
return view('layouts.admin.jobList',compact(['data']));

}
public function addJobPage(){
    return view('layouts.admin.addJob');
}

// addJob
public function addJob(Request $request){
    // dd($request->all());
    $data = $this->getInsertableData($request);
    if($request->file('img')!==null){
        $path = uniqid().'kksBlog'.$request->file("img")->getClientOriginalName();
    $request->file('img')->storeAs('public',$path);
    $data["CompanyLogo"]= $path;
    }
    $data['type']= "progress";
    // dd($data);
    ListedJob::create($data);
    return redirect()->route('admin#jobList')->with(['created'=> "One Job Created"]);
}
private function getInsertableData($request){
    $ValidatingRules = [
        'companyName'=> ['required'],
        'position'=> ['required'],
        'location'=> ['required'],
        'salary'=> ['required'],
        'vacancy'=> ['required'],
        'deadline'=> ['required'],
        'gender'=> ['required'],
        'description'=> ['required'],
        'img'=> ['required', 'mimes:jpeg,jpg,png,gi'],
    ];
    Validator::make($request->all(),$ValidatingRules)->validate();
    return [
        'companyName'=> $request->companyName,
        'position'=> $request->position,
        'location'=> $request->location,
        'salary'=> $request->salary,
        'vacancy'=> $request->vacancy,
        'deadline'=>$request->deadline,
        'experience'=> $request->experience,
        'gender'=> $request->gender,
        'Description'=> $request->description,

    ];
}

// deleteJob
public function deleteJob(Request $request){
    $id = $request->id;
    $previousImg = ListedJob::where("id",$id)->first()->CompanyLogo;
    if($previousImg !== null){
    Storage::delete('public/'.$previousImg);
    }
    ListedJob::where("id",$id)->delete();
    return redirect()->route("admin#jobList")->with(['deleted'=> 'One Job Deleted']);
}

// edit job
public function jobEditPage(Request $request){
    $id = $request->id;
    $data = ListedJob::where("id",$id)->first();
    return view('layouts.admin.editJob',compact(['data']));
}

// jobUpdate
public function jobUpdate(Request $request){
 $data = $this->getInsertableData($request);
 $data['type']= $request->type;
 $id = $request->id;
 if($request->file('img') !== null){

    $previousImg = ListedJob::where("id",$id)->first()->CompanyLogo;
    if($previousImg !== null){
    Storage::delete('public/'.$previousImg);
    }
    $path = uniqid().'kksBlog'.$request->file("img")->getClientOriginalName();
    $request->file('img')->storeAs('public',$path);
    $data["CompanyLogo"]= $path;
 }
ListedJob::where("id",$id)->update($data);
return redirect()->route('admin#jobList')->with(['updated'=> "Job Updated"]);
}

// jobDetails
public function jobDetails(Request $request){
    $id = $request->id;
    $applicants = AppliedJob::select('applied_jobs.*','users.name','users.email','users.phone','users.gender','users.img','users.age','users.jobs_filled' )
   ->join('users','applied_jobs.client_id','users.id')
    ->where('job_id',$id)
    ->where('status','waiting')
    ->paginate(8);

  $data = ListedJob::where("id",$id)->first();
  return view("layouts.admin.jobDetails",compact(['data','applicants']));
}

}
