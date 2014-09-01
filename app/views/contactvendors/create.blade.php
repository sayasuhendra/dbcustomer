@extends('layouts.scaffold')

@section('main')


<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Buat Contact Vendor Baru</h1></div>
</div>
</div>

{{ Form::open(array('route' => 'contactvendors.store')) }}
	<div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">                
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('bagian', 'Bagian :') }}
                    {{ Form::text('bagian', null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('cp', 'Nama :') }}
                    {{ Form::text('cp', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('kawasan', 'Kawasan:') }}
                    {{ Form::text('kawasan', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('jabatan', 'Level Jabatan:') }}
                    {{ Form::text('jabatan', null, ['class' => 'form-control']) }}
                </div>
                
                <div class="form-group">
                    {{ Form::label('telepon', 'Telepon:') }}
                    {{ Form::text('telepon', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('keterangan', 'Keterangan:') }}
                    {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) }}
                </div>   
                <div class="form-group">
                    {{ Form::label('vendor_id', 'Vendor ID:') }}
                    {{ Form::text('vendor_id', null, ['class' => 'form-control']) }}
                </div>                  
            </div>
        </div>
    
    <div class="form-group">
        <div align="center">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <input type="button" value="Cancel" onclick="history.back(-1)" class="btn btn-default"/>
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


