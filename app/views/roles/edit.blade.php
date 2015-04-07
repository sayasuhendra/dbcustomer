@extends('layouts.scaffold')

@section('main')

<h1>Edit Role</h1>
{{ Form::model($role, array('method' => 'PATCH', 'route' => array('roles.update', $role->id))) }}
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('roles.show', 'Cancel', $role->id, array('class' => 'btn')) }}
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop
