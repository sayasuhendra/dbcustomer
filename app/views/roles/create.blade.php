@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Role</h1>

{{ Form::open(array('route' => 'roles.store')) }}
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		</div>
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop


