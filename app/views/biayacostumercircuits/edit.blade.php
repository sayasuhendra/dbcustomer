@extends('layouts.scaffold')

@section('main')

<h1>Edit Biayacostumercircuit</h1>
{{ Form::model($biayacostumercircuit, array('method' => 'PATCH', 'route' => array('biayacostumercircuits.update', $biayacostumercircuit->id))) }}
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
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('biayacostumercircuits.show', 'Cancel', $biayacostumercircuit->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
