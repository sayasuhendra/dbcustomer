@extends('layouts.scaffold')

@section('main')

<h3 align="center">Data Karyawan PT. SBP</h3>

@if(Auth::user()->hasRole('master'))
    <p>{{ link_to_route('users.create', 'Add User', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>
@endif
	<table id="profiles" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama User</th>
				<th>Bagian</th>
				<th>Roles / Peran di Aplikasi</th>
				<th width="200px">Tambah Role/Peran</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
					<tr>
						<td>{{{ ucwords($user->nama_lengkap) }}}</td>
						<td>{{{ $user->bagian }}}</td>

						@if($user->roles)

							<td>
								@foreach ($user->roles as $role)
									{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->username), 'style'=>'display:inline-block')) }}
									<input type="hidden" value="{{ $role->id }}" name="role">
									    	{{ Form::button(ucfirst($role->name) . '  <i class="fa fa-times"></i>', array('type' => 'submit', 'class' => 'btn btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
									{{ Form::close() }}
								@endforeach
							</td>

		                    <td class="ac" width="200px">

			                @if(Auth::user()->hasRole('master'))

			                {{ Form::open(array('method' => 'PUT', 'route' => array('users.update', $user->username), 'style'=>'display:inline-block')) }}
					            {{ Form::select('role', $perans, null, []) }}
		                    	{{ Form::button('<i class="glyphicon glyphicon-plus"></i>', array('type' => 'submit', 'class' => 'btn btn-primary btn-xs')) }}
			                {{ Form::close() }}

			                @endif
		                
						@endif

			            </td>
					</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#profiles').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
