@extends('layouts.app')

@section('content')


      {!! Form::open(['method' => 'POST','id'=>'workout_log', 'route' => ['weights-training-plan.store']]) !!}
          {{ csrf_field() }}
          {{ Form::hidden('user_id', Auth::user()->id)}}

          {{ Form::label('date', 'Date')}}
          <select class="form-control" name="date">
          @foreach ($entries as $entry)
              <option value="{{ $entry->format('Y-m-d') }}">{{ $entry->format('l') }}</option>
          @endforeach
          </select>

          {{ Form::label('exercise', 'Exercise')}}
          <select class="form-control" name="exercise">
          @foreach($ex as $e)
              <option value="{{$e->id}}">{{$e->exercise}}</option>
          @endforeach
          </select>

          {{ Form::label('weight', 'Weight (kg)')}}
          {{ Form::text('weight', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}

          {{ Form::label('reps', 'Reps')}}
          {{ Form::text('reps', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}

          {{ Form::label('sets', 'Sets')}}
          {{ Form::text('sets', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}

          {{ Form::submit('Create Session', array('class' => 'btn btn-default',  'id'=>'workout_btn')) }}
      {!! Form::close() !!}

@endsection
