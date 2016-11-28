@if(Session::has('success'))
<div class="container" id="success">
<div class="alert alert-success" role="alert">
<strong>Success:</strong> {{Session::get('success')}}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
</div>

@endif

@if(Session::has('pt_success'))
<div id="success">
<div class="alert alert-success" role="alert">
<strong>Success:</strong> {{Session::get('pt_success')}}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
</div>

@endif

@if(Session::has('workout_error'))
<div class="container">
<div class="alert alert-danger" role="alert">
<strong>Error</strong> {{Session::get('workout_error')}}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
</div>

@endif

@if (count($errors) > 0)

<div class="alert alert-danger" role="alert">
<strong>Errors:</strong>
<ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
</div>

@endif