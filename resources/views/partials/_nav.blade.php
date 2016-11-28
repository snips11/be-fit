<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Be-Fit
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>
                {!! Form::open(array('route' => 'profile.index', 'method' => 'GET' ,'role'=>'search','class'=>'navbar-form navbar-left')) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                    {!! Form::text('term',Request::get('term'), ['class' =>'form-control input-md','placeholder' =>'Search...']) !!}
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                {!! Form::close() !!}
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile/'.Auth::user()->id) }}"><i class="fa fa-btn fa-user"></i>My Profile</a></li>
                                <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-cogs" aria-hidden="true"></i>Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                     <form action="{{ url('/logout') }}" method="POST">
                                         {!! csrf_field() !!}
                                         <button type="submit" class="btn btn-link" id="logout">
                                             Logout
                                         </button>
                                     </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>