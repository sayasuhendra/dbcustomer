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

@section('main')

<h2 align="center">Detail Vendor</h2>

<p>{{ link_to_route('vendors.index', 'Return to all vendors') }}</p>

	        <div class="col-md-6">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title pull-left">Data Vendor {{{ $vendor->nama }}}</h3>

                    @if(Auth::user()->hasRole('admin'))

	                <div class="btn-group pull-right">
	                    <a href="{{ URL::route('vendors.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>	
	                    <a href="{{ URL::route('vendors.edit', array($vendor->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>
	                    </a> 
	                </div>

	                @endif

	                <div class="clearfix"></div>
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
{{ $vendor->keterangan = '' }}

                {{ Form::model($vendor, array('method' => 'PUT', 'route' => array('vendorstambahkontak', $vendor->id))) }} 
                    <div class="modal fade" id="TambahCustomerContact" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Buat Contact Baru</h4>
                          </div>        
                          <div class="modal-body">
                                      <div class="form-group">
                                          {{ Form::label('bagian', 'Bagian :') }}
                                          {{ Form::select('bagian', ['Account Manager' => 'Account Manager', 'Teknis' => 'Teknis', 'Billing' => 'Billing'], null, ['class' => 'form-control']) }}
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
                                          {{ Form::label('kawasan', 'Kawasan:') }}
                                          {{ Form::text('kawasan', null, ['class' => 'form-control']) }}
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


        <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title pull-left">Daftar Contact Vendor </h3>

                @if(Auth::user()->hasRole('admin'))

                <div class="btn-group pull-right">
                	<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahCustomerContact"><i class="glyphicon glyphicon-plus"></i></button>
                </div>

                @endif

                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
				    <dl class="dl-horizontal">
						@foreach ($vendor->contactvendors as $contact)
							<dt>{{{ $contact->bagian }}}</dt>
							<dd>
							
								<a id="contactButtonVendor{{{ $contact->id }}}" data-toggle="tooltip" data-html="true" data-placement="right" title="{{{ $contact->email }}}" data-content="{{{ $contact->jabatan }}}<br>{{{ $contact->kawasan }}}<br>{{{ $contact->keterangan }}}"> {{{ $contact->cp }}} / {{{ $contact->telepon }}} </a>

				                @if(Auth::user()->hasRole('admin'))

			                    <a href="{{ URL::route('contactvendors.edit', array($contact->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
			                    {{ Form::open(array('method' => 'DELETE', 'route' => array('contactvendors.destroy', $contact->id), 'style'=>'display:inline-block')) }}
		                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
				                    {{ Form::close() }}

				                @endif

							</dd>
						@endforeach
                    </dl>
              </div>
            </div>
        </div>



