@extends('layouts.default')

@section('content')


<div class="container-fluid mt-1">

    {{-- add section head banner --}}
    <div class="m-1 p-2 text-center">
        <div class="headbanner text-center">
            <div class="m-1 p-1">
                <a class="nav-link" href="{{$add['2']->url}}" target="_blank">
                    <img class="img-thumbnail" src="{{$add['3']->location}}" alt="Card image cap">
                </a>
            </div>

        </div>

    </div>



    {{-- date section --}}
    <div class="text-left m-2">
        <p class="p-1">
            <i class="fas fa-calendar-alt"></i> &nbsp; {{ $bedate }}, &nbsp;{{ $bdate['0'] }} {{ $bdate['1'] }}
            {{ $bdate['2'] }}, &nbsp;{{ $edate }}

        </p>
    </div>

    {{-- <div class="m-4">
        &nbsp;
    </div> --}}

    <div class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="menuheadin">
                     <h5 class="p-1 ">ছবি</h5>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <form method="POST"  class="form-row" id="newsid" action="{{ route('default.picsearch') }}" enctype="multipart/form-data">
                    @csrf

                    @include('datetime')

                </form>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">


                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-9 col-xl-9">



                    <div class="row">

                        @if($pic->isEmpty())

                        <div class="m-5 text-center">
                            <h4 class="text-center"> Sorry No Data Found </h4>
                        </div>

                        @else


                        @foreach($pic as $key => $picvalue)


                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-6 col-xl-6 mb-3 ">
                            {{-- <a href="{{ route('defoultnews.show',$picvalue->day) }}"> --}}
                                <div class="shadow imageBoxbig">

                                    <div class="p-2 imageBoxImagebig text-center">
                                        <img class=" p-1 img-fluid" src="{{$picvalue->location}}" alt="Card image cap">
                                    </div>
                                    <div class=" p-2 imageBoxContentBig">
                                        <span class="">{!!$picvalue->description !!}</span>
                                    </div>

                                </div>
                            {{-- </a> --}}
                        </div>

                        @endforeach

                     @endif

                    </div>

                    <div class="text-center pagination ">

                        {{ $pic->links() }}

                    </div>



                </div>



                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3 col-xl-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="squre1addbox">
                                        <div class="text-center p-1 m-2">
                                            <a class="nav-link" href="{{$add['0']->url}}" target="_blank">
                                                <img class="img-thumbnail" src="{{$add['0']->location}}">
                                            </a>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="mt-1">
                                &nbsp;
                            </div>

                            <div class="row">

                                @foreach($gpic as $pics => $picvalue)



                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3 linkUnLiRemove">
                                    <a href="{{ route('default.picall',$pics) }}">
                                        <div class="shadow imageBox">

                                            <div class="p-2 imageBoxImage text-center">
                                                <img class=" p-1 img-fluid" src="{{$picvalue['0']->location}}" alt="Card image cap">
                                            </div>
                                            <div class="p-2 imageBoxContent">
                                                <h5 class="text-center newsheadin">এক ঝলক ({{ $pics }})</h5>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>
</div>
@endsection


