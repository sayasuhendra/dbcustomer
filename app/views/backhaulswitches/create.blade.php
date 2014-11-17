@extends('layouts.scaffold')

@section('main')


<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="panel-title" align="center">Buat Data Baru Switches SBP</h1></div>
    </div>

{{ Form::open(array('route' => 'backhaulswitches.store')) }}
	<div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                {{ Form::label('nama', 'Nama:') }}
                {{ Form::text('nama', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('jenis', 'Jenis:') }}
                {{ Form::text('jenis', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('jumlahportfo', 'Jumlah Port FO:') }}
                {{ Form::input('number', 'jumlahportfo', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('jumlahportrj', 'Jumlah Port RJ:') }}
                {{ Form::text('jumlahportrj', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('area', 'Area:') }}
                {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'], null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('lokasi', 'Lokasi:') }}
                {{ Form::text('lokasi', null, ['class' => 'form-control']) }}
            </div>
    		<div class="form-group">
    			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                {{ link_to_route('backhaulswitches.index', 'Cancel', null,  array('class' => 'btn btn-default')) }}
    		</div>
        </div>
    </div>
</div>
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif
</div>

@stop


