@extends('layouts.scaffold')

@section('main')

<h1>Edit Backhaul</h1>
{{ Form::model($backhaul, array('method' => 'PATCH', 'route' => array('backhauls.update', $backhaul->id))) }}
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
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('backhauls.show', 'Cancel', $backhaul->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
