@extends('layouts.scaffold')

@include('pages/dtablesatas')

@section('main')

<h2 align="center">Daftar Data Customers</h2>

@if(Auth::user()->hasRole(['editcustomer', 'bod']))

	<p>{{ link_to_route('customers.create', 'Add Customer', [], ['class' => 'btn btn-primary', 'type' => 'button']) }}</p>

@endif

@if ($customers->count())
	<table id="customertable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Cust ID</th>
				<th>Nama Customer</th>
				<th>Alamat</th>
				<th>Level</th>
				<th>Area</th>
				<th>Status</th>
				<th width="100px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($customers as $customer)
				<tr>
					<td>{{{ $customer->customerid }}}</td>
					
					<td>{{{ $customer->nama }}}</td>
					
					<td>{{{ $customer->alamat }}}</td>
					<td>{{{ $customer->level }}}</td>
					<td>{{{ $customer->area }}}</td>
					<td>
						@if ( $customer->status == 'Aktif' )
							<span class="label label-success">{{{ $customer->status }}}</span>
						@elseif ( $customer->status == 'Terminate' )
							<span class="label label-danger">{{{ $customer->status }}}</span>
						@elseif ( $customer->status == 'Suspend' )
							<span class="label label-warning">{{{ $customer->status }}}</span>
						@endif
					</td>
					
                    <td class="ac" width="100px">
                    <a href="{{ URL::route('customers.show', array($customer->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-sm')) }} </a>

					@if(Auth::user()->hasRole(['editcustomer', 'bod']))
					
	                    <a href="{{ URL::route('customers.edit', array($customer->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-sm')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('customers.destroy', $customer->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'data-confirm' => 'Yakin mau dihapus?')) }}
	                    {{ Form::close() }}

	                @endif

		            </td>
				</tr>
	
			@endforeach

		</tbody>
	</table>




@else
	Belum ada data customers
@endif

@stop

@include('pages/dtablesbawah')

@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#customertable').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
