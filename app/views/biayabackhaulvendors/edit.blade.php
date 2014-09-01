@extends('layouts.scaffold')

@section('main')

<h1>Edit Biayabackhaulvendor</h1>
{{ Form::model($biayabackhaulvendor, array('method' => 'PATCH', 'route' => array('biayabackhaulvendors.update', $biayabackhaulvendor->id))) }}
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
            {{ Form::label('circuitidbackhaul', 'Circuit ID Backhaul:') }}
            {{ Form::text('circuitidbackhaul', null, ['class' => 'form-control', 'id' => 'circuitidbackhaul']) }}
        </div>
		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('biayabackhaulvendors.show', 'Cancel', $biayabackhaulvendor->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
