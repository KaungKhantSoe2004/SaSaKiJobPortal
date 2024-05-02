@extends('layouts.admin.sample')
@section('list')
<div class=" d-flex justify-content-center">

    <form action="{{route("admin#adminUpdate")}}" enctype="multipart/form-data" method="POST" class=" p-3 card col-8">
   @csrf
<div class=" d-flex justify-content-center">
    @if ($data->img === null)
    <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px ; height: 100px" alt="">
@else
   <img src="{{asset('storage/'.$data->img)}}" style=" width: 100px; height:100px" alt="">
@endif
</div>

<div class=" eachContainer">
    <div class="mt-4 label">Admin Img</div>
    <div class=" mt-2 d-flex justify-content-center ">
        <input name="img" type="file" class=" form-control-file" placeholder="Enter Your Img">

    </div>
    @error("img")
    <small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Admin Name</div>
<div class=" mt-2  d-flex justify-content-center">
 <input type="hidden" name="id" value="{{$data->id}}">
</div>
<input type="text" name="name" value="{{$data->name}}" class=" form-control" placeholder=" Enter Your Name">
@error("name")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Admin Email</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="text" name="email" value="{{$data->email}}" class=" form-control" placeholder=" Enter Your email">

</div>
@error('email')
    <small class=" text-danger">{{$message}}</small>
   @enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Admin Phone Number</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="integer" name="phone" value="{{$data->phone}}" class=" form-control" placeholder=" Enter Your Phone">

</div>
@error('phone')
<small class=" text-danger">{{$message}}</small>
@enderror
</div>


<div class=" eachContainer">
    <div class=" mt-4 label">Admin Gender</div>
<div class=" mt-2  d-flex justify-content-center">
  <select name="gender" class=" form-control" id="">
    <option  value="">Choose Gender</option>
    <option @if ($data->gender==='male')
        selected
    @endif value="male">Male</option>
    <option  @if ($data->gender==='female')
        selected
    @endif value="famale">Female</option>
  </select>

</div>
@error('gender')
<small class=" text-danger">{{$message}}</small>
@enderror
</div>



<div class=" eachContainer">
    <div class=" mt-4 label">Admin Age</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="integer" name="age" value="{{$data->age}}" class=" form-control" placeholder=" Enter Your Age">

</div>
@error('age')
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Role</div>
<div class=" mt-2  d-flex justify-content-center">
    <input type="text" disabled value="{{$data->role}}" name="role" class=" form-control" placeholder=" Enter Your role">

</div>
</div>

<div class=" mt-4">
    <button type="submit" class=" btn btn-success">Update</button>
</div>
    </form>
</div>
@endsection
