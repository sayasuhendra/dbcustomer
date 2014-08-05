@extends('layouts.scaffold')

@section('main')

<h1>Edit Customercontact</h1>
{{ Form::model($customercontact, array('method' => 'PATCH', 'route' => array('customercontacts.update', $customercontact->id))) }}
        <div class="form-group">
            {{ Form::label('cp', 'Nama:') }}
            {{ Form::text('cp', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bagian', 'Bagian:') }}
            {{ Form::select('bagian', ['Teknis' => 'Teknis', 'Account Manager' => 'Account Manager'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('telepon', 'Telepon:') }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('customercontacts.show', 'Cancel', $customercontact->id, array('class' => 'btn')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
