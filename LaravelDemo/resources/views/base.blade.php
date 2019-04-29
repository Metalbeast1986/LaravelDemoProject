<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel 5.8 & MySQL CRUD Tutorial</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">

 	<div id="main_menu">
        <ul>
          <li><a href="{{ url('/') }}">Main</a></li>        
          <li><a href="{{ url('doctor') }}">Doctors list</a></li>         
        </ul>
        <ul>       
          <li><a href="{{ url('patient') }}">Patient list</a></li>
        </ul>
        <ul>       
          <li><a href="{{ url('visit') }}">Visits list</a></li>
        </ul>
        <div class="clear"></div>
      </div>

    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>