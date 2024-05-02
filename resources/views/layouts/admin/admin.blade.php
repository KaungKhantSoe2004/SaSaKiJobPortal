@extends('layouts.admin.sample')
@section('list')
       <!-- DATA TABLE -->
       <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="overview-wrap">
                <h2 class="title-1">Admin List</h2>

            </div>
        </div>
        <div class="table-data__tool-right">
            {{-- <a href="category.html">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add item
                </button>
            </a> --}}
            {{-- <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                CSV download
            </button> --}}
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <h3 class=" ms-4 my-3" style=" margin-left: 30px">
            <i class=" zmdi zmdi-dehaze   my-3"></i> Total - {{$data->count()}}
        </h3>
      @if (session('adminUpdated'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('adminUpdated')}}
      </div>
      @endif

      @if (session('adminDemoted'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('adminDemoted')}}
      </div>
      @endif

      @if (session('Deleted'))
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('Deleted')}}
      </div>
      @endif

      @if (session('changedPass'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('changedPass')}}
      </div>
      @endif

        <table class="table table-data2">
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
             @foreach ($data as $admin)
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
                <td>
                    <div class="table-data-feature">
                        {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button> --}}
                   @if (Auth::user()->id === $admin->id)
                   <a href="{{route('admin#adminEdit',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="zmdi zmdi-edit"></i>
                </a>
                   @endif
                       @if (Auth::user()->id !== $admin->id)
                       <a href="{{route('admin#adminDelete',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>
                       @endif

                       @if (Auth::user()->id !== $admin->id)
                       <a href="{{route('admin#toUser',[$admin->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Demote">
                        <i class="zmdi zmdi-minus-circle"></i>
                    </a>
                       @endif
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
                    $data->links()
                }}
             </div>


            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
@endsection
