@extends('layouts.scaffold')

<style>
    a:hover {
     cursor:pointer;
    }

    th { font-size: 12px; }
    td { font-size: 12px; }

</style>

@section('main')

<h2 align="center">Detail Lastmile</h2>

<p>{{ link_to_route('lastmiles.index', 'Return to all lastmiles') }}</p>

<div class="col-md-6">
	            <div class="panel panel-primary">
	              <div class="panel-heading">
	                <h3 class="panel-title">Data Lastmile Circuit Vendor</h3>
	              </div>
	              <div class="panel-body">
					    <dl class="dl-horizontal">
						    <dt>Circuit ID Vendor</dt>
						    <dd>{{{ $lastmile->circuitidlastmile }}}</dd>

						    @if ( !Auth::user()->hasRole('ap') && !Auth::user()->hasRole('sales') )
								<dt>VLAN ID</dt>
								<dd>{{{ $lastmile->vlanid }}}</dd>
								<dt>VLAN ID Name</dt>
								<dd>{{{ $lastmile->vlanname }}}</dd>
								<dt>IP Address PTP</dt>
								<dd>{{{ $lastmile->ipaddressptp }}}</dd>
								<dt>IP Public Cust</dt>
								<dd>{{{ $lastmile->blockippubliccustomer }}}</dd>
						    @endif
						    
							<dt>Layanan</dt>
							<dd>{{{ $lastmile->layanan }}}</dd>
							<dt>Bandwidth</dt>
							<dd>{{{ $lastmile->bandwidth }}} {{{ $lastmile->satuan }}}</dd>
							<dt>Kawasan</dt>
							<dd>{{{ $lastmile->kawasan }}}</dd>	
							<dt>Keterangan</dt>
							<dd>{{{ $lastmile->keterangan }}}</dd>

							@if ( !Auth::user()->hasRole('noc') && !Auth::user()->hasRole('sales') )
								<dt>NRC</dt>
								<dd>{{{ $lastmile->present()->nrc }}}</dd>
								<dt>MRC</dt>
								<dd>{{{ $lastmile->present()->mrc }}}</dd>
							@endif

							<dt>Start Date</dt>
							<dd>{{{ $lastmile->present()->startDateShow }}}</dd>
							<dt>Account Manager</dt>
						    <dd>{{{ $lastmile->am }}}</dd>
						    <dt>Status</dt>
							<dd>{{{ $lastmile->status }}}</dd>
							
	                    </dl>
	              </div>
	            </div>
	        </div>

	        <div class="col-md-6">
	            <div class="panel panel-success">
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


        <div class="col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Daftar Contact Vendor </h3>
              </div>
              <div class="panel-body">
				    <dl class="dl-horizontal">
						@foreach ($vendor->contactvendors as $contact)
							<dt>{{{ $contact->bagian }}}</dt>
							<dd><a id="contactButtonVendor{{{ $contact->id }}}" data-html="true" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}}" data-content="{{{ $contact->kawasan }}} <br> {{{ $contact->keterangan }}} "> {{{ $contact->cp }}} / {{{ $contact->jabatan }}} / {{{ $contact->telepon }}}</a></dd>
						@endforeach
                    </dl>
              </div>
            </div>
        </div>

@stop

@section('script-bawah')

        <script type="text/javascript">
        	
        	@foreach ($vendor->contactvendors as $contactcustomer)
        	$('#contactButtonVendor{{{ $contactcustomer->id }}}').popover();
        	@endforeach        	
        	
        </script>

@stop
