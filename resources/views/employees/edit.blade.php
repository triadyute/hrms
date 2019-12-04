@extends('layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Employee Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{asset('/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">
                            {{$employeeProfile->user->first_name .' '. $employeeProfile->user->last_name}}</h3>

                        <p class="text-muted text-center">{{$employeeProfile->job_title}}</p>
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-pen"></i> Edit employee details</h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-pane" id="settings">
                            <form method="POST" action="" class="form small form-style-9">
                                @csrf
                                <h5>Personal information</h5>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control" name="first_name" id="inputFirstName"
                                            value="{{$employeeProfile->user->first_name}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="middle_name">Middle name</label>
                                        <input type="text" class="form-control" name="miiddle_name" id="inputMiddleName"
                                            value="{{$employeeProfile->user->middle_name}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="last_name">Last name</label>
                                        <input type="text" class="form-control" name="last_name" id="inputLastName"
                                            value="{{$employeeProfile->user->last_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="job_title">Job title</label>
                                        <input type="text" class="form-control" id="inputName"
                                            value="{{$employeeProfile->job_title}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="department">Department</label>
                                        <select class="form-control" name="" id="">
                                            <option disabled>Select Department</option>
                                            @foreach ($departments as $department)
                                            <option @if($department->id == $employeeProfile->department_id) selected
                                                @endif value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="employment_status">Employment status</label>
                                        <select class="form-control" name="" id="">
                                            <option>Employment status</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                    </div>
                                </div>
                                <h5>Contact information</h5>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label for="address_line_1">Address line 1</label>
                                        <input type="search" class="form-control" id="form-address"
                                            placeholder="Street Address Line 1">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="address_line_2">Address line 2</label>
                                        <input type="text" class="form-control" id="form-address2"
                                            placeholder="Street Address Line 2">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="city">City</label>
                                        <input type="search" class="form-control" id="form-city"
                                            placeholder="City, Country">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputName2"
                                            placeholder="Work Phone">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputName2"
                                            placeholder="Home Phone">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputName2"
                                            placeholder="Mobile Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputName2"
                                            value="{{$employeeProfile->user->email}}">
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="inputName2">
                                            <option value="">ID type</option>
                                            <option value="">Driver's licence</option>
                                            <option value="">Passport</option>
                                            <option value="">Voter's ID</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputName2" placeholder="ID#">
                                    </div>
                                </div>
                                <h5>Qualifications</h5>
                                <div class="personal-details">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="first_name">Institution name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                id="inputFirstName" placeholder="School name">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="middle_name">Start date</label>
                                            <input type="text" class="form-control" name="miiddle_name"
                                                id="inputMiddleName" placeholder="From">
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="last_name">End Date</label>
                                            <input type="text" class="form-control" name="last_name" id="inputLastName"
                                                placeholder="To">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="first_name">Degree/Certificate</label>
                                            <input type="text" class="form-control" name="first_name"
                                                id="inputFirstName" placeholder="School name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="first_name">Notes</label>
                                            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="row">
                                    <div class="col-md 2 mb-3">
                                        <button type="button" class="btn btn-success btn-sm add-row">+ Add
                                            education</button>
                                    </div>
                                </div>
                                <h5>Skills</h5>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
