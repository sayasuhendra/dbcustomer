@extends('layouts.scaffold')

@section('style-atas')

<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/clockface/css/clockface.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-datepicker/css/datepicker3.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
    
@stop

@section('main')


<div class="panel panel-primary">
    <div class="panel-heading">
    <h1 class="panel-title" align="center">Buat Data Baru Problem</h1></div>
</div>

{{ Form::open(array('route' => 'problems.store')) }}

<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="form-group">
                    {{ Form::label('tt', 'Trouble Ticket:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('tt', null, ['class' => 'form-control', 'id' => 'tt']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('csc', 'CSC Name:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('csc', null, ['class' => 'form-control', 'id' => 'csc']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('area', 'Area:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                    {{ Form::select('area', ['Batam' => 'Batam', 'TPI' => 'TPI', 'TBK' => 'TBK', 'Global' => 'Global', 'Bali' => 'Bali', 'Jakarta' => 'Jakarta'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('customer_id', 'Customer Name:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::select('customer_id', $customers, null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('start', 'Problem Start:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('start', null, ['class' => 'form-control input-group date form_datetime', 'id' => 'start']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('finish', 'Problem Finish:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('finish', null, ['class' => 'form-control input-group date form_datetime', 'id' => 'finish']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('jam', 'Jumlah Jam:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('jam', null, ['class' => 'form-control', 'id' => 'jam']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('menit', 'Jumlah Menit:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('menit', null, ['class' => 'form-control', 'id' => 'menit']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('channel', 'Channel:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::select('channel', ['By System' => 'By System', 'By Email' => 'By Email', 'By Call' => 'By Call'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-horizontal">

                <div class="form-group">
                    {{ Form::label('segment', 'Segment:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                    {{ Form::select('segment', ['Customer' => 'Customer', 'SBP' => 'SBP', 'Upstream' => 'Upstream'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('kategori', 'Kategori:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::select('kategori', ['Lambat' => 'Lambat', 'Link Down' => 'Link Down', 'Tidak Bisa Akses ke Situs Tertentu' => 'Tidak Bisa Akses ke Situs Tertentu'], null, ['class' => 'form-control']) }}

                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('problem', 'Problem:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::select('problem', ['Traffic Full' => 'Traffic Full', 'Perangkat Error' => 'Perangkat Error', 'Network Broadcast' => 'Network Broadcast', 'Salah Konfigurasi' => 'Salah Konfigurasi', 'Packet Loss' => 'Packet Loss', 'Bandwidth Tidak Sesuai' => 'Bandwidth Tidak Sesuai', 'Lantency Tinggi' => 'Lantency Tinggi', 'CPE Problem' => 'CPE Problem', 'CE Problem' => 'CE Problem', 'Human Error' => 'Human Error', 'Unknown' => 'Unknown', 'Kelistrikan' => 'Kelistrikan', 'Maintenance' => 'Maintenance', 'Lambat' => 'Lambat', 'Intermitent' => 'Intermitent', 'Device Problem' => 'Device Problem', 'Trunk Error' => 'Trunk Error', 'Konfigurasi Error' => 'Konfigurasi Error', 'Link Intermitent' => 'Link Intermitent', 'Perangkat Problem' => 'Perangkat Problem', 'Interferensi' => 'Interferensi', 'Fibercut' => 'Fibercut', 'Port Problem' => 'Port Problem', 'Signal Blocked' => 'Signal Blocked'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('sub_problem', 'Sub_problem:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::select('kategori', ['Dimatikan Customer' => 'Dimatikan Customer', 'Mati Listrik' => 'Mati Listrik', 'Short Circuit' => 'Short Circuit', 'Terjadwal' => 'Terjadwal', 'Tidak Terjadwal' => 'Tidak Terjadwal', 'Customer' => 'Customer', 'POP Vendor' => 'POP Vendor'], null, ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('rfo', 'Reason for Outage:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::textarea('rfo', null, ['class' => 'form-control', 'id' => 'rfo', 'rows' => '3']) }}
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('real_problem', 'Real_problem:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::textarea('real_problem', null, ['class' => 'form-control', 'rows' => '3', 'id' => 'real_problem']) }}
                    </div>
                </div>

                        </div>
        </div>
    </div>
</div>


<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-horizontal">


                <div class="form-group">
                    {{ Form::label('vendor', 'Vendor:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('vendor', null, ['class' => 'form-control', 'id' => 'vendor']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('status', 'Status:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('status', null, ['class' => 'form-control', 'id' => 'status']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('level', 'Level:', ['class' => 'col-sm-3']) }}
                    <div class="col-sm-9">
                        {{ Form::text('level', null, ['class' => 'form-control', 'id' => 'level']) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('keterangan', 'Keterangan:', ['class' => 'col-sm-3', 'rows' => '3']) }}
                    <div class="col-sm-9">
                        {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


                <div class="form-group">
                    <div align="center">
            			{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                        {{ link_to_route('problems.index', 'Cancel', null, array('class' => 'btn btn-default')) }}
                    </div>
                </div>

{{ Form::close() }}

@if ($errors->any())
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
@endif

@stop


@section('script-bawah')

<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/clockface/js/clockface.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('pages/scripts/components-pickers.js') }}"></script>


    <script type="text/javascript">

        $(document).ready(function(){

            $("#problem").select2();
            $("#sub_problem").select2();
            $("#kategori").select2();
            $("#customer_id").select2();

        });

        jQuery(document).ready(function() {       
           ComponentsPickers.init();
        });   

    </script>

@stop


