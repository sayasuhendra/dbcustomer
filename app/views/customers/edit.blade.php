@extends('layouts.scaffold')

@section('main')
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Edit Data Customer</h1></div>
</div>
{{ Form::model($customer, array('method' => 'PATCH', 'route' => array('customers.update', $customer->id))) }}        

   
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            {{ Form::label('customerid', 'Customer ID:') }}
                        </div>
                        <div class="col-sm-9">
                            {{ Form::input('number', 'customerid', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('nama', 'Nama:') }} </div>
                        <div class="col-sm-9"> {{ Form::text('nama', null, ['class' => 'form-control']) }} </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3"> {{ Form::label('register_at', 'register_at:') }} </div>
                        <div class="col-sm-9"> {{ Form::input('date', 'register_at', null, ['class' => 'form-control', 'id' => 'pilih']) }}</div>

                    </div>
                    <div class="form-group">
                        {{ Form::label('alamat', 'Alamat:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '3']) }}
                    </div></div>

                    <div class="form-group">
                        {{ Form::label('area', 'Area:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'], null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('status', ['Aktif' => 'Aktif', 'Terminate' => 'Terminate', 'Suspend' => 'Suspend'], null, ['class' => 'form-control']) }}
                    </div></div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            {{ Form::label('level', 'Level:') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::select('level', ['Platinum' => 'Platinum', 'Gold' => 'Gold', 'Silver' => 'Silver', 'Bronze' => 'Bronze'], null, ['class' => 'form-control']) }}
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

                    <div align='center' class="form-group">
                        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                        {{ link_to_route('customers.index', 'Cancel', $customer->id, array('class' => 'btn btn-default')) }}
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