<div class="col-md-12">
        
	    <div class="panel panel-success">
	      <div class="panel-heading">
	      <h3 class="panel-title pull-left">Data Backhaul</h3>

          @if(Auth::user()->hasRole('admin'))

	      <div class="btn-group pull-right">
	          <a href="{{ URL::route('backhauls.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
	      </div>

	      @endif

	      <div class="clearfix"></div>
	      </div>


	    @if ($vendor->backhauls->count())
	    	<table id="tabelbackhaul" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Nama Vendor</th>
	    				<th>Circuit ID Backhaul</th>
	    				<th>Nama Backhaul</th>
	    				<th>Lokasi XConnect</th>
	    				<th>Switch Terkoneksi</th>
	    				<th>Port Terkoneksi</th>
	    				<th>Bandwidth</th>
	    				<th>NRC</th>
	    				<th>MRC</th>
	    				<th>Start Date</th>
	    				<th width="100px">Action</th>
	    			</tr>
	    		</thead>

	    		<tbody>
	    			@foreach ($vendor->backhauls as $backhaul)
	    				<tr>
	    					<td>{{{ $backhaul->namavendor }}}</td>
	    					<td>{{{ $backhaul->circuitidbackhaul }}}</td>
	    					<td>{{{ $backhaul->nama }}}</td>
	    					<td>{{{ $backhaul->switches->lokasi }}}</td>
	    					<td>{{{ $backhaul->switchterkoneksi }}}</td>
	    					<td>{{{ $backhaul->portterkoneksi }}}</td>
	    					<td>{{{ $backhaul->bandwidth }}} {{{ $backhaul->satuan }}}</td>
	    					<td>{{{ $backhaul->biayas->nrc }}} {{{ $backhaul->biayas->currency }}}</td>
	    					<td>{{{ $backhaul->biayas->mrc }}} {{{ $backhaul->biayas->currency }}}</td>
	    					<td>{{{ $backhaul->activated_at }}}</td>
	                        
	                        <td width="60px" class="ac">
	                        <a href="{{ URL::route('backhauls.show', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

	                        @if(Auth::user()->hasRole('admin'))

	    	                    <a href="{{ URL::route('backhauls.edit', array($backhaul->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	    	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('backhauls.destroy', $backhaul->id), 'style'=>'display:inline-block')) }}
	    	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	    	                    {{ Form::close() }}

	    	                @endif

	    		            </td>
	    				</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    @else
	    	Belum ada data backhauls
	    @endif

	    </div>





	    <div class="panel panel-info">
		   <div class="panel-heading">
			   <h3 class="panel-title pull-left">Data Layanan Lain</h3>

			   @if(Auth::user()->hasRole('admin'))

			   <div class="btn-group pull-right">
			       <a href="{{ URL::route('layanans.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
			   </div>

			   @endif

			   <div class="clearfix"></div>
		   </div>
	    @if ($vendor->layanans->count())
	    	<table id="tabellayanan" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Nama Vendor</th>
	    				<th>Nama Layanan</th>
	    				<th>Start Date</th>
	    				<th>Keterangan</th>
	    				<th>NRC</th>
	    				<th>MRC</th>

	    				<th>Status</th>
	    				
	    				<th width="100px">Action</th>
	    			</tr>
	    		</thead>

	    		<tbody>
	    			@foreach ($vendor->layanans as $layanan)
	    				<tr>
	    					<td>{{{ $layanan->namavendor }}}</td>
	    					<td>{{{ $layanan->nama }}}</td>
	    					<td>{{{ $layanan->activated_at }}}</td>
	    					
	    					<td>{{{ $layanan->keterangan }}}</td>
	    					<td>{{{ $layanan->nrc  }}} 
	    					{{{ $layanan->currency }}}
	    					</td>
	    					<td>{{{ $layanan->mrc  }}} 
	    					{{{ $layanan->currency }}}</td>
	    					<td>
	    						@if ( $layanan->status == 'Aktif' )
	    							<span class="label label-success">{{{ $layanan->status }}}</span>
	    						@elseif ( $layanan->status == 'Terminate' )
	    							<span class="label label-danger">{{{ $layanan->status }}}</span>
	    						@elseif ( $layanan->status == 'Suspend' )
	    							<span class="label label-warning">{{{ $layanan->status }}}</span>
	    						@endif
	    					</td>
	    					
	                        
	                        <td width="60px" class="ac">
	                        <a href="{{ URL::route('layanans.show', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

	                        @if(Auth::user()->hasRole('admin'))

	    	                <a href="{{ URL::route('layanans.edit', array($layanan->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	    	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('layanans.destroy', $layanan->id), 'style'=>'display:inline-block')) }}
	    	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	    	                    {{ Form::close() }}

	    	                @endif

	    		            </td>
	    				</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    @else
	    	Belum ada data layanans
	    @endif

	    </div>
	

	    <div class="panel panel-warning">
		   <div class="panel-heading">
			   <h3 class="panel-title pull-left">Data Circuit Vendor Lastmile</h3>

			   @if(Auth::user()->hasRole('admin'))

			   <div class="btn-group pull-right">
			       <a href="{{ URL::route('lastmiles.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
			   </div>

			   @endif

			   <div class="clearfix"></div>
		   </div>


	    @if ($vendor->lastmiles->count())

	    	<table id="lastmiletable" class="table table-striped table-bordered">
	    		<thead>
	    			<tr>
	    				<th>Circuit ID Vendor</th>
	    				<th>Start Date</th>
	    				<th>VLAN ID</th>
	    				<th>VLAN ID Name</th>
	    				<th>IP Address PTP</th>
	    				<th>IP Public Cust</th>
	    				<th>Layanan</th>
	    				<th>Bandwidth</th>
	    				<th>Status</th>
	    				<th>Kawasan</th>
	    				<th>Nama Vendor</th>
	    				<th>Cir ID Backhaul</th>
	    				<th width="100px">Action</th>
	    			</tr>
	    		</thead>

	    		<tbody>
	    			@foreach ($vendor->lastmiles as $lastmile)
	    				<tr>
	    					<td>{{{ $lastmile->circuitidlastmile }}}</td>
	    					<td>{{{ $lastmile->activated_at }}}</td>
	    					<td>{{{ $lastmile->vlanid }}}</td>
	    					<td>{{{ $lastmile->vlanname }}}</td>
	    					<td>{{{ $lastmile->ipaddressptp }}}</td>
	    					<td>{{{ $lastmile->blockippubliccustomer }}}</td>
	    					<td>{{{ $lastmile->layanan }}}</td>
	    					<td>{{{ $lastmile->bandwidth }}} {{{ $lastmile->satuan }}}</td>
	    					<td>
	    						@if ( $lastmile->status == 'Aktif' )
	    							<span class="label label-success">{{{ $lastmile->status }}}</span>
	    						@elseif ( $lastmile->status == 'Terminate' )
	    							<span class="label label-important">{{{ $lastmile->status }}}</span>
	    						@elseif ( $lastmile->status == 'Suspend' )
	    							<span class="label label-warning">{{{ $lastmile->status }}}</span>
	    						@endif
	    					</td>
	    					<td>{{{ $lastmile->kawasan }}}</td>
	    					<td>{{{ $lastmile->namavendor }}}</td>
	    					<td>{{{ $lastmile->namabackhaul }}}</td>
	                       
	                        <td class="ac">
	                        <a href="{{ URL::route('lastmiles.show', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

	                        @if(Auth::user()->hasRole('admin'))

	    	                    <a href="{{ URL::route('lastmiles.edit', array($lastmile->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
	    	                    {{ Form::open(array('method' => 'DELETE', 'route' => array('lastmiles.destroy', $lastmile->id), 'style'=>'display:inline-block')) }}
	    	                        	{{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
	    	                    {{ Form::close() }}
	    	                    
	    	                @endif

	    		            </td>
	    				</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    @else
	    	Belum ada data lastmiles
	    @endif
	    </div>
	    </div>

        <script type="text/javascript">
        	
        	@foreach ($vendor->contactvendors as $contactcustomer)
        	$('#contactButtonVendor{{{ $contactcustomer->id }}}').popover();
        	@endforeach        	
        	
        </script>

@stop
