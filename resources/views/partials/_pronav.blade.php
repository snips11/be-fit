<div class="left">
<div class="nav-side-menu">
    <div class="brand"><img src="/images/logo.png" height="100" width="auto" alt="be-fit logo" id="logo_welcome" style="padding-top:15px;"></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="{{ url ('/home')}}">
                  <i class="fa fa-home fa-lg"></i> Home
                  </a>
                </li>
                <li>
                  <a href="{{ url ('/pt-zone')}}">
                  <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>
                <li>
                  <a href="{{ url('/profile/'.Auth::user()->id) }}">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products">
                  <a href="#"><i class="fa fa-upload fa-lg"></i> Create Premium Content <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="{{url('/ptvideo')}}">Video</a></li>
                    <li><a href="{{url('/ptimage')}}">Images</a></li>
                    <li><a href="{{url('/ptpost')}}">Knowledge Posts</a></li>
                </ul>

                <li>
                  <a href="{{ url('/pt-zone/premium') }}">
                  <i class="fa fa-globe fa-lg"></i> Subscribers
                  </a>
                </li>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-users fa-lg"></i> Client Workouts <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  <a href="{{ url ('/pro_management')}}"><li>Weight Training</li></a>
                  <li>New Service 2</li>
                  <li>New Service 3</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-file-text-o fa-lg"></i> Training Plans <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                  <li>New New 1</li>
                  <li>New New 2</li>
                  <li>New New 3</li>
                </ul>


                 <li>
                  <a href="{{ url ('/settings')}}">
                  <i class="fa fa-cogs fa-lg"></i> Settings
                  </a>
                  </li>

                 <li>
                  <a href="{{ url('/logout') }}">
                  <i class="fa fa-sign-out fa-lg"></i> Logout
                  </a>
                </li>
            </ul>
     </div>
</div>
</div>