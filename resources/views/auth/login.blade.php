@extends('layouts.login')

@section('content')
<div class="card login-card" style="border-radius: 3px !important;">
    <div class="card-body login-card-body">
            <h5 class="mb-4">Sign in</h5>
            @include('inc.messages')
            <form method="POST" action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-8 mt-2 offset-2">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    </div>
</div>
@endsection
