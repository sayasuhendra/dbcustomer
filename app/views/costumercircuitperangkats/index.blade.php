@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Costumercircuitperangkats</h1>

<p>{{ link_to_route('costumercircuitperangkats.create', 'Add new costumercircuitperangkat') }}</p>

@if ($costumercircuitperangkats->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Namaperangkat</th>
				<th>Serialnumber</th>
				<th>Tipe</th>
				<th>Jenis</th>
				<th>Customer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($costumercircuitperangkats as $costumercircuitperangkat)
				<tr>
					<td>{{{ $costumercircuitperangkat->namaperangkat }}}</td>
					<td>{{{ $costumercircuitperangkat->serialnumber }}}</td>
					<td>{{{ $costumercircuitperangkat->tipe }}}</td>
					<td>{{{ $costumercircuitperangkat->jenis }}}</td>
					<td>{{{ $costumercircuitperangkat->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('costumercircuitperangkats.edit', 'Edit', array($costumercircuitperangkat->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuitperangkats.destroy', $costumercircuitperangkat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data costumercircuitperangkats
@endif

@stop
