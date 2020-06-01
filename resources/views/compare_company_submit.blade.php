@extends('layouts.app')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Results Page</h1>
            <p class="breadcrumb-custom"><a href="index.html">Home</a> <span class="mx-2">&gt;</span> <span>Results</span></p>
          </div>
        </div>
      </div>
    </div>  

    
    <div class="site-section bg-light">
      <div class="container">
      <div class="row">
      <div class="col-md-12 mb-5" id="results">
      <h3 style="text-align:center;"> Results...</h3>
      </div>
      </div>
        <div class="row">
        @if (count($results) > 0)
        @foreach ($results as $result)

        <div class="col-md-4 mb-5" id="results">

        <div class="card" style="">
  <div class="card-body">
    <h5 class="card-title">{{$result->company_name}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Address : {{$result->address}} </h6>
    <p class="card-text mb-3 "><div id="google-reviews"></div></p>
    <h6 class="card-subtitle mb-2 text-muted">Leads From : {{$result->lead_country->title}} | {{$result->lead_city->title}} </h6>
    <a href="//{{$result->website}}/" class="card-link" target="_blank">Go to Website</a>
    <a class="card-link"  href="#" id="{{$result->place_id}}" onclick="myFunction('{{$result->place_id}}')" data-toggle="modal" data-target="#exampleModalLong">Details</a>
  </div>
</div>

        </div>
        @endforeach
        @else
        <div class="col-md-6 mb-5" id="results">
          Don't have any records!
          </div>
        @endif
        </div>
      </div>
    </div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Reviews</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_for_reviews">


      <div class="card" style="width: 100%">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

<div class="card" style="width: 100%">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
  <script>
  var x = '';
   function myFunction(e) {
    x = e;
    };
    </script>
@endsection

@section('jquery')
  <script>
  var x = '';
   function myFunction(e) {
    x = e;
    };
  $(document).ready(function(e){
    $('#exampleModalLong').on('shown.bs.modal', function (e) {
      $("#modal_for_reviews").html("");
      //alert(x);
      //alert($(this).attr("id"));
      $.ajax({
          url: '{{URL::route("reviews")}}',
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            place_id:x,
          },
          success:function(response){
            var html = "";
            var reviews = response.result.reviews;
            console.log(response.result.reviews);
            for (x in reviews) {
                //console.log(reviews[x]);
                html += '<div class="card" style="width: 100%"><div class="card-body"><h5 class="card-title">'+reviews[x].author_name+'</h5><h6 class="card-subtitle mb-2 text-muted">'+reviews[x].relative_time_description+'</h6><p class="card-text">'+reviews[x].text+'</p></div></div>';
              }
              $("#modal_for_reviews").html(html); 
          }

         });
 
    });
  });
  </script>
  @endsection