<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppliedJobController extends Controller
{
    //deleteAppliedJob
    public function deleteAppliedJob(Request $request){
        $id = $request->id;
        $userId = $request->client_id;
        $companyName = $request->companyName;
        // dd($id,$userId);
        $data = [
            'user_id'=> Auth::user()->id,
            'type'=> 'reply',
            'subject'=> "Job rejected by".$companyName,
            'description'=> "Sorry, customer the admins rejected your applicant form",
            'to'=> $userId
        ];
        // dd($data);
        Email::create($data);
        AppliedJob::where('id',$id)->delete();
        return back()->with(['applicantDeleted'=> "One Job Applicant Deleted"]);
    }

    // acceptAppliedJob
    public function acceptAppliedJob(Request $request){
        $id = $request->id;
        $userId = $request->client_id;
        $companyName = $request->companyName;
        // dd($id,$userId);
        $data = [
            'user_id'=> Auth::user()->id,
            'type'=> 'reply',
            'subject'=> "Job accepted by".$companyName,
            'description'=> "Congrulations, Customer We have accepted your job Application",
            'to'=> $userId
        ];
        // dd($data);
        Email::create($data);
        $acceptData = [
            'status'=> 'accepted'
        ];
        AppliedJob::where('id',$id)->update($acceptData);
        return back()->with(['applicantAccepted'=> "One Job Applicant Accepted"]);
    }

    // user
    public function deleteAppliedJobUser(Request $request){
        $id = $request->id;
       AppliedJob::where("id",$id)->delete();
       return redirect()->route('profilePage');
    }
}
