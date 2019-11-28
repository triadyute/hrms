@extends('layouts.app')
@section('content')
<h6>Add Department</h6>
    <form method="POST" action="{{route('department.store')}}">
        @csrf
        <div class="form-group">
                <input type="text" class="form-control col-md-4 mb-2" name="name" placeholder="Department name">
                <button class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
@endsection