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

<h3 align="center">Daftar Data Circuits Customer</h3>

@if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

<p>{{ link_to_route('costumercircuits.create', 'Add Circuit', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@endif

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

				@if ( Auth::user()->hasRole('admin') || Auth::user()->hasRole('ar') || Auth::user()->hasRole('sales') )
					<th>MRC Circuit</th>
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


					@if ( Auth::user()->hasRole('admin') || Auth::user()->hasRole('ar') || Auth::user()->hasRole('sales') )
						<td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
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
				            <button class="btn btn-xs btn-default glyphicon glyphicon-list" title="Detail Circuit Ini" ></button>
                    	</a>

                    @if(Auth::user()->hasRole('editor') )

	                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}">
				            <button class="btn btn-xs btn-info glyphicon glyphicon-pencil" title="Edit Circuit Ini"></button>
	                    </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
	                    		<button class="btn btn-xs btn-danger glyphicon glyphicon-trash" title="Delete Circuit Ini" data-confirm="Yakin mau dihapus?"></button>
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
