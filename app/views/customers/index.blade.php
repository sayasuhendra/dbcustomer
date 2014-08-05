@extends('layouts.scaffold')

@section('main')

<h1 align="center">Daftar Data Customers</h1>

<p>{{ link_to_route('customers.create', 'Add new customer') }}</p>

@if ($customers->count())
	<table id="datasbp" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Cust ID</th>
				<th>Nama Customer</th>
				<th>Alamat</th>
				<th>Level</th>
				<th width="150px">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($customers as $customer)
				<tr>
					<td>{{{ $customer->customerid }}}</td>
					<td>{{{ $customer->nama }}}</td>
					<td>{{{ $customer->alamat }}}</td>
					<td>{{{ $customer->level }}}</td>
					
                    <td class="ac">
                    <a href="{{ URL::route('customers.show', array($customer->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn')) }} </a>
	                    <a href="{{ URL::route('customers.edit', array($customer->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn')) }} </a>
	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('customers.destroy', $customer->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger')) }}
	                    {{ Form::close() }}
		            </td>
				</tr>
	
			@endforeach

		</tbody>
	</table>


	<!-- Modal -->
	{{ Form::model($customer, array('method' => 'PUT', 'route' => array('customerstambahkontak', $customer->id))) }} 
		<div class="modal fade" id="sbpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Buat Contact Baru</h4>
		      </div>	    
		      <div class="modal-body">
				{{{ $customer->id }}}
				        <div class="form-group">
				            {{ Form::label('cp', 'Nama:') }}
				            {{ Form::text('cp', null, ['class' => 'form-control']) }}
				        </div>
				        <div class="form-group">
				            {{ Form::label('bagian', 'Bagian:') }}
				            {{ Form::select('bagian', ['Teknis' => 'Teknis', 'Billing' => 'Billing'], null, ['class' => 'form-control']) }}
				        </div>
				        <div class="form-group">
				            {{ Form::label('telepon', 'Telepon:') }}
				            {{ Form::text('telepon', null, ['class' => 'form-control']) }}
				        </div>
				        <div class="form-group">
				            {{ Form::label('email', 'Email:') }}
				            {{ Form::text('email', null, ['class' => 'form-control']) }}
				        </div>
							

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
		      </div>
		    </div>
		  </div>
		</div>
	{{ Form::close() }}

@else
	Belum ada data customers
@endif

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#datasbp').DataTable( {
    		"columnDefs": [
    		    { "width": "20%", "targets": 9 }
    		  ]
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3 ]
        	                },
        	                "print"

        	            ]
        	        }
        } );
    } );
</script>

@stop
