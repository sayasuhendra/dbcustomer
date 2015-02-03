@extends('layouts/scaffold')

@section('meta-title', 'Reset Password')

@section('main')

<div class="col-md-4 col-md-offset-4">
    <h1>Reset Password</h1>

<form action="{{ action('RemindersController@postRemind') }}" method="POST">

        <!-- Email Field -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
            {{ errors_for('email', $errors) }}
        </div>

        @if(Session::has('error'))
        	<p style="color: red;"> Maaf, Tidak Ada Pengguna dengan Email yang Anda Masukkan. <br> Silahkan Masukkan Email Lain.<br> Atau Silahkan <a href="/register" class="btn btn-sm btn-success">Mendaftar.</a> </p>
        @elseif (Session::has('status'))
        	<p>Silahkan Cek Email Anda dan Klik Link yang Kami Kirim untuk Mereset Password Anda.</p>
        @endif

        <!-- Log In! Field -->
        <div class="form-group">
            {{ Form::submit('Kirim Email Reset Password', ['class' => 'btn btn-primary pull-right']) }}
        </div>

</div>

@stop