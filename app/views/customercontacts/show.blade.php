@extends('layouts.scaffold')

@section('main')

<h1>Show Customercontact</h1>

<p>{{ link_to_route('customercontacts.index', 'Return to all customercontacts') }}</p>

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
	</tbody>
</table>

@stop
