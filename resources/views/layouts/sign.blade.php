<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('css/signIn.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class=" d-flex justify-content-center p-5">
   <div class="row bg-dark signIn rounded-3">
    <div class=" d-none d-md-flex justify-content-center  p-4 signInContainer col-6  container">
    </div>

    <div class=" col-12  col-md-6">
        <h2 class=" mb-5 text-white p-4 border-bottom border-1 text-center mt-2">Sign In</h2>
 <form action='{{route('register')}}' class=" mb-2  text-center"  method="POST">
    @csrf
    <input type="name" name="signInName" placeholder="Enter Your Name" class= " col-7  signName p-2 rounded-2 border-0" />
    @error("signInName")
    <br>
        <small class=" text-danger">{{$message}}</small>
    @enderror
         <input type="name" name="signInEmail" placeholder="Enter Your Email" class=" col-7 signEmail p-2 rounded-2 border-0" />
         @error("signInEmail")
         <br>
         <small class="  text-danger">{{$message}}</small>
     @enderror
         <input type="text" value="18" name="signInAge" placeholder="Enter Your Age" class="col-7 signAge p-2 rounded-2 border-0" />
         @error("signInAge")
         <br>
         <small class=" text-danger">{{$message}}</small>
     @enderror
         <input type="name" name="signInPhone" placeholder="Enter Your Ph number" class=" col-7 signPhone p-2 rounded-2 border-0" />
         @error("signInPhone")
         <br>
         <small class=" text-danger">{{$message}}</small>
     @enderror
         <select name="signInGender" class="col-7   p-2 rounded-2 border-0 mt-3 signGender" id="">
             <option value="male">Male</option>
             <option value="female">Female</option>
         </select>
         @error("signInGender")
         <br>
         <small class=" text-danger">{{$message}}</small>
     @enderror
         <input type="password" name="password" placeholder=" Enter Your Password" class=" col-7 signPassword rounded-2  p-2 border-0"/>
         @error("password")
         <br>
         <small class=" text-danger">{{$message}}</small>
     @enderror

     <input type="password" name="password_confirmation" placeholder="Enter Your Password again" class=" col-7 signPassword rounded-2  p-2 border-0"/>
     @error("password_confirmation")
     <br>
     <small class=" text-danger">{{$message}}</small>
 @enderror

         <button class=" mt-3 signInBtn col-6 btn btn-secondary" type="submit">Sign In</button>
         <a href="{{route('loginPage')}}" class="  d-block text-decoration-none mb-3 mt-2 p-2 text-danger">Already have an acoount, Log In.</a>
         </form>
 </div>
   </div>
</body>
</html>
