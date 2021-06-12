@extends('layouts.admin')

<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
<link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">

@section('content')

<div class="container">

    <div class="mt-4 text-center">
        <h3>EDIT PICTURE</h3>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" id="newsid" action="{{ route('Commonpicture.update',$picture->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')



                <div class="form-group">
                    <label for="location">News Picture :</label>
                    <input type="file" class="form-control-file" id="location" name="location" accept='image/*' >
                </div>

                  @if($errors->has('location'))
                  <div class="error text-danger m-2">{{ $errors->first('location') }}</div>
                  @endif

                <div class="form-group">
                    {{-- @foreach($picture as $pic) --}}
                        <img class=" img-thumbnail" width="80px" height="80px" src="{{$picture->location}}" alt="Card image cap">
                    {{-- @endforeach --}}
                </div>


                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea type="text" class="form-control" id="editor" name="description"
                        placeholder="News Description" value="" required
                        minlength="3"> {{ old('description') ?? $picture->description }}</textarea>
                </div>
                @if($errors->has('description'))
                <div class="error text-danger m-2">{{ $errors->first('description') }}</div>
                @endif




                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>

            </form>



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
