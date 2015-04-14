@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h2 align="center">Daftar Data Problems</h2>

@if(Auth::user()->hasRole('csc'))
    <p>{{ link_to_route('problems.create', 'Add problems', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>
@endif

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
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($problems as $problem)
				<tr>
					<td>{{{ $problem->tt }}}</td>
					<td>{{{ $problem->csc }}}</td>
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
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop