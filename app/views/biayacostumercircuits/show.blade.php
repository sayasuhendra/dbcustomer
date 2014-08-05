@extends('layouts.scaffold')

@section('main')

<h1>Show Biayacostumercircuit</h1>

<p>{{ link_to_route('biayacostumercircuits.index', 'Return to all biayacostumercircuits') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nrc</th>
				<th>Mrc</th>
				<th>Biaya</th>
				<th>Customer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $biayacostumercircuit->nrc }}}</td>
					<td>{{{ $biayacostumercircuit->mrc }}}</td>
					<td>{{{ $biayacostumercircuit->biaya }}}</td>
					<td>{{{ $biayacostumercircuit->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('biayacostumercircuits.edit', 'Edit', array($biayacostumercircuit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayacostumercircuits.destroy', $biayacostumercircuit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
