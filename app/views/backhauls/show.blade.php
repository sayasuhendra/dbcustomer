@extends('layouts.scaffold')

@section('main')

<h1>Show Backhaul</h1>

<p>{{ link_to_route('backhauls.index', 'Return to all backhauls') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Vendor ID</th>
				<th>Circuit ID Backhaul</th>
				<th>Lokasi XConnect</th>
				<th>Switch Terkoneksi</th>
				<th>Port Terkoneksi</th>
				<th>Bandwidth</th>
				<th>Backhaul Switch ID</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $backhaul->vendor_id }}}</td>
					<td>{{{ $backhaul->circuitidbackhaul }}}</td>
					<td>{{{ $backhaul->lokasixconnect }}}</td>
					<td>{{{ $backhaul->switchterkoneksi }}}</td>
					<td>{{{ $backhaul->portterkoneksi }}}</td>
					<td>{{{ $backhaul->bandwidth }}}</td>
					<td>{{{ $backhaul->backhaulswitch_id }}}</td>
                    <td>{{ link_to_route('backhauls.edit', 'Edit', array($backhaul->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('backhauls.destroy', $backhaul->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
