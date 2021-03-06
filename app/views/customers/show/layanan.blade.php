            @if ($layanansbps->count())
              <table id="layanansbps" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Circuit ID</th>
                    <th>Namasite</th>
                    <th>Alamat</th>
                    <th>Layanan</th>
                    <th>Perangkat</th>
                    <th>Serial No.</th>
                    <th>Tipe</th>
                    <th>Jenis</th>
                    <th>Pemilik</th>

                    @if(Auth::user()->hasRole(['bod', 'dco', 'ap', 'ar', 'sales']))
                      <th>NRC</th>
                      <th>MRC</th>
                    @endif

                    <th>Area</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th width="100px">Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($layanansbps as $layanansbp)
                    <tr>
                      <td>{{{ $layanansbp->circuitid }}}</td>
                      <td>{{{ $layanansbp->namasite }}}</td>
                      <td>{{{ $layanansbp->alamat }}}</td>
                      <td>{{{ $layanansbp->layanan }}}</td>
                      <td>{{{ $layanansbp->namaperangkat }}}</td>
                      <td>{{{ $layanansbp->serialnumber }}}</td>
                      <td>{{{ $layanansbp->tipe }}}</td>
                      <td>{{{ $layanansbp->jenis }}}</td>
                      <td>{{{ $layanansbp->pemilik }}}</td>

                      @if(Auth::user()->hasRole(['bod', 'dco', 'ap', 'ar', 'sales']))
                        <td>{{{ $layanansbp->nrc }}} {{{ $layanansbp->currency }}}</td>
                        <td>{{{ $layanansbp->mrc }}} {{{ $layanansbp->currency }}}</td>
                      @endif

                      <!-- <td>{{{ $layanansbp->present()->mrcCircuit }}}</td> -->
                      <td>{{{ $layanansbp->area }}}</td>
                      <td>
                        @if ( $layanansbp->status == 'Aktif' )
                          <span class="label label-success">{{{ $layanansbp->status }}}</span>
                        @elseif ( $layanansbp->status == 'Terminate' )
                          <span class="label label-danger">{{{ $layanansbp->status }}}</span>
                        @elseif ( $layanansbp->status == 'Suspend' )
                          <span class="label label-warning">{{{ $layanansbp->status }}}</span>
                        @endif
                      </td>
                      <td>{{{ $layanansbp->present()->startDate }}}</td>
                      <td width="60px" class="ac">

                        @if(Auth::user()->hasRole(['bod', 'noc', 'ar', 'sales']))

                        <a href="{{ URL::route('layanansbps.show', array($layanansbp->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

                        @endif

                        @if(Auth::user()->hasRole(['bod', 'editcustomer', 'editteknis']))
                        
                          <a href="{{ URL::route('layanansbps.edit', array($layanansbp->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                          {{ Form::open(array('method' => 'DELETE', 'route' => array('layanansbps.destroy', $layanansbp->id), 'style'=>'display:inline-block')) }}
                                {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?', 'data-confirm' => 'Yakin mau dihapus?')) }}
                          {{ Form::close() }}

                        @endif
                      </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              Belum ada data layanansbps
            @endif