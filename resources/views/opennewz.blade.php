
<div class="text-center">
    <h4 class="m-3"><b>সর্বাধিক পঠিত</b></h4>
</div>
<div class="row ">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">
        @php
        $latest = 1
        @endphp
        @foreach ($maxReadNews as $newsvalue )

        @if($latest <= 11) <a href="{{ route('defoultnews.show',$newsvalue->id) }}" class="">
            <div class="shadow rounded verticaleBox">

                <div class="row">

                    <div class="col-4">
                        <div class="verticleimageBox">
                            <img class="p-1 pt-3 img-fluid" src="{{$newsvalue->picture['0']}}" alt="Card image cap">

                        </div>

                    </div>

                    <div class="col-8">
                        <div class="verticleheadigBox">
                            <h6 class="pt-3 pb-3 pl-1 pr-1 newsheadin">
                                <b>{{ $newsvalue->headline }}</b></h6>
                        </div>

                    </div>
                </div>

            </div>
            </a>

            @endif

            @php
            $latest++
            @endphp
            @endforeach

    </div>


</div>
