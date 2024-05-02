@extends('main')
@section('body')


<div class=" mt-5">
    <div class="searchJobText ">
        <h1 class=" text-white fw-normal  text-center">The Easiest Way To Get Your Dream Job</h1>
        <h4 class=" fw-normal fst-normal text-center text-white-50">You can find freely and easily jobs in SASAKI.</h4>
    </div>
    <form method="GET" action="{{route('getClient')}}" class=" offset-md-2 offset-0 pt-5 searchJobForm">
@csrf
        <input name="title" class="searchJobTitle p-2 rounded-2 border-0 col-md-2 col-10 ms-md-5 ms-4 mb-3 h-10" placeholder="Job Title, Developer,....." />

        <input name="location"  class="searchJobTitle p-2 rounded-2 border-0 col-md-2 col-10 ms-md-5 ms-4 mb-3 h-10" placeholder="Location, Mandalay ..." aria-label=".form-select-lg example">



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

   <div class="jobStatus bg-secondary d-flex justify-content-center p-4">
   <div class=" m-5">
    <h2 class=" text-black pt-3 text-center heading ">JobBoard Site Status</h2>
    <h4 class="onYourWay fw-normal text-black-50 text-center">
 You are on your way to doing some great things indeed.Congrulations and best wishes for your new Job !
    </h4>
    <div class=" mt-5 countContainer d-flex justify-content-around">
        <div class="candidates">
            <h4 class="text-black text-center ">{{$data->total()}}</h4>
            <h5 class="text-black-50 text-center">Candidates</h5>
        </div>
        <div class="candidates">
            <h4 class="text-black text-center">{{$jobCount}}</h4>
            <h5 class="text-black-50 text-center">Jobs Posted</h5>
        </div>
        <div class="candidates">
            <h4 class="text-black text-center">300</h4>
            <h5 class="text-black-50  text-center">Jobs Filled</h5>
        </div>
        <div class="candidates">
            <h4 class=" text-black text-center">90</h4>
            <h5 class="text-black-50 ">Companies</h5>
        </div>
    </div>
   </div>
   </div>

   <div class="jobsListed p-4">
    <div class="d-flex justify-content-center">
        <h1 class="jobListHeader fw-normal mt-5">{{$jobs->total()}} Jobs Listed</h1>

    </div>
    <div class=" overflow-hidden border border-1 rounded-2 jobContainer">
        <table class=" d-block bg-white">
            @foreach ($jobs as $job)
                <a href={{ route("CAboutJob", $job->id)}} class=" text-center text-decoration-none eachJob row border-bottom border-1  border-black">
                   <div class="   row col-md-6 col-12">
                       <img src='{{asset('storage/'.$job->CompanyLogo)}}' alt="" class=" logoImg col-md-3 col-11"/>
                      <div class=" col-md-5 col-12 d-flex flex-column justify-content-center  ">
           <div class=" fs-5 text-black  col-md-3 col-12">{{$job["position"]}}</div>
                       <div class=" text-black-50 col-md-3 col-6">{{$job["companyName"]}}</div>
                      </div>
                   </div>
                   <div class=" d-flex align-items-center justify-content-around bgwhite col-md-6 col-12">
<div class=" fs-5 text-black"><i class="fa-solid fa-location-dot m-2 text-warning"></i>{{$job["location"]}}</div>
<div class=" @if ($job['type']==='progress')
bg-success
@else
bg-danger
@endif    border border-1 p-1 rounded-1 jobType text-black">{{$job["type"]}}</div>
                   </div>
                </a>
            @endforeach
            <a href={{route("allListedJob")}} class=" text-decoration-none float-end p-3 fs-4  bg-white">
                <i class="fa-solid fa-arrow-right-long"></i>
                <span class=" me-3"> More  ......</span>
               </a>
            {{-- <div class="bg-white p-2">{!!$jobs->links()!!}</div> --}}
           </table>
    </div>

   </div>
   <div class=" mt-3 jobStatus bg-secondary d-flex  col-12">
<div class="col-12  d-flex justify-content-center my-5  container">
  <div>
    <div class=" text-black ">
        <h3 class=" text-center">Looking For a Job?</h3>
        <h4 class="  text-black-50 fst-normal fw-normal">We appreciate your oppotunity and have succeded over 2000 linking jobs and thanks for joining us..</h4>
    </div>
    <div class=" text-center mt-3">
        <a href={{route("allListedJob")}} class=" p-1 text-white btn btn-danger btn-outline-primary rounded-3 col-6">Apply job</a>
    </div>
  </div>
