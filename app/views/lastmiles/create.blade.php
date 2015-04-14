@extends('layouts.scaffold')

@include('pages/selectatas')

@section('main')

<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Tambah Circuit Vendor Baru</h1></div>
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
                        {{ Form::text('circuitidlastmile', null, ['class' => 'form-control', 'id' => 'circuitidlastmile']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                        {{ Form::label('activated_at', 'Start Date:') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::input('date', 'activated_at', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                        {{ Form::label('doc', 'Date of Contract:') }}
                        </div>
                        <div class="col-sm-9">
                        {{ Form::input('date', 'doc', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('toc', 'Term of Contract:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('toc', ['1 Bulan' => '1 Bulan', '3 Bulan' => '3 Bulan', '6 Bulan' => '6 Bulan', '12 Bulan' => '12 Bulan', '24 Bulan' => '24 Bulan', '36 Bulan' => '36 Bulan'], null, ['class' => 'form-control']) }}
                    </div></div>
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
                        {{ Form::label('ipaddressptp', 'IP Address PTP:', ['class' => 'col-sm-3']) }}
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
                        {{ Form::select('layanan', ['VSAT' => 'VSAT', 'ADSL' => 'ADSL', 'Wireline Broadband' => 'Wireline Broadband', 'Wireline Dedicated' => 'Wireline Dedicated', 'Layer 2' => 'Layer 2', 'IP Transit' => 'IP Transit', 'Hosting' => 'Hosting', 'Collocation' => 'Collocation', 'Wireless Broadband' => 'Wireless Broadband', 'Wireless Dedicated' => 'Wireless Dedicated', 'VPN IP' => 'VPN IP'], null, ['class' => 'form-control']) }}
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
                        {{ Form::label('kawasan', 'Kawasan :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('kawasan', null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('keterangan', 'Keterangan :', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('namavendor', 'Nama Vendor:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('namavendor', ['Belum Dipilih di Saat Create' => 'Pilih Vendor'] + $vendor, null, ['class' => 'form-control select2']) }}
                    </div></div>

                    <div class="form-group">
                        {{ Form::label('namabackhaul', 'Nama Backhaul:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('namabackhaul', ['Belum Dipilih di Saat Create' => 'Pilih Backhaul'], null, ['class' => 'form-control select2']) }}
                    </div></div>

                    <div class="form-group">
                        {{ Form::label('am', 'Account Manager:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('am', ['Belum Dipilih di Saat Create' => 'Pilih Account Manager'], null, ['class' => 'form-control select2']) }}
                    </div></div>
                    
                    <div class="form-group">
                        {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                        <div class="col-sm-9">
                        {{ Form::select('status', ['Aktif' => 'Aktif', 'Terminate' => 'Terminate', 'Suspend' => 'Suspend'], null, ['class' => 'form-control']) }}
                    </div></div>
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
    </div>

    <div class="form-group">
        <div align="center">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            {{ link_to_route('lastmiles.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
        </div>
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

@include('pages/selectbawah')

@section('script-bawah')

<script>

        $('#namavendor').on('change', function(){
            $.post('{{ URL::to('lastmiles/create/formbackhaul') }}', {namavendor: $('#namavendor').val()}, function(e){
                $('#namabackhaul').html(e);
            });
            $.post('{{ URL::to('lastmiles/create/formam') }}', {namavendor: $('#namavendor').val()}, function(e){
                $('#am').html(e);
            });
        });

        $(document).ready(function() { 

            $("#namavendor").select2();
            $("#namabackhaul").select2();
            $("#layanan").select2();
            

        });
</script>

@stop