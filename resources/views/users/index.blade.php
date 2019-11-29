@extends('layouts.app')

@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-6">
        <h6>Employees</h6>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-xs float-right mb-2" data-toggle="modal"
            data-target="#modal-sm">
            &nbsp;<i class="fa fa-user-plus fa-xs"></i>&nbsp; &nbsp;Add Employee&nbsp;
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
                        <td>ID</td>
                        <td>Name</td>
                        <td>Job Title</td>
                        <td>Department</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Hire date</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            @if ($user->id < 10) {{"EMP00".$user->id}} @elseif($user->id < 100) {{"EMP0".$user->id}}
                                    @else {{"EMP".$user->id}} @endif </td> <td>
                                    <a
                                        href="{{route('user.show', $user)}}">{{$user->first_name . ' ' .$user->last_name}}</a>
                        </td>
                        <td>@if ($user->employeeprofile)
                            {{$user->employeeprofile->job_title}}
                            @endif</td>
                        <td>@if ($user->employeeprofile)
                            {{$user->employeeprofile->department->name}}
                            @endif</td>
                        <td>{{$user->email}}</td>
                        <td>+1-555-555-5555</td>
                        <td>{{\Carbon\Carbon::parse($user->created_at)->toFormattedDateString()}}</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-edit fa-xs"></i> Edit</button>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-trash fa-xs"></i> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
</div>

<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('user.store')}}" class="small">
                    @csrf
                    <input type="text" class="form-control mb-2" name="first_name" placeholder="First name" autocomplete="off">
                    <input type="text" class="form-control mb-2" name="last_name" placeholder="Last name" autocomplete="off">
                    <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Email" autocomplete="off">
                    <input type="text" class="form-control mb-2" name="job_title" placeholder="Job title" autocomplete="off">
                    <select name="department" id="department" class="form-control mb-2" autocomplete="off">
                        <option selected disabled>Select department</option>
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option>
                        @endforeach
                    </select>
                    <select name="role" id="role" class="form-control mb-2" autocomplete="off">
                        <option selected disabled>Select role</option>
                        <option value="role_user">User</option>
                        <option value="role_manager">Manager</option>
                        <option value="role_admin">Admin</option>
                    </select>
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
