@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">
        <h6>Leave/Vacation Schedule</h6>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal" data-target="#modal-sm">
            &nbsp;<i class="fa fa-calendar fa-xs"></i>&nbsp; &nbsp;Request leave&nbsp;
        </button>
    </div>
</div>
<!-- /.row -->
<div id='calendar' class="mb-4"></div>
@endsection