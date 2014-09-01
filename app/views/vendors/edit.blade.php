@extends('layouts.scaffold')

@section('main')

<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Edit Vendor</h1></div>
</div>
</div>

{{ Form::model($vendor, array('method' => 'PATCH', 'route' => array('vendors.update', $vendor->id))) }}

    <div class="col-md-6 col-md-offset-3">
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
		
		<div class="form-group">
			<div align="center">
				{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
				{{ link_to_route('vendors.show', 'Cancel', $vendor->id, array('class' => 'btn btn-default')) }}
			</div>
		</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
