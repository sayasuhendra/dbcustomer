@extends('layouts.scaffold')

@section('style-atas')
<style>
th { font-size: 12px; }
td { font-size: 12px; }
</style>

@stop

@section('main')

<h2 align="center">Daftar Data Circuits Vendor</h2>

<p>{{ link_to_route('lastmiles.create', 'Add Circuit', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@if ($lastmiles->count())

	<table id="lastmiletable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Circuit ID Vendor</th>
				<th>Start Date</th>
				<th>VLAN ID</th>
				<th>VLAN ID Name</th>
				<th>IP Address PTP</th>
				<th>IP Public Cust</th>
				<th>Layanan</th>
				<th>Bandwidth</th>
				<th>Status</th>
				<th>Kawasan</th>
				<th>Nama Vendor</th>
				<th>Nama Backhaul</th>
				<th width="60px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($lastmiles as $lastmile)
				<tr>
					<td>{{{ $lastmile->circuitidlastmile }}}</td>
					<td>{{{ $lastmile->activated_at }}}</td>
					<td>{{{ $lastmile->vlanid }}}</td>
					<td>{{{ $lastmile->vlanname }}}</td>
					<td>{{{ $lastmile->ipaddressptp }}}</td>
					<td>{{{ $lastmile->blockippubliccustomer }}}</td>
					<td>{{{ $lastmile->layanan }}}</td>
					<td>{{{ $lastmile->bandwidth }}} {{{ $lastmile->satuan }}}</td>
					<td>{{{ $lastmile->status }}}</td>
					<td>{{{ $lastmile->kawasan }}}</td>
					<td>{{{ $lastmile->namavendor }}}</td>
					<td>{{{ $lastmile->namabackhaul }}}</td>
                   
                    <td class="ac">
                    <a href="{{ URL::route('lastmiles.show', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    <a href="{{ URL::route('lastmiles.edit', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('lastmiles.destroy', $lastmile->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data lastmiles
@endif

@stop

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#lastmiletable').DataTable( {
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
