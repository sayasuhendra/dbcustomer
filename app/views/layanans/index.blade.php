@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h2 align="center">Daftar Data Layanan Lain</h2>

<p>{{ link_to_route('layanans.create', 'Add Layanan', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@if ($layanans->count())
	<table id="tabellayanan" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama Vendor</th>
				<th>Nama Layanan</th>
				<th>Start Date</th>
				<th>Keterangan</th>

				@if ( !Auth::user()->hasRole('noc') )
					<th>NRC</th>
					<th>MRC</th>
				@endif

				<th>Status</th>
				
				<th width="60px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($layanans as $layanan)
				<tr>
					<td>{{{ $layanan->namavendor }}}</td>
					<td>{{{ $layanan->nama }}}</td>
					<td>{{{ $layanan->activated_at }}}</td>
					
					<td>{{{ $layanan->keterangan }}}</td>

					@if ( !Auth::user()->hasRole('noc') )
						<td>{{{ $layanan->nrc  }}} 
						{{{ $layanan->currency }}}
						</td>
						<td>{{{ $layanan->mrc  }}} 
						{{{ $layanan->currency }}}</td>
					@endif
					
					<td>
						@if ( $layanan->status == 'Aktif' )
							<span class="label label-success">{{{ $layanan->status }}}</span>
						@elseif ( $layanan->status == 'Terminate' )
							<span class="label label-danger">{{{ $layanan->status }}}</span>
						@elseif ( $layanan->status == 'Suspend' )
							<span class="label label-warning">{{{ $layanan->status }}}</span>
						@endif
					</td>
					
                    
                    <td width="60px" class="ac">
                    <a href="{{ URL::route('layanans.show', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    <a href="{{ URL::route('layanans.edit', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('layanans.destroy', $layanan->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data layanans
@endif

@stop

@include('pages/dtablesbawah')

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#tabellayanan').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
