@extends('layouts.scaffold')

@section('main')

<h1>Edit Vendor</h1>
{{ Form::model($vendor, array('method' => 'PATCH', 'route' => array('vendors.update', $vendor->id))) }}
	<ul>
        <div class="form-group">
            {{ Form::label('nama', 'Nama:') }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('alamat', 'Alamat:') }}
            {{ Form::text('alamat', null, ['class' => 'form-control']) }}
        </div>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('vendors.show', 'Cancel', $vendor->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
