@extends('layouts.default')

@section('share')
<meta property="fb:app_id"        content="282090906406525" />
<meta property="og:type"          content="Website" />
<meta property="og:url"           content="{{ url()->current() }}" />
<meta property="og:title"         content="{{ $news->headline }}" />
<meta property="og:image"         content="{{$news->picture['0']}}" />
<meta property="og:description"   content="{!!preg_replace('/\s+?(\S+)?$/', '',substr($news->description, 0, 200)) !!}..." />

@endsection

@section('content')


<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

    <br>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="row">

        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 linkUnLiRemove">

                    <div class="row">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="m-1 newzSharebox">
                                <div class="">
                                    <div class="menuheadin m-3">
                                        <h5 class="p-2 ">{{$news->mainmenu->banglaname  }}</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="verticalebigboxContent m-1 p-2">
                                            <h5 class="newsheadin">
                                                {{$news->journalist }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="verticalebigboxContent  ">


                                            <p class=" m-1 p-2 newsheadin">
                                                আপডেট : {{$newupdate}}
                                            </p>

                                            <p class=" m-1 p-2 newsheadin">
                                                <b>{{$insert}}</b>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">
                                        <div class="verticalebigboxContent m-2">

                                            <a href="#" id="print" class="m-1 p-2">
                                                <span class="p-3 newsheadin"><i class="fas fa-print"></i></span>
                                            </a>

                                            <a class="m-1 p-2" href="{{ route('save.store') }}"
                                                onclick="event.preventDefault(); document.getElementById('save{{$news->id}}').submit();">
                                                <span class="p-3 newsheadin"><i class="fas fa-bookmark"></i></span>
                                            </a>

                                            {{-- <a class="m-1 p-2" href="#">
                                                <span class="p-3 newsheadin"><i class="fab fa-facebook-f"></i></span>
                                             </a> --}}
                                             <div class="fb-share-button"
                                                data-href="{{ url()->current()}}"
                                                data-layout="button_count">
                                            </div>



                                        </div>
                                    </div>
                                </div>


                                <form method="POST" id="save{{$news->id}}" action="{{ route('save.store') }}"
                                    style="display: none;">
                                    @csrf
                                    <input type="hidden"  name="news_id" value="{{ $news->id }}">
                                    <input type="hidden"  name="user_id" value="{{ Auth::id() }}">
                                </form>





                            </div>



                        </div>
                    </div>

                    <div class="m-3">
                        &nbsp;
                    </div>
                    <div class="row">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="m-1 googleAddRectaBig d-none d-lg-block">

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>


                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 linkUnLiRemove " id="printTable">
                    <div class="singleNewsShowBorder shadow ">
                        <div class="m-1 p-2">

                            <h4 class="m-3 text-center"><b>{{ $news->headline }}</b></h4>
                        </div>

                        @php
                        $pi = count($news->picture,1);
                        $pval=1;
                        @endphp
                        @if($pi>1)


                        <div class="showNewsImage">


                            <div id="carouselExampleControls" class="carousel slide m-1" data-ride="carousel">
                                <div class="carousel-inner">


                                    @foreach($news->picture as $pictures)
                                    @if($pval==1)

                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{$news->picture['0']}}" alt="First slide">
                                        @php $pval++; @endphp
                                    </div>
                                    @else
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="{{$pictures}}" alt="First slide">
                                    </div>
                                    @endif

                                    @endforeach


                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>

                            </div>




                        </div>


                        @else

                        <div class="showNewsImage">

                            <div class="text-center m-1">
                                <img class="img-fluid  " src="{{$news->picture['0']}}" alt="Card image cap">

                            </div>

                        </div>

                        @endif


                        {{--
                            @if(is_array($value->picture))

                            @foreach($value->picture  as $picture)

                            @endforeach

                            @endif --}}






                        <div class="m-4">
                            <p class="">{!! $news->description !!}</p>
                        </div>

                    </div>


                </div>


                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">

                    <div class="row">
                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="row">
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row">
                                        <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="readNewz">
                                                @include('openshownewz')
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="squre2addbox">
                                        <div class="text-center p-1 m-2">
                                            <a class="nav-link" href="{{$add['1']->url}}" target="_blank">
                                                <img class="img-thumbnail" src="{{$add['1']->location}}">
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>



            </div>


        </div>










    </div>


    <div class="text-center googlebanner mt-5 mb-5">
        google add

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                    <div class="row">
                        @php
                        $latest = 1;
                        @endphp

                        @foreach($data as $value)

                        @if($latest <= 18) <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 col-xl-2">
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

    </div>

</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @include('googleadd')
            </div>
        </div>

    </div>
</div>


<div class="m-4">
    &nbsp;
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @include('footer')
            </div>
        </div>

    </div>
</div>





</div>
@endsection

@section('script')
<script type="text/javascript">
    function printData()
{

var divToPrint=document.getElementById('printTable');

var newWin=window.open('','Print-Window');

newWin.document.open();

newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

newWin.document.close();

setTimeout(function(){newWin.close();},10);
}

$('#print').on('click',function(){
printData();
})
</script>

<script type="text/javascript">
    $(document).ready(function() {
       $("#message").delay(1000).hide(500);
       });
</script>
@endsection
