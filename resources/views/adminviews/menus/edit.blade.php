@extends('layouts.admin')

@section('content')
 <div class="container-fluid">
    <div class="mt-4 text-center">
        <h3>EDIT MAIN MENU </h3>
    </div>



    <form method="POST" action="{{ route('mainmenus.update',$data->id) }}">
        @csrf
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="englishname">Menu Name English :</label>
          <input type="text" class="form-control"  id="englishname" name="englishname"  placeholder="Menu Name in English" value="{{ old('englishname') ?? $data->englishname }}"required>
        </div>

        @if($errors->has('englishname'))
            <div class="error text-danger m-2">{{ $errors->first('englishname') }}</div>
        @endif


        <div class="form-group">
          <label for="banglaname">বাংলায় মেনুর নাম  :</label>
          <input type="text" class="form-control" id="banglaname" name="banglaname" placeholder="মেনুর নাম" value="{{ old('banglaname') ?? $data->banglaname}}" required>
        </div>
        @if($errors->has('banglaname'))
        <div class="error text-danger m-2">{{ $errors->first('banglaname') }}</div>
        @endif

        <div class="form-group">
          <label for="order">Serial:</label>
          <input type="number" class="form-control" id="order" name="order" placeholder="Serial" value="{{ old('order') ?? $data->order}}" required min="1">
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



