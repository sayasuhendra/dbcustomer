@extends('layouts/scaffold')

@section('main')
	<h1 align="center">Buat Profile</h1>
	<br>
	
	{{ Form::open(['route' => ['profile.store', $user->username], 'files' => true]) }}

	<div class="col-md-4">

		<!-- Panggilan Field -->
		<div class="form-group">
			{{ Form::label('panggilan', 'Nama Panggilan :') }}
			{{ Form::text('panggilan', null, ['class' => 'form-control']) }}
			{{ errors_for('panggilan', $errors) }}
		</div>

		<!-- Extention Field -->
		<div class="form-group">
			{{ Form::label('extention', 'Extention Kantor :') }}
			{{ Form::text('extention', null, ['class' => 'form-control']) }}
			{{ errors_for('extention', $errors) }}
		</div>

		<!-- Hp Field -->
		<div class="form-group">
			{{ Form::label('hp', 'Nomer HP :') }}
			{{ Form::text('hp', null, ['class' => 'form-control']) }}
			{{ errors_for('hp', $errors) }}
		</div>

		<!-- Hp2 Field -->
		<div class="form-group">
			{{ Form::label('hp2', 'Nomer HP 2 :') }}
			{{ Form::text('hp2', null, ['class' => 'form-control']) }}
			{{ errors_for('hp2', $errors) }}
		</div>

		<!-- Wa Field -->
		<div class="form-group">
			{{ Form::label('wa', 'Whatsapp :') }}
			{{ Form::text('wa', null, ['class' => 'form-control']) }}
			{{ errors_for('wa', $errors) }}
		</div>

	</div>

	<div class="col-md-4">

		<!-- Bbm Field -->
		<div class="form-group">
			{{ Form::label('bbm', 'PIN BBM :') }}
			{{ Form::text('bbm', null, ['class' => 'form-control']) }}
			{{ errors_for('bbm', $errors) }}
		</div>

		<!-- Email_kantor Field -->
		<div class="form-group">
			{{ Form::label('email_kantor', 'Email Kantor :') }}
			{{ Form::text('email_kantor', null, ['class' => 'form-control']) }}
			{{ errors_for('email_kantor', $errors) }}
		</div>

		<!-- Email_lain Field -->
		<div class="form-group">
			{{ Form::label('email_lain', 'Email Lain :') }}
			{{ Form::text('email_lain', null, ['class' => 'form-control']) }}
			{{ errors_for('email_lain', $errors) }}
		</div>

		<!-- Ym Field -->
		<div class="form-group">
			{{ Form::label('ym', 'Yahoo Messenger :') }}
			{{ Form::text('ym', null, ['class' => 'form-control']) }}
			{{ errors_for('ym', $errors) }}
		</div>

		<!-- Skype Field -->
		<div class="form-group">
			{{ Form::label('skype', 'Skype :') }}
			{{ Form::text('skype', null, ['class' => 'form-control']) }}
			{{ errors_for('skype', $errors) }}
		</div>

		<!-- Twitter Field -->
		<div class="form-group">
			{{ Form::label('twitter', 'Twitter :') }}
			{{ Form::text('twitter', null, ['class' => 'form-control']) }}
			{{ errors_for('twitter', $errors) }}
		</div>

	</div>

	<div class="col-md-4">

		<!-- Facebook Field -->
		<div class="form-group">
			{{ Form::label('facebook', 'Facebook :') }}
			{{ Form::text('facebook', null, ['class' => 'form-control']) }}
			{{ errors_for('facebook', $errors) }}
		</div>

		<!-- Foto Field -->
		<div class="form-group">
			{{ Form::label('foto', 'Foto :') }}
			{{ Form::file('foto') }}
			{{ errors_for('Foto', $errors) }}
		</div>

		<!-- Alamat Field -->
		<div class="form-group">
			{{ Form::label('alamat', 'Alamat :') }}
			{{ Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '3']) }}
			{{ errors_for('alamat', $errors) }}
		</div>

		<!-- Keterangan Field -->
		<div class="form-group">
			{{ Form::label('keterangan', 'Keterangan :') }}
			{{ Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) }}
			{{ errors_for('keterangan', $errors) }}
		</div>

		<!-- Update Profile Field -->
		<div class="form-group">
			{{ Form::submit('Create Profile', ['class' => 'btn btn-primary']) }}
		</div>
	</div>
	{{ Form::close() }}

@stop