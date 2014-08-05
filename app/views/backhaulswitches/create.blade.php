@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Backhaulswitch</h1>

{{ Form::open(array('route' => 'backhaulswitches.store')) }}
	<ul>
        <div class="form-group">
            {{ Form::label('nama', 'Nama:') }}
            {{ Form::text('nama', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label(' jenis', ' Jenis:') }}
            {{ Form::text(' jenis', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('jumlahportfo', 'Jumlahportfo:') }}
            {{ Form::input('number', 'jumlahportfo', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('jumlahportrj', 'Jumlahportrj:') }}
            {{ Form::text('jumlahportrj', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('area', 'Area:') }}
            {{ Form::text('area', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('lokasi', 'Lokasi:') }}
            {{ Form::text('lokasi', null, ['class' => 'form-control']) }}
        </div>
		<div class="form-group">
			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


