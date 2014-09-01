@extends('layouts.scaffold')

@section('main')

<h1>Detail ADSL</h1>

<p>{{ link_to_route('adsls.index', 'Return to all adsls') }}</p>

<table id="datasbp" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Username</th>
				<th>Password</th>
				<th>Customer Circuit ID</th>
				<th>Edit</th>
				<th>Delete</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $adsl->username }}}</td>
					<td>{{{ $adsl->password }}}</td>
					<td>{{{ $adsl->costumercircuit_id }}}</td>
                    <td>{{ link_to_route('adsls.edit', 'Edit', array($adsl->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('adsls.destroy', $adsl->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
