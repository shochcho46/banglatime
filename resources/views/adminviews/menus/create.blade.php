@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
    <div class="mt-4 text-center">
        <h3>ADD MAIN MENU </h3>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" id="message" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <form method="POST" action="{{ route('mainmenus.store') }}">
        @csrf
        <div class="form-group">
          <label for="englishname">Menu Name English :</label>
          <input type="text" class="form-control" id="englishname" name="englishname"  placeholder="Menu Name in English" value="{{ old('englishname') }}"required>
        </div>

        @if($errors->has('englishname'))
            <div class="error text-danger m-2">{{ $errors->first('englishname') }}</div>
        @endif


        <div class="form-group">
          <label for="banglaname">বাংলায় মেনুর নাম  :</label>
          <input type="text" class="form-control" id="banglaname" name="banglaname" placeholder="মেনুর নাম" value="{{ old('banglaname') }}" required>
        </div>
        @if($errors->has('banglaname'))
        <div class="error text-danger m-2">{{ $errors->first('banglaname') }}</div>
        @endif

        <div class="form-group">
          <label for="order">Serial:</label>
          <input type="number" class="form-control" id="order" name="order" placeholder="Serial" value="{{ old('order') }}" required min="1">
        </div>
        @if($errors->has('order'))
        <div class="error text-danger m-2">{{ $errors->first('order') }}</div>
        @endif

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary ">Submit</button>
        </div>



      </form>



 </div>





@endsection

@section('script')
<script type="text/javascript">
 $(document).ready(function() {
    $("#message").delay(1000).hide(500);
    });
</script>
@endsection

