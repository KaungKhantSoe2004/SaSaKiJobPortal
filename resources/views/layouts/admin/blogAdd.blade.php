@extends('layouts.admin.sample')
@section('list')
<div class=" d-flex justify-content-center">

    <form action="{{route('admin#addBlog')}}" enctype="multipart/form-data" method="POST" class=" p-3 card col-8">
   @csrf


<div class=" eachContainer">
    <div class=" mt-4 label">Blog Img</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<input type="file" name="img"  class=" form-control" placeholder=" Enter Your Img">
@error("img")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Blog Title</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="text" name="title"  class=" form-control" placeholder=" Enter Your title">
@error("title")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>


<div class=" eachContainer">
    <div class=" mt-4 label">Blog Description</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<textarea name="description"  class=" form-control" placeholder=" Enter Your Description" id="" cols="30" rows="10"></textarea>
@error("description")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>












<div class=" mt-4">
    <button type="submit" class=" btn btn-success">Save</button>
</div>
    </form>
</div>
@endsection
