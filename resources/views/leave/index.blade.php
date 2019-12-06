@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-6">
        <h5>Leave/Vacation Schedule</h5>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal"
            data-target="#modal-default">
            &nbsp;<i class="fa fa-calendar fa-xs"></i>&nbsp; &nbsp;Request leave&nbsp;
        </button>
    </div>
</div>
<!-- /.row -->
<div class="row" style="padding-bottom: 1em;">
    <div id='calendar'></div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('leave.store')}}">
                    @csrf
                    <div class="input-group row">
                        <select name="leave_type" class="form-control">
                            <option value="" selected disabled>Select leave type</option>
                            <option value="Vacation">Vacation</option>
                            <option value="Maternity">Maternity</option>
                            <option value="Sick leave">Sick leave</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                <!-- Date range -->
                <div class="form-group">
                    <label>Date range:</label>

                    <div class="input-group row mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" name="dates" class="form-control float-right" id="reservation">
                    </div>
                    <div class="input-group row">
                        <textarea class="form-control" name="notes" id="" cols="30" rows="2" placeholder="Notes (optional)"></textarea>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save user</button>
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

@endsection
