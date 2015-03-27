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

<div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">

<div class="bawah">

    
        {{ Form::open(['route' => 'registration.store']) }}        

            <h1 align="center">Mendaftar</h1>
            <div class="row">
<div class="col-sm-4 col-md-4 col-lg-4">
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

</div>

<div class="col-sm-4 col-md-4 col-lg-4">
            <!-- Username Field -->
            <div class="form-group">
                {{ Form::label('extention', 'Extention:') }}
                {{ Form::text('extention', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('extention', '<span class="error">:message</span>') }}
            </div>

            <!-- nama_lengkap Field -->
            <div class="form-group">
                {{ Form::label('bbm', 'PIN Blackberry:') }}
                {{ Form::text('bbm', null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('bbm', '<span class="error">:message</span>') }}
            </div>

            <!-- level Field -->
            <div class="form-group">
                {{ Form::label('hp', 'Handphone:') }}
                {{ Form::text('hp', null, ['class' => 'form-control', 'required' => 'required'])}}
                {{ $errors->first('hp', '<span class="error">:message</span>') }}
            </div>

            <!-- bagian Field -->
            <div class="form-group">
                {{ Form::label('wa', 'Whatsapp:') }}
                {{ Form::text('wa', null, ['class' => 'form-control', 'required' => 'require'])}}
                {{ $errors->first('wa', '<span class="error">:message</span>') }}
            </div>

</div>

<div class="col-sm-4 col-md-4 col-lg-4">
            <!-- area Field -->
            <div class="form-group">
                {{ Form::label('area', 'Area:') }}
                {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'], null, ['class' => 'form-control', 'required' => 'required']) }}
                {{ $errors->first('area', '<span class="error">:message</span>') }}
            </div>


            <!-- Email Field -->
            <div class="form-group">
                {{ Form::label('email', 'Email Kantor:') }}
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
</div>
        </div>
            <div class="form-actions">
                <a href="{{ route('login') }}"><button type="button" id="register-back-btn" class="btn btn-default">Back</button></a>
                <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        {{ Form::close() }}
</div>        
</div>

@stop