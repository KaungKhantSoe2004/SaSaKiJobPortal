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
    <a href={{route("blog")}}>
        <button  class=" ms-4 mt-4 btn-danger btn backArrowContainer">
            <i class=" text-white fa-solid fa-left-long me-2"></i>
            <span>Back</span>
    </button></a>

<div class=" mt-5 row col-12">

    <div class="  row imgContainer col-md-6 col-11">
        <img src='{{asset("storage/$data->img")}}' class=" p-0 rounded-1 offset-1 col-md-4 col-12 logoEachImg" alt="">
        <div class=" col-md-6 col-12 ms-2  infoContainer">

            <h4 class=" text-white mt-3"></h4>

            <div class=" d-flex">
       <div class=" d-flex">
        <i class="fa-solid  fa-bag-shopping text-white-50"></i><h6 class=" ms-2 text-white-50"> {{$data->title}}</h6>
    </div>

    <div class=" ms-3 d-flex">
        <i class="fa-solid fa-location-dot text-white-50"></i> <h6 class="ms-2 text-white-50">{{$data->price}} Kyats</h6>
    </div>

    <div class=" ms-3 d-flex">
        <i class="fa-solid fa-clock text-white-50"></i> <h6 class="ms-2 text-danger">{{$data->created_at->format("Z/M/Y")}}</h6>
    </div>
            </div>


        </div>
    </div>
<div class=" d-flex infoContainer  col-md-6 col-12 ">
 {{-- <button class=" p-1 btn btn-secondary text-white  infoBtn col-4">
    <i class="fa-regular text-danger fa-heart"></i>
    Save Blog
 </button> --}}


</div>

</div>

{{-- <div class="  mt-4 col-12">
<h2 class="  text-center text-white"> Job Summary</h2>
<div class="  d-flex justify-content-center p-4 mt-2 col-12">
   <div class="  shadow-lg rounded-2 bgBlue col-md-5 col-12 text-center">
    <h5 class=" fw-normal text-black p-1"> Company Name : {{$data->companyName}}</h5>
    <h5 class=" fw-normal  text-black p-1"> Job : {{$data->position}}</h5>
    <h5 class=" fw-normal text-black p-1"> Type : {{$data->type}}</h5>
    <h5 class=" fw-normal text-black p-1"> Salary : {{$data->salary}}</h5>
    <h5 class=" fw-normal text-black p-1"> Published at : {{$data->created_at->format("d/M/Y")}}</h5>
   </div>
</div>
</div> --}}

{{-- <div class=" descriptionContainer">
<h2 class=" text-white text-center mt-3">Description</h2>

</div> --}}

<div class=" mt-5 my-3 row col-12">
<div class="  col-12 ">
    <h5 class=" ms-5 textBlue">
        <i class=" fa-solid fa-indent"></i>
        Description</h5>
        <div class="despBlog me-4 mt-4 ms-5 text-white-50">
            &nbsp; &nbsp; &nbsp; &nbsp;
{{$data->description}}
        </div>
</div>

</div>

</body>
</html>
