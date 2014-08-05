@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Customercontact</h1>

{{ Form::open(array('route' => 'customercontacts.store')) }}
        <div class="form-group">
            {{ Form::label('cp', 'Nama:') }}
            {{ Form::text('cp', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bagian', 'Bagian:') }}
            {{ Form::select('bagian', ['Teknis' => 'Teknis', 'Billing' => 'Billing'], null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('telepon', 'Telepon:') }}
            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
        </div>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


