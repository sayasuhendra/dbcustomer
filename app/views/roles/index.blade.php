@extends('layouts.scaffold')

@section('main')



<div class="col-md-4 col-md-offset-4">
<h1>Daftar Role/Peran</h1>
<p>{{ link_to_route('roles.create', 'Tambah Role/Peran baru') }}</p>
@if ($roles->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($roles as $role)
				<tr>
					<td>{{{ $role->name }}}</td>
{{--                     <td>{{ link_to_route('roles.edit', 'Edit', array($role->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('roles.destroy', $role->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td> --}}
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	Belum ada data roles
@endif
</div>
@stop
