@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('style-atas')
	<style type="text/css">
		body {
		  background-color: #fff;
		}
	</style>
@stop

@section('main')

<h2 align="center">Daftar Data Problems</h2>

    {{ link_to_route('problems.create', 'Add problems', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}
    {{ link_to_route('problems.index', 'Tickets Close', [], ['class' => 'btn btn-default', 'type' => 'button']) }}
    {{ link_to_route('problemsopen', 'Tickets Open', [], ['class' => 'btn btn-default', 'type' => 'button']) }}
    <p></p>

@if ($problems->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No Tiket</th>
				<th>Nama CSC</th>
				<th>Area</th>
				<th>Nama Site</th>
				<th>Start</th>
				<th>Finish</th>
				<th>Waktu</th>
				<th>Channel</th>
				<th>Segment</th>
				<th>Kategori</th>
				<th>Problem</th>
				<th>Sub Problem</th>
				<th>Vendor</th>
				<th>Level</th>
				<th>Customer</th>
				<th>Rfo</th>
				<th>Real Problem</th>
				<th>Status</th>
				<th>Keterangan</th>
				<th>Action</th>
				<th>Option</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($problems as $problem)
				<tr>
					<td>{{{ $problem->tt }}}</td>
					<td>{{{ ucwords($problem->csc) }}}</td>
					<td>{{{ $problem->area }}}</td>
					<td>{{{ $problem->circuit }}}</td>
					<td>{{{ $problem->start }}}</td>
					<td>{{{ $problem->finish }}}</td>
					<td>{{{ $problem->waktu }}}</td>
					<td>{{{ $problem->channel }}}</td>
					<td>{{{ $problem->segment }}}</td>
					<td>{{{ $problem->kategori }}}</td>
					<td>{{{ $problem->problem }}}</td>
					<td>{{{ $problem->sub_problem }}}</td>
					<td>{{{ $problem->vendor }}}</td>
					<td>{{{ $problem->level }}}</td>
					<td>{{{ $problem->customer }}}</td>
					<td>{{{ $problem->rfo }}}</td>
					<td>{{{ $problem->real_problem }}}</td>
					<td>{{{ $problem->status }}}</td>
					<td>{{{ $problem->keterangan }}}</td>
					<td>{{{ $problem->action }}}</td>
                    <td class="ac"  width="100px">
                    <a href="{{ URL::route('problems.show', array($problem->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>
                            <a href="{{ URL::route('problems.edit', array($problem->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('problems.destroy', $problem->id), 'style'=>'display:inline-block')) }}
                                    {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data problems
@endif

@stop

@include('pages/dtablesbawah')

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
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop