@extends('layouts.login')

@section('content')
<div class="card login-card" style="border-radius: 3px !important;">
    <div class="card-body login-card-body">
            <h5 class="mb-4">Reset Password</h5>
            @include('inc.messages')
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">{{ __('Send Password Reset Link') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 mt-4 text-center">
                           <a href="{{ route('login') }}"><span><i class="fa fa-arrow-left"></i></span>  Return to Sign in</a>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection