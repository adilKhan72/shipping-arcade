@extends('layouts.app')
@section('content')
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white font-weight-light text-uppercase font-weight-bold">Register Company</h1>
            <p class="breadcrumb-custom"><a href="index.html">Home</a> <span class="mx-2">&gt;</span> <span>Register_company</span></p>
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
          <form method="post"  action="{{action('HomeController@registerCompaniesSubmit')}}" accept-charset="UTF-8" class="p-5 bg-white">
            @csrf
            
              <label class="text-black" for="subject"><b>Register Your Company</b></label>
              <hr/> 
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Full Name*</label>
                  <input name="name" type="text" id="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Phone Number*</label>
                  <input name="number" type="number" id="lname" class="form-control" required>
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-6">
                  <label class="text-black" for="email">Email*</label> 
                  <input name="email" type="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Job Title*</label> 
                  <input name="job" type="text" id="job" class="form-control" required>
                </div>
              </div>
              
              <label class="text-black" for="subject"><b>Company information</b></label> 
              <hr/>
              <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="subject">Company Name*</label> 
                  <input type="text" id="name_of_business" name="company_name" placeholder="Select Location on google maps for Company Name" class="form-control readonly"  required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Address*</label> 
                  <input type="text" id="address_of_business" name="address" placeholder="Select Location on google maps for Company Address" class="form-control readonly" required>
                </div>
                </div>
                <div class="row form-group">
                <div class="col-md-6">
                <label class="text-black">City*</label>
                  <select name="city_id" class="select2 select_city" id="" data-placeholder="Select a State" style="width: 100%;" required>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Country*</label> 
                  <select name="country_id" class="select2 select_country" id="" data-placeholder="Select a Country" style="width: 100%;" required>
                </select>
                </div>
              </div>
                <div class="row form-group">
                <div class="col-md-6">
                  <label class="text-black" for="subject">Postal Code*</label> 
                  <input type="text" name="postal_code"  class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Website*</label> 
                  <input type="url" name="website" class="form-control" required>
                </div>
                </div>
                <div class="row form-group">
                
                <div class="col-md-6">
                <label class="text-black">Leads from City*</label>
                  <select name="leads_from_cities_ids" class="select2 select_city" id="" data-placeholder="Select a State" style="width: 100%;" required>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="subject">Leads from Country*</label> 
                  <select name="leads_from_countries_ids" class="select2 select_country" id="" data-placeholder="Select a Country" style="width: 100%;" required>
                </select>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                <label class="text-black">Select your business on google maps (Required)*</label>
          <div style="height: 400px; width:100%; margin: 0; padding: 0;">
            <div style="display: none">
                <input style="width:40%; margin-top:10px;" id="pac-input"
                      class="controls"
                      type="text"
                      placeholder="Enter a location to find your business ID">
            </div> 
            <div id="map" style="height: 400px;"></div>
            <div id="infowindow-content">
                <span id="place-name" class="title"></span><br>
                <strong></strong> <span id="place-id"></span><br>
                <span id="place-address"></span>
            </div>
          </div>

          </div>
              </div>      

              <div class="row form-group">
                
                <div class="col-md-12">
                <label class="text-black">Google Place ID*</label>
                <input type="text" id="google_place_id_from_api" placeholder="Select Place from google maps for Place_ID" name="google_place_id_from_api"  class="form-control readonly" required >
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Register Your Company" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>





          </div>
</div>










      </div>
    </div>
@endsection
@section('javascript')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2L2ziPq3bpkrXLraeWU1xZJxqrLJ30mQ&libraries=places&callback=initMap"
            async defer></script>
<script>
document.getElementById("google_place_id_from_api").value = "";
document.getElementById("name_of_business").value = "";
document.getElementById("address_of_business").value = "";
function initMap() {
    console.log('enabled');
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13
  });

  var input = document.getElementById('pac-input');

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  // Specify just the place data fields that you need.
  autocomplete.setFields(
      ['place_id', 'geometry', 'name', 'formatted_address']);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var infowindowContent = document.getElementById('infowindow-content');
  infowindow.setContent(infowindowContent);

  var marker = new google.maps.Marker({map: map});

  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  autocomplete.addListener('place_changed', function() {
    infowindow.close();

    var place = autocomplete.getPlace();

    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location
    });

    marker.setVisible(true);

    infowindowContent.children['place-name'].textContent = place.name;
    infowindowContent.children['place-id'].textContent = place.place_id;
    infowindowContent.children['place-address'].textContent =
        place.formatted_address;
    infowindow.open(map, marker);
    document.getElementById("google_place_id_from_api").value = place.place_id;
    document.getElementById("name_of_business").value = place.name;
    document.getElementById("address_of_business").value = place.formatted_address;
  });
}
</script>
@endsection
@section('jquery')
  <script>

  $(document).ready(function(){
      $(".readonly").keydown(function(e){
        e.preventDefault();
    });
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