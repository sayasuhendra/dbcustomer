@extends('layouts.scaffold')

@section('style-atas')

<style>
    a:hover {
     cursor:pointer;
    }

    th { font-size: 12px; }
    td { font-size: 12px; }

    .dl-horizontal dt {
    	width: 120px;
    }

    .dl-horizontal dd {
		margin-left: 135px;
	}

</style>

@stop

@section('main')

<h2 align="center">Detail Layanan SBP</h2>
<div class="row">
{{ link_to_route('layanansbps.index', 'Daftar Semua Layanan SBP', null, ['class' => 'btn btn-default pull-left']) }}
<a onclick="history.back(-1)" class="btn btn-default pull-right">Kembali ke Halaman Sebelumnya</a> 
<div class="clearfix"></div><br>
</div>
<div class="row">
	        <div class="col-md-4">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
		                <h3 class="panel-title pull-left">Data Layanan SBP</h3>
	                    <div class="btn-group pull-right">
	                        <a href="{{ URL::route('layanansbps.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>	
	                        <a href="{{ URL::route('layanansbps.edit', array($layanansbp->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>
	                        </a> 
	                    </div>
	                    <div class="clearfix"></div>
	              </div>

	              <div class="panel-body">
        					    <dl class="dl-horizontal">
            						<dt>Circuit ID</dt>
            						<dd>{{{ $layanansbp->circuitid }}}</dd>
            						<dt>Start Date</dt>
                        <dd>{{{ $layanansbp->present()->startDateShow }}}</dd>
            						<dt>Nama Site</dt>
            						<dd>{{{ $layanansbp->namasite }}}</dd>
            						<dt>Alamat Site</dt>
            						<dd>{{{ $layanansbp->alamat }}}</dd>
            						<dt>Layanan</dt>
            						<dd>{{{ $layanansbp->layanan }}}</dd>							
                        <dt>Area</dt>
                        <dd>{{{ $layanansbp->area }}}</dd>
                        <dt>Status</dt>
                        <dd>
                            @if ( $layanansbp->status == 'Aktif' )
                              <span class="label label-success">{{{ $layanansbp->status }}}</span>
                            @elseif ( $layanansbp->status == 'Terminate' )
                              <span class="label label-danger">{{{ $layanansbp->status }}}</span>
                            @elseif ( $layanansbp->status == 'Suspend' )
                              <span class="label label-warning">{{{ $layanansbp->status }}}</span>
                            @endif
                        </dd>
                        <dt>Keterangan</dt>
                        <dd>{{{ $layanansbp->keterangan }}}</dd>

                        @if ( !Auth::user()->hasRole('noc') )
                          <dt>NRC</dt>
                          <dd>{{{ $layanansbp->nrc }}} {{{ $layanansbp->currency }}}</dd>
                          <dt>MRC</dt>
                          <dd>{{{ $layanansbp->mrc }}} {{{ $layanansbp->currency }}}</dd>
                        @endif
                        
	                    </dl>
	              </div>
	            </div>
              
            </div>

	        <!-- Modal Create Contact -->

                {{ Form::model($layanansbp, array('method' => 'PUT', 'route' => array('layanansbptambahkontak', $layanansbp->id))) }} 
                    <div class="modal fade" id="TambahContactCircuit" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Buat Contact Baru</h4>
                          </div>        
                          <div class="modal-body">
                                                  <div class="form-group">
                                                      {{ Form::label('bagian', 'Bagian :') }}
                                                      {{ Form::text('bagian', null, ['class' => 'form-control']) }}
                                                  </div>

                                                  <div class="form-group">
                                                      {{ Form::label('cp', 'Nama :') }}
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
                                                      {{ Form::text('keterangan', null, ['class' => 'form-control']) }}
                                                  </div>
                                                        
                            {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                {{ Form::close() }}

<!-- Modal Create Contact End -->

	        <div class="col-md-4">

	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title pull-left">Daftar Contact Circuit Customer</h3>
	                <div class="btn-group pull-right">
	                	<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahContactCircuit"><i class="glyphicon glyphicon-plus"></i></button>	                    
	                </div>
	                <div class="clearfix"></div>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
							@foreach ($layanansbp->contacts as $contact)
								<dt>{{{ $contact->bagian }}}</dt>
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

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Perangkat</h3>
                </div>
                <div class="panel-body">
                  <dl class="dl-horizontal">
                    <dt>Nama Perangkat</dt>               
                      <dd>{{{ $layanansbp->namaperangkat }}}</dd>
                    <dt>Pemilik</dt>
                      <dd>{{{ $layanansbp->pemilik }}}</dd>
                    <dt>Tipe</dt>
                      <dd>{{{ $layanansbp->tipe }}}</dd>
                    <dt>Serial Number</dt>
                      <dd>{{{ $layanansbp->serialnumber }}}</dd>
                    <dt>Jenis</dt> 
                      <dd>{{{ $layanansbp->jenis }}}</dd>                 
                  </dl>
                </div>
              </div>
            </div>

            <div class="col-md-4">
	   
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Daftar Contact Customer </h3>
                  </div>
                  <div class="panel-body">
    				    <dl class="dl-horizontal">
    						@foreach ($customer->customercontacts as $contact)
    							<dt>{{{ $contact->bagian }}}</dt>
    							<dd><a id="contactButtonCustomer{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a></dd>
    						@endforeach
                        </dl>
                  </div>
                </div>

                <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Customer</h3>
                </div>
                <div class="panel-body">
                   <dl class="dl-horizontal">
                        <dt>Customer ID</dt>
                        <dd>{{{ $customer->customerid }}}</dd>
                        <dt>Nama</dt>
                        <dd>{{{ $customer->nama }}}</dd>                        
                        <dt>Alamat</dt>
                        <dd>{{{ $customer->alamat }}}</dd>
                        <dt>Level Customer</dt>
                        <dd>{{{ $customer->level }}}</dd>

                        @if ( !Auth::user()->hasRole('noc') )
                          <dt>NPWP</dt>
                          <dd>{{{ $customer->npwp }}}</dd>
                          <dt>Alamat NPWP</dt>
                          <dd>{{{ $customer->alamatnpwp }}}</dd>
                        @endif

                        <dt>Area</dt>
                        <dd>{{{ $customer->area }}}</dd>
                        <dt>Status</dt>
                        <dd>
                            @if ( $customer->status == 'Aktif' )
                              <span class="label label-success">{{{ $customer->status }}}</span>
                            @elseif ( $customer->status == 'Terminate' )
                              <span class="label label-danger">{{{ $customer->status }}}</span>
                            @elseif ( $customer->status == 'Suspend' )
                              <span class="label label-warning">{{{ $customer->status }}}</span>
                            @endif
                        </dd>
                        <dt>Register Date</dt>
                        <dd>{{{ $customer->present()->registerdate }}}
                        <dt>Keterangan</dt>
                        <dd>{{{ $customer->keterangan }}}</dd>
                    </dl>
                </div>
              </div>
           
                
          
	  
	            </div>
	        </div>


<script type="text/javascript">
	@foreach ($layanansbp->contacts as $contact)
	$('#contactButton{{{ $contact->id }}}').popover();
	@endforeach

	@foreach ($customer->customercontacts as $contactcustomer)
	$('#contactButtonCustomer{{{ $contactcustomer->id }}}').popover();
	@endforeach

	$(function(){
   $('[data-method]').append(function(){
        return "\n"+
        "<form action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
        "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
        "</form>\n"
   })
   .removeAttr('href')
   .attr('style','cursor:pointer;')
   .attr('onclick','$(this).find("form").submit();');
});
	
</script>

@stop
