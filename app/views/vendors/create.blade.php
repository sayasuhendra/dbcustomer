@extends('layouts.scaffold')

@section('main')

<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Form Data Vendor</h1></div>
</div>

{{ Form::open(array('route' => 'vendors.store')) }}
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">
                    
                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('nama', 'Nama:') }} </div>
                        <div class="col-sm-9"> {{ Form::text('nama', null, ['class' => 'form-control']) }} </div>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('alamat', 'Alamat:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '3']) }}
                    </div></div>

                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('npwp', 'NPWP:') }} </div>
                        <div class="col-sm-9"> {{ Form::text('npwp', null, ['class' => 'form-control']) }} </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('alamatnpwp', 'Alamat NPWP:') }} </div>
                        <div class="col-sm-9"> {{ Form::textarea('alamatnpwp', null, ['class' => 'form-control', 'rows' => '3']) }} </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('keterangan', 'Keterangan:') }} </div>
                        <div class="col-sm-9"> {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) }} </div>
                    </div>
            </div>
        </div>

        
    </div>

    <br>

    <div class="form-group">
        <div align="center">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            {{ link_to_route('vendors.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
        </div>
    </div> 

    </div>




    <div class="col-md-3">
        <div class="panel panel-default">                
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::hidden('bagianteknis', 'Teknis', ['class' => 'form-control', 'placeholder' => 'bagianteknis', 'id' => 'bagianteknis']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('cpteknis', 'Nama Contact Teknis:') }}
                    {{ Form::text('cpteknis', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('kawasanteknis', 'Kawasan:') }}
                    {{ Form::text('kawasanteknis', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('jabatanteknis', 'Level Jabatan:') }}
                    {{ Form::text('jabatanteknis', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('teleponteknis', 'Telepon:') }}
                    {{ Form::text('teleponteknis', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('emailteknis', 'Email:') }}
                    {{ Form::text('emailteknis', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('keteranganteknis', 'Keterangan:') }}
                    {{ Form::textarea('keteranganteknis', null, ['class' => 'form-control', 'rows' => '3']) }}
                </div>
            </div>
        </div>        
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">                
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::hidden('bagian', 'Billing', ['class' => 'form-control', 'placeholder' => 'bagian', 'id' => 'bagian']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('cp', 'Nama Contact Billing:') }}
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
