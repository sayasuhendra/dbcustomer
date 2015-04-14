@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h1>Daftar Data Biayacostumercircuits</h1>

<p>{{ link_to_route('biayacostumercircuits.create', 'Add new biayacostumercircuit') }}</p>

@if ($biayacostumercircuits->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nrc</th>
				<th>Mrc</th>
				<th>Biaya</th>
				<th>Customer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($biayacostumercircuits as $biayacostumercircuit)
				<tr>
					<td>{{{ $biayacostumercircuit->nrc }}}</td>
					<td>{{{ $biayacostumercircuit->mrc }}}</td>
					<td>{{{ $biayacostumercircuit->biaya }}}</td>
					<td>{{{ $biayacostumercircuit->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('biayacostumercircuits.edit', 'Edit', array($biayacostumercircuit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('biayacostumercircuits.destroy', $biayacostumercircuit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data biayacostumercircuits
@endif

@stop
