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
  .panel-body {
    padding: 15px 15px 0px 15px;
  }
  
  .modal-wide .modal-dialog {
    width: 28%; /* or whatever you wish */
  }

</style>

@stop

@section('main')

<h2 align="center">Detail Costumer Circuit</h2>

<div class="row">
  {{ link_to_route('costumercircuits.index', 'Daftar Semua Customer Circuit', null, ['class' => 'btn btn-info']) }}
  <input type="button" value="Kembali ke Halaman Sebelumnya" onclick="history.back(-1)" class="btn btn-info pull-right"/>
  <div class="clearfix"></div><br>
</div>
<div class="row">
          <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Customer Circuit 

                    @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                        <a href="{{ URL::route('costumercircuits.create') }}" class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru"></a>  
                        <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}" class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a> 

                    @endif

                    </h3>
                </div>

                <div class="panel-body">
              <dl class="dl-horizontal">
                        <dt>Circuit ID</dt>
                        <dd>{{{ $costumercircuit->circuitid }}}</dd>
                        <dt>Start Date</dt>
                                    <dd>{{{ $costumercircuit->present()->startDateShow }}}</dd>
                        <dt>Nama Site</dt>
                        <dd>{{{ $costumercircuit->namasite }}}</dd>
                        <dt>Alamat Site</dt>
                        <dd>{{{ $costumercircuit->alamat }}}</dd>
                        <dt>Layanan</dt>
                        <dd>{{{ $costumercircuit->layanan }}}</dd>              
                        <dt>Bandwidth</dt>
                        <dd>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</dd>
                        <dt>Area</dt>
                        <dd>{{{ $costumercircuit->area }}}</dd>
                        <dt>Status</dt>
                        <dd>
                            @if ( $costumercircuit->status == 'Aktif' )
                              <span class="label label-success">{{{ $costumercircuit->status }}}</span>
                            @elseif ( $costumercircuit->status == 'Terminate' )
                              <span class="label label-danger">{{{ $costumercircuit->status }}}</span>
                            @elseif ( $costumercircuit->status == 'Suspend' )
                              <span class="label label-warning">{{{ $costumercircuit->status }}}</span>
                            @endif
                        </dd>
                        <dt>Keterangan</dt>
                        <dd>{{{ $costumercircuit->keteranganck }}}</dd>

                        @if ( !Auth::user()->hasRole('noc') && !Auth::user()->hasRole('dco') && !Auth::user()->hasRole('ap'))
                          <dt>NRC</dt>
                          <dd>{{{ $costumercircuit->present()->nrcCircuit }}}</dd>
                          <dt>MRC</dt>
                          <dd>{{{ $costumercircuit->present()->mrcCircuit }}}</dd>
                        @endif

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


            @if ( !Auth::user()->hasRole('ar') && !Auth::user()->hasRole('sales') )
              <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Daftar Perangkat di Site

                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                      <button class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru" data-toggle="modal" data-target="#TambahPerangkatCircuit"></button>

                    @endif

                    </h3>
                  </div>
                  <div class="panel-body">
                <dl class="dl-horizontal">
                @foreach ($costumercircuit->perangkats as $perangkat)
                  <dt>{{{ $perangkat->namaperangkat }}} Milik {{{ $perangkat->pemilik }}} </dt>
                  <dd>Type: {{{ $perangkat->tipe }}}, Serial: {{{ $perangkat->serialnumber }}}, Jenis: {{{ $perangkat->jenis }}}

                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                  <a href="{{ URL::route('costumercircuitperangkats.edit', array($perangkat->id)) }}" class="btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>
                  
                  {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuitperangkats.destroy', $perangkat->id), 'style'=>'display:inline-block')) }}
                            <button class="btn btn-xs btn-danger btn-fab btn-raised glyphicon glyphicon-trash" data-confirm="Yakin mau dihapus?" title="delete"></button>
                  {{ Form::close() }}

                  @endif

                  </dd>

                @endforeach
                        </dl>
                  </div>
                </div>
            @endif
                          
                
              
            </div>

            <div class="col-md-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Lastmile Circuit Vendor

                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                    <a href="{{ URL::route('lastmiles.create') }}" class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru"></a>  
                    <a href="{{ URL::route('lastmiles.edit', array($lastmile->id)) }}" class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>

                  @endif

                    <a href="{{ URL::route('lastmiles.show', array($lastmile->id)) }}" class="pull-right btn btn-xs btn-primary btn-fab btn-raised glyphicon glyphicon-search" title="detail"></a>
                  
                  </h3>
                </div>
                <div class="panel-body">
                  <dl class="dl-horizontal">
                    <dt>Circuit ID Vendor</dt>
                    <dd>{{{ $lastmile->circuitidlastmile }}}</dd>
                    <dt>Start Date</dt>
                    <dd>{{{ $lastmile->present()->startdateshow }}}</dd>
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
                    <dd>
                        @if ( $lastmile->status == 'Aktif' )
                          <span class="label label-success">{{{ $lastmile->status }}}</span>
                        @elseif ( $lastmile->status == 'Terminate' )
                          <span class="label label-danger">{{{ $lastmile->status }}}</span>
                        @elseif ( $lastmile->status == 'Suspend' )
                          <span class="label label-warning">{{{ $lastmile->status }}}</span>
                        @endif
                    </dd>
                    <dt>Kawasan</dt>
                    <dd>{{{ $lastmile->kawasan }}}</dd> 

                    @if ( !Auth::user()->hasRole('noc') )
                      <dt>NRC</dt>
                      <dd>{{{ $lastmile->present()->nrc }}}</dd>
                      <dt>MRC</dt>
                      <dd>{{{ $lastmile->present()->mrc }}}</dd>
                    @endif

                  </dl>
                </div>
              </div>

              @if( $costumercircuit->layanan === "ADSL" )

              <!-- Modal Edit ADSL -->

              {{ Form::model($costumercircuit->adsls, array('method' => 'PATCH', 'route' => array('adsls.update', $costumercircuit->adsls->id), 'data-remote', 'data-remote-success-message' => 'ADSL sudah di edit')) }}
                <div class="modal fade modal-wide" id="EditADSL" tabindex="-2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Perangkat Baru</h4>
                      </div>        
                            <div class="modal-body">
                            <div class="form-horizontal">
                              <div class="form-group">
                                  {{ Form::label('username', 'Username :', ['class' => 'col-sm-5']) }}
                                  <div class="col-sm-7">
                                  {{ Form::text('username', null, ['class' => 'form-control']) }}
                                  </div>
                              </div>

                              <div class="form-group">
                                  {{ Form::label('password', 'Password :', ['class' => 'col-sm-5']) }}
                                  <div class="col-sm-7">
                                  {{ Form::text('password', null, ['class' => 'form-control']) }}
                                  </div>
                              </div>

                              <div class="form-group">
                                  {{ Form::label('nomer', 'Nomer ADSL :', ['class' => 'col-sm-5']) }}
                                  <div class="col-sm-7">
                                  {{ Form::text('nomer', null, ['class' => 'form-control']) }}
                                  </div>
                              </div>

                              <div class="form-group">
                                  {{ Form::label('tumpangan', 'Nomer Tumpangan :', ['class' => 'col-sm-5']) }}
                                  <div class="col-sm-7">
                                  {{ Form::text('tumpangan', null, ['class' => 'form-control']) }}
                                  </div>
                              </div>
                            </div>
                            <div class="form-group">
                                <div align="center">
                                    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div> 
                                                    
                        </div>
                      </div>
                    </div>
                  </div>
              {{ Form::close() }}

              <!-- Modal Edit ADSL End -->

                            
                              <div class="panel panel-primary">
                                <div class="panel-heading">
                                  <h3 class="panel-title">Data ADSL

                                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                                  {{ Form::open(array('data-remote', 'method' => 'DELETE', 'route' => array('adsls.destroy', $costumercircuit->adsls->id)))}}
                                    <button class="pull-right btn btn-xs btn-danger btn-fab btn-raised glyphicon glyphicon-trash" data-confirm="Yakin mau dihapus?" title="delete"></button>
                                  {{ Form::close() }}
                                    <button class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit" data-toggle="modal" data-target="#EditADSL"></button>

                                  @endif

                                  </h3>
                                </div>
                                <div class="panel-body">
                                  <dl class="dl-horizontal">
                                  <dt>Username</dt>
                                  <dd>{{{ $costumercircuit->adsls->username or "kosong" }}}</dd>
                                  <dt>Password</dt>
                                  <dd>{{{ $costumercircuit->adsls->password or "kosong" }}}</dd>
                                  <dt>Nomer ADSL</dt>
                                  <dd>{{{ $costumercircuit->adsls->nomer or "kosong" }}}</dd>
                                  <dt>No. Tumpangan</dt>
                                  <dd>{{{ $costumercircuit->adsls->tumpangan or "kosong" }}}</dd>
                                  </dl>
                                </div>
                              </div>
                            @endif

              
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
                  <h3 class="panel-title">Daftar Contact Circuit Customer

                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                    <button class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru" data-toggle="modal" data-target="#TambahContactCircuit"></button>

                  @endif

                  </h3>
                </div>
                <div class="panel-body">
              <dl class="dl-horizontal">
              @foreach ($costumercircuit->contacts as $contact)
                <dt>{{{ $contact->bagian }}}</dt>
                <dd>
                  <a id="contactButton{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a>

                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                    <a href="{{ URL::route('customercontacts.edit', array($contact->id)) }}" class="btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $contact->id), 'style'=>'display:inline-block')) }}
                              <button class="btn btn-xs btn-danger btn-fab btn-raised glyphicon glyphicon-trash" data-confirm="Yakin mau dihapus?" title="delete"></button>
                    {{ Form::close() }}

                  @endif

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
                  <dt>{{{ $contact->bagian }}}</dt>
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
                  <dt>{{{ $contact->bagian }}}</dt>
                  <dd><a id="contactButtonVendor{{{ $contact->id }}}" data-toggle="tooltip" data-placement="left" title="{{{ $contact->email }}} | {{{ $contact->telepon }}}" data-content="{{{ $contact->kawasan }}} | {{{ $contact->keterangan }}} "> {{{ $contact->cp }}} | {{{ $contact->jabatan }}} </a></dd>
                @endforeach
                        </dl>
                  </div>
                </div>
          </div>
        </div>


<div class="row">
              <div class="col-md-4">
                <div class="panel panel-success">
                  <div class="panel-heading">
                    <h3 class="panel-title">Data Customer

                    @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                      <a href="{{ URL::route('customers.create') }}" class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru"></a>  
                      <a href="{{ URL::route('customers.edit', array($customer->id)) }}" class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>

                    @endif

                      <a href="{{ URL::route('customers.show', array($customer->id)) }}" class="pull-right btn btn-xs btn-primary btn-fab btn-raised glyphicon glyphicon-search" title="detail"></a>
                    </h3>
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
                          <dt>NPWP</dt>
                          <dd>{{{ $customer->npwp }}}</dd>
                          <dt>Alamat NPWP</dt>
                          <dd>{{{ $customer->alamatnpwp }}}</dd>
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
                          <dd>{{{ $customer->present()->registerdate }}}</dd>
                          <dt>Keterangan</dt>
                          <dd>{{{ $customer->keterangan }}}</dd>
                      </dl>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <h3 class="panel-title">Data Vendor

                    @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                      <a href="{{ URL::route('vendors.create') }}" class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru"></a>  
                      <a href="{{ URL::route('vendors.edit', array($vendor->id)) }}" class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>

                    @endif

                      <a href="{{ URL::route('vendors.show', array($vendor->id)) }}" class="pull-right btn btn-xs btn-primary btn-fab btn-raised glyphicon glyphicon-search" title="detail"></a>
                    </h3>
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

              <div class="col-md-4">
                <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Data Backhaul Circuit Vendor

                  @if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor') )

                    <a href="{{ URL::route('backhauls.create') }}" class="pull-right btn btn-xs btn-success btn-fab btn-raised glyphicon glyphicon-plus" title="buat baru"></a>  
                    <a href="{{ URL::route('backhauls.edit', array($backhaul->id)) }}" class="pull-right btn btn-xs btn-info btn-fab btn-raised glyphicon glyphicon-pencil" title="edit"></a>

                  @endif
                  
                    <a href="{{ URL::route('backhauls.show', array($backhaul->id)) }}" class="pull-right btn btn-xs btn-primary btn-fab btn-raised glyphicon glyphicon-search" title="detail"></a>
                  </h3>
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
                    <dd>{{{ $backhaul->present()->startDateShow }}}</dd>

                    @if ( !Auth::user()->hasRole('noc') )
                      <dt>NRC</dt>
                      <dd>{{{ $backhaul->present()->nrc }}}</dd>
                      <dt>MRC</dt>
                      <dd>{{{ $backhaul->present()->mrc }}}</dd>
                    @endif

                  </dl>
                </div>
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
