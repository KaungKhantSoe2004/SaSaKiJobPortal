@extends('layouts.admin.sample')
@section('list')
<div class=" d-flex justify-content-center">



    <form action="{{route('admin#blogUpdate')}}" enctype="multipart/form-data" method="POST" class=" p-3 card col-8">
   @csrf

   <div class=" d-flex justify-content-center">
    @if ($data->img === null)
    <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 150px ; height: 150px" alt="">
@else
   <img src="{{asset('storage/'.$data->img)}}" style=" width: 150px; height:150px" alt="">
@endif
</div>

<div class=" eachContainer">
    <div class="mt-4 label">Blog Img</div>
    <div class=" mt-2 d-flex justify-content-center ">
        <input name="img" type="file" class=" form-control-file" placeholder="Enter Blog Img">

    </div>
    @error("img")
    <small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Blog Title</div>
<div class=" mt-2  d-flex justify-content-center">
 <input type="hidden" name="id" value="{{$data->id}}">
</div>
<input type="text" name="title" value="{{$data->title}}" class=" form-control" placeholder=" Enter Your Blog Title">
@error("title")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Blog Description</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<textarea name="description" class=" form-control" placeholder="Enter Your Blog Description" id="" cols="30" rows="10">{{$data->description}}</textarea>
@error("description")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>








<div class=" mt-4">
    <button type="submit" class=" btn btn-success">Update</button>
</div>
    </form>
</div>
@endsection
