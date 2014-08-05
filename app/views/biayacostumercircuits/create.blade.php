@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Biayacostumercircuit</h1>

{{ Form::open(array('route' => 'biayacostumercircuits.store')) }}
	<ul>
        <div class="form-group">
            {{ Form::label('nrc', 'Nrc:') }}
            {{ Form::text('nrc', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('mrc', 'Mrc:') }}
            {{ Form::text('mrc', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('biaya', 'Biaya:') }}
            {{ Form::text('biaya', null, ['class' => 'form-control']) }}
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


