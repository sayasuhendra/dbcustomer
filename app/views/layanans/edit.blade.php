@extends('layouts.scaffold')

@section('main')

<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Edit Layanan Lain</h1></div>
</div>

{{ Form::model($layanan->toArray(), array('method' => 'PATCH', 'route' => array('layanans.update', $layanan->id))) }}

<div class="panel panel-default">
    <div class="panel-body">
            <div class="form-horizontal">
                <div class="form-group">
                    {{ Form::label('nama', 'Nama Layanan:', ['class' => 'col-sm-3']) }}
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
                    {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                    {{ Form::select('status', ['Aktif' => 'Aktif', 'Terminate' => 'Terminate', 'Suspend' => 'Suspend'], null, ['class' => 'form-control']) }}
                </div></div>
                <div class="form-group">
                    {{ Form::label('keterangan', 'Keterangan:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">{{ Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) }}</div>
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
                    {{ Form::select('currency', ['IDR' => 'IDR', 'USD' => 'USD', 'SGD' => 'SGD', 'EUR' => 'EUR'], null, ['class' => 'form-control']) }}
                    </div>
                </div>
                
                <div class="form-group">
                    <div align="center">
                    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                    {{ link_to_route('layanans.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
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
