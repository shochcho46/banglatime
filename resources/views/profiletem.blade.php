<div class="container-fluid">



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 linkUnLiRemove">


        <div class="card" >
            <div class="card-body">
                <form method="POST" id="userid" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="location">Profile Picture :</label>
                        <input type="file" class="form-control-file" id="location" name="location" accept='image/*' onchange="loadFile(event)">
                    </div>

                      @if($errors->has('location'))
                      <div class="error text-danger m-2">{{ $errors->first('location') }}</div>
                      @endif

                    <div class="form-group">

                            <img id="output" class=" img-thumbnail" width="100px" height="100px" src="{{$user->location}}" alt="Card image cap">

                    </div>

                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $user->name }}" required minlength="3">
                    </div>
                      @if($errors->has('name'))
                      <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                      @endif



                    <div class="form-group">
                      <label for="email">Email :</label>
                      <input type="email" class="form-control" id="email" name="email"   value="{{ $user->email }}" readonly >
                    </div>

                    @if($errors->has('email'))
                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                    @endif


                    <div class="form-group">
                        <label for="type">User Type :</label>
                        <input type="type" class="form-control" id="type" name="type"   value="{{ $user->type }}" readonly >
                      </div>

                      @if($errors->has('email'))
                          <div class="error text-danger m-2">{{ $errors->first('type') }}</div>
                      @endif



                    <div class="form-group">
                      <label for="password">Password :</label>
                      <input type="password" class="form-control" id="password" name="password"  placeholder="password" value="{{ old('password') }}" required >
                    </div>

                    @if($errors->has('password'))
                        <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                    @endif

                    <div class="form-group">
                      <label for="password_confirmation">Password Confirmation:</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="confirm password" value="{{ old('password_confirmation') }}" required >
                    </div>

                    @if($errors->has('password_confirmation'))
                        <div class="error text-danger m-2">{{ $errors->first('password_confirmation') }}</div>
                    @endif









                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>

                  </form>



            </div>
        </div>


    </div>


</div>
</div>
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
     var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

</script>



@endsection
