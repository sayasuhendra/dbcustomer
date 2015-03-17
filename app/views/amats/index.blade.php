@extends('layouts.scaffold')

@section('main')

<h2 align="center">Daftar Data Amats</h2>

@if(Auth::user()->hasRole('admin'))
    <p>{{ link_to_route('amats.create', 'Add amats', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>
@endif

@if ($amats->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Contoh</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($amats as $amat)
				<tr>
					<td>{{{ $amat->contoh }}}</td>
                    <td class="ac"  width="100px">
                    <a href="{{ URL::route('amats.show', array($amat->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>
                            <a href="{{ URL::route('amats.edit', array($amat->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('amats.destroy', $amat->id), 'style'=>'display:inline-block')) }}
                                    {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data amats
@endif

@stop

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#datasbp').DataTable( {
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