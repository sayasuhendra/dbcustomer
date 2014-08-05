@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Backhaulswitches</h1>

<p>{{ link_to_route('backhaulswitches.create', 'Add new backhaulswitch') }}</p>

@if ($backhaulswitches->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th> Jenis</th>
				<th>Jumlahportfo</th>
				<th>Jumlahportrj</th>
				<th>Area</th>
				<th>Lokasi</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($backhaulswitches as $backhaulswitch)
				<tr>
					<td>{{{ $backhaulswitch->nama }}}</td>
					<td>{{{ $backhaulswitch-> jenis }}}</td>
					<td>{{{ $backhaulswitch->jumlahportfo }}}</td>
					<td>{{{ $backhaulswitch->jumlahportrj }}}</td>
					<td>{{{ $backhaulswitch->area }}}</td>
					<td>{{{ $backhaulswitch->lokasi }}}</td>
                    <td>{{ link_to_route('backhaulswitches.edit', 'Edit', array($backhaulswitch->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('backhaulswitches.destroy', $backhaulswitch->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data backhaulswitches
@endif

@stop
