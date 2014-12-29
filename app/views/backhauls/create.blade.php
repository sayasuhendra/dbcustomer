@extends('layouts.scaffold')

@section('main')

<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Buat Data Baru Backhaul</h1></div>
</div>

{{ Form::open(array('route' => 'backhauls.store')) }}

    <div class="panel panel-default">
        <div class="panel-body">
                <div class="form-horizontal">
                <div class="form-group">
                    {{ Form::label('circuitidbackhaul', 'Circuit ID Backhaul:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                    {{ Form::text('circuitidbackhaul', null, ['class' => 'form-control', 'id' => 'circuitidbackhaul']) }}
                    </div>
                </div>
                    <div class="form-group">
                        {{ Form::label('nama', 'Nama Backhaul:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('namavendor', 'Nama Vendor:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::select('namavendor', $namavendor, null, ['class' => 'form-control']) }}</div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                        {{ Form::label('activated_at', 'Start Date :') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::input('date', 'activated_at', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('switchterkoneksi', 'Switch Terkoneksi:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::select('switchterkoneksi', $namaswitch, null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('portterkoneksi', 'Port Terkoneksi:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">{{ Form::input('number', 'portterkoneksi', null, ['class' => 'form-control']) }}</div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('bandwidth', 'Bandwidth:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            <div class="form-inline">
                                {{ Form::text('bandwidth', null, ['class' => 'form-control', 'id' => 'bandwidth']) }}
                                {{ Form::select('satuan', ['Mbps' => 'Mbps', 'Kbps' => 'Kbps'], null, ['class' => 'form-control']) }}
                            </div>            
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('nrc', 'NRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::text('nrc', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('mrc', 'MRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::text('mrc', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('currency', 'Currency :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('currency', ['IDR' => 'IDR', 'USD' => 'USD'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    
            		<div class="form-group">
                        <div align="center">
            			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        {{ link_to_route('backhauls.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
                        </div>
            		</div>
                </div>

        </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop