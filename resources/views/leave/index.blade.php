@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6">
            <h6>Leave/Vacation Schedule</h6>
    </div>
    {{-- <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-xs float-right mb-3" data-toggle="modal" data-target="#modal-sm">
            &nbsp;<i class="fa fa-plus fa-xs"></i>&nbsp; &nbsp;Add Department&nbsp;
        </button>
    </div> --}}
</div>
<div class="card small">
    <div class="card-header">
        <div id='calendar'></div>
    </div>
</div>

@endsection