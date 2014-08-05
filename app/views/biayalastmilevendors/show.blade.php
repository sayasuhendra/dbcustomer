@extends('layouts.scaffold')

@section('main')

<h1>Show Biayalastmilevendor</h1>

<p>{{ link_to_route('biayalastmilevendors.index', 'Return to all biayalastmilevendors') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nrc</th>
				<th>Mrc</th>
				<th>Circuitidlastmile</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $biayalastmilevendor->nrc }}}</td>
					<td>{{{ $biayalastmilevendor->mrc }}}</td>
					<td>{{{ $biayalastmilevendor->circuitidlastmile }}}</td>
                    <td>{{ link_to_route('biayalastmilevendors.edit', 'Edit', array($biayalastmilevendor->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayalastmilevendors.destroy', $biayalastmilevendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
