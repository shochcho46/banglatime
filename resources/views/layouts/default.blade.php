<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    @yield('share')

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/hamburger.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">

    @yield('css')

</head>
<body>
    <div id="app">
        <div class="container-fluid">

            <div class="">
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

                    <a class="navbar-brand" href="{{ route('homepageone') }}">দ্যা বাংলা টাইম</a>
                    <button class="navbar-toggler" type="button" data-trigger="#main_nav">
                      <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse" id="main_nav">
                      <div class="offcanvas-header mt-3">
                        <button class="btn btn-outline-dark btn-close float-right"> &times Close </button>
                        <h5 class="py-2 text-dark">দ্যা বাংলা টাইম</h5>
                      </div>



                      <ul class="navbar-nav d-block d-lg-none">

                          @foreach ($mainmenu as $value)
                          <li class="nav-item "><a class="nav-link " href="{{ route('catagory.catagoryshow',$value->id) }}" ><b class="custom">{{ $value->banglaname }} </b></a> </li>
                          @endforeach


                      </ul>


                      <div class="ml-auto d-none d-lg-block">
                        <ul class="navbar-nav  ">

                        @foreach ($mainmenu as $value)
                        @if($value->display == 1)

                        <li class="nav-item "><a class="nav-link " href="{{ route('catagory.catagoryshow',$value->id) }}"><b class="custom">{{ $value->banglaname }} </b></a> </li>
                        @endif
                        @endforeach


                        </ul>
                    </div>

                      <ul class="navbar-nav d-none d-lg-block">

                        <li class="nav-item dropdown has-mega-menu" id ="dropdown" style="position:static;">

                            {{-- <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a> --}}

                            <div class="nav-icon" data-toggle="dropdown">

                                <div class="hamburger hamburger--spin">
                                    <div class="hamburger-box">
                                      <div class="hamburger-inner"></div>
                                    </div>
                                  </div>
                                  <span>সব</span>
                              </div>

                            <div class="dropdown-menu" id ="megadrop" style="width:100%;margin:0px 0px; ">
                                <div class="px-0 container-fluid">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2 m-2">
                                                    <h6><a class="dropdown-item" href="{{ route('homepageone') }}">প্রচ্ছদ</a></h6>
                                                </div>
                                                @foreach ($mainmenu as $value)

                                                <div class="col-md-2 m-2">
                                                    <h6><a class="dropdown-item" href="{{ route('catagory.catagoryshow',$value->id) }}">{{ $value->banglaname }}</a></h6>
                                                </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            @php $pics = 1 @endphp
                                            @php $archive = 1 @endphp
                                            <div class="col-12">


                                                <a class="dropdown-item " href="{{ route('default.picall',$pics) }}"> <i class="fas fa-camera"></i> ছবি </a>


                                                <a class="dropdown-item " href="https://www.youtube.com/"> <i class="fas fa-video"></i> ভিডিও </a>
                                                <a class="dropdown-item" href="{{ route('default.archive',$archive) }}"><i class="fas fa-file-archive"></i> আর্কাইভ</a>

                                                <a class="dropdown-item " href="{{ route('default.commonpicall',$pics) }}"> <i class="fas fa-camera"></i> Firoz </a>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>




                      @auth


                      <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               <img class='img-circle' src='{{ Auth::user()->location }}' width="25px" height="20px"/>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                              <a class="dropdown-item" href="{{ route('save.index') }}">Save News</a>

                              @if((Auth::user()->type == "ADMIN")||(Auth::user()->type == "SUBADMIN"))

                              <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                              @endif


                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                               Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </div>
                          </li>


                    </ul>



                    @endauth

                    @guest
                      <ul class="navbar-nav">
                        <li class="nav-item "><a class="nav-link " href="{{ route('login') }}"><b class="custom">Login </b></a> </li>
                      </ul>
                   @endguest

                   <ul class="navbar-nav">
                    <li class="nav-item "><a class="nav-link " href="{{ route('login') }}"><b class="custom" style="color: blue"><i class="fab fa-facebook-f"></i> </b></a> </li>
                    <li class="nav-item "><a class="nav-link " href="{{ route('login') }}"><b class="custom" style="color: red"><i class="fab fa-youtube"></i> </b></a> </li>
                    <li class="nav-item "><a class="nav-link " href="{{ route('login') }}"><b class="custom" style="color: blue"><i class="fab fa-twitter"></i> </b></a> </li>
                  </ul>
                    </div> <!-- navbar-collapse.// -->
                  </nav>

            </div>



            <main class="py-4">

                <div class="row mt-5">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

                        <div class="row">

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">

                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


                                    <form method="POST"  class="form-row" id="newsid" action="{{ route('default.normalsearch') }}" enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 ">

                                            <input type="text" name="normalsearch" class="form-control text-center"  placeholder="অনুসন্ধান করুন" required>
                                        </div>
                                        <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                            <button type="submit" class="btn btn-outline-dark btn-block"><i class="fas fa-search"></i></button>
                                        </div>


                                    </form>

                                </div>

                                </div>

                            </div>

                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">

                            </div>

                        </div>



                    </div>

                </div>



                @yield('content')
            </main>
        </div>
    </div>
</body>
{{-- <script src="{{ asset('js/jquery.js') }}" defer></script> --}}
<script src="{{ asset('js/jquery.js') }}" ></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script src="{{ asset('js/sidenav.js') }}" ></script>
<script src="{{ asset('fontawesome/js/all.js') }}" ></script>




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


@yield('script')

</html>
