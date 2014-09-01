@extends('layouts.scaffold')

@section('style-atas')
<style>
	th { font-size: 12px; }
	td { font-size: 12px; }
</style>

@stop

@section('main')

<h3 align="center">Daftar Data Circuits Customer</h3>
<p>{{ link_to_route('costumercircuits.create', 'Add Circuit', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>
@if ($costumercircuits->count())
	<table id="costumercircuits" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Circuit ID</th>
				<th>Namasite</th>
				<th>Alamat</th>
				<th>Layanan</th>
				<th>Bandwidth</th>
				<th>MRC Circuit</th>
				<th>Nama Backhaul</th>
				<th>Cir ID Vendor</th>
				{{-- <th>Nama Vendor</th> --}}
				<th>MRC Vendor</th> 
				<th>Area</th>
				<th>Status</th>
				<th>Start Date</th>
				<th width="60px">Action</th>
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
					<td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
					<td>{{{ $costumercircuit->namabackhaul }}}</td>
					<td>{{{ $costumercircuit->circuitidlastmile }}}</td>
					{{--  <td> $costumercircuit->namavendor </td> --}}
					<td>{{{ $costumercircuit->present()->mrclastmile }}}</td> 
					<td>{{{ $costumercircuit->area }}}</td>
					<td>
						@if ( $costumercircuit->status == 'Aktif' )
							<span class="label label-success">{{{ $costumercircuit->status }}}</span>
						@elseif ( $costumercircuit->status == 'Terminate' )
							<span class="label label-important">{{{ $costumercircuit->status }}}</span>
						@elseif ( $costumercircuit->status == 'Suspend' )
							<span class="label label-warning">{{{ $costumercircuit->status }}}</span>
						@endif
					</td>
                    <td>{{{ $costumercircuit->present()->startDate }}}</td>
                    <td width="60px" class="ac">
                    <a href="{{ URL::route('costumercircuits.show', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
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
