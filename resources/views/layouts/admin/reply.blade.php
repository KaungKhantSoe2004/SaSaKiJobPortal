@extends('layouts.admin.sample')
@section('list')
<div>
    <button onclick="history.back()" class=" btn btn-dark">
        Back
    </button>
</div>

<div class=" d-flex justify-content-center">

    <form action="{{route("admin#mailReply")}}" method="POST" class=" p-3 card col-8">
   @csrf


<div class=" eachContainer">
    <div class=" mt-4 label">Name</div>
<div class=" mt-2  d-flex justify-content-center">
 <input type="hidden" name="user_id" value="{{$data->user_id}}">
</div>
<input type="text"  name="name" value="admin" class=" form-control" disabled>
</div>

<div class=" eachContainer">
    <div class=" mt-4 label"> Email</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="text" name="email" value="{{Auth::user()->email}}" class=" form-control" disabled>

</div>

</div>

<div class=" eachContainer">
    <div class=" mt-4 label"> Phone Number</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="integer" name="phone" value="{{Auth::user()->phone}}" class=" form-control" disabled>

</div>

</div>


<div class=" eachContainer">
    <div class=" mt-4 label"> Subject</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="integer" name="subject" value="{{$data->subject}}" class=" form-control" disabled>
    <input type="hidden" name="subject" value="{{$data->subject}}" class=" form-control" >
</div>

</div>


<div class=" eachContainer">
    <div class=" mt-4 label"> Reply</div>
<div class=" mt-2  d-flex justify-content-center">
    <textarea name="description" class=" form-control" placeholder="Enter Your Reply" id="" cols="30" rows="10"></textarea>

</div>
@error('description')
   <small class=" text-danger"> ! {{$message}}</small>
@enderror
</div>



<div class=" mt-4">
    <button type="submit" class=" btn btn-success">Send</button>
</div>
    </form>
</div>
@endsection
