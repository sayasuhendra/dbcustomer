@extends('layouts.scaffold')

@section('main')

<h1>Edit Costumercircuit</h1>
{{ Form::model($costumercircuit, array('method' => 'PATCH', 'route' => array('costumercircuits.update', $costumercircuit->id))) }}
	
        <div class="form-group">
            {{ Form::label('circuitid', 'CircuitID:') }}
            {{ Form::input('number', 'circuitid', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('namasite', 'Nama Site:') }}
            {{ Form::text('namasite', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('alamat', 'Alamat:') }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('layanan', 'Layanan:') }}
            {{ Form::select('layanan', ['Broadband ADSL' => 'Broadband ADSL', 'Broadband VSAT' => 'Broadband VSAT', 'Dedicated' => 'Dedicated', 'Layer 2' => 'Layer 2', 'IP Transit' => 'IP Transit', 'Hosting' => 'Hosting', 'Collocation' => 'Collocation'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bandwidth', 'Bandwidth:') }}
            {{ Form::text('bandwidth', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('circuitidbackhaul', 'Circuit ID Backhaul:') }}
            {{ Form::input('number', 'circuitidbackhaul', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('circuitidlastmile', 'Circuit ID Lastmile:') }}
            {{ Form::input('number', 'circuitidlastmile', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('area', 'Area:') }}
            {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'],null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status', ['Aktif' => 'Aktif', 'Terminate' => 'Terminate', 'Suspend' => 'Suspend'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('customer_id', 'Customer ID:') }}
            {{ Form::input('number', 'customer_id', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('backhaul_id', 'Backhaul ID:') }}
            {{ Form::input('number', 'backhaul_id', null, ['class' => 'form-control']) }}
        </div>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('costumercircuits.show', 'Cancel', $costumercircuit->id, array('class' => 'btn')) }}
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop
