@extends('layouts.admin.sample')
@section('list')
       <!-- DATA TABLE -->
       <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="overview-wrap">
                <h2 class="title-1">Job List</h2>

            </div>
        </div>
        <div class="table-data__tool-right">

                <a href="{{route('admin#addJobPage')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add Job
                </a>

                <div class=" mt-4 d-block">
                    <form action="{{route('admin#jobList')}}" method="get"  class="  d-flex">
                        <input type="text" name="key" class=" form-control " placeholder="Search Emails">
                        <button type="submit" class=" btn btn-dark">
                            <i class=" zmdi zmdi-search"></i>
                        </button>
                    </form>
                 </div>

        </div>
    </div>
    <div class="table-responsive table-responsive-data2">


        @if (request('key'))
        <h3 class="  ms-4 my-3" style=" margin-left: 30px">
           <i class=" zmdi zmdi-search-in-file   my-3"></i> - {{request('key')}}
       </h3>
        @endif

        <h3 class=" text-center ms-4 my-3" style=" margin-left: 30px">
            <i class=" zmdi zmdi-dehaze   my-3"></i> Total - {{$data->count()}}
        </h3>




      @if (session('created'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('created')}}
      </div>
      @endif

      @if (session('updated'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('updated')}}
      </div>
      @endif

      @if (session('deleted'))
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('deleted')}}
      </div>
      @endif


        <table class="table table-data2">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Logo</th>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Location</th>
                    <th>Salary</th>
{{-- <th>Vacancy</th> --}}
<th>Gender</th>
<th>Type</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($data as $job)
             <tr class="tr-shadow">
                <td>{{$job->id}}
                </td>
                <td>
                    @if ($job->CompanyLogo === null)
                    <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px; height: 100px" alt="">
                    @else
                       <img src="{{asset('storage/'.$job->CompanyLogo)}}"  style=" width: 100px; height: 100px" alt="">
                    @endif
                </td>
                <td >{{$job->companyName}}</td>
    <td>{{$job->position}}</td>
    <td>{{$job->location}}</td>
    <td>{{$job->salary}}</td>
    <td>{{$job->gender}}</td>
    <td>{{$job->type}}</td>
                {{-- <td>
                    <span>{{$blog->subject}}</span>
                </td> --}}
                {{-- <td>{{}}</td> --}}
                <td>
                    <div class="table-data-feature">



                       <a href="{{route('admin#deleteJob',[$job->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>

                    <a href="{{route('admin#jobEditPage',[$job->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                        <i class="zmdi zmdi-edit"></i>
                    </a>

                        <a href="{{route('admin#jobDetails',[$job->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                            <i class="zmdi zmdi-more"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <tr class="spacer"></tr>
             @endforeach
             <div>
                {{
                    $data->links()
                }}
             </div>


            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
@endsection
