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
    <div class="text-left m-2 text-md-center text-sm-center text-xs-center">

        <p class="p-1">
            <i class="fas fa-calendar-alt"></i> &nbsp; {{ $bedate }}, &nbsp;{{ $bdate['0'] }} {{ $bdate['1'] }}
            {{ $bdate['2'] }}, &nbsp;{{ $edate }}

        </p>
    </div>



    <div class="">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="menuheadin">
                     <h5 class="p-1 ">আর্কাইভ</h5>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">





                <form method="POST"  class="form-row " id="newsid" action="{{ route('default.archivesearch') }}" enctype="multipart/form-data">
                    @csrf

                    @include('datetime')

                </form>



            </div>

        </div>

    </div>

    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="row">

                                @php
                                $latest = 1;
                                @endphp

                                @foreach($archivenews as $value)




                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                                        <div class=" shadow newzCardmidd linkUnLiRemove mb-4">
                                            <a href="{{ route('defoultnews.show',$value->id) }}">

                                                <div class="newzCardImagemidd text-center">

                                                    <img class=" p-2 img-fluid" src="{{$value->picture['0']}}" alt="Card image cap">

                                                </div>

                                                <div class="newzCardContentmidd p-2">

                                                    <h6 class="mt-2 newsheadin"><b>{{ $value->headline }}</b></h6>

                                                </div>

                                            </a>

                                        </div>

                                    </div>


                                    @php
                                    $latest++
                                    @endphp



                                    @endforeach




                            </div>



                        </div>


                    </div>

                    <div class="text-center pagination ">


                        {{ $archivenews->links() }}


                     </div>







                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">

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




                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                             <div class="readNewz">
                                @include('opennewz')
                            </div>


                        </div>

                    </div>



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="squre2addbox">
                                <div class="text-center p-1 m-2">
                                    <a class="nav-link" href="{{$add['1']->url}}" target="_blank">
                                        <img class="img-thumbnail" src="{{$add['1']->location}}">
                                    </a>

                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="latestNewz">
                                @include('latestnewz')
                            </div>


                        </div>

                    </div>




                </div>


            </div>

        </div>

    </div>




    <div class="row ">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

            @include('googleadd')

        </div>

    </div>

    <div class="row ">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

            @include('footernewz')

        </div>

    </div>

    <div class="m-1 p-2 text-center">
        <div class="headbanner text-center">
            <div class="m-1 p-1">
                <a class="nav-link" href="{{$add['4']->url}}" target="_blank">
                    <img class="img-thumbnail" src="{{$add['4']->location}}" alt="Card image cap">
                </a>
            </div>

        </div>

    </div>


    <div class="m-4">
        &nbsp;
    </div>


    <div class="footer">
        @include('footer')
    </div>

</div>
@endsection
