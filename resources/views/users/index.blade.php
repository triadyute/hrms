@extends('layouts.app')

@section('content')
<h6>Employees</h6>
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
                                @if ($user->id < 10)
                                {{"EMP00".$user->id}}
                                @elseif($user->id < 100)
                                {{"EMP0".$user->id}}
                                @else
                                {{"EMP".$user->id}}
                                @endif
                            </td>
                            <td>
                                {{$user->first_name . ' ' .$user->last_name}}
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
                                <button class="btn btn-primary btn-sm">Edit</button>
                                <button class="btn btn-primary btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $users->links() }}
    </div>
</div>
@endsection