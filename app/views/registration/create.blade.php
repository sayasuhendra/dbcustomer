@extends('layouts/scaffold')

@section('main')
    <div class="starter-template">

        {{ Form::open(['route' => 'registration.store']) }}        

        <div class="col-md-4 col-md-offset-4">
            <h1>Mendaftar</h1>
            <!-- Username Field -->
            <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('username', '<span class="error">:message</span>') }}
            </div>

            <!-- nama_lengkap Field -->
            <div class="form-group">
                {{ Form::label('nama_lengkap', 'Nama Lengkap:') }}
                {{ Form::text('nama_lengkap', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('nama_lengkap', '<span class="error">:message</span>') }}
            </div>

            <!-- level Field -->
            <div class="form-group">
                {{ Form::label('level', 'Level:') }}
                {{ Form::select('level', ['Staff' => 'Staff', 'Condev' => 'Condev', 'Engineer' => 'Engineer', 'Manajer' => 'Manajer', 'BOD' => 'BOD', 'Admin' => 'Admin'], null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('level', '<span class="error">:message</span>') }}
            </div>

            <!-- bagian Field -->
            <div class="form-group">
                {{ Form::label('bagian', 'Bagian:') }}
                {{ Form::select('bagian', ['Inventory' => 'Inventory', 'Teknikal' => 'Teknikal', 'Sales' => 'Sales', 'Finance' => 'Finance', 'AR' => 'AR', 'AP' => 'AP', 'GA' => 'GA', 'DCO' => 'DCO', 'Umum' => 'Umum'], null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('bagian', '<span class="error">:message</span>') }}
            </div>

            <!-- area Field -->
            <div class="form-group">
                {{ Form::label('area', 'Area:') }}
                {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'], null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('area', '<span class="error">:message</span>') }}
            </div>


            <!-- Email Field -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('email', '<span class="error">:message</span>') }}
            </div>

            <!-- Password Field -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('password', '<span class="error">:message</span>') }}
            </div>

            <!-- Password Field -->
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Confirm Password:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
            </div>
        
            <!-- Create Account Field -->
            <div class="form-group">
                {{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
            <input type="button" value="Cancel" onclick="history.back(-1)" class="btn btn-default"/>
            </div>

        </div>
        {{ Form::close() }}
        
    </div>
    
@stop