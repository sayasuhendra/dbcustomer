           @if ($costumercircuits->count())
            <table id="datasbp" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Circuit ID</th>
                  <th>Namasite</th>
                  <th>Alamat</th>
                  <th>Layanan</th>
                  <th>BW</th>

                  @if (! Auth::user()->hasRole('noc'))
                    <th>MRC Circuit</th>
                  @endif

                  <th>Nama Vendor</th>

                  @if (! Auth::user()->hasRole('noc'))
                    <th>MRC Vendor</th>
                    <th>Margin</th>
                  @endif
                  
                  <th>Status</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>


                <tbody>
                  @foreach ($costumercircuits as $costumercircuit)
                  <?php
                  if (! empty($costumercircuit->biayavendors->mrc)){
                  $totalmrcvendor += $costumercircuit->biayavendors->mrc;
                  $totalmrccircuit += $costumercircuit->biayas->mrc; 
                  }
                   ?>
                            <tr>
                                <td>{{{ $costumercircuit->circuitid }}}</td>
                                <td>{{{ $costumercircuit->namasite }}}</td>
                                <td>{{{ $costumercircuit->alamat }}}</td>
                                <td>{{{ $costumercircuit->layanan }}}</td>
                                <td>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</td>

                                @if (! Auth::user()->hasRole('noc'))
                                  <td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
                                @endif

                                <td> {{{ $costumercircuit->namavendor }}} </td>

                                @if (! Auth::user()->hasRole('noc'))
                                  <td> {{{ $costumercircuit->present()->mrclastmile }}} </td>
                                  <td> {{{ $costumercircuit->present()->untung }}} </td>
                                @endif

                                <td>
                                    @if ( $costumercircuit->status == 'Aktif' )
                                        <span class="label label-success">{{{ $costumercircuit->status }}}</span>
                                    @elseif ( $costumercircuit->status == 'Terminate' )
                                        <span class="label label-danger">{{{ $costumercircuit->status }}}</span>
                                    @elseif ( $costumercircuit->status == 'Suspend' )
                                        <span class="label label-warning">{{{ $costumercircuit->status }}}</span>
                                    @endif
                                </td>
                                <td width="60px" class="ac">
                                <a href="{{ URL::route('costumercircuits.show', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-list"></i>', array('class' => 'btn btn-xs')) }} </a>

                                @if(Auth::user()->hasRole('admin'))

                                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                                    {{ Form::close() }}
                                    
                                @endif

                                </td>
                            </tr>
                        @endforeach                            
                </tbody>

                @if (! Auth::user()->hasRole('noc'))
                  <tfoot>
                  <?php $totaluntung = $totalmrccircuit - $totalmrcvendor ?>
                    <tr>
                      <td colspan="5" style="text-align: right;">Total MRC Circuit</td>
                      <td>{{{ $totalmrccircuit }}}</td>
                      <td colspan="3" style="text-align: right;">Total MRC Vendor</td>
                      <td>{{{ $totalmrcvendor }}}</td>
                      <td colspan="4"><b>{{{ $totaluntung }}} Total Margin</b></td>
                    </tr>
                  </tfoot>
                @endif
                    
                 
              </table>

            @else
              Belum ada data costumercircuits
            @endif