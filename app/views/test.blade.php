@extends('layouts.scaffold')

@section('main')

{{ Form::open(['action' => 'SessionsController@logindewa']) }}

        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        </div>

{{ Form::close() }}

@stop