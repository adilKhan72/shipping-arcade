<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-3" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-4">
            <h1 class="mb-0"><a href="{{ route('index') }}" class="text-white h2 mb-0">
            <img style="height:50px;" src="{{ URL::asset('images/transparen_logo.png') }}" alt="">
            </a></h1>
          </div>
          <div class="col-12 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="{{ (request()->is('/')) ? 'active' : ''}}"><a href="{{ route('index') }}">Home</a></li>
                <li class="{{ Request::path() == 'about' ? 'active' : ''}}"><a href="{{ route('about') }}">About Us</a></li>
                <li class="has-children">
                  <a href="#">More</a>
                  <ul class="dropdown">
                  <li class=" {{ (request()->is('services')) ? 'active' : ''}}"><a href="{{ route('services') }}">Services</a></li>
                  <li  class="{{ (request()->is('industries')) ? 'active' : ''}}"><a href="{{ route('industries') }}">Industries</a></li>
                <li class="{{ (request()->is('blog')) ? 'active' : ''}}"><a href="{{ route('blog') }}">Blog</a></li>
                <li  class="{{ (request()->is('contact')) ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
                </li>
                <li  class="{{ (request()->is('compare_companies')) ? 'active' : ''}}"><a href="{{ route('compare_companies') }}">Compare</a></li>
                <li  class="{{ (request()->is('register_company')) ? 'active' : ''}}"><a href="{{ route('register_company') }}">Are you a Company ?</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3" style="Color:#958465;"></span></a></div>

          </div>

        </div>
    
      
    </header>

  </div>