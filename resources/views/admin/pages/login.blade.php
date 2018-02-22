@extends('admin.auth')

@section('title', 'Login')

@section('content')
    <main class="page-content">
        <div class="page-inner page-content-login">
            <div id="main-wrapper">
                <div class="row">
                    <div style="margin-top: 300px" class="col-md-3 center">
                        <div class="login-box">
                            <a href="index.html" style="color: #fff" class="logo-name text-lg text-center">Decree Your Day</a>
                            <form class="m-t-md" action="{{Url('login')}}" method="POST">
                                @if(Session::has('login-unsuccessful'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        Oh snap! Invalid Username or Password
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="forgot.html" style="color: #fff" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                            </form>
                            <p style="color: #fff" class="text-center m-t-xs text-sm">2018 &copy; Developed by CarbonTech.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection
