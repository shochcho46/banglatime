@foreach ($mainmenu as $idvalue)


@if($idvalue->englishname == "bangladesh")
@php
$bangladeshID = $idvalue->id;
@endphp
@endif

@if($idvalue->englishname == "international")
@php
$internationalID = $idvalue->id;
@endphp
@endif


@if($idvalue->englishname == "pic")
@php
$picID = $idvalue->id;
@endphp
@endif



@if($idvalue->englishname == "entertainment")
@php
$entertainID = $idvalue->id;

@endphp

@endif




@if($idvalue->englishname == "play")
@php
$playID = $idvalue->id;
@endphp
@endif



@if($idvalue->englishname == "foreign")
@php
$foraginID = $idvalue->id;
@endphp
@endif



@endforeach


<div class="m-4">
    &nbsp;
</div>



<div class="row">

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="menuheadin">
                    <h5 class="p-1 ">বিনোদন</h5>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">


                        @php
                        $intertain = 1;
                        @endphp

                        @foreach ($news as $newsvalue )
                        @if(($intertain < 9) && ($entertainID==$newsvalue->mainmenu_id))


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




                            @php
                            $intertain++
                            @endphp

                            @endif

                            @endforeach

                    </div>


                </div>

            </div>

        </div>
    </div>




    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="menuheadin">
                    <h5 class="p-1 ">খেলা</h5>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">


                        @php
                        $intertain = 1;
                        @endphp

                        @foreach ($news as $newsvalue )
                        @if(($intertain < 9) && ($playID==$newsvalue->mainmenu_id))


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




                            @php
                            $intertain++
                            @endphp

                            @endif

                            @endforeach

                    </div>


                </div>

            </div>

        </div>
    </div>


    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="menuheadin">
                    <h5 class="p-1 ">প্রবাশ</h5>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">


                        @php
                        $intertain = 1;
                        @endphp

                        @foreach ($news as $newsvalue )
                        @if(($intertain < 9) && ($foraginID==$newsvalue->mainmenu_id))


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




                            @php
                            $intertain++
                            @endphp

                            @endif

                            @endforeach

                    </div>


                </div>

            </div>

        </div>
    </div>


</div>
