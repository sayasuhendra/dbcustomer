@extends('layouts.scaffold')

@section('main')

<h1>Edit Contactvendor</h1>
{{ Form::model($contactvendor, array('method' => 'PATCH', 'route' => array('contactvendors.update', $contactvendor->id))) }}
	<ul>
        <div class="form-group">
            {{ Form::label('nama', 'Nama:') }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bagian', 'Bagian:') }}
            {{ Form::text('bagian', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('telepon', 'Telepon:') }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('vendor_id', 'Vendor ID:') }}
            {{ Form::input('number', 'vendor_id', null, ['class' => 'form-control']) }}
        </div>
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('contactvendors.show', 'Cancel', $contactvendor->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
