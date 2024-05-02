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
            <div class=" d-flex justify-content-center">
                @if ($data->img === null)
                <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 1500px ; height: 1500px" alt="">
            @else
               <img src="{{asset('storage/'.$data->img)}}" style=" width: 150px; height:150px" alt="">
            @endif
            </div>

            <div class="  eachContainer">
                <div class="mt-4 label">Title</div>
                <div class=" mt-2 d-flex justify-content-center ">
                    <input value="{{$data->title}}" disabled class="form-control">
                </div>
            </div>


        </div>
    <div class=" card-body">


        <div class="  eachContainer">
            <div class="mt-4 label">Description</div>
            <div class=" mt-2 d-flex justify-content-center ">
             <div id="" cols="30" class=" form-control" rows="10">{{$data->description}}</div>
            </div>
        </div>

<div class=" float-right mt-3" >
    <a href="{{route('admin#blogDelete',[$data->id])}}" class=" btn btn-sm  btn-danger">
    <i class=" zmdi zmdi-delete"></i>
    </a>


</div>

    </div>

    </div>
</div>
@endsection
