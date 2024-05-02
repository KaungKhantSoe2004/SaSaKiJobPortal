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
        <h2 class=" mb-5 text-white p-4 border-bottom border-1 text-center mt-2">Log In</h2>
 <form action={{route("login")}} class=" mb-2  text-center"  method="POST">
    @csrf
    <input type="name" name="name" placeholder="Enter Your Name" class= " col-7  signName p-2 rounded-2 border-0" />
         <input type="email" name="email" placeholder="Enter Your Email" class=" col-7 signEmail p-2 rounded-2 border-0" />
<input  type="hidden" value="login" name="login"/>
         <input type="password" name="password" placeholder=" Enter Your Password" class=" col-7 signPassword rounded-2  p-2 border-0"/>
        <input type="password" name="rePassword" placeholder=" Enter Your Password Again" class=" col-7 signPassword rounded-2 p-2  border-0"/>
         <button class=" mt-3 signInBtn col-6 btn btn-secondary" type="submit">Login </button>
         <a href="{{route('registerPage')}}" class="d-block text-decoration-none mb-3 mt-2 p-2 text-danger">Don't have an account, Sign In.</a>
         </form>

 </div>
   </div>
</body>
</html>
