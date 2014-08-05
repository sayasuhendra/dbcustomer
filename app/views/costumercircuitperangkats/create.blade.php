@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Costumercircuitperangkat</h1>

{{ Form::open(array('route' => 'costumercircuitperangkats.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


