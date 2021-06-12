<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/hamburger.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse" id="navbarNavDropdown">
                    <div class="offcanvas-header mt-3">
                        <button class="btn btn-outline-dark btn-close float-right"> &times Close </button>
                        <h5 class="py-2 text-dark">দ্যাবাংলাটাইম</h5>
                      </div>


                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item "><a class="nav-link " href="#"><b class="custom">Home </b></a> </li>
                        <li class="nav-item "><a class="nav-link" href="#"><b class="custom">About</b>  </a></li>
                        <li class="nav-item "><a class="nav-link" href="#"> <b class="custom">Services </b></a></li>


                      </ul>
                    <ul class="navbar-nav d-none d-md-block">

                        <li class="nav-item dropdown has-mega-menu" id ="dropdown" style="position:static;">

                            {{-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a> --}}

                            <div class="nav-icon" data-toggle="dropdown">

                                <div class="hamburger hamburger--spin">
                                    <div class="hamburger-box">
                                      <div class="hamburger-inner"></div>
                                    </div>
                                  </div>

                              </div>

                            <div class="dropdown-menu" id ="megadrop" style="width:100%">
                                <div class="px-0 container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <a class="dropdown-item" href="#">Or a link</a>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <a class="dropdown-item" href="#">Or a link</a>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <a class="dropdown-item" href="#">Or a link</a>
                                        </div>
                                      <div class="col-md-4">
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <a class="dropdown-item" href="#">Or a link</a>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <a class="dropdown-item" href="#">Or a link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>



                </div>
            </nav>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
{{-- <script src="{{ asset('js/jquery.js') }}" defer></script> --}}
<script src="{{ asset('js/jquery.js') }}" ></script>
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script src="{{ asset('js/sidenav.js') }}" defer></script>
<script src="{{ asset('fontawesome/js/all.js') }}" defer></script>

<script type="text/javascript">
   var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
    hamburger.addEventListener("click", function() {
      this.classList.toggle("is-active");
    }, false);
  });
}


</script>
<script type="text/javascript">

  $(".hamburger").click(function(){
     $("#dropdown").toggleClass( "overlay" );
     $("#megadrop").toggleClass( "overlay" );
     $("#dropdown").toggleClass( "show" );
     $("#megadrop").toggleClass( "show" );

});
</script>

</html>
