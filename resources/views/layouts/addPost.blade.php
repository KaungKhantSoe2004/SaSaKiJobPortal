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
<body class=" bg-dark d-flex justify-content-center p-5">
   {{-- <div class="row bg-dark signIn rounded-3">
    <div class=" d-none d-md-flex justify-content-center  p-4 signInContainer col-6  container">
    </div> --}}

    <div class=" col-12  col-md-6">
        <button class=" btn btn-danger text-white"><a class=" text-decoration-none text-black" href={{url('/')}}>Back</a></button>
        <h2 class=" mb-5 text-white p-4 border-bottom border-1 text-center mt-2">Add Post</h2>
 <form   class=" mb-2  text-center" action='{{route("postJob")}}' method="POST" enctype="multipart/form-data">
    @csrf
    <input type="name" name="companyName" placeholder="Enter Company Name" class= " col-7  signName p-2 rounded-2 border-0" />
    @error("companyName")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
         <input type="name" name="position" placeholder="Enter Job Position" class=" col-7 signEmail p-2 rounded-2 border-0" />
 @error("position")
 <div class=" p-1 text-danger">{{$message}}</div>
 @enderror
         {{-- <input type="number" name="signInAge" placeholder="Enter Your Age" class="col-7 signAge p-2 rounded-2 border-0" /> --}}
    <input type="text" name="salary" class=" col-7 signEmail p-2 rounded-2 border-0" placeholder="Enter Salary" id="">
    @error("salary")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
    <input type="text" name="vacancy" class=" col-7 signEmail p-2 rounded-2 border-0" placeholder="Enter Vacancy" id="">
    @error("vacancy")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
    <input type="text" name="experience" class=" col-7 signEmail p-2 rounded-2 border-0" placeholder="Enter Experience" id="">
    @error("experience")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
    <input type="date" name="deadLine" class=" col-7 signEmail p-2 rounded-2 border-0"  placeholder="Application deadline" />
    @error("deadLine")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
    <input type="text" name="location" placeholder="Enter Your location" class=" col-7 signPhone p-2 rounded-2 border-0" />
    @error("location")
    <div class=" p-1 text-danger">{{$message}}</div>
    @enderror
   <select class="col-7   p-2 rounded-2 border-0 mt-3 signGender" name="gender"  id="">
<option value="Any" name="any">Any</option>
<option value="male" name="male">Male</option>
<option value="female" name="female"> Female</option>
</select>
@error("gender")
<div class=" p-1 text-danger">{{$message}}</div>
@enderror
    <select name="type" class="col-7   p-2 rounded-2 border-0 mt-3 signGender" id="">

             <option value="parttime">Parttime</option>
             <option value="fulltime">Fulltime </option>
         </select>
         @error("type")
         <div class=" p-1 text-danger">{{$message}}</div>
         @enderror
         <textarea name="description" id="" rows="4" cols="10" class="  col-7 p-2 signDescription rounded-2 border-0 mt-3" placeholder="Enter Description" rows="10"></textarea>
       @error("description")
       <div class=" p-1 text-danger">{{$message}}</div>
       @enderror
         <input type="file" name="CompanyLogo" class="p-2 rounded-2 border-0 mt-3 signGender" id="">
         @error("CompanyLogo")
         <div class=" p-1 text-danger">{{$message}}</div>
         @enderror
<br>
         <button class=" mt-3 signInBtn col-6 btn btn-secondary" type="submit">Post</button>
         {{-- <a href="#" class=" d-block text-decoration-none mb-3 mt-2 p-2 text-danger">Already have an acoount, Log In.</a> --}}
         </form>
 </div>
   </div>
</body>
</html>
