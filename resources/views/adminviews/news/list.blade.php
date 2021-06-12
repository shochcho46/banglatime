@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    {{-- @php
    $i=1
    @endphp --}}
    <br>

    <h4 class="text-center mt-2">News List</h4>

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
         <form method="POST"   id="newsid" action="{{ route('news.newssearch') }}" enctype="multipart/form-data">
                 @csrf
                @include('adminviews.search')

        </form>
      </div>
    </div>





    <div class="table-responsive m-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Picture</th>
                    <th scope="col">News Line</th>
                    <th scope="col">News Category</th>
                    <th scope="col">Make Headline</th>
                    <th scope="col">Upload By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as  $key => $value)




                <tr>
                    <td class="align-middle">
                        {{ $news->firstItem() + $key }}
                    </td>

                    <td class="align-middle">
                        <img class="img-thumbnail" width="120px" src="{{$value->picture['0']}}" alt="Card image cap">

                    </td>
                    <td class="align-middle">
                        {{ $value->headline }}
                    </td>

                    <td class="align-middle">
                        {{ $value->mainmenu->banglaname }} <br> ({{$value->mainmenu->englishname}})

                    </td>
                    <td class="align-middle">
                        {{ $value->headnews}}
                    </td>

                    <td class="align-middle">

                        <a class="" href="#" data-toggle="modal" data-target="#user{{$value->id}}">
                            {{ $value->user->name}}
                        </a>
                    </td>

                    <td class="align-middle">

                        <a class="btn btn-outline-success btn-sm" href="{{ route('news.show',$value->id) }}"
                            data-toggle="modal" data-target="#mon{{$value->id}}">
                            <i class="mdi mdi-eye-outline"></i>
                        </a>

                        <a class="btn btn-outline-primary btn-sm" href="{{ route('news.edit',$value->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>



                        <a class="btn btn-outline-dark btn-sm" href="{{ route('news.display',$value->id) }}"
                            onclick="event.preventDefault(); document.getElementById('dis{{$value->id}}').submit();">
                            <i class="mdi mdi-alphabetical-variant"></i>

                        </a>
                        <a class="btn btn-outline-warning btn-sm" href="{{ route('news.hidden',$value->id) }}"
                            onclick="event.preventDefault(); document.getElementById('hid{{$value->id}}').submit();">


                            <i class="mdi mdi-alphabetical-variant-off"></i>

                        </a>

                        <a class="btn btn-outline-danger btn-sm" href="{{ route('news.destroy',$value->id) }}"
                            onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                            <i class="far fa-trash-alt"></i>
                        </a>

                        <form method="POST" id="hid{{$value->id}}" action="{{ route('news.hidden', $value->id) }}"
                            style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>

                        <form method="POST" id="dis{{$value->id}}" action="{{ route('news.display', $value->id) }}"
                            style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>

                        <form method="POST" id="del{{$value->id}}" action="{{ route('news.destroy', $value->id) }}"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>
                </tr>



                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="mon{{$value->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">News</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center m-2">
                                    <img class="img-thumbnail" width="300px" src="{{$value->picture['0']}}"
                                        alt="Card image cap">

                                </div>
                                <hr>
                                <div class="m-2 text-center">
                                    <h4 class="mt-3">{{ $value->headline }}</h4>
                                </div>
                                <hr>
                                <div class="m-2">
                                    <p class="mt-3">{!! $value->description !!}</p>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>


                <!--User Modal -->
                <div class="modal fade" id="user{{$value->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center m-2">
                                    {{-- <img class="img-thumbnail" width="300px" src="{{$value->picture['0']}}" --}}
                                    alt="Card image cap">

                                </div>
                                <hr>
                                <div class="m-2">
                                    <p class="mt-3">Name : {{ $value->user->name }}</p>
                                </div>

                                <div class="m-2">
                                    <p class="mt-3">Email : {{ $value->user->email }}</p>
                                </div>
                                <div class="m-2">
                                    <p class="mt-3">User Type : {{ $value->user->type }}</p>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>




                {{-- @php
                $i=$i+1;
                @endphp --}}
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="text-center pagination ">

        {{ $news->links() }}

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
