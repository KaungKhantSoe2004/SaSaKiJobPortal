@extends('main')
@section('body')
<h2 class=" mt-5 ms-4  searchJobText text-white">Home/About</h2>

<div class="aboutContainer overflow-hidden ">
    <h3 class="  mt-3 mb-2 text-center text-white">About Us</h3>
<div class=" aboutPara fst-italic text-white overflow-hidden">
  &nbsp; &nbsp;  &nbsp; The company has a complicated early history. It began at Harvard University in 2003 as Facemash, an online service for students to judge the attractiveness of their fellow students. Because the primary developer, Zuckerberg, violated university policy in acquiring resources for the service, it was shut down after two days. Despite its mayflylike existence, 450 people (who voted 22,000 times) flocked to Facemash. That success prompted Zuckerberg to register the URL http://www.thefacebook.com in January 2004. He then created a new social network at that address with fellow students Saverin, Moskovitz, and Hughes.The year 2005 proved to be pivotal for the company. It became simply Facebook and introduced the idea of “tagging” people in photos that were posted to the site. With tags, people identified themselves and others in images that could be seen by other Facebook friends. Facebook allowed users to upload an unlimited number of photos. In 2005 high-school students and students at universities outside the United States were allowed to join the service. By year’s end it had six million monthly active users.Privacy remains an ongoing problem for Facebook. It first became a serious issue for the company in 2006, when it introduced News Feed, which consisted of every change that a user’s friends had made to their pages. After an outcry from users, Facebook swiftly implemented privacy controls in which users could control what content appeared in News Feed. In 2007 Facebook launched a short-lived service called Beacon that let members’ friends see what products they had purchased from participating companies. It failed because members felt that it encroached on their privacy. Indeed, a survey of consumers in 2010 put Facebook in the bottom 5 percent of companies in customer satisfaction largely because of privacy concerns, and the company continuesm
</div>
</div>

</div>
</div>





<div class="col-12 ">

    <div class="jobStatus bg-secondary d-flex justify-content-center p-4">
        <div class=" m-5">
         <h2 class=" text-black pt-3 text-center heading ">JobBoard Site Status</h2>
         <h4 class=" onYourWay fw-normal text-black-50 text-center">
      You are on your way to doing some great things indeed.Congrulations and best wishes for your new Job !
         </h4>
         <div class=" mt-5 countContainer d-flex justify-content-around">
             <div class="candidates">
                 <h4 class=" text-black text-center ">{{$data->total()}}</h4>
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
</div>




<div class="  container h-100">
    <h3 class=" mt-5 text-center text-white">Why Choose Us</h3>
<h5 class=" text-center text-white-50">Who are in extremely love with eco friendly system.</h5>
<div class=" mt-4 row cardContainer col-12  mb-3">
<div class="eachCard rounded-2 col-md-3 col-11  offset-1  my-3">
  <div class=" d-flex  mt-2 text-start col-12 mb-2">
    <i class="fs-5  pt-1 me-4 text-white fa-regular fa-user"></i>
    <h5 class=" text-white">Expert Technicans</h5>
  </div>
<div class="mb-3 text-white-50">Usage of the Internet is becoming more common due to rapid advancement of technology and power.</div>
</div>
<div class=" eachCard rounded-2 col-md-3 col-11 offset-1  my-3">

    <div class=" d-flex  mt-2 text-start col-12 mb-2">
        <i class= "fs-5  pt-1 me-4 text-white fa-solid fa-envelope-open-text"></i>

        <h5 class=" text-white">Great Support</h5>
      </div>
    <div class="mb-3 text-white-50">I appreciate your support and guidance. Thank you for your availability. I am grateful for your help. </div>
</div>
<div class="eachCard rounded-2 col-md-3 col-11  offset-1 my-3">
    <div class=" d-flex  mt-2 text-start col-12 mb-2">
        <i class="fs-5  pt-1 me-4 text-white fa-solid fa-rocket"></i>

        <h5 class=" text-white">Technical Skills</h5>
      </div>
    <div class="mb-3 text-white-50">Here is a quick update on the progress of [Project Name]. We've completed Phase 1, and Phase 2 is underway.</div>

</div>
<div class="eachCard rounded-2 col-md-3 col-11  offset-1  my-3">
    <div class=" d-flex  mt-2 text-start col-12 mb-2">

        <i class="fs-5  pt-1 me-4 text-white fa-solid fa-gem"></i>
        <h5 class=" text-white">Highly Recommended</h5>
      </div>
    <div class="mb-3 text-white-50">Usage of the Internet is becoming more common due to rapid advancement of technology and power.</div>
</div>
<div class=" eachCard rounded-2 col-md-3 col-11  offset-1  my-3">
    <div class=" d-flex  mt-2 text-start col-12 mb-2">

        <i class="fs-5  pt-1 me-4 text-white fa-solid fa-comment"></i>
        <h5 class=" text-white">Positive Reviews</h5>
      </div>
    <div class="mb-3 text-white-50">Usage of the Internet is becoming more common due to rapid advancement of technology and power.</div>
</div>
<div class="eachCard rounded-2 col-md-3 col-11  offset-1  my-3">
    <div class=" d-flex  mt-2 text-start col-12 mb-2">
        <i class="fs-5  pt-1 me-4 text-white fa-brands fa-buromobelexperte"></i>

        <h5 class=" text-white">Great Support</h5>
      </div>
    <div class="mb-3  text-white-50">Usage of the Internet is becoming more common due to rapid advancement of technology and power.</div>
</div>
</div>
    </div>

    <div class=" col-12 my-5">
        <div class="jobStatus bg-secondary  p-5 ">
            <h3 class=" text-center text-black">If You want to Contact Us!</h3>
            <a href={{route("contact")}} class="  text-decoration-none text-black  d-flex justify-content-center mt-3 col-12">
                <button class=" btn btn-danger col-7">Contact Us</button>
            </a>
        </div>
    </div>

    <div class="container-lg mt-4" id="members">
        <div class="d-flex justify-content-center mb-4">
          <h3 class="fw-bold text-white">Our Team Members</h3>
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
                  src="https://th.bing.com/th/id/R.972f7b1b1d836a21ab3c95e60440663f?rik=xHPBQ1CRBhcVYw&pid=ImgRaw&r=0"
                  alt=""
                  class="rounded-circle"
                  style="width: 90px; height: 90px"
                />
                <div class="d-flex flex-column justify-content-center ms-3">
                  <div class="fs-4 fw-bold">Lin Lin</div>
                  <div class="text-muted mb-4">(Front-end developer)</div>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="text-muted text-center col-11 col-md-6 py-3">
                  Lin Lin is studying at school in my city. I am presently in class
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
                  src="https://th.bing.com/th/id/OIP.UPTEQp9CL9RDDgLZIJBa3wHaHo?pid=ImgDet&w=203&h=209&c=7&dpr=1.3"
                  alt=""
                  class="rounded-circle"
                  style="width: 90px; height: 90px"
                />
                <div class="d-flex flex-column justify-content-center ms-3">
                  <div class="fs-4 fw-bold">Htet Htet Khaing</div>
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
                  src="https://th.bing.com/th/id/OIP.RUlmpgG1DBSBuw257qG3ngHaHa?pid=ImgDet&rs=1"
                  alt=""
                  class="rounded-circle"
                  style="width: 90px; height: 90px"
                />
                <div class="d-flex flex-column justify-content-center ms-3">
                  <div class="fs-4 fw-bold">Kyaw Nanda</div>
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
@endsection
