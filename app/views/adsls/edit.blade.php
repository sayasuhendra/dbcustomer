@extends('layouts.scaffold')

@section('main')

<h1>Edit ADSL</h1>
{{ Form::model($adsl, array('method' => 'PATCH', 'route' => array('adsls.update', $adsl->id))) }}
	<ul>
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
			{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
			{{ link_to_route('adsls.show', 'Cancel', $adsl->id, array('class' => 'btn')) }}
		</div>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
