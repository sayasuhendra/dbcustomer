@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('style-atas')
<style>
	th { font-size: 12px; }
	td { font-size: 12px; }
	.btn-fab {
	margin: 0;
	padding: 5px;
	font-size: 10px;
	width: 20px;
	height: 20px;
	}
	.btn-fab, .btn-fab .ripple-wrapper {
	border-radius: 10%;
	}
</style>

@stop

@section('main')

<h3 align="center">Data Karyawan PT. SBP</h3>
	<table id="profiles" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Nama Lengkap</th>
				<th>Ext</th>
				<th>HP</th>
				<th>WA</th>
				<th>BBM</th>
				<th>Email Kantor</th>
				<th>YM</th>
				<th>Level</th>
				<th>Bagian</th>
				<th>Area</th>
				<th width="100px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				@if($user->profile)
					<tr>
						<td>{{{ ucwords($user->nama_lengkap) }}}</td>
						<td>{{{ $user->profile->extention }}}</td>
						<td>{{{ $user->profile->hp }}}</td>
						<td>{{{ $user->profile->wa }}}</td>
						<td>{{{ $user->profile->bbm }}}</td>
						<td><a href="mailto:{{{ $user->email }}}" target="_top">{{{ $user->email }}}</a></td>
						<td><a href="ymsgr:sendIM?{{{ $user->profile->ym }}}" target="_top">{{{ $user->profile->ym }}}</a></td>
						<td> {{{ $user->level }}} </td>
						<td> {{{ $user->bagian }}} </td>
						<td> {{{ $user->area }}} </td>
	                    <td class="ac" width="100px">
	                    <a href="{{ URL::route('profile', array($user->username)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>

		                @if(Auth::user()->hasRole('master'))

		                    <a href="{{ URL::route('user.profile.edit', array($user->username)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
		                    {{ Form::open(array('method' => 'DELETE', 'route' => array('user.profile.destroy', $user->username), 'style'=>'display:inline-block')) }}
		                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
		                    {{ Form::close() }}

		                @endif
		                
			            </td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
@stop

@include('pages/dtablesbawah')

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
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
