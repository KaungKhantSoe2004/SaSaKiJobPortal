@extends('main')

@section('body')
<h2 class=" ms-5 pt-5 mt-5 text-white">Home/Blog Page</h2>
<div class="container">
    <div class="aboutPara fst-italic text-white overflow-hidden">
    &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure fugit, reiciendis dolorem asperiores recusandae, cupiditate ab perferendis, fuga voluptatem perspiciatis nostrum nemo porro consectetur facere et! Ratione quod, fugit fuga veniam quas adipisci exercitationem iure voluptates ex provident architecto consequatur, obcaecati, earum optio aperiam aliquid? Maiores architecto quam eaque, earum nemo, illum perspiciatis iure enim voluptatum quae, possimus corporis. Eaque dolorum soluta atque, nulla ducim

    tetur adipisicing elit. Quia praesentium veritatis, corrupti temporibus reprehenderit eligendi laudantium rem quibusdam, tenetur in quae
     assumenda quam natus molestiae, dolor asperiores voluptatum. Molestiae eveniet id quaerat, porro dolor corporis iure aliquam enim prae
     sentium cum nostrum in odio? Ad modi atque laudantium illum et odio amet, adipisci impedit nobis, ipsa, obcaecati dolorum laboriosam rat
     ione necessitatibus inventore! Quod vero quo odio vitae perferendis temporibus numquam aliquam eos maiores? Placeat aliquam unde of
     ficiis. A quaerat odio praesentium nam! Officia officiis nihil, aliquam fugit quis veritatis sed laborum ad error ducimus iure dolorum
      autem suscipit deserunt assumenda sequi.</div>
</div>

</div>
</div>
<div class=" blogContainer">
    <div class=" d-flex  justify-content-center ">
        <h2 class=" text-white my-4">Our Blogs</h2>
        </div>


        {{-- <h1 class=" text-white"> {{$paginatedData->total()}}</h1> --}}
        <div class=" offset-md-1 offset-0 row container text- blogsContainer">
          @foreach ($paginatedData as $eachData )
<a  href={{route("blogUserDetails", $eachData->id)}} class="  text-decoration-none my-3 col-md-3 col-11 offset-1 card">
    <img class="" style=" height: 300px; width:100%" src='{{asset("storage/".$eachData->img)}}'  />
    <div class=" card-body">
      <div>  {{ $eachData->title}}</div>
      <div> {{$eachData->created_at->format("j/M/Y")}}</div>
    </div>

</a>
          @endforeach
        </div>
</div>
</div>
@endsection
