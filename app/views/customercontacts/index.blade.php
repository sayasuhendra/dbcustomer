@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Customercontacts</h1>

<p>{{ link_to_route('customercontacts.create', 'Add new customercontact') }}</p>

@if ($customercontacts->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Bagian</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($customercontacts as $customercontact)
				<tr>
					<td>{{{ $customercontact->cp }}}</td>
					<td>{{{ $customercontact->bagian }}}</td>
					<td>{{{ $customercontact->telepon }}}</td>
					<td>{{{ $customercontact->email }}}</td>
                    <td>{{ link_to_route('customercontacts.edit', 'Edit', array($customercontact->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $customercontact->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data customercontacts
@endif

@stop
