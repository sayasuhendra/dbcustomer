@extends('layouts.scaffold')

@section('main')

<h1>Show Lastmile</h1>

<p>{{ link_to_route('lastmiles.index', 'Return to all lastmiles') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Circuitidlastmile</th>
				<th>Vlanid</th>
				<th>Vlanname</th>
				<th>IP Address PTP</th>
				<th>Block IP Public Customer</th>
				<th>Backhaul ID</th>
				<th>Customer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $lastmile->circuitidlastmile }}}</td>
					<td>{{{ $lastmile->vlanid }}}</td>
					<td>{{{ $lastmile->vlanname }}}</td>
					<td>{{{ $lastmile->ipaddressptp }}}</td>
					<td>{{{ $lastmile->blockippubliccustomer }}}</td>
					<td>{{{ $lastmile->backhaul_id }}}</td>
					<td>{{{ $lastmile->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('lastmiles.edit', 'Edit', array($lastmile->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('lastmiles.destroy', $lastmile->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
