@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Contactvendors</h1>

<p>{{ link_to_route('contactvendors.create', 'Add new contactvendor') }}</p>

@if ($contactvendors->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Bagian</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Vendor ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($contactvendors as $contactvendor)
				<tr>
					<td>{{{ $contactvendor->cp }}}</td>
					<td>{{{ $contactvendor->bagian }}}</td>
					<td>{{{ $contactvendor->telepon }}}</td>
					<td>{{{ $contactvendor->email }}}</td>
					<td>{{{ $contactvendor->vendor_id }}}</td>
                    <td>{{ link_to_route('contactvendors.edit', 'Edit', array($contactvendor->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('contactvendors.destroy', $contactvendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data contactvendors
@endif

@stop
