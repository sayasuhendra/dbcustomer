@extends('layouts.scaffold')

@section('main')

<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="panel-title" align="center">Edit Data Perangkat di Circuit</h1></div>
    </div>
</div>

{{ Form::model($costumercircuitperangkat, array('method' => 'PATCH', 'route' => array('costumercircuitperangkats.update', $costumercircuitperangkat->id))) }}

<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
    <div class="panel-body">                                
        <div class="form-horizontal">
                <div class="form-group">
                        {{ Form::label('namaperangkat', 'Nama Perangkat:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::text('namaperangkat', null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('serialnumber', 'Serial Number:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::text('serialnumber', null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tipe', 'Tipe:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::text('tipe', null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('jenis', 'Jenis:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::select('jenis', ['switch' => 'Switch', 'modem' => 'Modem', 'router' => 'Router', 'wireless' => 'Wireless'], null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('pemilik', 'Pemilik:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::select('pemilik', ['SBP' => 'SBP', 'Customer' => 'Customer', 'Vendor' => 'Vendor'], null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('costumercircuit_id', 'Nama Site:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::select('costumercircuit_id', $customercircuits, null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        <div align="center">
                            {{ Form::submit('Update', array('class' => 'btn btn-info')) }} <input type="button" value="Cancel" onclick="history.back(-1)" class="btn btn-default"/>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
			
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
