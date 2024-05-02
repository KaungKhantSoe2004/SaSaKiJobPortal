@extends('layouts.admin.sample')
@section('list')
       <!-- DATA TABLE -->
       <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="overview-wrap">
                <h2 class="title-1">Message List</h2>

            </div>
        </div>
        <div class="table-data__tool-right">


            <a href="{{route('admin#mailList')}}" class="au-btn au-btn-icon au-btn--green au-btn--small ">
                <i class="zmdi zmdi-arrow-right"></i> Replies
            </a>
            <div class=" mt-4 d-block">
                <form action="{{route('admin#contactList')}}" method="get"  class="  d-flex">
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
            <i class="  zmdi zmdi-dehaze   my-3"></i> Total - {{$data->count()}}
        </h3>




      @if (session('Deleted'))
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{session('Deleted')}}
      </div>
      @endif



        <table class="table table-data2">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Phone</th>
                    <th>subject</th>
                    {{-- <th>description</th> --}}
                    {{-- <th>price</th> --}}
                    <th></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($data as $mail)
             <tr class="tr-shadow">
                <td>{{$mail->id}}
                </td>
                <td>
                    <span class="block-email">{{$mail->name}}</span>
                </td>
                <td >{{$mail->email}}</td>
                <td>{{$mail->phone}}</td>
                <td>
                    <span>{{$mail->subject}}</span>
                </td>
                {{-- <td>{{}}</td> --}}
                <td>
                    <div class="table-data-feature">
                        <a href="{{route('admin#contactReply',[$mail->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Reply">
                            <i class="zmdi zmdi-mail-reply"></i>
                        </a>


                       <a href="{{route('admin#contactDelete',[$mail->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>


                        <a href="{{route('admin#contactDetails',[$mail->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
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
