@extends('layouts/scaffold')

@section('meta-title', 'Reset Password')

@section('main')

<div class="col-md-4 col-md-offset-4">
    <h1>Reset Password</h1>

	<form action="{{ action('RemindersController@postReset') }}" method="POST">

	    <input type="hidden" name="token" value="{{ $token }}">

        <!-- Email Field -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
            {{ errors_for('email', $errors) }}
        </div>

        <!-- Password Field -->
        <div class="form-group">
            {{ Form::label('password', 'Password Baru:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ errors_for('password', $errors) }}
        </div>

        <!-- Password Field -->
        <div class="form-group">
            {{ Form::label('password_confirmation', 'Password Baru (sekali lagi):') }}
            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            {{ errors_for('password', $errors) }}
        </div>
        
        <!-- Log In! Field -->
        <div class="form-group">
            {{ Form::submit('Reset Password', ['class' => 'btn btn-primary pull-right']) }}
        </div>

        @if (Session::has('flash_message'))
            <div class="form-group">
                <p>{{ Session::get('flash_message') }}</p>
            </div>
        @endif
    {{ Form::close() }}
</div>

@stop