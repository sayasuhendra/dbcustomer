@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h1>Daftar Data Biayalastmilevendors</h1>

<p>{{ link_to_route('biayalastmilevendors.create', 'Add new biayalastmilevendor') }}</p>

@if ($biayalastmilevendors->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nrc</th>
				<th>Mrc</th>
				<th>Circuitidlastmile</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($biayalastmilevendors as $biayalastmilevendor)
				<tr>
					<td>{{{ $biayalastmilevendor->nrc }}}</td>
					<td>{{{ $biayalastmilevendor->mrc }}}</td>
					<td>{{{ $biayalastmilevendor->circuitidlastmile }}}</td>
                    <td>{{ link_to_route('biayalastmilevendors.edit', 'Edit', array($biayalastmilevendor->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayalastmilevendors.destroy', $biayalastmilevendor->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data biayalastmilevendors
@endif

@stop
