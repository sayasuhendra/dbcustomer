@extends('layouts.scaffold')

@section('main')

<h1>Edit Costumercircuitperangkat</h1>
{{ Form::model($costumercircuitperangkat, array('method' => 'PATCH', 'route' => array('costumercircuitperangkats.update', $costumercircuitperangkat->id))) }}
    	<div class="form-group">
            {{ Form::label('namaperangkat', 'Namaperangkat:') }}
            {{ Form::text('namaperangkat', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('serialnumber', 'Serialnumber:') }}
            {{ Form::text('serialnumber', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tipe', 'Tipe:') }}
            {{ Form::text('tipe', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('jenis', 'Jenis:') }}
            {{ Form::select('jenis', ['switch' => 'switch', 'modem' => 'modem', 'router' => 'router', 'wireless' => 'wireless'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('costumercircuit_id', 'Customer Circuit ID:') }}
            {{ Form::input('number', 'costumercircuit_id', null, ['class' => 'form-control']) }}
        </div>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('costumercircuitperangkats.show', 'Cancel', $costumercircuitperangkat->id, array('class' => 'btn')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
