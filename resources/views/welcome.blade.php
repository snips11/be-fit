@extends('layouts.welcome')

@section('content')
<div id="welcome_pic">
    <img id="changeMe" src="" />
    <div id="welcome_login">
		<ul id="login-dp">
					 <div class="row">
							<div class="col-md-12">
								@if (Auth::guest())
								<img src="/images/logo.png" height="100" width="auto" alt="be-fit logo" id="logo_welcome">
								Login via
								<div class="social-buttons">
									<a href="{{ route('facebook.login') }}" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<!--<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>-->
								</div>
                                or
								 <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--<label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!--<label for="password" class="col-md-4 control-label">Password</label>-->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" id="welcome_button">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="{{ url('/register') }}"><b>Join Us</b></a>
								@else
								<a href="{{ url('/home') }}"><b>Home</b></a>
								@endif
							</div>
					 </div>
			</ul>
    </div>
</div>
@endsection
