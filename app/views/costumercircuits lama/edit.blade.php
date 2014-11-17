@extends('layouts.scaffold')

@section('script-atas')

    <script>
        $(document).ready(function() { 

            $("#customer_id").select2();
            $("#namavendor").select2();
            $("#namabackhaul").select2();
            

        });
    </script>

@stop

@section('main')



<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Form Edit Customer Circuit</h1></div>
</div>

{{ Form::model($costumercircuit, array('method' => 'PATCH', 'route' => array('costumercircuits.update', $costumercircuit->id))) }}

<div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            {{ Form::label('circuitid', 'CircuitID :') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::input('number', 'circuitid', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                        {{ Form::label('activated_at', 'Start Date :') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::text('activated_at', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('namasite', 'Nama Site :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('namasite', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('alamat', 'Alamat:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '3']) }}
                    </div></div>

                    <div class="form-group">
                        {{ Form::label('layanan', 'Layanan:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('layanan', ['VSAT' => 'VSAT', 'ADSL' => 'ADSL', 'Wireline Broadband' => 'Wireline Broadband', 'Wireline Dedicated' => 'Wireline Dedicated', 'Layer 2' => 'Layer 2', 'IP Transit' => 'IP Transit', 'Hosting' => 'Hosting', 'Collocation' => 'Collocation', 'Wireless Broadband' => 'Wireless Broadband', 'Wireless Dedicated' => 'Wireless Dedicated', 'VPN IP' => 'VPN IP'], null, ['class' => 'form-control']) }}
                    </div></div>
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
                        {{ Form::label('namabackhaul', 'Nama Backhaul:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('namabackhaul', $namabackhaul, null, ['class' => 'form-control']) }}
                    </div></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">                                
                <div class="form-horizontal">

                    
                    <div class="form-group">
                        {{ Form::label('namavendor', 'Nama Vendor:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('namavendor', $vendor, null, ['class' => 'form-control']) }}
                    </div></div>
                    <div class="form-group">
                        {{ Form::label('circuitidlastmile', 'Circuit ID Vendor:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('circuitidlastmile', $circuitidlastmile, null, ['class' => 'form-control']) }}
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
                        {{ Form::label('nrc', 'NRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::input('number', 'nrc', $costumercircuit->biayas->nrc, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('mrc', 'MRC:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::input('number', 'mrc', $costumercircuit->biayas->mrc, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('currency', 'Currency :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('currency', ['IDR' => 'IDR', 'USD' => 'USD'], $costumercircuit->biayas->currency, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('customer_id', 'Customer Name:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('customer_id', $customer, null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('keteranganck', 'Keterangan :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::textarea('keteranganck', null, ['class' => 'form-control', 'rows' => '3']) }}
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

<div class="form-group">
                        <div align="center">
                            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                            {{ link_to_route('costumercircuits.show', 'Cancel', $costumercircuit->id, array('class' => 'btn btn-default')) }}
                            {{ Form::close() }} 
                        </div>
                    </div> 

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop
