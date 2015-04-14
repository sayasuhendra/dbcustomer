@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h2 align="center">Daftar Data Perangkat SBP</h2>

<p>{{ link_to_route('backhaulswitches.create', 'Add Switch', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@if ($backhaulswitches->count())
	<table id="tabelswitch" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Jenis</th>
				<th>Jumlah Port FO</th>
				<th>Jumlah Port RJ</th>
				<th>Area</th>
				<th>Lokasi</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($backhaulswitches as $backhaulswitch)
				<tr>
					<td>{{{ $backhaulswitch->nama }}}</td>
					<td>{{{ $backhaulswitch->jenis }}}</td>
					<td>{{{ $backhaulswitch->jumlahportfo }}}</td>
					<td>{{{ $backhaulswitch->jumlahportrj }}}</td>
					<td>{{{ $backhaulswitch->area }}}</td>
					<td>{{{ $backhaulswitch->lokasi }}}</td>
                    <td class="ac">
                    <a href="{{ URL::route('backhaulswitches.show', array($backhaulswitch->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>
	                    <a href="{{ URL::route('backhaulswitches.edit', array($backhaulswitch->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('backhaulswitches.destroy', $backhaulswitch->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data backhaulswitches
@endif

@stop

@include('pages/dtablesbawah')

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#tabelswitch').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
