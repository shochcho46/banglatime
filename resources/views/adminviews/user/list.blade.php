@extends('layouts.admin')

@section('content')


<div class="container-fluid">
   @php
   $i=1
   @endphp
    <br>
 <h4 class="text-center mt-2">User List</h4>

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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Status</th>

            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($user as  $value)
            <tr>
                 <td >{{ $i }}</td>

                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->type}}</td>
                <td>{{ $value->status}}</td>


                <td>

                    <a class="btn btn-outline-primary btn-sm"  href="{{ route('user.edit',$value->id) }}"><i class="fas fa-edit"></i></a>



                    <a class="btn btn-outline-dark btn-sm"  href="{{ route('user.active',$value->id) }}" onclick="event.preventDefault(); document.getElementById('dis{{$value->id}}').submit();">
                        <i class="far fa-eye-slash"></i>

                    </a>
                    <a class="btn btn-outline-success btn-sm"  href="{{ route('user.disable',$value->id) }}" onclick="event.preventDefault(); document.getElementById('hid{{$value->id}}').submit();">

                        <i class="far fa-eye"></i>
                    </a>

                    <a class="btn btn-outline-danger btn-sm"  href="{{ route('user.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                        <i class="far fa-trash-alt"></i>
                    </a>



                    <form method="POST" id="hid{{$value->id}}" action="{{ route('user.active', $value->id) }}" style="display: none;">
                        @csrf
                        @method('PATCH')
                    </form>

                    <form method="POST" id="dis{{$value->id}}" action="{{ route('user.disable', $value->id) }}" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>

                    <form method="POST" id="del{{$value->id}}" action="{{ route('user.destroy', $value->id) }}" style="display: none;">
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
