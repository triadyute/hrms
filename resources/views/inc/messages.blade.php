@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
           {{$error}}
    </div>
  @endforeach  
@endif

@if(session('status'))
	<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-info"></i> {{session('status')}}</h5>
	</div>
@endif

@if(session('success'))
	<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-info"></i> {{session('success')}}</h5>
	</div>
@endif
