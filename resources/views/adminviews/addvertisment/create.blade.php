@extends('layouts.admin')

<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
<link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">

@section('content')

 <div class="container">

    <div class="mt-4 text-center">
        <h3>ADD ADVERTISMENT</h3>
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
            <form method="POST" id="newsid" action="{{ route('addvertisment.store') }}" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label for="url">Url :</label>
                    <input type="text" class="form-control" id="url" name="url"  placeholder="www.example.com" value="{{ old('url') }}"required>
                </div>

                @if($errors->has('url'))
                      <div class="error text-danger m-2">{{ $errors->first('url') }}</div>
                @endif


                <div class="form-group">
                    <label for="type">Advertisement Type :</label>
                    <select class="form-control" id="type" name="type" required>
                    <option value="" selected disabled>Choose...</option>
                    <option value = "1">A_R_1_350_280 </option>
                    <option value = "2" >A_R_2_350_280</option>
                    <option value = "3">A_R_3_350_280</option>
                    <option value = "4">A_BH_4_980_100</option>
                    <option value = "5">A_BF_5_980_100</option>
                    </select>
                </div>

                @if($errors->has('type'))
                      <div class="error text-danger m-2">{{ $errors->first('type') }}</div>
                @endif






                <div class="form-group">
                    <label for="location">Picture :</label>
                    <input type="file" class="form-control-file" id="location" name="location" accept='image/*' required >
                </div>

                  @if($errors->has('location'))
                  <div class="error text-danger m-2">{{ $errors->first('location') }}</div>
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


