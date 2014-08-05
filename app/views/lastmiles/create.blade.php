@extends('layouts.scaffold')

@section('main')

<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Form Data Circuit Vendor</h1></div>
</div>

{{ Form::open(array('route' => 'lastmiles.store')) }}

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            {{ Form::label('circuitidlastmile', 'Circuit ID Vendor :') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::input('number', 'circuitidlastmile', null, ['class' => 'form-control']) }}
                        </div>
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
                        {{ Form::label('vlanid', 'VLAN ID :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('vlanid', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('vlanname', 'Nama VLAN :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('vlanname', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('ipaddressptp', 'IP Address PTP :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('ipaddressptp', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('blockippubliccustomer', 'Block IP Public Customer :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('blockippubliccustomer', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('layanan', 'Layanan:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('layanan', ['VSAT' => 'VSAT', 'ADSL' => 'ADSL', 'Dedicated' => 'Dedicated', 'Layer 2' => 'Layer 2', 'IP Transit' => 'IP Transit', 'Hosting' => 'Hosting', 'Collocation' => 'Collocation'], null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        <div class="col-sm-9 pull-right">
                        {{ Form::hidden('username', null, ['class' => 'form-control', 'placeholder' => 'username', 'id' => 'username']) }}
                    </div></div>
                    <div class="form-group">
                        <div class="col-sm-9 pull-right">
                        {{ Form::hidden('password', null, ['class' => 'form-control', 'placeholder' => 'password', 'id' => 'password']) }}
                    </div></div>
                     </div>
        </div>
    </div>
    </div>

                    
<div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">
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
                        {{ Form::label('circuitidbackhaul', 'Circuit ID Backhaul:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('circuitidbackhaul', $circuitidbackhaul, null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('vendor_id', 'Nama Vendor:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('vendor_id', $vendor, null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('costumercircuit_id', 'Nama Site Circuit Customer :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('costumercircuit_id', $costumercircuit, null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('status', ['Aktif' => 'Aktif', 'Terminate' => 'Terminate', 'Suspend' => 'Suspend'], null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('nrc', 'NRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::input('number', 'nrc', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('mrc', 'MRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::input('number', 'mrc', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('currency', 'Currency :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('currency', ['IDR' => 'IDR', 'USD' => 'USD'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>

    <div class="form-group">
        <div align="center">
            {{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary')) }}
        </div>
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@section('script-bawah')

<script>
    $('#layanan').change(function() {
        if ($(this).val() === 'ADSL') {
            $("#username").removeAttr( "type" );
            $("#password").removeAttr( "type" );
        }
        if ($(this).val() !== 'ADSL') {
            $("#username").attr( "type", "hidden" );
            $("#password").attr( "type", "hidden" );
        }
    });
</script>

@stop


