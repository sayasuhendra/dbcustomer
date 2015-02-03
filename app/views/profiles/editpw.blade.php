@extends('layouts/scaffold')

@section('main')

	{{ Form::model($user, ['method' => 'PATCH', 'route' => ['updatepassword', $user->username]]) }}
		<!-- Location Field -->

	<div class="col-md-4 col-md-offset-4">

	<h1>Edit Password</h1>

		<!-- Password Lama Field -->
		<div class="form-group">
			{{ Form::label('passwordlama', 'Password Lama :') }}
			{{ Form::text('passwordlama', null, ['class' => 'form-control']) }}
			{{ errors_for('passwordlama', $errors) }}
		</div>

		<!-- Password Baru Field -->
		<div class="form-group">
			{{ Form::label('passwordbaru', 'Password Baru :') }}
			{{ Form::text('passwordbaru', null, ['class' => 'form-control']) }}
			{{ errors_for('passwordbaru', $errors) }}
		</div>

		<!-- Password Baru Confirmation Field -->
		<div class="form-group">
			{{ Form::label('passwordbaru_confirmation', 'Password Baru :') }}
			{{ Form::text('passwordbaru_confirmation', null, ['class' => 'form-control']) }}
			{{ errors_for('passwordbaru_confirmation', $errors) }}
		</div>

		<!-- Update Password Field -->
		<div class="form-group">
			{{ Form::submit('Update Password', ['class' => 'btn btn-primary']) }}
			<input type="button" value="Cancel" onclick="history.back(-1)" class="btn btn-default"/>
		</div>
	</div>
	
	{{ Form::close() }}

@stop