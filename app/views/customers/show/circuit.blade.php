           @if ($costumercircuits->count())
            <table id="datasbp" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Circuit ID</th>
                  <th>Namasite</th>
                  <th>Alamat</th>
                  <th>Layanan</th>
                  <th>BW</th>

                  @if(Auth::user()->hasRole(['bod', 'ar', 'sales']))
                    <th>MRC Circuit</th>
                  @endif

                  <th>Nama Vendor</th>

                  @if(Auth::user()->hasRole(['bod', 'ar', 'sales']))
                    <th>MRC Vendor</th>
                    <th>Margin</th>
                  @endif
                  
                  <th>Status</th>
                  <th width="100px">Action</th>
                </tr>
              </thead>


                <tbody>

                  <?php 
                    $totalmrcvendoridr = "0";
                    $totalmrcvendorusd = "0";
                    $totalmrccircuitidr = "0";
                    $totalmrccircuitusd = "0";
                  ?>
                  
                  @foreach ($costumercircuits as $costumercircuit)

                      <?php
                            if (! empty($costumercircuit->biayavendors->mrc)){
                                if ($costumercircuit->biayavendors->currency == "IDR") { $totalmrcvendoridr += $costumercircuit->biayavendors->mrc; }
                                if ($costumercircuit->biayavendors->currency == "USD") { $totalmrcvendorusd += $costumercircuit->biayavendors->mrc; }
                                if ($costumercircuit->biayas->currency == "IDR") { $totalmrccircuitidr += $costumercircuit->biayas->mrc; }
                                if ($costumercircuit->biayas->currency == "USD") { $totalmrccircuitusd += $costumercircuit->biayas->mrc; }

                            }
                       ?>

                            <tr>
                                <td>{{{ $costumercircuit->circuitid }}}</td>
                                <td>{{{ $costumercircuit->namasite }}}</td>
                                <td>{{{ $costumercircuit->alamat }}}</td>
                                <td>{{{ $costumercircuit->layanan }}}</td>
                                <td>{{{ $costumercircuit->bandwidth }}} {{{ $costumercircuit->satuan }}}</td>

                                @if(Auth::user()->hasRole(['bod', 'ar', 'sales']))
                                  <td>{{{ $costumercircuit->present()->mrcCircuit }}}</td>
                                @endif

                                <td> {{{ $costumercircuit->namavendor }}} </td>

                                @if(Auth::user()->hasRole(['bod', 'ar', 'sales']))
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

                                @if(Auth::user()->hasRole(['bod', 'editcustomer', 'editteknis']))

                                    <a href="{{ URL::route('costumercircuits.edit', array($costumercircuit->id)) }}"> {{ Form::button('<i class="glyphicon glyphicon-pencil"></i>', array('class' => 'btn btn-xs')) }} </a>
                                    {{ Form::open(array('method' => 'DELETE', 'route' => array('costumercircuits.destroy', $costumercircuit->id), 'style'=>'display:inline-block')) }}
                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Yakin mau dihapus?')) }}
                                    {{ Form::close() }}
                                    
                                @endif

                                </td>
                            </tr>
                        @endforeach                            
                </tbody>

                @if(Auth::user()->hasRole('bod'))
                  <tfoot>
                  <?php 
                        $totaluntung = $totalmrccircuit - $totalmrcvendor; 
                        $totaluntungidr = $totalmrccircuitidr - $totalmrcvendoridr; 
                        $totaluntungusd = $totalmrccircuitusd - $totalmrcvendorusd; 
                  ?>
                    {{-- <tr>
                      <td colspan="5" style="text-align: right;">Total MRC Circuit</td>
                      <td> @{{ {{{ $totalmrccircuit }}} | currency:"{{{ $costumercircuit->biayas->currency }}} " }}</td>
                      <td style="text-align: right;">Total MRC Vendor</td>
                      <td> @{{ {{{ $totalmrcvendor }}} | currency:"{{{ $costumercircuit->biayas->currency }}} " }}</td>
                      <td colspan="4"><b> {{ uang($totaluntung) }} Total Margin @{{ {{{$totaluntung}}} | currency:"IDR " }} </b></td>
                    </tr> --}}

                    <tr>
                      <td>Dollar</td>
                      <td colspan="4" style="text-align: right;">Total MRC Circuit</td>
                      <td> @{{ {{{ $totalmrccircuitusd }}} | currency:"USD " }}</td>
                      <td style="text-align: right;">Total MRC Vendor</td>
                      <td> @{{ {{{ $totalmrcvendorusd }}} | currency:"USD " }}</td>
                      <td colspan="3"><b> Total Margin @{{ {{{ $totaluntungusd }}} | currency:"USD " }} </b></td>
                    </tr>

                    <tr>
                      <td>Rupiah</td>
                      <td colspan="4" style="text-align: right;">Total MRC Circuit</td>
                      <td> @{{ {{{ $totalmrccircuitidr }}} | currency:"IDR " }}</td>
                      <td style="text-align: right;">Total MRC Vendor</td>
                      <td> @{{ {{{ $totalmrcvendoridr }}} | currency:"IDR " }}</td>
                      <td colspan="3"><b>Total Margin IDR @{{ {{{ $totaluntungidr }}} | currency:"IDR " }} </b></td>
                    </tr>

                    <tr>
                      <td colspan="3">Total MRC Dalam Rupiah dengan Kurs 12,000 IDR/USD</td>

                      <?php 
                            $totalmrccircuitusdkeidr = $totalmrccircuitusd * 12000;
                            $totalmrccircuittotal =  $totalmrccircuitusdkeidr + $totalmrccircuitidr;
                            $totalmrcvendorusdkeidr = $totalmrcvendorusd * 12000;
                            $totalmrcvendortotal = $totalmrcvendorusdkeidr + $totalmrcvendoridr;

                       ?>

                      <td colspan="2" style="text-align: right;">Total MRC Circuit</td>
                      <td> @{{ {{{ $totalmrccircuitusdkeidr }}} | currency:"IDR " }}</td>
                      <td style="text-align: right;">Total MRC Vendor</td>
                      <td> @{{ {{{ $totalmrcvendor }}} | currency:"IDR " }}</td>

                      <?php  $totaluntungfix = $totalmrccircuittotal - $totalmrcvendortotal; ?>

                      <td colspan="3"><b> Total Margin All @{{ {{{ $totaluntungfix }}} | currency:"IDR " }} </b></td>
                    </tr>
                  </tfoot>
                @endif
                    
                 
              </table>

            @else
              Belum ada data costumercircuits
            @endif

            <div class="btn" style="margin-bottom: 30px;"></div>
