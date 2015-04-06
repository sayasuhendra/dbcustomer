@extends('layouts/scaffold')

@section('main')

<div class="col-md-4 col-md-offset-4">

@if($user->roles)

<h1> Daftar Role/Peran <br>{{ ucwords($user->nama_lengkap) }} </h1>
	<ul>
		@foreach ($user->roles as $role)
			<li><h3>

			{{{ ucfirst($role->name) }}} 

			{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->username), 'style'=>'display:inline-block')) }}
            {{ Form::select('monitoring', ['Office Hour' => 'Office Hour', '24/7 Support' => '24/7 Support'], null, []) }}
			<input type="hidden" value="{{ $role->id }}" name="role">
			    	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
			{{ Form::close() }}

			</h3></li>
		@endforeach
	</ul>

@endif

</div>

@stop