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
<h3 class=" my-4 text-center text-white">Editing Your Profile</h3>
    <div class=" imgContainer text-center">
        @if (Auth::user()->img === null)
        <img class=" rounded-circle bg-white" src='{{asset("img/profile-clipart-icon-7.png")}}' style=" width: 160px ;height: 160px; border: solid 4px  #00abf0;"/>
        @else
        <img class=" rounded-circle bg-white" src='{{asset("storage/".Auth::user()->img)}}' style=" width: 160px ;height: 160px; border: solid 4px  #00abf0;"/>
        @endif
    </div>
    <form action="{{route("editProfile")}}" method="POST" enctype="multipart/form-data"  class=" p-3 container col-4 my-3 text-center textContainer">
        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label text-white mb-1">Edit Profile Image</label>
            <input name="img" class=" form-control" type="file"/>
        </div>
        <div class=" my-4 form-group">
            <label for="cc-payment" class=" text-start control-label text-white mb-1">Edit  Name</label>
            <input type="text" name="name" class=" my-1 form-control" placeholder="Enter your name" value="{{Auth::user()->name}}">
            {{-- <input name="name" class=" my-1 form-control" placeholder="Edit Profile Name" value={{Auth::user()->name}} /> --}}
          @error("name")
              <small class=" text-danger">{{$message}}</small>
          @enderror
        </div>

        <div class="form-group my-4">
            <label for="cc-payment" class="control-label text-white mb-1">Edit  Email</label>
            <input type="email" name="email"  class=" my-1 form-control" placeholder="Edit Profile Email" value={{old("email",Auth::user()->email)}} />
            @error("email")
            <small class=" text-danger">{{$message}}</small>
        @enderror
        </div>
        <div class="form-group my-4">
            <label for="cc-payment" class="control-label text-white mb-1">Edit  Phone Number</label>
            <input type="text" name="phone" class=" my-1 form-control" placeholder="Edit Profile Phone Number" value={{old("number",Auth::user()->phone)}} />
            @error("phone")
            <small class=" text-danger">{{$message}}</small>
        @enderror
        </div>
        <div class="form-group my-4">
            <label for="cc-payment" class="control-label text-white mb-1">Edit Gender </label>
<select class=" form-control form-input" name="gender" id="">
    <option value="male" @if (Auth::user()->gender === 'male')
        selected
    @endif>Male</option>
    <option @if (Auth::user()->gender === 'female')
        selected
    @endif value="female">Female</option>
</select>
@error("gender")
<small class=" text-danger">{{$message}}</small>
@enderror
        </div>
        <input type="submit" value="Update" class=" col-12 btn btn-primary" />
    </form>

</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
