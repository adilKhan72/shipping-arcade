@extends('layouts.app')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Compare Companies</h1>
            <p class="breadcrumb-custom"><a href="index.html">Home</a> <span class="mx-2">&gt;</span> <span>Compare_Companies</span></p>
          </div>
        </div>
      </div>
    </div>  

    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">

            
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form method="post"  action="{{action('HomeController@compareCompaniesSubmit')}}" accept-charset="UTF-8" class="p-5 bg-white">
            @csrf
            <label class="text-black" for="subject"><b>Compare Company</b></label>
            <hr/>
              <!-- <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Full Name</label>
                  <input name="name" type="text" id="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Phone Number</label>
                  <input name="number" type="number" id="lname" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input name="email" type="email" id="email" class="form-control" required>
                </div>
              </div> 
              <hr/>-->
              <label class="text-black" for="subject"><b>Moving From</b></label> 
              
              <div class="row form-group">
                
                <div class="col-md-6">
                  <label class="text-black" for="subject">Street</label> 
                  <input type="text" name="street-from" id="subject" class="form-control" >
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Postal Code</label> 
                  <input type="text" name="postal-code-from" id="subject" class="form-control" >
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-6">
                <label class="text-black">City*</label>
                  <select name="city_id_from" class="select2 select_city" id="" data-placeholder="Select a State" style="width: 100%;" required>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Country*</label> 
                  <select name="country_id_from" class="select2 select_country" id="" data-placeholder="Select a Country" style="width: 100%;" required>
                </select>
                </div>
              </div>
              <!-- <div class="row form-check "> 
                <div class="col-md-6 ">
                  <input class="form-check-input" type="checkbox" name="storage" value="storage">
                  <label class="form-check-label" for="defaultCheck1">
                  I will require storage
                  </label>
                </div>
                <div class="col-md-6 ">
                  <input class="form-check-input" type="checkbox" name="elevator" value="elevator">
                  <label class="form-check-label" for="defaultCheck1">
                  Elevator available?
                  </label>
                </div>
                
              </div> -->
              <hr/>

              <label class="text-black" for="subject"><b>Moving To</b></label> 
              
              <div class="row form-group">
                
                <div class="col-md-6">
                  <label class="text-black" for="subject">Street</label> 
                  <input name="street-to" type="text" id="subject" class="form-control" > 
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Postal Code</label> 
                  <input type="text" name="postal-code-to" id="subject" class="form-control" >
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-6">
                <label class="text-black">City*</label>
                  <select name="city_id_to" class="select2 select_city" id="" data-placeholder="Select a State" style="width: 100%;" required>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Country*</label> 
                  <select name="country_id_to" class="select2 select_country" id="" data-placeholder="Select a Country" style="width: 100%;" required>
                </select>
                </div>
              </div>



<!-- 
              <div class="row form-check "> 
                <div class="col-md-6 ">
                  <input class="form-check-input" type="checkbox" value="children"  name="children" >
                  <label class="form-check-label" >
                  Children
                  </label>
                </div>
                </div>
              <div class="row form-check "> 
                <div class="col-md-6 ">
                  <input class="form-check-input" type="checkbox" value="pets" name="pets">
                  <label class="form-check-label" >
                  Pets
                  </label>
                </div>
                </div>
              <div class="row form-check "> 
                <div class="col-md-6 ">
                  <input class="form-check-input" type="checkbox" value="car" name="car" >
                  <label class="form-check-label">
                  Car
                  </label>
                </div>
              </div> -->

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Compare" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
          <!-- <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
            
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">More Info</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
              <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
            </div>

          </div> -->
        </div>
      </div>
    </div>
@endsection
@section('jquery')
  <script>
  $(document).ready(function(){
  
    $('.select_country').select2({
      ajax: {
        url: '{{URL::route("country_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });

    $('.select_city').select2({
      ajax: {
        url: '{{URL::route("city_select")}}',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
            "_token": "{{ csrf_token() }}",
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
    });
  });
    </script>
  @endsection