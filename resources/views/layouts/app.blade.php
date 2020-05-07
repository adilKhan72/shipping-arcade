<!DOCTYPE html>
<html lang="en">
  <head>
@include('includes.head')
</head>
<body>
    <div id="app">

    @include('includes.header')
       
    @yield('content')

    @include('includes.footer')
    </div>
</body>
</html>
