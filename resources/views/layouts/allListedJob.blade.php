@extends("main");
@section("body")
<div class=" mt-5">
    <h2 class=" text-white">Home/All listed Jobs</h2>
    <div class="searchJobText ">
        <h1 class=" text-white fw-normal  text-center">The Easiest Way To Get Your Dream Job</h1>
        <h4 class=" fw-normal fst-normal text-center text-white-50">You can find freely and easily jobs in SASAKI.</h4>
    </div>
    <form method="GET" action="{{route('getClient')}}" class=" offset-md-2 offset-0 pt-5 searchJobForm">
@csrf
        <input name="title" class="searchJobTitle p-2 rounded-2 border-0 col-md-2 col-10 ms-md-5 ms-4 mb-3 h-10" placeholder="Job Title, Developer,....." />

        <input name="location" class="searchJobTitle p-2 rounded-2 border-0 col-md-2 col-10 ms-md-5 ms-4 mb-3 h-10" placeholder="Location, Mandalay ..." aria-label=".form-select-lg example">



        <select name="type" class="mb-3 col-md-2 col-10 p-2 rounded-2 ms-md-5 ms-4">
            <option value="progress">Progress</option>
            <option value="closed">Closed</option>
          </select>
          <button type="submit" class="mb-3 searchJobBtn col-md-2 col-10 border-0 h-10 p-2 rounded-2 ms-md-5 ms-4">
            <i class="fa-solid  fa-magnifying-glass"></i>
           Search Job
          </button>
     </form>
  </div>
</div>
</div>
<div class=" p-3">
    {{-- <a href={{route("returnHome")}}>
        <button  class=" ms-4 mt-4 btn-danger btn backArrowContainer">
            <i class=" text-white fa-solid fa-left-long me-2"></i>
            <span>Back</span>
    </button></a> --}}
    <h3 class="my-4  text-center text-white">Listed Jobs:{{$jobs->total()}}</h3>
    <div class=" rounded-3 overflow-hidden  bg-white container  allListedJobContainer">
        @foreach ($jobs as $job)
        <a href={{ route("CAboutJob", $job->id)}} class=" p-0 overflow-hidden text-decoration-none eachJob row border-bottom border-1  border-black">
           <div class="row  col-6">
               <img src='{{asset("storage/".$job->CompanyLogo)}}' alt="" class=" logoImg col-3 p-0"/>
              <div class=" col-5 d-flex flex-column justify-content-center  ">
    <div class=" fs-5 text-black">{{$job["position"]}}</div>
               <div class=" text-black-50 col-3">{{$job["companyName"]}}</div>
              </div>
           </div>
           <div class=" d-flex align-items-center justify-content-around bgwhite col-6">
    <div class=" fs-5 text-black"><i class="fa-solid fa-location-dot m-2 text-warning"></i>{{$job["location"]}}</div>
    <div  class="@if ($job['type']==='progress')
        bg-success
    @else
        bg-danger
    @endif border border-1 p-1 rounded-1 jobType text-black">{{$job["type"]}}</div>
           </div>
        </a>
    @endforeach
    <div class=" bg-white">{{$jobs->links()}}</div>
    </div>
</div>
@endsection


