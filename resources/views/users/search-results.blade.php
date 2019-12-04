@extends('layouts.app')

@section('content')
@include('inc.messages')
<h5>Found {{count($users)}} @if(count($users) == 1 ) result @else results @endif</h5>
<div class="row">
    <div class="col-md-6">
        <form class="form-inline" method="POST" action="{{route('user.results')}}">
            @csrf
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search Employees" name="query"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal"
            data-target="#modal-default">
            &nbsp;<i class="fa fa-user-plus fa-xs"></i>&nbsp; &nbsp;Add Employee&nbsp;
        </button>
    </div>
</div>
{{-- <div class="card small">
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
                        <td>Manager</td>
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
    <a href="{{route('user.show', $user)}}">{{$user->first_name . ' ' .$user->last_name}}</a>
    </td>
    <td>@if ($user->employeeprofile)
        {{$user->employeeprofile->job_title}}
        @endif</td>
    <td>@if ($user->employeeprofile)
        {{$user->employeeprofile->department->name}}
        @endif</td>
    <td>
        @if (count($user->getManagers()) != 0)
        @foreach($user->getManagers() as $manager)
        {{$manager->first_name .' '. $manager->last_name}}
        @endforeach
        @else
        N/A
        @endif
    </td>
    <td>{{$user->email}}</td>
    <td>+1-555-555-5555</td>
    <td>{{\Carbon\Carbon::parse($user->created_at)->toFormattedDateString()}}</td>
    <td>
        <a href="{{route('employee-profile.edit', $user->employeeprofile->id)}}"><button
                class="btn btn-primary btn-xs"><i class="fa fa-edit fa-xs"></i> Edit</button></a>
        <button class="btn btn-primary btn-xs"><i class="fa fa-trash fa-xs"></i> Delete</button>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    {{ $users->links() }}
    </div>
    </div> --}}
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach ($users as $user)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        {{-- <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div> --}}
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{$user->first_name .' '. $user->last_name}}</b></h2>
                                    <p class="text-muted text-sm"><b>Job title: </b>
                                        {{$user->employeeprofile->job_title}}<br>
                                        <b>Reports to:</b> @if (count($user->getManagers()) != 0)
                                        @foreach($user->getManagers() as $manager)
                                        {{$manager->first_name .' '. $manager->last_name}}
                                        @endforeach
                                        @else
                                        Managing Director
                                        @endif
                                    </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-sm fa-envelope"></i></span>
                                            {{$user->email}}</li>
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-sm fa-map-marker"></i></span> Address: Demo Street 123,
                                            Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-sm fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-left">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="{{route('user.show', $user)}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                                <a href="{{route('employee-profile.edit', $user->employeeprofile->id)}}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                {{-- <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                </ul> --}}
                <span class="pagination justify-content-center m-0">{{ $users->links() }}</span>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('user.store')}}" class="small">
                        @csrf
                        <input type="text" class="form-control mb-2" name="first_name" placeholder="First name"
                            autocomplete="off">
                        <input type="text" class="form-control mb-2" name="middle_name" placeholder="Middle name"
                            autocomplete="off">
                        <input type="text" class="form-control mb-2" name="last_name" placeholder="Last name"
                            autocomplete="off">
                        <input type="email" class="form-control mb-2" name="email" id="email" placeholder="Email"
                            autocomplete="off">
                        <input type="text" class="form-control mb-2" name="job_title" placeholder="Job title"
                            autocomplete="off">
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
