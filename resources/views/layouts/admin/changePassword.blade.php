@extends('layouts.admin.sample')
@section('list')
<div class=" text-center my-3">
    <h3>Change Password</h3>
</div>
<div class=" d-flex justify-content-center">



    <form action="{{route('admin#updatePassword')}}"  method="POST" class=" p-3 card col-8">
   @csrf





<div class=" eachContainer">
    <div class=" mt-4 label">Old Password</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<input type="password" name="old" class=" form-control" placeholder=" Enter Your Old Password">
@error("old")
<small class=" text-danger">{{$message}}</small>
@enderror
@if (session('noPassword'))
<small class=" text-danger">{{session('noPassword')}}</small>
@endif
</div>


<div class=" eachContainer">
    <div class=" mt-4 label">Old Password</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<input type="password" name="new" class=" form-control" placeholder=" Enter Your New Password">
@error("new")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>


<div class=" eachContainer">
    <div class=" mt-4 label">Confirm New Password</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<input type="password" name="confirm" class=" form-control" placeholder=" Enter Your New Password Again">
@error("confirm")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>








<div class=" mt-4">
    <button type="submit" class=" btn btn-success">Update</button>
</div>
    </form>
</div>
@endsection
