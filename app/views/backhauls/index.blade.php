@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Backhauls</h1>

<p>{{ link_to_route('backhauls.create', 'Add new backhaul') }}</p>

@if ($backhauls->count())
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
			@foreach ($backhauls as $backhaul)
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
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data backhauls
@endif

@stop
