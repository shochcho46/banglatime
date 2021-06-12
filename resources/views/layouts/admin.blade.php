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
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">

    @yield('css')



</head>

<body>
    <div id="app" class="sb-nav-fixed">


        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a><button
                class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                    class="fas fa-bars"></i></button><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="img-circle" src='{{ Auth::user()->location }}' width="30px" />
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('homepage') }}">News Paper</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            @if(Auth::user()->type == "ADMIN")

                                <div class="sb-sidenav-menu-heading">Menu</div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                                        aria-expanded="false" aria-controls="collapseLayouts">

                                        <div class="sb-nav-link-icon"><i class="fas fa-ellipsis-h"></i></div>
                                        Menu Configure
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                    data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('mainmenus.create') }}">add main menu</a>
                                        <a class="nav-link" href="{{ route('mainmenus.index') }}">main menu list</a>

                                    </nav>
                                </div>

                            @endif

                            <div class="sb-sidenav-menu-heading">News</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#newsLayout"
                                aria-expanded="false" aria-controls="newsLayout">

                                <div class="sb-nav-link-icon"><i class="far fa-newspaper"></i></div>
                                News Configure
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="newsLayout" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('news.create') }}">add news</a>
                                    <a class="nav-link" href="{{ route('news.index') }}">news list</a>

                                </nav>
                            </div>


                            <div class="sb-sidenav-menu-heading"> Photo</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#photoLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="mdi mdi-camera"></i> </div>
                                Picture Configure
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="photoLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('picture.create') }}">add photo</a>
                                    <a class="nav-link" href="{{ route('picture.index') }}">photo list</a>

                                </nav>
                            </div>




                            @if(Auth::user()->type == "ADMIN")

                            <div class="sb-sidenav-menu-heading">Common Photo</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#commonphotoLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="mdi mdi-camera"></i> </div>
                               Common Pic
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="commonphotoLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('Commonpicture.create') }}">add photo</a>
                                    <a class="nav-link" href="{{ route('Commonpicture.index') }}">photo list</a>

                                </nav>
                            </div>

                            @endif








                            @if(Auth::user()->type == "ADMIN")

                            <div class="sb-sidenav-menu-heading">advertise</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#addLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-ad"></i></div>
                                Advertise Configure
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="addLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('addvertisment.create') }}">add advertise</a>
                                    <a class="nav-link" href="{{ route('addvertisment.index') }}">advertise list</a>

                                </nav>
                            </div>

                            @endif


                        @if(Auth::user()->type == "ADMIN")

                            <div class="sb-sidenav-menu-heading">user</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User Configure
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="userLayouts" aria-labelledby="headingOne"
                                data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('user.create') }}">add user</a>
                                    <a class="nav-link" href="{{ route('user.index') }}">user list</a>
                                    <a class="nav-link" href="{{ route('user.normaluser') }}">reg user list</a>

                                </nav>
                            </div>

                         @endif

                            {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>

                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div> --}}




                                {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Charts
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tables
                                </a> --}}


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->type }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">


                        <div>
                            @yield('content')
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{ url('/') }} {{ date('Y') }}</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>






    </div>
</body>
{{--
<body class="sb-nav-fixed">



</body> --}}





{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> --}}

<script src="{{ asset('js/jquery.js') }}"></script>


<script src="{{ asset('admin/js/scripts.js') }}" defer></script>
<script src="{{ asset('fontawesome/js/all.js') }}" defer></script>



@yield('script')

</html>
