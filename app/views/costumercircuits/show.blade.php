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

<h2 align="center">Detail Costumer Circuit</h2>

<p>{{ link_to_route('costumercircuits.index', 'Return to all costumercircuits') }}</p>

	        <div class="col-md-4">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
		                <h3 class="panel-title pull-left">Data Customer Circuit </h3>
	                    <div class="btn-group pull-right">
	                        <a href="{{ URL::route('costumercircuits.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>	
	                        <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>
	                        </a> 
	                    </div>
	                    <div class="clearfix"></div>
	              </div>

	              <div class="panel-body">
					    <dl class="dl-horizontal">
						<dt>Circuit ID</dt>
						<dd>{{{ $costumercircuit->circuitid }}}</dd>
						<dt>Start Date</dt>
                        <dd>{{{ $costumercircuit->present()->startDate }}}</dd>
						<dt>Nama Site</dt>
						<dd>{{{ $costumercircuit->namasite }}}</dd>
						<dt>Alamat Site</dt>
						<dd>{{{ $costumercircuit->alamat }}}</dd>
						<dt>Layanan</dt>
						<dd>{{{ $costumercircuit->layanan }}}</dd>
							@if( $costumercircuit->layanan === "ADSL" )
								<dt>Username</dt>
								<dd>{{{ $costumercircuit->adsls->username }}}</dd>
								<dt>Password</dt>
								<dd>{{{ $costumercircuit->adsls->password }}}</dd>
							@endif
                        <dt>Bandwidth</dt>
                        <dd>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</dd>
                        <dt>Area</dt>
                        <dd>{{{ $costumercircuit->area }}}</dd>
                        <dt>Status</dt>
                        <dd>{{{ $costumercircuit->status }}}</dd>
                        <dt>NRC</dt>
                        <dd>{{{ $costumercircuit->present()->nrcCircuit }}}</dd>
                        <dt>MRC</dt>
                        <dd>{{{ $costumercircuit->present()->mrcCircuit }}}</dd>

	                    </dl>
	              </div>
	            </div>

