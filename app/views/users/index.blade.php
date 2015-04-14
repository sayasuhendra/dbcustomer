@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('style-atas')
	<style type="text/css">
	.btn-group {
	  white-space: nowrap;
	  .btn {
	    float: none;
	    display: inline-block;
	  }
	}
	</style>
	{{-- <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/> --}}
@stop

@section('main')

<h3 align="center">Data Karyawan PT. SBP</h3>

    <p>{{ link_to_route('users.create', 'Add User', null , ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>
	<table id="profiles" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Status</th>
				<th>Nama User</th>
				<th>Bagian</th>
				<th>Roles / Peran di Aplikasi</th>
				<th width="200px">Tambah Role/Peran</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
					<tr>
						<td>
							@if ($user->active == 1)

							{{ Form::open(array('method' => 'PUT', 'route' => array('users.active', $user->username), 'style'=>'display:inline-block')) }}
								<input type="hidden" value="0" name="active">
				                <button class="btn btn-xs btn-primary active" disabled>ON</button>
				                <button type="submit" class="btn btn-xs btn-default">OFF</button>
			                {{ Form::close() }}

							@elseif ($user->active == 0)

							{{ Form::open(array('method' => 'PUT', 'route' => array('users.active', $user->username), 'style'=>'display:inline-block')) }}
								<input type="hidden" value="1" name="active">
				                <button type="submit" class="btn btn-xs btn-default">ON</button>
				                <button class="btn btn-xs btn-primary active" disabled>OFF</button>
			                {{ Form::close() }}

							@endif
						{{-- <input type="checkbox" name="status" class="make-switch" data-size="small" id="status" {{ ($user->active == 1) ? "checked" : ""; }} > --}}
						</td>
						<td>{{{ ucwords($user->nama_lengkap) }}}</td>
						<td>{{{ ucwords($user->bagian) }}}</td>

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

@include('pages/dtablesbawah')

@section('script-bawah')

{{-- <script src="{{asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script> --}}

<script type="text/javascript" language="javascript" class="init">

        // $('#status').on('switch-change', function () {
        //     $('#status').bootstrapSwitch('toggleRadioState');
        //     $.post(5t4rtd, data, success)
        // });

    $(document).ready(function() {
    	$('#profiles').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
