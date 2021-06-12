@extends('layouts.admin')

<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
<link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">

@section('content')

 <div class="container">

    <div class="mt-4 text-center">
        <h3>ADD NEWS</h3>
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
            <form method="POST" id="newsid" action="{{ route('news.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="News Catagory">News Catagory</label>
                    <select class="form-control" name="mainmenu_id" required>
                        <option value="" selected disabled>Choose...</option>
                        @foreach($mainmenu as  $value)

                        <option class="p-2" value="{{ $value->id }}" > {{ $value->banglaname }} / {{ $value->englishname }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                  <label for="headline">Head Line :</label>
                  <input type="text" class="form-control" id="headline" name="headline"  placeholder="News Headline" value="{{ old('headline') }}" required minlength="3">
                </div>

                @if($errors->has('headline'))
                    <div class="error text-danger m-2">{{ $errors->first('headline') }}</div>
                @endif


                <div class="form-group">
                  <label for="description">Description  :</label>
                  <textarea  type="text" class="form-control" id="editor" name="description" placeholder="News Description" value="{{ old('description') }}" required minlength="3"></textarea>
                </div>
                @if($errors->has('description'))
                <div class="error text-danger m-2">{{ $errors->first('description') }}</div>
                @endif








                <div class="form-group">
                    <label for="picture">News Picture :</label>
                    <input type="file" class="form-control-file" id="picture" name="picture[]" accept='image/*' required multiple>
                </div>

                  @if($errors->has('picture'))
                  <div class="error text-danger m-2">{{ $errors->first('picture') }}</div>
                  @endif

                <div class="form-group">
                  <label for="journalist">Journalist Name :</label>
                  <input type="text" class="form-control" id="journalist" name="journalist" placeholder="Journalist Name" value="{{ old('journalist') }}" required minlength="3">
                </div>
                @if($errors->has('journalist'))
                <div class="error text-danger m-2">{{ $errors->first('journalist') }}</div>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}" ></script>
{{-- <script src="https://cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script> --}}
<script src="{{ asset('ckeditor/samples/js/sample.js') }}" ></script>

<script type="text/javascript">
 $(document).ready(function() {
    $("#message").delay(1000).hide(500);
    });
</script>

<script type="text/javascript">
	initSample();
</script>
@endsection


