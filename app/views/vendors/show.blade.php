@extends('layouts.scaffold')

@section('main')

<h1>Show Vendor</h1>

<p>{{ link_to_route('vendors.index', 'Return to all vendors') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $vendor->nama }}}</td>
			<td>{{{ $vendor->alamat }}}</td>
            <td>{{ link_to_route('vendors.edit', 'Edit', array($vendor->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('vendors.destroy', $vendor->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
