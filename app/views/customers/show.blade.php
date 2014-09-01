@extends('layouts.scaffold')

@section('style-atas')

<style>
    a:hover {
     cursor:pointer;
    }

    th { font-size: 12px; }
    td { font-size: 12px; }

</style>

@stop

@section('script-atas')


@stop

@section('main')

<h1 align="center">Data Customer Detail</h1>

<p>{{ link_to_route('customers.index', 'Kembali Ke Daftar Customer') }}</p>

	        <div class="col-md-7">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title pull-left">Data Customer {{{ $customer->nama }}}</h3>
                    <div class="btn-group pull-right">

                        <a href="{{ URL::route('customers.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>    
                        <a href="{{ URL::route('customers.edit', array($customer->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>
                        </a> 
                    </div>
                    <div class="clearfix"></div>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
						<dt>Customer ID</dt>
						<dd>{{{ $customer->customerid }}}</dd>
						<dt>Nama Perusahaan</dt>
						<dd>{{{ $customer->nama }}}</dd>
                        <dt>Register Date</dt>
                        <dd>{{{ $customer->present()->registerdate }}}
						<dt>Alamat Perusahaan</dt>
						<dd>{{{ $customer->alamat }}}</dd>
						<dt>Level Customer</dt>
						<dd>{{{ $customer->level }}}</dd>
                        <dt>NPWP</dt>
                        <dd>{{{ $customer->npwp }}}</dd>
                        <dt>Alamat NPWP</dt>
                        <dd>{{{ $customer->alamatnpwp }}}</dd>
                        <dt>Keterangan</dt>
                        <dd>{{{ $customer->keterangan }}}</dd>
	                    </dl>
	              </div>
	            </div>
	        </div>

{{---------------- Kontak ------------------------------------------------}}

<!-- Modal Create COntact -->
{{ $customer->keterangan = '' }}

                {{ Form::model($customer, array('method' => 'PUT', 'route' => array('customerstambahkontak', $customer->id))) }} 
                    <div class="modal fade" id="TambahCustomerContact" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Buat Contact Baru</h4>
                          </div>        
                          <div class="modal-body">
                                      <div class="form-group">
                                          {{ Form::label('bagian', 'Bagian:') }}
                                          {{ Form::text('bagian', null, ['class' => 'form-control']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('cp', 'Nama:') }}
                                          {{ Form::text('cp', null, ['class' => 'form-control']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('jabatan', 'Level Jabatan:') }}
                                          {{ Form::text('jabatan', null, ['class' => 'form-control']) }}
                                      </div>                                      
                                      <div class="form-group">
                                          {{ Form::label('telepon', 'Telepon:') }}
                                          {{ Form::text('telepon', null, ['class' => 'form-control']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('email', 'Email:') }}
                                          {{ Form::text('email', null, ['class' => 'form-control']) }}
                                      </div>
                                      <div class="form-group">
                                          {{ Form::label('keterangan', 'Keterangan:') }}
                                          {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) }}
                                      </div>
                                                        
                            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                {{ Form::close() }}

<!-- Modal Create Contact End -->



            <div class="col-md-5">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title pull-left">Daftar Contact Customer {{{ $customer->nama }}}</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahCustomerContact"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="clearfix"></div>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
							@foreach ($contacts as $contact)
								<dt>Bagian {{{ $contact->bagian }}}</dt>
								<dd>
                                    <a id="contactButton{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a>
                                    <a href="{{ URL::route('customercontacts.edit', array($contact->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $contact->id), 'style'=>'display:inline-block')) }}
                                    {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                                    {{ Form::close() }}


                                </dd>
							@endforeach
	                    </dl>
	              </div>
	            </div>
	        </div>

            
{{---------------- Kontak  End------------------------------------------------}}

    

	        
	        	<table id="datasbp" class="table table-striped table-bordered">
	        		<thead>
	        			<tr>
	        				<th>Circuit ID</th>
                            <th>Namasite</th>
                            <th>Alamat</th>
                            <th>Layanan</th>
                            <th>BW</th>
                            <th>MRC Circuit</th>
                            <th>Nama Backhaul</th>
                            <th>Cir ID Vendor</th>
                            <th>Nama Vendor</th>
                            <th>MRC Vendor</th>
                            <th>Untung</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th width="60px">Action</th>
	        			</tr>
	        		</thead>


            		<tbody>
			            @foreach ($costumercircuits as $costumercircuit)
                            <tr>
                                <td>{{{ $costumercircuit->circuitid }}}</td>
                                <td>{{{ $costumercircuit->namasite }}}</td>
                                <td>{{{ $costumercircuit->alamat }}}</td>
                                <td>{{{ $costumercircuit->layanan }}}</td>
                                <td>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</td>
                                <td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
                                <td>{{{ $costumercircuit->namabackhaul }}}</td>
                                <td>{{{ $costumercircuit->circuitidlastmile }}}</td>
                                <td> {{{ $costumercircuit->namavendor }}} </td>
                                <td> {{{ $costumercircuit->present()->mrclastmile }}} </td>
                                <td> {{{ $costumercircuit->present()->untung }}} </td>
                                <td>
                                    @if ( $costumercircuit->status == 'Aktif' )
                                        <span class="label label-success">{{{ $costumercircuit->status }}}</span>
                                    @elseif ( $costumercircuit->status == 'Terminate' )
                                        <span class="label label-important">{{{ $costumercircuit->status }}}</span>
                                    @elseif ( $costumercircuit->status == 'Suspend' )
                                        <span class="label label-warning">{{{ $costumercircuit->status }}}</span>
                                    @endif
                                </td>
                                <td>{{{ $costumercircuit->present()->startDate }}}</td>
                                <td width="60px" class="ac">
                                <a href="{{ URL::route('costumercircuits.show', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>
                                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach                            
            		</tbody>
                    
            		 
            	</table>
          
    <div id="piechart" style="width: 900px; height: 500px;"></div>

@stop


@section('script-bawah')

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
    	$('#datasbp').DataTable( {
        	"dom": 'T<"clear">lfrtip',
        	"oTableTools": {
        	            "aButtons": [
        	                {
        	                    "sExtends": "pdf",
        	                    "sPdfOrientation": "landscape",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "xls",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "csv",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                {
        	                    "sExtends": "copy",
                                "mColumns": [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
        	                },
        	                "print"

        	            ]
        	        },            
        } );
    } );
</script>

<script type="text/javascript">
	@foreach ($contacts as $contact)
	$('#contactButton{{{ $contact->id }}}').popover();
	@endforeach
	$('#myButton').popover();
    
</script>

    

@stop
