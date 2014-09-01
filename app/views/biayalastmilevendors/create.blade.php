@extends('layouts.scaffold')

@section('main')

<h1>Buat Data Baru Biayalastmilevendor</h1>

{{ Form::open(array('route' => 'biayalastmilevendors.store')) }}
	<ul>
        <div class="form-group">
            {{ Form::label('nrc', 'Nrc:') }}
            {{ Form::text('nrc', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('mrc', 'Mrc:') }}
            {{ Form::text('mrc', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('circuitidlastmile', 'Circuit ID Lastmile:') }}
            {{ Form::text('circuitidlastmile', null, ['class' => 'form-control', 'id' => 'circuitidlastmile']) }}
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


