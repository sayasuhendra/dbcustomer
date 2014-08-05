@extends('layouts.scaffold')

@section('main')

<h1>Show Costumercircuit</h1>

<p>{{ link_to_route('costumercircuits.index', 'Return to all costumercircuits') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Circuitid</th>
				<th>Namasite</th>
				<th>Alamat</th>
				<th>Layanan</th>
				<th>Bandwidth</th>
				<th>Circuit ID Backhaul</th>
				<th>Circuitidlastmile</th>
				<th>Area</th>
				<th>Status</th>
				<th>Customer ID</th>
				<th>Backhaul ID</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $costumercircuit->circuitid }}}</td>
					<td>{{{ $costumercircuit->namasite }}}</td>
					<td>{{{ $costumercircuit->alamat }}}</td>
					<td>{{{ $costumercircuit->layanan }}}</td>
					<td>{{{ $costumercircuit->bandwidth }}}</td>
					<td>{{{ $costumercircuit->circuitidbackhaul }}}</td>
					<td>{{{ $costumercircuit->circuitidlastmile }}}</td>
					<td>{{{ $costumercircuit->area }}}</td>
					<td>{{{ $costumercircuit->status }}}</td>
					<td>{{{ $costumercircuit->customer_id }}}</td>
					<td>{{{ $costumercircuit->backhaul_id }}}</td>
                    <td>{{ link_to_route('costumercircuits.edit', 'Edit', array($costumercircuit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
