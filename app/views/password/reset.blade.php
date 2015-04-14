@extends('sessions/master')

@section('atas')

<style type="text/css">
    .login .bawah {

        background-color: #eceef1;
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        -ms-border-radius: 7px;
        -o-border-radius: 7px;
        border-radius: 7px;
        margin: 40px auto 10px auto;
        padding: 30px;
        padding-top: 10px;
        overflow: hidden;
        position: relative;

    }
</style>

@stop

@section('main')

<div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">

<div class="bawah">
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
</div>

@stop