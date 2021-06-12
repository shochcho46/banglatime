@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    {{-- @php
    $i=1
    @endphp --}}
    <br>
    <h4 class="text-center mt-2">Picture List</h4>

    @if (session('success'))
    <div class="alert alert-danger alert-dismissible fade show" id="message" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('update'))

    <div class="alert alert-success alert-dismissible fade show" id="updatemessage" role="alert">
        {{ session('update') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
         <form method="POST"   id="newsid" action="{{ route('picture.newssearch') }}" enctype="multipart/form-data">
                 @csrf
                @include('adminviews.search')

        </form>
      </div>
    </div>


    <div class="row">

        <div class="col-2">

        </div>
        <div class="col-8">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form method="POST"  class="form-row" id="newsid" action="{{ route('picture.picdate') }}" enctype="multipart/form-data">
                        @csrf

                        @include('datetime')

                    </form>

                </div>

            </div>

        </div>
        <div class="col-2">

        </div>



    </div>

    <div class="table-responsive m-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">News Line</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($picture as $key => $value)
                <tr>
                    <td class="align-middle">
                        {{ $picture->firstItem() + $key }}
                    </td>

                    <td class="align-middle">
                        <img class="img-thumbnail" width="120px" src="{{$value->location}}" alt="Card image cap">

                    </td>
                    <td class="align-middle">
                        {!! $value->description !!}
                    </td>



                    <td class="align-middle">



                        <a class="btn btn-outline-primary btn-sm" href="{{ route('picture.edit',$value->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>





                        <a class="btn btn-outline-danger btn-sm" href="{{ route('picture.destroy',$value->id) }}"
                            onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                            <i class="far fa-trash-alt"></i>
                        </a>




                        <form method="POST" id="del{{$value->id}}" action="{{ route('picture.destroy', $value->id) }}"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>



                {{-- @php
                $i=$i+1;
                @endphp --}}
                @endforeach
            </tbody>
        </table>

        <div class="text-center pagination ">

            {{ $picture->links() }}

        </div>

    </div>

 <div>


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

