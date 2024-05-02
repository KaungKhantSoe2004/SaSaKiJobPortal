@extends('layouts.admin.sample')
@section('list')
       <!-- DATA TABLE -->
       <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="overview-wrap">
                <h2 class="title-1">Blogs List</h2>

            </div>
        </div>
        <div class="table-data__tool-right">
            <a href="">
                <a href="{{route('admin#blogAddPage')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add Blogs
                </a>
            </a>

        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <h3 class=" ms-4 my-3" style=" margin-left: 30px">
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
                    <th>image</th>
                    <th>title</th>
                    <th>created at</th>

                    {{-- <th>description</th> --}}
                    {{-- <th>price</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($data as $blog)
             <tr class="tr-shadow">
                <td>{{$blog->id}}
                </td>
                <td>
                    @if ($blog->img === null)
                    <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px; height: 100px" alt="">
                    @else
                       <img src="{{asset('storage/'.$blog->img)}}"  style=" width: 100px; height: 100px" alt="">
                    @endif
                </td>
                <td >{{$blog->title}}</td>
                <td>{{$blog->created_at->format('d-m-Y')}}</td>
                {{-- <td>
                    <span>{{$blog->subject}}</span>
                </td> --}}
                {{-- <td>{{}}</td> --}}
                <td>
                    <div class="table-data-feature">



                       <a href="{{route('admin#blogDelete',[$blog->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>

                    <a href="{{route('admin#blogEditPage',[$blog->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                        <i class="zmdi zmdi-edit"></i>
                    </a>

                        <a href="{{route('admin#blogDetails',[$blog->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
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
