@extends('main')
@section('body')
    <div class=" text-white">
<h2 class=" ms-5 mt-5">Home/Contact</h2>
<div class="hapyClientsContainer mt-5">

    <h4 class=" fw-normal mt-5 text-center my-3">Happy Candidates says</h4>
    <div class="row mt-5 cardContainer">

        <div class=" rounded-2 col-md-3 col-10   mb-3  eachContactCard offset-1">
            <div class=" contactText">Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</div>
            <div class="infoContainer d-flex my-3 ">
                <img src="https://th.bing.com/th/id/OIP.G4oesoGTB_snOYL9dBFdHgAAAA?w=177&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class=" rounded-circle " style="width: 60px; height: 60px"/>
                <div class="  ms-3 ">
                    <div class=" text-white">Kaung Kaung</div>
                    <div class=" text-white-50">Front-end developer</div>
                </div>


            </div>
        </div>


        <div class=" rounded-2 col-md-3 col-10   mb-3  eachContactCard offset-1">
            <div class=" contactText">>Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</div>
            <div class="infoContainer d-flex my-3 ">
                <img src="https://th.bing.com/th/id/OIP.G4oesoGTB_snOYL9dBFdHgAAAA?w=177&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class=" rounded-circle " style="width: 60px; height: 60px"/>
                <div class="  ms-3 ">
                    <div class=" text-white">Kaung Kaung</div>
                    <div class=" text-white-50">Front-end developer</div>
                </div>


            </div>
        </div>


        <div class=" rounded-2 col-md-3  col-10  mb-3  eachContactCard offset-1">
             <div class=" contactText">>Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</div>
             <div class="infoContainer d-flex my-3 ">
                <img src="https://th.bing.com/th/id/OIP.G4oesoGTB_snOYL9dBFdHgAAAA?w=177&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class=" rounded-circle " style="width: 60px; height: 60px"/>
                <div class="  ms-3 ">
                    <div class=" text-white">Kaung Kaung</div>
                    <div class=" text-white-50">Front-end developer</div>
                </div>


            </div>
            </div>


    </div>

    </div>
</div>

{{-- <div class=" rounded-2 col-md-3 col-4  mb-3  eachContactCard offset-1">
    <div>Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit</div>

    <div class="infoContainer d-flex my-3 ">
    <img src="https://th.bing.com/th/id/OIP.G4oesoGTB_snOYL9dBFdHgAAAA?w=177&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" class=" rounded-circle " style="width: 60px; height: 60px"/>
    <div class="  ms-3 ">
        <div class=" text-white">Kaung Kaung</div>
        <div class=" text-white-50">Front-end developer</div>
    </div>


    </div> --}}
{{-- end --}}
</div>
</div>

<div class="contactSection my-5 row col-12">
    <h2 class=" text-center text-white" >Contact Us</h2>
<div class=" col-md-6 col-12 fs-2 d-flex justify-content-center">
    <div class=" overflow-hidden ">
        <div class=" mt-3 d-flex">
          <div class=" d-flex flex-column justify-content-center">
            <i class="fa-solid  fa-phone text-danger"></i>
          </div>
            <div class="  ms-4">
                <div class=" text-white fs-4">Phone</div>
                <div class=" text-white fs-5">+95 09796788834</div>
            </div>
        </div>

        <div class=" mt-3 d-flex">
            <div class=" d-flex flex-column justify-content-center">
                <i class="fa-regular text-danger fa-envelope"></i>
            </div>
              <div class="   ms-4">
                  <div class=" text-white fs-4">Email</div>
                  <div class=" text-white fs-5">kaungkhants892@gmail.com</div>
              </div>
          </div>


        <div class="mt-3 d-flex">
            <div class=" d-flex flex-column justify-content-center">
                <i class="fa-solid text-danger fa-location-dot"></i>
            </div>
              <div class="  ms-4">
                  <div class=" text-white fs-4">Address</div>
                  <div class=" text-white fs-5">Myingyan</div>
              </div>
          </div>
    </div>
</div>

<div class=" col-md-5 col-11 offset-1 mt-3 d-flex justify-content-start"> <div>
    @if (session('emailed'))
    <div class="alert alert-info alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{session('emailed')}}
      </div>
    @endif

    <form action="{{route('postMailContact')}}" method="POST" class=" mt-4">
        @csrf
        <input type="text" name="name" placeholder=" Enter Your Name" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"/>
    <input type="email" name="email" placeholder="Enter Your Email" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2" id="">
    <input type="text" name="subject" placeholder="Enter Subject" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"/>
    @if (session('emailError'))
    <small class=" mb-3 d-block text-danger">{{session('emailError')}}</small>
    @endif
    <textarea name="description" placeholder="Enter Your Message" id="" cols="30" rows="10" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"></textarea>
  <div class=" col-md-8 col-11  d-flex justify-content-center">

    <button type="submit" class="mb-3 col-6 btn-outline-secondary text-white btn-danger btn">Post</button>
  </div>
    </form>
</div></div>
{{-- <form action="#">
    <input type="text" name="name" placeholder=" Enter Your Name"/>
<input type="email" name="email" placeholder="Enter Your Email" id="">
<input type="text" name="subject" placeholder="Enter Subject" />
<textarea name="message" placeholder="Enter Your Message" id="" cols="30" rows="10"></textarea>
</form> --}}

</div>

@endsection
