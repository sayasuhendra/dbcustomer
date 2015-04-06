@extends('layouts/scaffold')

@section('main')

<div class="content">


    {{ Form::open(['action' => 'SessionsController@logindewa', 'class' => 'login-form']) }}
		<h3 class="form-title">Sign In</h3>
		{{ Form::text('username') }}
		<button type="submit" class="btn btn-success uppercase">Login</button>
    {{ Form::close() }}
	
</div>
@stop