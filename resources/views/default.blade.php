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


    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
            <div class="row">

                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 linkUnLiRemove">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <a href="{{ route('defoultnews.show',$headline->id) }}" class="">
                                <div class=" shadow  headnewsBox rounded">
                                    <div class="headimageBox">
                                        <div class="m-1 text-center">
                                            <img class="img-thumbnail" src="{{$headline->picture['0']}}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                    <div class="headigBox">
                                        <div class="text-center p-1 m-1 newsheadin  ">
                                            <h5 class="m-1 p-2 "> <b>{{ $headline->headline }}</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 linkUnLiRemove">

                    @php
                    $latest = 1;
                    @endphp

                    @foreach ($news as $newsvalue )
                    @if($latest <= 4) <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" class="">

                            <a href="{{ route('defoultnews.show',$newsvalue->id) }}" class="">
                                <div class="shadow rounded verticaleBox">
                                    <div class="row">

                                        <div class="col-4">
                                            <div class="verticleimageBox">
                                                <img class="p-2 m-1 img-fluid" src="{{$newsvalue->picture['0']}}"
                                                    alt="Card image cap">

                                            </div>

                                        </div>

                                        <div class="col-8">
                                            <div class="verticleheadigBox">
                                                <h6 class="pt-4 pb-4 pl-1 pr-1 newsheadin">
                                                    <b>{{ $newsvalue->headline }}</b></h6>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>






                </div>

                @endif

                @php
                $latest++
                @endphp
                @endforeach




            </div>

        </div>

    </div>




    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
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
    </div>


</div>



<hr>


<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 ">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="row">


                    @foreach($random as $value)

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class=" shadow newzCard linkUnLiRemove mb-4">
                            <a href="{{ route('defoultnews.show',$value->id) }}">

                                <div class="newzCardImage text-center">

                                    <img class=" p-2 img-fluid" src="{{$value->picture['0']}}" alt="Card image cap">

                                </div>

                                <div class="newzCardContent p-2">

                                    <h5 class="mt-2 text-center newsheadin"><b>{{ $value->headline }}</b></h5>

                                    <span class="newsheadin">{!! preg_replace('/\s+?(\S+)?$/', '',
                                        substr($value->description, 0, 200)) !!}...</span>

                                </div>

                            </a>

                        </div>

                    </div>



                    @endforeach

                </div>

            </div>

        </div>




    </div>










    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="readNewz">
                    @include('opennewz')
                </div>

            </div>

        </div>

    </div>

</div>



<div class="text-center googlebanner mt-5 mb-5">
    google add

</div>


<div class="menuheadin">
    <h5 class="p-1 ">বাংলাদেশ</h5>
</div>

<div class="row">


    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">



        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">

                        @foreach ($mainmenu as $idvalue)

                        @if($idvalue->banglaname == "বাংলাদেশ")
                        @php
                        $bangladeshID = $idvalue->id;
                        @endphp
                        @endif

                        @if($idvalue->banglaname == "আন্তর্জাতিক")
                        @php
                        $internationalID = $idvalue->id;
                        @endphp
                        @endif

                        @if($idvalue->banglaname == "ছবি")
                        @php
                        $picID = $idvalue->id;
                        @endphp
                        @endif

                        @if($idvalue->banglaname == "বিনোদন")
                        @php
                        $entertainID = $idvalue->id;
                        @endphp
                        @endif

                        @if($idvalue->banglaname == "খেলা")
                        @php
                        $playID = $idvalue->id;
                        @endphp
                        @endif

                        @if($idvalue->banglaname == "প্রবাশ")
                        @php
                        $foraginID = $idvalue->id;
                        @endphp
                        @endif


                        @endforeach


                        @php
                        $latest = 1;
                        @endphp

                        @foreach($news as $value)

                        @if(($latest < 7) && ($bangladeshID==$value->mainmenu_id))



                            <div class="shadow verticalebigbox mb-3">

                                <a href="{{ route('defoultnews.show',$value->id) }}">

                                    <div class="row">

                                        <div class="col-4 ">
                                            <div class="verticalebigboxImage">

                                                <img class="p-1 m-2  img-fluid" src="{{$value->picture['0']}}"
                                                    alt="Card image cap">

                                            </div>

                                        </div>

                                        <div class="col-8">

                                            <div class="verticalebigboxContent">

                                                <h4 class=" m-1 mt-3 p-2 newsheadin"><b
                                                        class="fontsize">{{ $value->headline }}</b></h4>

                                                <span class="d-none  d-md-block m-2 newsheadin">{!!preg_replace('/\s+?(\S+)?$/', '',substr($value->description, 0, 400)) !!}...</span>




                                            </div>

                                        </div>

                                    </div>

                                </a>

                            </div>



                            @php
                            $latest++
                            @endphp

                            @endif



                            @endforeach

                    </div>



                </div>

            </div>
        </div>

    </div>

    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
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



<div class="row ">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

        @include('googleadd')

    </div>

</div>


<div class="m-4">
    &nbsp;
</div>

<div class="menuheadin">
    <h5 class="p-1 ">আন্তর্জাতিক</h5>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">

            @php
            $latest = 1;
            @endphp

            @foreach($news as $value)

            @if(($latest < 13) && ($internationalID==$value->mainmenu_id))


                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">
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

                @endif



                @endforeach




        </div>
    </div>
</div>

<div class="m-4">
    &nbsp;
</div>

<div class="menuheadin">
    <h5 class="p-1 ">ছবি</h5>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="row">

            @foreach($pic as $key => $picvalue)



            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-3 linkUnLiRemove">
                <a href="{{ route('default.picall',$key) }}">
                    <div class="shadow imageBox">

                        <div class="p-2 imageBoxImage text-center">
                            <img class=" p-1 img-fluid" src="{{$picvalue['0']->location}}" alt="Card image cap">
                        </div>
                        <div class="p-2 imageBoxContent">
                            <h5 class="text-center newsheadin">এক ঝলক ({{ $key }})</h5>
                        </div>

                    </div>
                </a>
            </div>

            @endforeach

        </div>

    </div>

</div>




<div class="m-4">
    &nbsp;
</div>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

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
