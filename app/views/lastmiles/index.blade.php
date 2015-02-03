@extends('layouts.scaffold')

@section('style-atas')

<style>
th { font-size: 12px; }
td { font-size: 12px; }
</style>

@stop

@section('main')

<h2 align="center">Daftar Data Circuits Vendor</h2>

@if(Auth::user()->hasRole('admin'))

<p>{{ link_to_route('lastmiles.create', 'Add Circuit', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@endif

@if ($lastmiles->count())

	<table id="lastmiletable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CID Vendor</th>

				@if ( !Auth::user()->hasRole('ap') && !Auth::user()->hasRole('sales') )
					<th>IP Address PTP</th>
				@endif

				<th>Layanan</th>
				<th>B/W</th>
				<th>Kawasan</th>
				<th>Nama Vendor</th>
				<th>Nama Customer</th>

				@if ( !Auth::user()->hasRole('noc') && !Auth::user()->hasRole('sales') )
					<th>NRC</th>
					<th>MRC</th>
				@endif

				<th>Status</th>

				<th width="60px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($lastmiles as $lastmile)
				<tr>
					<td>{{{ $lastmile->circuitidlastmile }}}</td>
					
					@if ( !Auth::user()->hasRole('ap') && !Auth::user()->hasRole('sales') )
						<td>{{{ $lastmile->ipaddressptp }}}</td>
					@endif

					<td>{{{ $lastmile->layanan }}}</td>
					<td>{{{ $lastmile->bandwidth }}} {{{ $lastmile->satuan }}}</td>
					
					<td>{{{ $lastmile->kawasan }}}</td>
					<td>{{{ $lastmile->namavendor }}}</td>
					<td></td>

					@if ( !Auth::user()->hasRole('noc') && !Auth::user()->hasRole('sales') )
						<td>{{{ $lastmile->present()->nrc }}}</td>
						<td>{{{ $lastmile->present()->mrc }}}</td>
					@endif

					<td>
						@if ( $lastmile->status == 'Aktif' )
							<span class="label label-success">{{{ $lastmile->status }}}</span>
						@elseif ( $lastmile->status == 'Terminate' )
							<span class="label label-danger">{{{ $lastmile->status }}}</span>
						@elseif ( $lastmile->status == 'Suspend' )
							<span class="label label-warning">{{{ $lastmile->status }}}</span>
						@endif
					</td>
                   
                    <td class="ac">
                    <a href="{{ URL::route('lastmiles.show', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

                    @if(Auth::user()->hasRole('admin'))

	                    <a href="{{ URL::route('lastmiles.edit', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('lastmiles.destroy', $lastmile->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}

	                @endif
	                
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
