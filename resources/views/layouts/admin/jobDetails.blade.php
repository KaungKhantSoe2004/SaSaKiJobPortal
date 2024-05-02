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
                @if ($data->CompanyLogo === null)
                <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 1500px ; height: 1500px" alt="">
            @else
               <img src="{{asset('storage/'.$data->CompanyLogo)}}" style=" width: 150px; height:150px" alt="">
            @endif
            </div>

            <div class="  eachContainer">
                <h4 class=" my-2 text-dark">
                 <i class=" zmdi zmdi-home"></i>     Company Name - {{$data->companyName}}
                </h4>
                <h4 class=" my-2  text-dark">
                    <i class=" zmdi zmdi-power-setting"></i> Job Position - {{$data->position}}
                </h4>
                <h4 class=" my-2  text-dark">
                    <i class=" zmdi zmdi-my-location"></i> Job Location - {{$data->location}}
                </h4>
                <h4 class="my-2  text-dark">
                    <i class=" zmdi zmdi-money"></i> Job Salary - {{$data->salary}} kyats
                </h4>
                <h4 class=" my-2  text-dark">
                    <i class=" zmdi zmdi-nature-people"></i> Job Vacancy - {{$data->vacancy}}
                </h4>
                <h4 class="my-2  text-dark">
                    <i class=" zmdi zmdi-explicit"></i> Job Exp - {{$data->experience}} year
                </h4>
                <h4 class="my-2  ">
                    <i class=" zmdi zmdi-male-female"></i> Gender - {{$data->gender}}
                </h4>
                <h4 class="my-2 text-danger ">
                    <i class=" zmdi zmdi-watch"></i> Deadline - {{$data->deadline}}
                </h4>
                @if ($data->type === 'closed')
                <h4 class="my-2 text-danger ">
                    <i class=" zmdi zmdi-close"></i> Status - {{$data->type}}
                </h4>
                @else
                <h4 class="my-2 text-success ">
                    <i class=" zmdi zmdi-wifi-alt"></i> Status - {{$data->type}}
                </h4>
                @endif
            </div>


        </div>
    <div class=" card-body">


        <div class="  eachContainer">
            <div class="mt-4 label">Description</div>
            <div class=" mt-2 d-flex justify-content-center ">
             <div id="" cols="30" class=" form-control" rows="10">{{$data->Description}}</div>
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

<div class=" mt-5 mb-3 text-center">
<h3 class=" text-black">
    <i class=" zmdi zmdi-accounts"></i> - Applicants
</h3>
</div>

@if (session('applicantDeleted'))
<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{session('applicantDeleted')}}
</div>
@endif

@if (session('applicantAccepted'))
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{session('applicantAccepted')}}
</div>
@endif
<div class=" card col-12 d-flex justify-content-center">
    <table class="table d-block table-data2">
        <thead>
            <tr>
                <th>Img</th>
                <th>name</th>
                <th>email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>age</th>
                {{-- <th>price</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
         @foreach ($applicants as $admin)
         <tr class="tr-shadow">
            <td>

             @if ($admin->img === null)
             <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px; height: 100px" alt="">
             @else
                <img src="{{asset('storage/'.$admin->img)}}"  style=" width: 100px; height: 100px" alt="">
             @endif
            </td>
            <td>
                <span class="block-email">{{$admin->name}}</span>
            </td>
            <td >{{$admin->email}}</td>
            <td>{{$admin->phone}}</td>
            <td>
                <span>{{$admin->gender}}</span>
            </td>
            <td>{{$admin->age}}</td>
<td>{{$admin->client_id}}</td>
            <td>
                <div class="table-data-feature">
                    <a href="{{route('admin#acceptAppliedJob', [$admin->id,$admin->client_id,$data->companyName])}}" class=" mx-3 btn  btn-sm btn-success">Accept</a>
                    <a href="{{route('admin#deleteAppliedJob',[$admin->id,$admin->client_id,$data->companyName])}}" class=" btn btn-sm  btn-danger">Delete</a>
                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                        <i class="zmdi zmdi-mail-send"></i>
                    </button> --}}
               {{-- @if (Auth::user()->id === $admin->id)
               <a href="{{route('admin#adminEdit',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="zmdi zmdi-edit"></i>
            </a>
               @endif
                   @if (Auth::user()->id !== $admin->id)
                   <a href="{{route('admin#adminDelete',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="zmdi zmdi-delete"></i>
                </a>
                   @endif --}}

                   {{-- @if (Auth::user()->id !== $admin->id)
                   <a href="{{route('admin#toAdmin',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Promote">
                    <i class="zmdi zmdi-plus-circle"></i>
                </a>
                   @endif --}}
                    {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                        <i class="zmdi zmdi-more"></i>
                    </button> --}}
                </div>
            </td>
        </tr>
        <tr class="spacer"></tr>
         @endforeach
         <div>
            {{
                $applicants->links()
            }}
         </div>


        </tbody>
    </table>
</div>
@endsection
