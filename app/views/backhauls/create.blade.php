@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Backhaul</h1>

{{ Form::open(array('route' => 'backhauls.store')) }}
	<ul>
        <div class="form-group">
            {{ Form::label('vendor_id', 'Vendor ID:') }}
            {{ Form::input('number', 'vendor_id', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('circuitidbackhaul', 'Circuit ID Backhaul:') }}
            {{ Form::input('number', 'circuitidbackhaul', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('lokasixconnect', 'Lokasi XConnect:') }}
            {{ Form::text('lokasixconnect', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('switchterkoneksi', 'Switch Terkoneksi:') }}
            {{ Form::text('switchterkoneksi', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('portterkoneksi', 'Port Terkoneksi:') }}
            {{ Form::input('number', 'portterkoneksi', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bandwidth', 'Bandwidth:') }}
            {{ Form::text('bandwidth', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('backhaulswitch_id', 'Backhaul Switch ID:') }}
            {{ Form::input('number', 'backhaulswitch_id', null, ['class' => 'form-control']) }}
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


