@extends('layouts.scaffold')

@section('style-atas')
<style>
	th { font-size: 12px; }
	td { font-size: 12px; }
	.btn-fab {
	margin: 0;
	padding: 5px;
	font-size: 10px;
	width: 20px;
	height: 20px;
	}
	.btn-fab, .btn-fab .ripple-wrapper {
	border-radius: 10%;
	}
</style>

@stop


@section('main')

<h1>Detail Backhaul</h1>

<p>{{ link_to_route('backhauls.index', 'Return to all backhauls') }}</p>

<table id="databackhaul" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nama Vendor</th>
			<th>Nama Backhaul</th>
			<th>CirID Backhaul</th>
			<th>Lokasi XConnect</th>
			<th>Switch Terkoneksi</th>
			<th>Port Terkoneksi</th>
			<th>Bandwidth</th>

			@if ( !Auth::user()->hasRole('noc') )
				<th>NRC</th>
				<th>MRC</th>
			@endif

			<th>Start Date</th>
			<th style="width: 10%">Action</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $backhaul->namavendor }}}</td>
			<td>{{{ $backhaul->nama }}}</td>
			<td>{{{ $backhaul->circuitidbackhaul }}}</td>
			<td>{{{ $backhaul->switches->lokasi }}}</td>
			<td>{{{ $backhaul->switchterkoneksi }}}</td>
			<td>{{{ $backhaul->portterkoneksi }}}</td>
			<td>{{{ $backhaul->bandwidth }}} {{{ $backhaul->satuan }}}</td>

			@if ( !Auth::user()->hasRole('noc') )
				<td>{{{ $backhaul->present()->nrc }}}</td>
				<td>{{{ $backhaul->present()->mrc }}}</td>
			@endif
			
			<td>{{{ $backhaul->present()->startDate }}}</td>
            
            <td width="60px" class="ac">
            <a href="{{ URL::route('backhauls.show', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
                <a href="{{ URL::route('backhauls.edit', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('backhauls.destroy', $backhaul->id), 'style'=>'display:inline-block')) }}
                    	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>
<h3 align="center" style="color: red;">{{ $pesanerror or "" }}</h3>

<h3 align="center">Daftar Circuits Customer yang Menggunakan Backhaul ini:</h3>

@if ($costumercircuits->count())
	<table id="costumercircuits" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Circuit ID</th>
				<th>Namasite</th>
				<th>Alamat</th>
				<th>Layanan</th>
				<th>BW</th>
				<th>Nama Customer</th>
				<th>Nama Vendor</th>

				@if ( !Auth::user()->hasRole('noc')  && !Auth::user()->hasRole('dco') && !Auth::user()->hasRole('ap') )
					<th>MRC Circuit</th>
				@endif

				{{-- <th>Nama Vendor</th> --}}

				@if ( !Auth::user()->hasRole('noc')  && !Auth::user()->hasRole('dco') && !Auth::user()->hasRole('ap') )
					<th>MRC Vendor</th> 
				@endif

				<th>Status</th>
				<th width="80px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($costumercircuits as $costumercircuit)
				<tr>
					<td>{{{ $costumercircuit->circuitid }}}</td>
					<td>{{{ $costumercircuit->namasite }}}</td>
					<td>{{{ $costumercircuit->alamat }}}</td>
					<td>{{{ $costumercircuit->layanan }}}</td>
					<td>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</td>
					<td>{{{ $costumercircuit->customers->nama }}}</td>
					<td>{{{ $costumercircuit->namavendor }}}</td>

					@if ( !Auth::user()->hasRole('noc')  && !Auth::user()->hasRole('dco') && !Auth::user()->hasRole('ap') )
						<td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
					@endif

					{{--  <td> $costumercircuit->namavendor </td> --}}

					@if ( !Auth::user()->hasRole('noc') && !Auth::user()->hasRole('dco') && !Auth::user()->hasRole('ap') )
						<td>{{{ $costumercircuit->present()->mrclastmile }}}</td> 
					@endif

					<td>
						@if ( $costumercircuit->status == 'Aktif' )
							<span class="label label-success">{{{ $costumercircuit->status }}}</span>
						@elseif ( $costumercircuit->status == 'Terminate' )
							<span class="label label-danger">{{{ $costumercircuit->status }}}</span>
						@elseif ( $costumercircuit->status == 'Suspend' )
							<span class="label label-warning">{{{ $costumercircuit->status }}}</span>
						@endif
					</td>
                    <td width="80px" class="ac">
                    <a href="{{ URL::route('costumercircuits.show', array($costumercircuit->id)) }}">
				            <button class="btn btn-xs btn-default btn-fab btn-raised glyphicon glyphicon-list" title="Detail Circuit Ini" ></button>
                    	</a>

                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

	                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}">
				            <button class="btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="Edit Circuit Ini"></button>
	                    </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
	                    		<button class="btn btn-xs btn-danger btn-fab btn-raised glyphicon glyphicon-trash" title="Delete Circuit Ini" data-confirm="Yakin mau dihapus?"></button>
	                    {{ Form::close() }}

	                @endif
	                
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data costumercircuits
@endif

@stop

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#costumercircuits').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop

