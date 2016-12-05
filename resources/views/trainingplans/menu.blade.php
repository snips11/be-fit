@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            </br>
           Training Plans
            </br>
            <a href="{{ route ('weights-training-plan.index')}}" class="btn btn-default">Weight Exercises</a>
            <a href="#" class="btn btn-default">Running</a>
            <a href="#" class="btn btn-default">Yoga</a>
        </div>
    </div>
</div>
@endsection
