@extends('layouts.scaffold')

@section('main')

<h1>Edit Lastmile</h1>
{{ Form::model($lastmile, array('method' => 'PATCH', 'route' => array('lastmiles.update', $lastmile->id))) }}
	<ul>
        <div class="form-group">
            {{ Form::label('circuitidlastmile', 'Circuit ID Lastmile:') }}
            {{ Form::input('number', 'circuitidlastmile', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('vlanid', 'VLAN ID:') }}
            {{ Form::text('vlanid', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('vlanname', 'VLAN Name:') }}
            {{ Form::text('vlanname', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('ipaddressptp', 'IP Address PTP:') }}
            {{ Form::text('ipaddressptp', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('blockippubliccustomer', 'Block IP Public Customer:') }}
            {{ Form::text('blockippubliccustomer', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('backhaul_id', 'Backhaul ID:') }}
            {{ Form::input('number', 'backhaul_id', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('costumercircuit_id', 'Customer Circuit ID:') }}
            {{ Form::input('number', 'costumercircuit_id', null, ['class' => 'form-control']) }}
        </div>
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('lastmiles.show', 'Cancel', $lastmile->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
