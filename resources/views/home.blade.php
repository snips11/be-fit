@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @if (session('status'))
    <div class="alert alert-success">
        {{ Session('status') }}</br>
        <a href="/account">click here!</a>
    </div>
@endif
<div class="panel panel-default">
  <div class="panel-heading"><strong>Be-Fit Central</strong> You are logged in!</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-6">
            <img src="{{ Auth::user()->avatar }}" class="img-circle" width="150">
          </div>
          <div class="col-md-6">
            <h1>Hello {{ Auth::user()->name }}</h1>
            <div class="notifications_drop">
              <div class="dropdown" id="notifications_drop">
                <button class="btn btn-default dropdown-toggle" type="button" id="notification" data-toggle="dropdown">Notifications
                  <span class="badge">{{$notifications}}</span> <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                      <?php $f = 0;?>
                          @foreach ($ns as $n)
                          <?php $formid="form_".$f;   ?>
                              <?php if($n->read==0){ ?>
                              <li class="new_notification" role="presentation"><a role="menuitem" tabindex="-1" href="{{$n->url}}">{{$n->text}}</a></li>
                                  {!! Form::open(array('route' => 'update_notifications', 'method' => 'POST', 'ID' => $formid)) !!}
                                      <meta name="csrf-token" content="{{ csrf_token() }}">
                                      {{ Form::hidden('note_id', $n->id)}}
                                  {!! Form::close() !!}
                              <?php }elseif($n->read==1){?>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="{{$n->url}}">{{$n->text}}</a></li>
                             <?php } ?>
                        <?php $f++; endforeach;?>
                   </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12"> <!--Menu Bar-->
          <div class="col-sm-6 col-md-2"><a href="{{ route ('profile.show', Auth::user()->id)}}" class="btn btn-default">View profile</a></div>
          <div class="col-sm-6 col-md-2"><a href="{{ route ('work.index')}}" class="btn btn-default">Workouts</a></div>
          <div class="col-sm-6 col-md-2"><a href="{{ route ('workout_goals.index')}}" class="btn btn-default">Goals</a></div>
          <div class="col-sm-6 col-md-2"><a href="{{ url ('/training')}}" class="btn btn-default">Training Plans</a></div>
          @if ( Auth::user()->isPro() )
            <div class="col-md-2"><a href="{{ url ('/pt-zone')}}" class="btn btn-primary">PT Zone</a></div>
          @endif
          <div class="col-md-2"></div>
        </div>
                         <?php $userId = Auth::user()->id;
                            $posts = App\update::whereHas('user_update.followers', function ($q) use ($userId) {
                            return $q->where('user_id', $userId);})->latest()->get()
                         ?>

@foreach ($posts as $post)
<div class="col-xs-12" id="profile_updates">
   <?php $uid=$post->user_id ?><img src="{{App\User::find($uid)->avatar}}" class="img-circle" width="20">{{$post->body}}{{App\User::find($uid)->name}}
   <small>
        {{$post->created_at->diffForHumans()}}
   </small>
</div>
@endforeach



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="/js/notification.js"></script>
@endsection
