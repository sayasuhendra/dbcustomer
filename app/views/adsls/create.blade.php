@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru ADSL</h1>

{{ Form::open(array('route' => 'adsls.store')) }}
        <div class="form-group">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('costumercircuit_id', 'Customer Circuit ID:') }}
            {{ Form::input('number', 'costumercircuit_id', null, ['class' => 'form-control']) }}
        </div>

		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		</div>
{{ Form::close() }}


@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
