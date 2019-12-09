@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="row">
    <div class="col-md-6">
        <h5>Departments</h5>
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-primary btn-sm float-right mb-4" data-toggle="modal"
            data-target="#modal-sm">
            &nbsp;<i class="fa fa-plus fa-xs"></i>&nbsp; &nbsp;Add Department&nbsp;
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
                        <th>NAME</th>
                        <th>HEAD OF DEPT.</th>
                        <th>MANAGER(S)</th>
                        <th># OF STAFF</th>
                        <th>DATE CREATED</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                    <tr>
                        <td>{{$department->id}}</td>
                        <td>{{$department->name}}</td>
                        <td>
                            @if (count($department->getAdmin()) != 0)
                            @foreach($department->getAdmin() as $admin)
                            {{$admin->first_name .' '.$admin->last_name}}
                            @endforeach
                            @else
                            Not found
                            @endif
                        </td>
                        <td>
                            @if (count($department->getManagers()) != 0)
                            @foreach($department->getManagers() as $manager)
                            {{$manager->first_name .' '.$manager->last_name}}
                            @endforeach
                            @else
                            Not found
                            @endif
                        </td>
                        <td>{{count($department->getEmployees())}}</td>
                        <td>{{\Carbon\Carbon::parse($department->created_at)->toFormattedDateString()}}</td>
                        <td><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-small{{$department->id}}"><i
                                    class="fa fa-edit fa-xs"></i> Edit</button> <button
                                class="btn btn-primary btn-xs"><i class="fa fa-trash fa-xs"></i> Delete</button></td>
                        <div class="modal fade" id="modal-small{{$department->id}}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit department</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('department.store')}}">
                                            @csrf
                                            <input type="text" class="form-control" name="name"
                                                value="{{$department->name}}">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save department</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add new department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('department.store')}}">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Department name">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save department</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection
