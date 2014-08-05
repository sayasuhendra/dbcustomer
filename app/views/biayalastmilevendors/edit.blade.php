@extends('layouts.scaffold')

@section('main')

<h1>Edit Biayalastmilevendor</h1>
{{ Form::model($biayalastmilevendor, array('method' => 'PATCH', 'route' => array('biayalastmilevendors.update', $biayalastmilevendor->id))) }}
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
            {{ Form::input('number', 'circuitidlastmile', null, ['class' => 'form-control']) }}
        </div>
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('biayalastmilevendors.show', 'Cancel', $biayalastmilevendor->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
