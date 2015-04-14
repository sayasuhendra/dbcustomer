@extends('layouts.scaffold')

@include('pages/dtablesatas')

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

<h1 align="center">Data Customer Detail</h1>

<p>{{ link_to_route('customers.index', 'Kembali Ke Daftar Customer') }}</p>

          <div class="col-md-7">
              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h3 class="panel-title pull-left">Data Customer {{{ $customer->nama }}}</h3>

                  @if(Auth::user()->hasRole('admin'))

                    <div class="btn-group pull-right">
                        <a href="{{ URL::route('customers.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>    
                        <a href="{{ URL::route('customers.edit', array($customer->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i>
                        </a> 
                    </div>

                  @endif

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                      <dl class="dl-horizontal">
                        <dt>Customer ID</dt>
                        <dd>{{{ $customer->customerid }}}</dd>
                        <dt>Nama Perusahaan</dt>
                        <dd>{{{ $customer->nama }}}</dd>                        
                        <dt>Alamat Perusahaan</dt>
                        <dd>{{{ $customer->alamat }}}</dd>
                        <dt>Level Customer</dt>
                        <dd>{{{ $customer->level }}}</dd>

                        @if (! Auth::user()->hasRole('noc'))
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
                  <h3 class="panel-title pull-left">Daftar Contact Customer</h3>
                    <div class="btn-group pull-right">
                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#TambahCustomerContact"><i class="glyphicon glyphicon-plus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <dl class="dl-horizontal">
                  @foreach ($contacts as $contact)

                    @if ( $contact->bagian === "Billing" && !Auth::user()->hasRole('noc') )
                      <dt>Bagian {{{ $contact->bagian }}}</dt>
                      <dd>
                          <a id="contactButton{{{ $contact->id }}}" data-html="true" data-toggle="tooltip" data-placement="right" title="{{{ $contact->email }}}" data-content="{{{ $contact->jabatan }}}<br>{{{ $contact->keterangan }}} ">{{{ $contact->cp }}} / {{{ $contact->telepon }}}</a>


                          @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))

                            <a href="{{ URL::route('customercontacts.edit', array($contact->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $contact->id), 'style'=>'display:inline-block')) }}
                              {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}

                          @endif

                      </dd>
                    @endif

                    @if ( $contact->bagian === "Teknis" && ( !Auth::user()->hasRole('ar') && !Auth::user()->hasRole('ap') ) )
                      <dt>Bagian {{{ $contact->bagian }}}</dt>
                      <dd>
                          <a id="contactButton{{{ $contact->id }}}" data-html="true" data-toggle="tooltip" data-placement="right" title="{{{ $contact->email }}}" data-content="{{{ $contact->jabatan }}}<br>{{{ $contact->keterangan }}} ">{{{ $contact->cp }}} / {{{ $contact->telepon }}}</a>


                          @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))

                            <a href="{{ URL::route('customercontacts.edit', array($contact->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $contact->id), 'style'=>'display:inline-block')) }}
                              {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}

                          @endif

                      </dd>
                    @endif

                    @if ( $contact->bagian !== "Teknis" && $contact->bagian !== "Billing")
                      <dt>Bagian {{{ $contact->bagian }}}</dt>
                      <dd>
                          <a id="contactButton{{{ $contact->id }}}" data-html="true" data-toggle="tooltip" data-placement="right" title="{{{ $contact->email }}}" data-content="{{{ $contact->jabatan }}}<br>{{{ $contact->keterangan }}} ">{{{ $contact->cp }}} / {{{ $contact->telepon }}}</a>

                          @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))

                            <a href="{{ URL::route('customercontacts.edit', array($contact->id)) }}" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                            {{ Form::open(array('method' => 'DELETE', 'route' => array('customercontacts.destroy', $contact->id), 'style'=>'display:inline-block')) }}
                              {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                            {{ Form::close() }}

                          @endif

                      </dd>
                    @endif


                  @endforeach
                  </dl>
                </div>
              </div>
            </div> 


            <div class="col-md-5">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <dl class="dl-horizontal">

                    <dt>Kurs USD hari ini = </dt>

                    <dd>{{{ $kursjual }}}</dd>

                    <dt>Sumber: </dt>

                    <dd><a href="http://www.bca.co.id/id/kurs-sukubunga/kurs_counter_bca/kurs_counter_bca_landing.jsp">www.bca.co.id</a></dd>
                  </dl>

                </div>
              </div>
            </div>
{{---------------- Kontak  End------------------------------------------------}}
<div class="col-md-12">
    <div class="panel panel-success">
     <div class="panel-heading">
       <h3 class="panel-title pull-left">Data Layanan SBP</h3>

       @if(Auth::user()->hasRole('admin'))
         <div class="btn-group pull-right">
             <a href="{{ URL::route('layanansbps.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
         </div>
       @endif

       <div class="clearfix"></div>
     </div> <!-- panel heading end -->
        @include('customers/show/layanan')
    </div> <!-- panel success end -->

        <div class="panel panel-info">
          <div class="panel-heading">
             <h3 class="panel-title pull-left">Data Customer Circuits</h3>

               @if(Auth::user()->hasRole(['editor', 'bod']))

                 <div class="btn-group pull-right">
                     <a href="{{ URL::route('costumercircuits.create') }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
                 </div>

               @endif

               <div class="clearfix"></div>
          </div> <!-- panel heading end -->

          @include('customers/show/circuit')

        </div> <!-- panel info end -->
</div>

@stop

@include('pages/dtablesbawah')

@section('script-bawah')

<script type="text/javascript" src="{{ asset('global/scripts/angular.js') }}"></script>


<script type="text/javascript" language="javascript" class="init">

    $(document).ready(function() {
      $('#datasbp').DataTable( {
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
