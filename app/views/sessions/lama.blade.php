@extends('layouts/scaffold')

@section('meta-title', 'Login')

@section('main')

<div class="col-md-4 col-md-offset-4">
    <h1>Log In</h1>

    {{ Form::open(['route' => 'sessions.store']) }}
        <!-- Email Field -->
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, ['class' => 'form-control']) }}
            {{ errors_for('email', $errors) }}
        </div>

        <!-- Password Field -->
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
            {{ errors_for('password', $errors) }}
        </div>
        
        <!-- Log In! Field -->
        <div class="form-group">
            {{ link_to_route('lupapassword', 'Klik Jika Lupa Password') }} {{ Form::submit('Log In!', ['class' => 'btn btn-primary pull-right']) }}
        </div>

        @if (Session::has('flash_message'))
            <div class="form-group">
                <p>{{ Session::get('flash_message') }}</p>
            </div>
        @endif
    {{ Form::close() }}
</div>
@stop