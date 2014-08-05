@extends('layouts.scaffold')

@section('main')

<h1>Show Customer</h1>

<p>{{ link_to_route('customers.index', 'Return to all customers') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Customer ID</th>
			<th>Nama Customer</th>
			<th>Alamat</th>
			<th>Level</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $customer->customerid }}}</td>
					<td>{{{ $customer->nama }}}</td>
					<td>{{{ $customer->alamat }}}</td>
					<td>{{{ $customer->level }}}</td>
                    <td>{{ link_to_route('customers.edit', 'Edit', array($customer->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('customers.destroy', $customer->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
