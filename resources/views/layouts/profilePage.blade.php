<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/home.css')}}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
<body class=" bg-dark">
<div class="container">
    <a href="{{route('getClient')}}" class=" my-3 btn btn-danger">
         Back
    </a>

@if (session('passwordChanged'))
<div class="alert alert-info alert-dismissible">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   {{session('passwordChanged')}}
  </div>
@endif

    <div class="imgContainer profileImg text-center">
        @if (Auth::user()->img === null)
        <img class=" rounded-circle bg-white" src='{{asset("img/profile-clipart-icon-7.png")}}' style=" width: 160px ;height: 160px; border: solid 4px  #00abf0;"/>
        @else
        <img class=" rounded-circle bg-white" src='{{asset("storage/".Auth::user()->img)}}' style=" width: 160px ;height: 160px; border: solid 4px  #00abf0;"/>
        @endif
    </div>
    <div class=" offset-md-5 offset-3 my-3 text-white-50 textContainer">
        <h5 class="profileTxt my-3"><i class="fa-solid fa-person me-2"></i>Name : {{Auth::user()->name}}</h5>
        <h5 class=" profileTxt my-3 "><i class="fa-solid fa-envelope me-2"></i>Email : {{Auth::user()->email}}</h5>
        <h5 class=" profileTxt my-3"><i class="fa-solid fa-phone me-2"></i>Phone: {{Auth::user()->phone}}</h5>
        <h5 class=" profileTxt my-3"><i class="fa-solid fa-mask me-2"></i>Gender: {{Auth::user()->gender}}</h5>
        <h5 class=" profileTxt my-3"><i class="fa-solid fa-cake-candles me-2"></i>Age: {{Auth::user()->age}}</h5>
        <h5 class="profileTxt my-3 d-inline"><i class="fa-solid fa-building me-2"></i>Jobs Filled: {{Auth::user()->jobs_filled}}</h5>

        {{-- <button class=" btn bg-warning">Account Level - {{Auth::user()->account_level}}</button> --}}
        {{-- <h5 class=" d-inline my-3"><i class=" fa-solid fa-star"></i>Account level- {{Auth::user()->account_level}}</h5> --}}

        {{-- <button class="  ms-3 btn btn-secondary">
            <a href="{{route('levelUpPage')}}" class=" text-decoration-none text-white">

            </a>
        </button> --}}


    </div>
    {{-- <div class=" d-flex justify-content-center text-center"> --}}

        <form class=" d-inline " action="{{route("logout")}}" method="POST">
            @csrf
        <input type="submit" class=" offset-4 rounded-3 bg-danger text-center  col-3  btn" value="Log Out">
        </form>

        <a href="{{route('editProfilePage')}}" class=" ms-3  text-center btn btn-secondary">
            <i class=" fas fa-edit"></i>
            </a>

            <a href="{{route('editPasswordPage')}}" class=" ms-2  text-center btn btn-secondary">
                <i class=" fas fa-key"></i>
                </a>
    {{-- </div> --}}
</div>


<div class=" mt-5">
    <h2 class=" text-center text-white my-3">Applied Jobs</h2>


    <div class=" col-10 offset-1 d-flex justify-content-center my-2">

      @foreach ($data as $job)
      <div class="profileTableCard d-flex flex-column" >
  <div>
 @if ($job->img === null)
  <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px; height: 100px"  alt="">
 @else
<img src="{{asset('storage/'.$job->img)}}" style=" width: 100px; height: 100px" alt="">
 @endif
  </div>
        </div>
      @endforeach

        <table class="table profileTable col-9 table-data2">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Location</th>
                   <th>Applied At</th>
                   <th>Status</th>
{{-- <th>Vacancy</th> --}}


                    <th></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($data as $job)
             <tr class="tr-shadow">

                <td>
                    @if ($job->img === null)
                    <img src="{{asset('util/account-icon-png-2.jpg')}}" style=" width: 100px; height: 100px" alt="">
                    @else
                       <img src="{{asset('storage/'.$job->img)}}"  style=" width: 100px; height: 100px" alt="">
                    @endif
                </td>
                <td >{{$job->companyName}}</td>
    <td>{{$job->position}}</td>
    <td>{{$job->location}}</td>
    <td>{{$job->created_at->format('d-m-Y')}}</td>
    <td class=" @if ($job->status==='accepted')
        text-success
      @endif ">{{$job->status}}</td>

                {{-- <td>
                    <span>{{$blog->subject}}</span>
                </td> --}}
                {{-- <td>{{}}</td> --}}
                <td>
                    <div class="table-data-feature">



                       {{-- <a href="{{route('admin#deleteJob',[$job->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </a>

                    <a href="{{route('admin#jobEditPage',[$job->id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                        <i class="zmdi zmdi-edit"></i>
                    </a> --}}

                        <a href="{{route('CAboutJob',[$job->job_id])}}" class="item" data-toggle="tooltip" data-placement="top" title="More">
                            <i class=" text-dark fas fa-tag"></i>
                        </a>
                        <a href="{{route('deleteAppliedJobUser',[$job->id])}}" class="item ms-2" data-toggle="tooltip" data-placement="top" title="More">
                            <i class=" text-dark fas fa-trash"></i>
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
</div>

</body>
</html>
