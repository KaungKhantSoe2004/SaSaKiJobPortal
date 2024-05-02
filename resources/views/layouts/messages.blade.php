
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
    <div class=" ">
        <div class=" mt-3  ms-5 ">

            <a href="{{route('getClient')}}" class=" btn btn-danger">
                Back
            </a>
        </div>
    <h2 class=" text-center text-white my-4">
        Messages from Admin Team
    </h2>



   <div class=" ms-4">
    @foreach ($replies as $r)
  <div class=" d-flex">
    <div class=" offset-md-3 offset-0  border-solid border my-4  p-4 col-md-7 col-10 ">
        <h4 class=" text-danger">{{$r->subject}}

        </h4>
        <div class="
         text-white-50">
         <div class=" text-wordWarp">{{$r->description}}.</div>
         <div class=" text-warning float-end"><i class=" fas fa-clock"></i> - {{$r->created_at->format('d-m-Y')}}</div>
         </div>
            </div>

            <a href="{{route('MessageDelete',$r->id)}}" class="  ms-3">
                <button class=" mt-4 btn btn-sm btn-danger">
                    <i class=" fas fa-trash"></i>
                </button>
            </a>
  </div>
@endforeach
   </div>


    </>

    </div>
</body>

</html>


