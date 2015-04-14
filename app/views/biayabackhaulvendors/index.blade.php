@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h1>Daftar Data Biayabackhaulvendors</h1>

<p>{{ link_to_route('biayabackhaulvendors.create', 'Add new biayabackhaulvendor') }}</p>

@if ($biayabackhaulvendors->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nrc</th>
				<th>Mrc</th>
				<th>Circuit ID Backhaul</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($biayabackhaulvendors as $biayabackhaulvendor)
				<tr>
					<td>{{{ $biayabackhaulvendor->nrc }}}</td>
					<td>{{{ $biayabackhaulvendor->mrc }}}</td>
					<td>{{{ $biayabackhaulvendor->circuitidbackhaul }}}</td>
                    <td>{{ link_to_route('biayabackhaulvendors.edit', 'Edit', array($biayabackhaulvendor->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayabackhaulvendors.destroy', $biayabackhaulvendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data biayabackhaulvendors
@endif

@stop
