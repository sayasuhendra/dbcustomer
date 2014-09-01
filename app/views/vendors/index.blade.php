@extends('layouts.scaffold')

@section('main')

<h2 align="center">Daftar Data Vendors</h2>

<p>{{ link_to_route('vendors.create', 'Add Vendor', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@if ($vendors->count())
	<table id="vendortable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Alamat</th>				
                <th>NPWP</th>
                <th>Alamat NPWP</th>
                <th>Keterangan</th>
                <th width="100px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($vendors as $vendor)
				<tr>
					<td>{{{ $vendor->nama }}}</td>
					<td>{{{ $vendor->alamat }}}</td>
                    <td>{{{ $vendor->npwp }}}</td>
                    <td>{{{ $vendor->alamatnpwp }}}</td>
                    <td>{{{ $vendor->keterangan }}}</td>
                    <td class="ac">
                    <a href="{{ URL::route('vendors.show', array($vendor->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>
	                    <a href="{{ URL::route('vendors.edit', array($vendor->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('vendors.destroy', $vendor->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data vendors
@endif

@stop

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#vendortable').DataTable( {
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
