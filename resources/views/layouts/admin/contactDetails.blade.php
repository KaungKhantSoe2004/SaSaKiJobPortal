@extends('layouts.admin.sample')
@section('list')
<div>
    <button onclick="history.back()" class=" btn btn-dark">
        Back
    </button>
</div>
<div class=" d-flex justify-content-center">

    <div class=" col-8 card d-flex justify-content-center">

        <div class=" card-header">
            <div class="  eachContainer">
                <div class="mt-4 label">Name</div>
                <div class=" mt-2 d-flex justify-content-center ">
                    <input value="{{$data->name}}" disabled class="form-control">
                </div>
            </div>

            <div class="  eachContainer">
                <div class="mt-4 label">Email</div>
                <div class=" mt-2 d-flex justify-content-center ">
                    <input value="{{$data->email}}" disabled class=" form-control">
                </div>
            </div>
        </div>
    <div class=" card-body">
        <div class="  eachContainer">
            <div class="mt-4 label">Subject</div>
            <div class=" mt-2 d-flex justify-content-center ">
                <input value="{{$data->subject}}" disabled class="form-control">
            </div>
        </div>

        <div class="  eachContainer">
            <div class="mt-4 label">Description</div>
            <div class=" mt-2 d-flex justify-content-center ">
             <div id="" cols="30" class=" form-control" rows="10">{{$data->description}}</div>
            </div>
        </div>

<div class=" float-right mt-3" >
    <a href="{{route('admin#contactDelete',[$data->id])}}" class=" btn btn-sm  btn-danger">
    <i class=" zmdi zmdi-delete"></i>
    </a>

    @if ($data->type === 'message')
    <a href="{{route('admin#contactReply',[$data->id])}}" class=" btn btn-sm  btn-success">
        <i class=" zmdi zmdi-mail-reply"></i>
        </a>
    @endif
</div>

    </div>

    </div>
</div>
@endsection