<!-- Modal Create Perangkat -->

                {{ Form::model($costumercircuit, array('method' => 'PUT', 'route' => array('circuittambahperangkat', $costumercircuit->id))) }} 
                    <div class="modal fade" id="TambahPerangkatCircuit" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Tambah Perangkat Baru</h4>
                          </div>        
                          <div class="modal-body">
                                                  
                                                  <div class="form-group">
                                                      {{ Form::label('namaperangkat', 'Nama Perangkat:') }}
                                                      {{ Form::text('namaperangkat', null, ['class' => 'form-control']) }}
                                                  </div>
                                                  <div class="form-group">
                                                      {{ Form::label('serialnumber', 'Serial Number:') }}
                                                      {{ Form::text('serialnumber', null, ['class' => 'form-control']) }}
                                                  </div>
                                                  <div class="form-group">
                                                      {{ Form::label('tipe', 'Tipe:') }}
                                                      {{ Form::text('tipe', null, ['class' => 'form-control']) }}
                                                  </div>
                                                  <div class="form-group">
                                                      {{ Form::label('jenis', 'Jenis:') }}
                                                      {{ Form::select('jenis', ['switch' => 'Switch', 'modem' => 'Modem', 'router' => 'Router', 'wireless' => 'Wireless'], null, ['class' => 'form-control']) }}
                                                  </div>
                                                  <div class="form-group">
                                                      {{ Form::label('pemilik', 'Pemilik:') }}
                                                      {{ Form::select('pemilik', ['SBP' => 'SBP', 'Customer' => 'Customer', 'Vendor' => 'Vendor'], null, ['class' => 'form-control']) }}
                                                  </div>
                                                  <div class="form-group">
                                                      <div align="center">
                                                          {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div>
                                                  </div> 
                                                        
                            </div>
                          </div>
                        </div>
                      </div>
                {{ Form::close() }}

<!-- Modal Create Perangkat End -->

	           
	            <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title pull-left">Daftar Perangkat di Site</h3>
                    <div class="btn-group pull-right">
	                	<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahPerangkatCircuit"><i class="glyphicon glyphicon-plus"></i></button>	                    
	                </div>
	                <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
    				    <dl class="dl-horizontal">
    						@foreach ($costumercircuit->perangkats as $perangkat)
    							<dt>{{{ $perangkat->namaperangkat }}} Milik {{{ $perangkat->pemilik }}} </dt>
    							<dd>Type: {{{ $perangkat->tipe }}}, Serial: {{{ $perangkat->serialnumber }}}, Jenis: {{{ $perangkat->jenis }}}
    							<a href="{{ URL::route('costumercircuitperangkats.edit', array($perangkat->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
    							
    							{{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuitperangkats.destroy', $perangkat->id), 'style'=>'display:inline-block')) }}
	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
			                    {{ Form::close() }}
			                    </dd>

    						@endforeach
                        </dl>
                  </div>
                </div>
	                        
                <div class="panel panel-success">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Customer {{{ $customer->nama }}}</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
						<dt>Customer ID</dt>
						<dd>{{{ $customer->customerid }}}</dd>
						<dt>Nama</dt>
						<dd>{{{ $customer->nama }}}</dd>
						<dt>Alamat</dt>
						<dd>{{{ $customer->alamat }}}</dd>
						<dt>Level</dt>
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

            <div class="col-md-4">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Lastmile Circuit Vendor</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
						    <dt>Circuit ID Vendor</dt>
						    <dd>{{{ $lastmile->circuitidlastmile }}}</dd>
							<dt>Start Date</dt>
							<dd>{{{ $lastmile->activated_at }}}</dd>
							<dt>VLAN ID</dt>
							<dd>{{{ $lastmile->vlanid }}}</dd>
							<dt>VLAN ID Name</dt>
							<dd>{{{ $lastmile->vlanname }}}</dd>
							<dt>IP Address PTP</dt>
							<dd>{{{ $lastmile->ipaddressptp }}}</dd>
							<dt>IP Public Cust</dt>
							<dd>{{{ $lastmile->blockippubliccustomer }}}</dd>
							<dt>Layanan</dt>
							<dd>{{{ $lastmile->layanan }}}</dd>
							<dt>Bandwidth</dt>
							<dd>{{{ $lastmile->bandwidth }}} {{{ $lastmile->satuan }}}</dd>
							<dt>Status</dt>
							<dd>{{{ $lastmile->status }}}</dd>
							<dt>Kawasan</dt>
							<dd>{{{ $lastmile->kawasan }}}</dd>	
							<dt>NRC</dt>
							<dd>{{{ $lastmile->biayas->nrc }}} {{{ $lastmile->biayas->currency }}}</dd>
							<dt>MRC</dt>
							<dd>{{{ $lastmile->biayas->mrc }}} {{{ $lastmile->biayas->currency }}}</dd>	
												
	                    </dl>
	              </div>
	            </div>

	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Vendor {{{ $vendor->nama }}}</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
							<dt>Nama</dt>
        					<dd>{{{ $vendor->nama }}}</dd>
        					<dt>Alamat</dt>
        					<dd>{{{ $vendor->alamat }}}</dd>
                            <dt>NPWP</dt>
                            <dd>{{{ $vendor->npwp }}}</dd>
                            <dt>Alamat NPWP</dt>
                            <dd>{{{ $vendor->alamatnpwp }}}</dd>
                            <dt>Keterangan</dt>
                            <dd>{{{ $vendor->keterangan }}}</dd>
	                    </dl>
	              </div>
	            </div>
	        </div>

	        <!-- Modal Create Contact -->

                {{ Form::model($costumercircuit, array('method' => 'PUT', 'route' => array('circuittambahkontak', $costumercircuit->id))) }} 
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
							@foreach ($costumercircuit->contacts as $contact)
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
	   
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Daftar Contact Customer </h3>
                  </div>
                  <div class="panel-body">
    				    <dl class="dl-horizontal">
    						@foreach ($customer->customercontacts as $contact)
    							<dt>Bagian {{{ $contact->bagian }}}</dt>
    							<dd><a id="contactButtonCustomer{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a></dd>
    						@endforeach
                        </dl>
                  </div>
                </div>
           
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">Daftar Contact Vendor </h3>
                  </div>
                  <div class="panel-body">
    				    <dl class="dl-horizontal">
    						@foreach ($vendor->contactvendors as $contact)
    							<dt>Bagian {{{ $contact->bagian }}}</dt>
    							<dd><a id="contactButtonVendor{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->kawasan }}} | {{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a></dd>
    						@endforeach
                        </dl>
                  </div>
                </div>
          
	            

	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Backhaul Circuit Vendor</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">

							<dt>Nama Vendor</dt>
					    	<dd>{{{ $backhaul->namavendor }}}</dd>
                <dt>Circuit ID</dt>
                <dd>{{{ $backhaul->circuitidbackhaul }}}</dd>
					    	<dt>Nama Backhaul</dt>
					    	<dd>{{{ $backhaul->nama }}}</dd>
					    	<dt>Lokasi XConnect</dt>
					    	<dd>{{{ $backhaul->switches->lokasi }}}</dd>
					    	<dt>Switch SBP</dt>
					    	<dd>{{{ $backhaul->switchterkoneksi }}}</dd>
					    	<dt>Port Terkoneksi</dt>
					    	<dd>{{{ $backhaul->portterkoneksi }}}</dd>
					    	<dt>Bandwidth</dt>
					    	<dd>{{{ $backhaul->bandwidth }}}</dd>					    	
					    	<dt>Start Date</dt>
					    	<dd>{{{ $backhaul->activated_at }}}</dd>
					    	<dt>NRC</dt>
							<dd>{{{ $backhaul->biayas->nrc }}} {{{ $backhaul->biayas->currency }}}</dd>
							<dt>MRC</dt>
							<dd>{{{ $backhaul->biayas->mrc }}} {{{ $backhaul->biayas->currency }}}</dd>
					    	
							
	                    </dl>
	              </div>
	            </div>
	        </div>


<script type="text/javascript">
	@foreach ($costumercircuit->contacts as $contact)
	$('#contactButton{{{ $contact->id }}}').popover();
	@endforeach

	@foreach ($customer->customercontacts as $contactcustomer)
	$('#contactButtonCustomer{{{ $contactcustomer->id }}}').popover();
	@endforeach

	@foreach ($vendor->contactvendors as $contactcustomer)
	$('#contactButtonVendor{{{ $contactcustomer->id }}}').popover();
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
