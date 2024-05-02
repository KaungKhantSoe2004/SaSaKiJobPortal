@extends('layouts.admin.sample')
@section('list')
<div>
    <button class=" btn btn-dark " onclick="history.back()">Back</button>
</div>
<h2 class=" text-center my-3">Edit Job</h2>
<div class=" d-flex justify-content-center">

    <form action="{{route('admin#jobUpdate')}}" enctype="multipart/form-data" method="POST" class=" p-3 card col-8">
   @csrf


<div class=" eachContainer">
    <div class=" mt-4 label">Company Logo</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<input type="file" name="img"  class=" form-control" placeholder=" Enter Company Logo">
@error("img")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Company Name</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="text" name="companyName"  class=" form-control" value="{{$data->companyName}}" placeholder=" Enter Your company Name">
@error("companyName")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Position</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="text" name="position" value="{{$data->position}}"   class=" form-control" placeholder=" Enter job position">
@error("position")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Location</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="text" name="location" value="{{$data->location}}"   class=" form-control" placeholder=" Enter job location">
@error("location")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Salary</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="number" name="salary" value="{{$data->salary}}"   class=" form-control" placeholder=" Enter job salary">
@error("salary")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Vacancy</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="number" name="vacancy" value="{{$data->vacancy}}"   class=" form-control" placeholder=" Enter job vacancy">
@error("vacancy")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Deadline</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type='date' name="deadline" value="{{$data->deadline}}"   class=" form-control" placeholder=" Enter job deadline">
@error("deadline")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Experience</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<input type="number" value="{{$data->experience}}"  name="experience"  class=" form-control" placeholder=" Enter job experience">
@error("experience")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Gender</div>
<div class=" mt-2  d-flex justify-content-center">
 <input type="hidden" name="id" value="{{$data->id}}">
</div>
<select name="gender" class=" form-control"  id="">
    <option @if ($data->gender === 'both')
     selected
    @endif value="both">Both</option>
    <option @if ($data->gender === 'male')
        selected
       @endif value="male">male</option>
    <option @if ($data->gender === 'female')
        selected
       @endif value="female">female</option>
</select>
@error("gender")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Gender</div>
<div class=" mt-2  d-flex justify-content-center">
 {{-- <input type="hidden" name="id" value="{{$data->id}}"> --}}
</div>
<select name="type" class=" form-control"  id="">
   <option value="progress">Progress</option>
   <option value="closed">Closed</option>
</select>
@error("type")
<small class=" text-danger">{{$message}}</small>
@enderror
</div>

<div class=" eachContainer">
    <div class=" mt-4 label">Job Description</div>
<div class=" mt-2  d-flex justify-content-center">

</div>
<textarea name="description"  class=" form-control" placeholder=" Enter Your Description" id="" cols="30" rows="10">
    {{$data->Description}}
</textarea>
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