</div>
   </div>

   <div class="helpSection my-5">
    <h2 class=" text-center mb-1 text-white">Companies We have helped</h2>
    <h5 class=" text-white-50 fw-normal text-center mb-5">Nothing is more expensive than a missed opportunity.</h5>
    <div class=" mt-3 col-12  d-flex justify-content-center  ">
     <div class=" logoContainer  row  col-7">
        <i class="fa-brands fa-cc-visa  col-md-4  col-6 text-center  mb-3 "></i>
        <i class="fa-brands fa-cc-mastercard  col-md-4  col-6 text-center mb-3"></i>
        <i class="fa-brands fa-cc-stripe col-md-4  col-6 text-center mb-3"></i>
        <i class="fa-brands fa-cc-paypal col-md-4  col-6  text-center mb-3 "></i>
        <i class="fa-brands fa-cc-jcb  col-md-4  col-6  text-center mb-3"></i>
        <i class="fa-brands fa-cc-discover  col-md-4  col-6  text-center mb-3"></i>
        <i class="fa-brands fa-cc-apple-pay  col-md-4  col-6  text-center mb-3"></i>
        <i class="fa-regular fa-closed-captioning  col-md-4  col-6  text-center mb-3"></i>
        <i class="fa-brands fa-accusoft  col-md-4  col-6  text-center mb-3"></i>
     </div>
    </div>
   </div>


   <div class="container-lg mt-4" id="members">
    <div class="d-flex justify-content-center mb-4">
      <h3 class="fw-bold text-white">Reviews by Clients</h3>
    </div>
    <div
      class="memberContainer card py-3 mx-md-5 carousel slide bg-light my-4"
      id="carouselExampleIndicators"
    >
      <div class="carousel-indicators bg-light">
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="0"
          class="active bg-danger"
          aria-current="true"
          aria-label="Slide 1"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="1"
          aria-label="Slide 2"
          class="bg-danger"
        ></button>
        <button
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide-to="2"
          aria-label="Slide 3"
          class="bg-danger"
        ></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="member d-flex justify-content-center">
            <img
              src="https://th.bing.com/th/id/OIP.G4oesoGTB_snOYL9dBFdHgAAAA?w=177&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7"
              alt=""
              class="rounded-circle"
              style="width: 90px; height: 90px"
            />
            <div class=" d-flex flex-column justify-content-center ms-3">
              <div class="fs-4 fw-bold">Kaung Kaung</div>
              <div class="text-muted mb-4">(Front-end developer)</div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="text-muted text-center col-11 col-md-6 py-3">
              I am studying at school in my city. I am presently in class
              10th. I feel happy to be a part of this great school with the
              good friends, helpful and loving teacher and sound school
              administration. I have extraordinary skills in some subjects
              whereas I am very weak in the few.
            </div>
          </div>
          <div class="d-flex justify-content-center mb-5">
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
          </div>
        </div>

        <div class="carousel-item">
          <div class="member d-flex justify-content-center">
            <img
              src="https://th.bing.com/th?q=Profile+Jpg&w=120&h=120&c=1&rs=1&qlt=90&cb=1&dpr=1.3&pid=InlineBlock&mkt=en-WW&cc=MM&setlang=en&adlt=moderate&t=1&mw=247"
              alt=""
              class="rounded-circle"
              style="width: 90px; height: 90px"
            />
            <div class="d-flex flex-column justify-content-center ms-3">
              <div class="fs-4 fw-bold">Hu Sein</div>
              <div class="text-muted mb-4">(UI, UX designer)</div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="text-muted text-center col-11 col-md-6 py-3">
              The two forces involved in Byron\'s poem are the darkness and
              light- at work in the woman\'s beauty, and also the two areas
              of her beauty-the internal and the external. The poem appears
              to be about a lover, but in fact was written about "Byron\'s
              cousin, Anne Wilmot, whom he met at a party in a mourning
              dress of spangled black" (Leung 312). This fact, the black
              dress that was brightened with spangles, helps the reader to
              understand the origin of the poem.
            </div>
          </div>
          <div class="d-flex justify-content-center mb-5">
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
          </div>
        </div>

        <div class="carousel-item">
          <div class="member d-flex justify-content-center">
            <img
              src="data:image/jpeg;base64,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"
              alt=""
              class="rounded-circle"
              style="width: 90px; height: 90px"
            />
            <div class="d-flex flex-column justify-content-center ms-3">
              <div class="fs-4 fw-bold">Htet Arkar</div>
              <div class="text-muted mb-4">(Full Stack developer)</div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <div class="text-muted text-center col-11 col-md-6 py-3">
              Beginning with line five, the word "meet" is emphasized again
              as she creates a "tender light," not the gaudiness of daytime,
              but a gentler light that even "heaven" does not bestow an the
              day. The night can be thought of in terms of irrationality and
              the day in terms or reason and neither day nor night is
              pleasing, only the meeting of the two extremes in this woman
            </div>
          </div>
          <div class="d-flex justify-content-center mb-5">
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
            <i class="fa-solid fa-star text-danger me-1"></i>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev"
      >
        <span
          class="carousel-control-prev-icon bg-danger pb-5"
          aria-hidden="true"
        ></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next"
      >
        <span
          class="carousel-control-next-icon bg-danger pb-5"
          aria-hidden="true"
        ></span>
        <span class="visually-hidden">Next</span>
      </button>
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

<div class=" col-md-5 col-11 offset-1  mt-3 d-flex justify-content-start"> <div>
    @if (session('emailed'))
    <div class="alert alert-info alert-dismissible">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{session('emailed')}}
      </div>
    @endif
    <form action="{{route('postMail')}}" method="POST" class=" mt-4">
        @csrf
        <input type="text" name="name" placeholder=" Enter Your Name" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"/>

    <input type="email" name="email" placeholder="Enter Your Email" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2" id="">

    <input type="text" name="subject" placeholder="Enter Subject" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"/>
    {{-- @error('subject')
    <small class=" mb-3 d-block text-danger">{{$message}}</small>
    @enderror --}}
    @if (session('emailError'))
    <small class=" mb-3 d-block text-danger">{{session('emailError')}}</small>
    @endif
    <textarea name="description" placeholder="Enter Your Message" id="" cols="30" rows="10" class="mb-3 col-md-8 col-11 border-0  rounded-2 p-2"></textarea>

    <div class=" col-md-8 col-11 d-flex justify-content-center">

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
