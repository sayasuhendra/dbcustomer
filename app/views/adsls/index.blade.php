@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h1>Daftar Data ADSL</h1>

<p>{{ link_to_route('adsls.create', 'Buat Data ADSL Baru') }}</p>

@if ($adsls->count())

	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>Costumer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($adsls as $adsl)
				<tr>
					<td>{{{ $adsl->username }}}</td>
					<td>{{{ $adsl->password }}}</td>
					<td>{{{ $adsl->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('adsls.edit', 'Edit', array($adsl->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('adsls.destroy', $adsl->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data ADSL
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
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>
