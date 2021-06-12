@extends('layouts.admin')

<link href="{{ asset('ckeditor/samples/css/samples.css') }}" rel="stylesheet">
<link href="{{ asset('ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css') }}" rel="stylesheet">

@section('content')

<div class="container">

    <div class="mt-4 text-center">
        <h3>EDIT NEWS</h3>
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
            <form method="POST" id="newsid" action="{{ route('news.update',$news->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="News Catagory">News Catagory</label>
                    <select class="form-control" name="mainmenu_id" required>

                        @foreach($mainmenu as $menu)
                            @if($menu->id == $news->mainmenu_id)
                            <option class="p-2" selected value="{{ $menu->id }}">
                                 {{ $menu->banglaname }} / {{ $menu->englishname }}
                            </option>
                            @else
                            <option class="p-2" value="{{ $menu->id }}">
                                {{ $menu->banglaname }} / {{ $menu->englishname }}
                           </option>
                            @endif


                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="headline">Head Line :</label>
                    <input type="text" class="form-control" id="headline" name="headline" placeholder="News Headline"
                        value="{{ old('headline') ?? $news->headline }}" required minlength="3">
                </div>

                @if($errors->has('headline'))
                <div class="error text-danger m-2">{{ $errors->first('headline') }}</div>
                @endif


                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea type="text" class="form-control" id="editor" name="description"
                        placeholder="News Description" value="" required
                        minlength="3"> {{ old('description') ?? $news->description }}</textarea>
                </div>
                @if($errors->has('description'))
                <div class="error text-danger m-2">{{ $errors->first('description') }}</div>
                @endif








                <div class="form-group">
                    <label for="picture">News Picture :</label>
                    <input type="file" class="form-control-file" id="picture" name="picture[]" accept='image/*'
                        multiple>
                </div>

                @if($errors->has('picture'))
                <div class="error text-danger m-2">{{ $errors->first('picture') }}</div>
                @endif

                <div class="form-group">
                    @foreach($news->picture as $pic)
                        <img class=" img-thumbnail" width="80px" height="80px" src="{{$pic}}" alt="Card image cap">
                    @endforeach
                </div>


                <div class="form-group">
                    <label for="journalist">Journalist Name :</label>
                    <input type="text" class="form-control" id="journalist" name="journalist"
                        placeholder="Journalist Name" value="{{ old('journalist') ?? $news->journalist}}" required minlength="3">
                </div>
                @if($errors->has('journalist'))
                <div class="error text-danger m-2">{{ $errors->first('journalist')}}</div>
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
