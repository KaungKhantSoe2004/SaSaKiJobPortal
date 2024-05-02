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
    <button class=" my-3 btn btn-danger">
        <a href={{ route("profilePage")}} class=" text-decoration-none text-black">Back</a>
    </button>
<h3 class=" my-4 text-center text-white">Editing Your Password</h3>

    <form action="{{route('updatePassword')}}" method="POST"   class=" p-3 container col-4 my-3 text-center textContainer">
        @csrf

        <div class=" my-4 form-group">
            <label for="cc-payment" class=" text-start control-label text-white mb-1">Old Password</label>
            <input type="password" name="oldPassword" class=" my-1 form-control" placeholder="Enter your old Password" >

          @error("oldPassword")
              <small class=" text-danger">{{$message}}</small>
          @enderror
        @if (session('oldPasswordFail'))
        <small class=" text-danger">{{session('oldPasswordFail')}}</small>
        @endif
        </div>

        <div class=" my-4 form-group">
            <label for="cc-payment" class=" text-start control-label text-white mb-1">New Password</label>
            <input type="password" name="newPassword" class=" my-1 form-control" placeholder="Enter your New Password" >

          @error("newPassword")
              <small class=" text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class=" my-4 form-group">
            <label for="cc-payment" class=" text-start control-label text-white mb-1">Confirm Password</label>
            <input type="password" name="confirmPassword" class=" my-1 form-control" placeholder="Enter your old Password" >

          @error("confirmPassword")
              <small class=" text-danger">{{$message}}</small>
          @enderror
        </div>


        <input type="submit" value="Update" class=" col-12 btn btn-primary" />
    </form>

</div>

</body>
</html>
