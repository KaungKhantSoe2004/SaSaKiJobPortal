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
<body class="">
    <div class="  NavBar position-relative ">
{{-- background Img --}}
    </div>

    <div class=" position-absolute top-0 realNavBar ">

        <div class="mt-5 container">
           <div class="upper d-flex justify-content-between p-2 ">
             <h2 class=" fw-light fst-normal text-white">SASAKI</h2>
             <div onclick="menuBar()" class=" mBar d-md-none d-block ">

<div class=" mb-3 float-end">
    <div class=" my-1 bg-secondary" id="nav1"  style="padding: 2px; width: 30px"></div>
<div class=" my-1 bg-secondary" id="nav2" style="padding: 2px; width: 30px"></div>
<div class=" my-1 bg-secondary" id="nav3" style="padding: 2px; width: 30px"></div>
</div>


<div class="linksMenu p-3 position-absolute" id="linksMenu">
  <div class=" shadow-lg col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center">  <a href={{route('getClient')}} class=" text-white text-decoration-none home text-decoration-none  col-2 na text-center ">Home</a></div>
  <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center">  <a href={{route("about")}} class=" text-white text-decoration-none about text-center col-2 na ">About</a></div>
    <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center">   <a href={{route("allListedJob")}}  class=" text-white text-decoration-none jobListings text-center col-2  na">Job Listings</a></div>
        <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center">  <a href={{route("blog")}} class=" text-white text-decoration-none blog text-center col-2 na ">Blog</a></div>
            <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center"> <a href={{route("contact")}} class=" text-white text-decoration-none contact text-center col-2 na ">Contact</a></div>
                <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center"><a href={{route("services")}} class=" text-white text-decoration-none services text-center col-2 na">Services</a></div>
                <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center"> <a href={{route("profilePage")}} class=" text-white text-decoration-none contact text-center col-2 na ">Profile</a></div>
                <div class=" col-7 offset-3 bg-secondary rounded-4 p-2 my-2 text-center"><a href={{route("replies")}} class=" text-white text-decoration-none services text-center col-2 na">Replies</a></div>
</div>
             </div>
            <div class="upperBtns d-none d-md-flex ">

                {{-- <button class=" bg-dark text-white p-2 me-3  rounded-1 postJob">

                    <a href={{route("addPost")}} class=" text-decoration-none text-white ">
                    + Post A Job</a>
                </button> --}}

                <a class=" mx-3 text-decoration-none " href='{{route("replies")}}'>
                    <i style=" width: 45px; height:45px" class=" profileLogo p-2 fs-5 d-flex justify-content-center align-items-center   rounded-circle fa-solid fa-book"></i>
                </a>

                {{-- <button class=" p-2 rounded-2 logInBtn">Log  In</button> --}}
            <a class=" text-decoration-none " href='{{route("profilePage")}}'>
                <i style=" width: 45px; height:45px" class=" profileLogo p-2 fs-5 d-flex justify-content-center align-items-center   rounded-circle fa-solid fa-user"></i>
            </a>
            </div>
        </div>

         <div>
            <div class=" navContainer d-md-flex justify-content-between  d-none mt-5">
                <a href={{route('getClient')}} class=" text-white text-decoration-none home text-decoration-none  col-2 na text-center ">Home</a>
                <a href={{route("about")}} class=" text-white text-decoration-none about text-center col-2 na ">About</a>
                <a href={{route("allListedJob")}}  class=" text-white text-decoration-none jobListings text-center col-2  na">Job Listings</a>
                <a href={{route("blog")}} class=" text-white text-decoration-none blog text-center col-2 na ">Blog</a>
                <a href={{route("contact")}} class=" text-white text-decoration-none contact text-center col-2 na ">Contact</a>
                <a href={{route("services")}} class=" text-white text-decoration-none services text-center col-2 na">Services</a>
            </div>
            <div class="plate d-none d-md-block col-2 mt-1 "></div>
         </div>
      {{-- <div class=" mt-5">
        <div class="searchJobText ">
            <h1 class=" text-white fw-normal  text-center">The Easiest Way To Get Your Dream Job</h1>
            <h4 class=" fw-normal fst-normal text-center text-white-50">You can find freely and easily jobs in SASAKI.</h4>
        </div>
        <div class=" offset-md-2 offset-0 pt-5 searchJobForm">

            <input class="searchJobTitle p-2 rounded-2 border-0 col-md-2 col-10 ms-md-5 ms-4 mb-3 h-10" placeholder="Job Title, Company,....." />

            <select class="mb-3 col-md-2 col-10 p-2 rounded-2 ms-md-5 ms-4" aria-label=".form-select-lg example">
                <option selected>Anywhere</option>
                <option value="1">Yangon</option>
                <option value="2">Bamaw</option>
                <option value="3">Naypyitaw</option>
                <option value="4">Myitkyina</option>
                <option value="5">Myingyan</option>
                <option value="6">Mandalay</option>
              </select>

              <select class="mb-3 col-md-2 col-10 p-2 rounded-2 ms-md-5 ms-4">
                <option value="partTime">Part Time</option>
                <option value="fullTime">Full Time</option>
              </select>
              <button class="mb-3 searchJobBtn col-md-2 col-10 border-0 h-10 p-2 rounded-2 ms-md-5 ms-4">
                <i class="fa-solid  fa-magnifying-glass"></i>
               Search Job
              </button>
         </div>
      </div> --}}
        {{-- </div>
       </div> --}}

@yield('body')
<div class=" col-12 footer text-center text-white bg-dark p-2">All rights reserved @ 2023 SaSaKI</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src={{asset('js/home.js')}}></script>
</html>
