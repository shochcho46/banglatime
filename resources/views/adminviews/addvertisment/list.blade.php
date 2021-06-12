@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    @php
    $i=1
    @endphp
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

    <div class="table-responsive m-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Type</th>
                    <th scope="col">Website</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($add as $value)
                <tr>
                    <td class="align-middle">
                        {{ $i }}
                    </td>

                    <td class="align-middle">
                        <img class="img-thumbnail" width="120px" src="{{$value->location}}" alt="Card image cap">

                    </td>
                    <td class="align-middle">
                        {{ $value->type }}
                    </td>
                    <td class="align-middle">
                        {{ $value->url }}
                    </td>



                    <td class="align-middle">



                        <a class="btn btn-outline-primary btn-sm" href="{{ route('addvertisment.edit',$value->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>





                        <a class="btn btn-outline-danger btn-sm" href="{{ route('addvertisment.destroy',$value->id) }}"
                            onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                            <i class="far fa-trash-alt"></i>
                        </a>




                        <form method="POST" id="del{{$value->id}}" action="{{ route('addvertisment.destroy', $value->id) }}"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>



                @php
                $i=$i+1;
                @endphp
                @endforeach
            </tbody>
        </table>

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
