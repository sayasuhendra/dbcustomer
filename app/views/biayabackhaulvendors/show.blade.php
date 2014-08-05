@extends('layouts.scaffold')

@section('main')

<h1>Show Biayabackhaulvendor</h1>

<p>{{ link_to_route('biayabackhaulvendors.index', 'Return to all biayabackhaulvendors') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nrc</th>
				<th>Mrc</th>
				<th>Circuit ID Backhaul</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $biayabackhaulvendor->nrc }}}</td>
					<td>{{{ $biayabackhaulvendor->mrc }}}</td>
					<td>{{{ $biayabackhaulvendor->circuitidbackhaul }}}</td>
                    <td>{{ link_to_route('biayabackhaulvendors.edit', 'Edit', array($biayabackhaulvendor->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayabackhaulvendors.destroy', $biayabackhaulvendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
