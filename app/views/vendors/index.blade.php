@extends('layouts.scaffold')

@section('main')

<h1>Daftar Data Vendors</h1>

<p>{{ link_to_route('vendors.create', 'Add new vendor') }}</p>

@if ($vendors->count())
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
			@foreach ($vendors as $vendor)
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
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data vendors
@endif

@stop
