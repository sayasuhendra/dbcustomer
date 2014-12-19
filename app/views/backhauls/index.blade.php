@extends('layouts.scaffold')

@section('main')

<h2 align="center">Daftar Data Backhauls</h2>

@if(Auth::user()->hasRole('admin'))

<p>{{ link_to_route('backhauls.create', 'Add Backhaul', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@endif

@if ($backhauls->count())
	<table id="tabelbackhaul" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama Vendor</th>
				<th>Nama Backhaul</th>
				<th>Lokasi XConnect</th>
				<th>Switch Terkoneksi</th>
				<th>Port Terkoneksi</th>
				<th>Bandwidth</th>

				@if ( !Auth::user()->hasRole('noc'))
					<th>NRC</th>
					<th>MRC</th>
				@endif

				<th>Start Date</th>
				<th width="60px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($backhauls as $backhaul)
				<tr>
					<td>{{{ $backhaul->namavendor }}}</td>
					<td>{{{ $backhaul->nama }}}</td>
					<td>{{{ $backhaul->switches->lokasi }}}</td>
					<td>{{{ $backhaul->switchterkoneksi }}}</td>
					<td>{{{ $backhaul->portterkoneksi }}}</td>
					<td>{{{ $backhaul->bandwidth }}} {{{ $backhaul->satuan }}}</td>

					@if ( !Auth::user()->hasRole('noc') )
						<td>{{{ $backhaul->present()->nrc }}}
						</td>
						<td>{{{ $backhaul->present()->mrc }}}</td>
					@endif


					<td>{{{ $backhaul->present()->startDate }}}</td>
                    
                    <td width="60px" class="ac">
                    <a href="{{ URL::route('backhauls.show', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

                    @if(Auth::user()->hasRole('admin'))

	                    <a href="{{ URL::route('backhauls.edit', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('backhauls.destroy', $backhaul->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}

	                @endif
	                
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data backhauls
@endif

@stop


@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#tabelbackhaul').DataTable( {
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
