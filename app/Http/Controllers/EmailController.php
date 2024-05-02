<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    //postMails
    public function postMail(Request $request){
        if($request->subject === null || $request->description === null){

            return redirect()->route("getClient",'error')->with(['emailError'=>"You have to atleast fill subject and description."]);
                }
       $data = $this->getMail($request);
      Email::create($data);
      return redirect()->route('getClient','error')->with(['emailed'=>"You emailed admin Team successfully"]);
    }

    //
    public function replies(){
        $replies = Email::where('type','reply')
        ->where("to",Auth::user()->id)->orderBy('created_at','desc')->get();
return view("layouts.messages",compact(['replies']));
    }

//replyDelete
public function MessageDelete(Request $request){
    $id = $request->id;
    Email::where('id',$id)->delete();
    return redirect()->route('replies');
}

//ostMailContac
public function postMailContact(Request $request){
    if($request->subject === null || $request->description === null){
        return redirect()->route("contact",'error')->with(['emailError'=>"You have to atleast fill subject and description."]);
            }
   $data = $this->getMail($request);
  Email::create($data);
  return redirect()->route('contact','error')->with(['emailed'=>"You emailed admin Team successfully"]);
}

    // get data
    private function getMail($request){

return [
    'user_id'=> Auth::user()->id,
    'type'=> 'message',
    'subject'=> $request->subject,
    'description'=> $request->description,
    'to'=> 1
];
    }


    // admin start
    public function contactList(){
        $data = Email::when(request('key'),function($query){
            $query->orWhere('emails.subject','like','%'.request('key').'%');
                    })
        ->select('emails.*','users.name', 'users.email', 'users.phone')
        ->join('users','emails.user_id','users.id')
        ->where("type",'message')->paginate(8);
        return view("layouts.admin.contactList",compact(['data']));
    }

    // contactDelete
    public function contactDelete(Request $request){
        $id = $request->id;
     Email::where('id',$id)->delete();
     return redirect()->route("admin#contactList")->with(['Deleted'=> "Email Deleted"]);
    }

    // contactDetails
    public function contactDetails(Request $request){
     $id = $request->id;
     $data = Email::select('emails.*','users.name','users.email','users.phone')
     ->join('users','emails.user_id','users.id')
    -> where('emails.id',$id)->first();
     return view('layouts.admin.contactDetails',compact(['data']));
    }


    // contactReply
    public function contactReply(Request $request){
        $id = $request->id;
$data = Email::where("id",$id)->first();
return view("layouts.admin.reply",compact(["data"]));
    }

    // mailReply
    public function mailReply(Request $request){

        $validatingRules = [
            'description'=> ['required']
        ];
        Validator::make($request->all(),$validatingRules)->validate();
        $data = [
            'user_id'=> Auth::user()->id,
            'type'=> 'reply',
            'subject'=> $request->subject,
            'description'=> $request->description,
            'to'=> $request->user_id
        ];
        Email::create($data);
        return redirect()->route('admin#mailList')->with(['mailReplied'=> "You have replied the user"]);
    }

    // mailList
    public function mailList(){
$data = Email::when(request('key'),function($query){
    $query->orWhere('emails.subject','like','%'.request('key').'%');
            })
->select('emails.*','users.name', 'users.email', 'users.phone')
->join('users','emails.user_id','users.id')
->where("type",'reply')->paginate(8);
return view('layouts.admin.replyList',compact(["data"]));
    }

    // replyDelete
    public function replyDelete(Request $request){
        $id = $request->id;
     Email::where('id',$id)->delete();
     return redirect()->route("admin#mailList")->with(['Deleted'=> "Email Deleted"]);
    }

}
