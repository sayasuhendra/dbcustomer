@extends('layouts.scaffold')

@section('main')

<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Form Data Layanan SBP</h1></div>
</div>

{{ Form::open(array('route' => 'layanansbps.store')) }}
    <div class="col-md-7">
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
                        {{ Form::input('date', 'activated_at', null, ['class' => 'form-control']) }}
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
                        {{ Form::select('layanan', ['Sewa Perangkat' => 'Sewa Perangkat', 'Beli Perangkat' => 'Beli Perangkat', 'Hosting' => 'Hosting', 'Collocation' => 'Collocation'], null, ['class' => 'form-control']) }}
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
                        {{ Form::label('customer_id', 'Customer Name:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                            {{ Form::select('customer_id', $customer, null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('keterangan', 'Keterangan :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
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
                    
                </div>
            </div>
        </div>


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
            </div>
        </div>
    </div>
    </div>


    <div class="col-md-5">
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
                    {{ Form::text('keteranganteknis', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
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
                    {{ Form::text('keteranganbilling', null, ['class' => 'form-control']) }}
                </div>
                    
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
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

                            
@stop



@section('script-bawah')

    <script>
        $(document).ready(function() { 

            $("#customer_id").select2();

        });
    </script>

@stop