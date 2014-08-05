@extends('layouts.scaffold')

@section('main')

<h1>Edit Customer</h1>
{{ Form::model($customer, array('method' => 'PATCH', 'route' => array('customers.update', $customer->id))) }}        
        <div class="form-group">
            {{ Form::label('customerid', 'Customer ID:') }}
            {{ Form::input('number', 'customerid', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nama', 'Nama Customer:') }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('alamat', 'Alamat:') }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('level', 'Level:') }}
            {{ Form::select('level', ['Platinum' => 'Platinum', 'Gold' => 'Gold', 'Silver' => 'Silver', 'Bronze' => 'Bronze'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
			{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
            {{ link_to_route('customers.index', 'Cancel', $customer->id, array('class' => 'btn btn-info')) }}
        </div>

			
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
