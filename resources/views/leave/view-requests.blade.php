@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-6">
        <h5>Staff Leave Requests</h5>
    </div>
    {{-- <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-4" data-toggle="modal"
            data-target="#modal-sm">
            &nbsp;<i class="fa fa-plus fa-xs"></i>&nbsp; &nbsp;Add Department&nbsp;
        </button>
    </div> --}}
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Progress Bars Different Sizes</h3>
              </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
                @foreach ($leave_requests as $leave)
                <div class="row leave_request">
                    <div class="col-md-2 text-center mb-2 mt-3">
                        <img src="{{asset('/dist/img/user1-128x128.jpg')}}" class="rounded-circle" alt="avatar"
                            height="90" width="90">
                    </div>
                    <div class="col-md-4 mt-3">
                          <h5>{{$leave->employeeprofile->user->first_name .' '. $leave->employeeprofile->user->last_name}}</h5>
                          <p><strong>Job title:</strong> {{$leave->employeeprofile->job_title}}<br>
                          <strong>Department:</strong> {{$leave->employeeprofile->department->name}}
                    </div>
                    <div class="col-md-3 mt-3">
                          <h5>{{$leave->leave_type}}</h5>
                          <p><strong>Start date:</strong> {{$leave->employeeprofile->job_title}}<br>
                          <strong>End date:</strong> {{$leave->employeeprofile->department->name}}
                    </div>
                    <div class="col-md-3 mt-4 text-right">
                      <p><button class="btn btn-sm btn-success" type="submit">Appprove</button></p>
                      <p><button class="btn btn-sm btn-danger" type="submit">Decline</button></p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>


@endsection
