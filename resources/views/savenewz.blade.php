@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-3">

            @if (session('success'))
            <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">



                @foreach($data as $value)

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="text-right m-1">


                        <a class="btn btn-outline-danger btn-sm" href="{{ route('save.destroy',$value->saveid) }}"
                            onclick="event.preventDefault(); document.getElementById('del{{$value->saveid}}').submit();">
                            <i class="fas fa-times"></i>
                        </a>




                        <form method="POST" id="del{{$value->saveid}}"
                            action="{{ route('save.destroy', $value->saveid) }}" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>


                    </div>
                    <div class=" shadow verticalebigbox linkUnLiRemove mb-4">


                        <a href="{{ route('defoultnews.show',$value->newsid) }}">
                            <div class="row">
                                @php
                                $test = json_decode($value->picture)
                                @endphp

                                <div class="col-4 ">
                                    <div class="verticalebigboxImage text-center">

                                        <img class=" p-2 img-fluid" src=" {{  $test['0']  }}" alt="Card image cap">

                                    </div>
                                </div>

                                <div class="col-8 ">
                                    <div class="verticalebigboxContent p-2 m-2">

                                        <small class="d-block newsheadin">
                                            <i class="fas fa-bookmark"></i>
                                            {{ \Carbon\Carbon::parse($value->savetime)->diffForHumans() }}

                                        </small><br>

                                        <h5 class="mt-2 newsheadin"><b>{{ $value->headline }}</b></h5>

                                        <span class="d-none d-lg-block newsheadin text-break">{!!
                                            preg_replace('/\s+?(\S+)?$/', '',
                                            substr($value->description, 0, 350)) !!}...</span>



                                    </div>

                                </div>
                            </div>

                        </a>

                    </div>

                </div>



                @endforeach



            </div>



            <div class="text-center pagination ">

                {{ $data->links() }}

            </div>






        </div>

    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
$("#message").delay(1000).hide(500);
});
$(document).ready(function() {
$("#updatemessage").delay(1000).hide(500);
});
</script>
@endsection
