@extends('layouts.app')
@section('content')
@include('inc.messages')

<div class="row">
    <div class="col-md-6 mb-3">
        <h5>{{Auth::user()->first_name ."'s"}} Leave/Vacation Requests</h5>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal"
            data-target="#modal-default">
            &nbsp;<i class="fa fa-calendar fa-xs"></i>&nbsp; &nbsp;Request leave&nbsp;
        </button>
    </div>
</div>
<div class="card small">
    <div class="card-header">
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TYPE</th>
                        <th>SUBMITTED ON</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>DAYS</th>
                        <th>NOTES</th>
                        <th>APPROVAL</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leave_requests as $leave_request)
                    <tr>
                        <td>{{$leave_request->id}}</td>
                        <td>{{$leave_request->leave_type}}</td>
                        <td>{{\Carbon\Carbon::parse($leave_request->created_at)->toFormattedDateString()}}</td>
                        <td>{{$leave_request->start_date}}</td>
                        <td>{{$leave_request->end_date}}</td>
                        <td>{{$leave_request->days}}</td>
                        <td>@if(! is_null($leave_request->notes)){{$leave_request->notes}}@else N/A @endif</td>
                        <td>{{ucfirst($leave_request->approved)}}</td>
                        <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-small"><i
                                    class="fa fa-edit fa-xs"></i> Edit</button> <button
                                class="btn btn-primary btn-xs"><i class="fa fa-trash fa-xs"></i> Cancel</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('leave.store')}}">
                    @csrf
                <label for="leave_type">Vacation/Leave type</label>
                <div class="form-group">
                    <div class="input-group row mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-check-circle"></i>
                            </span>
                        </div>
                        <select name="leave_type" class="form-control" id="leaveType">
                            <option value="" selected disabled>Select leave type</option>
                            <option value="Vacation">Vacation</option>
                            <option value="Maternity">Maternity</option>
                            <option value="Sick leave">Sick leave</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                <!-- Date range -->
                    <label>Date range:</label>

                    <div class="input-group row mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" name="dates" class="form-control float-right" id="reservation">
                    </div>
                    <div class="input-group row" id="other" style="display:none;">
                        <textarea class="form-control" name="notes" id="" cols="30" rows="2" placeholder="Reason for requesting leave"></textarea>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit request</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
@section('scripts')
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('YYYY-MM-DD', {
            'placeholder': 'dd-mm-yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('YYYY-MM-DD', {
            'placeholder': 'mm-dd-yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'LT'
            }
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })

</script>
<script>
$('#leaveType').on('change',function(){
    if( $(this).val()==="Other"){
    $("#other").show()
    }
    else{
    $("#other").hide()
    }
});
</script>
@endsection
