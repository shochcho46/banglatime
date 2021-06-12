@extends('layouts.default')

<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
<link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">

@section('content')

<div class="container">

    <div class="mt-4 text-center">
        <h3>EDIT Profile</h3>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

            <div class="row">

                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">

                </div>

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">

                    @include('profiletem')

                </div>


                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">

                </div>


            </div>

        </div>

    </div>






</div>





@endsection


@section('script')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script> --}}
<script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $("#message").delay(1000).hide(500);
    });
</script>

<script type="text/javascript">
    initSample();
</script>
@endsection
