@section('css')
<link href="{{ asset('datetimepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection


<div class="container-fluid">


        {{-- <form method="POST"  class="form-row" id="newsid" action="{{ route('default.picsearch') }}" enctype="multipart/form-data">
            @csrf --}}

            <div class="form-row ">
                    <div class="form-group col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">

                        <input type="text" name="date" class="form-control" id="datepicker" placeholder="YYYY-MM-DD" required>
                    </div>
                      <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <button type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                      </div>

            </div>



        {{-- </form> --}}






</div>



@section('script')
<script src="{{ asset('datetimepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        format:	'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        toggleActive:true,


    });

    // $('#datepicker').datepicker("setDate", new Date());

</script>
@endsection
