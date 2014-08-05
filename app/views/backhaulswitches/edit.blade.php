@extends('layouts.scaffold')

@section('main')

<h1>Edit Backhaulswitch</h1>
{{ Form::model($backhaulswitch, array('method' => 'PATCH', 'route' => array('backhaulswitches.update', $backhaulswitch->id))) }}
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
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('backhaulswitches.show', 'Cancel', $backhaulswitch->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
