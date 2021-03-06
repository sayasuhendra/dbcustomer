            <!-- BEGIN DASHBOARD STATS -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat yellow-gold">
                        <div class="visual">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 {{ Customer::all()->count() }}
                            </div>
                            <div class="desc">
                                 Total Customers
                            </div>
                        </div>
                        <div class="more">
                        Aktif {{ Customer::where('status', 'aktif')->count() }}
                        <div class="pull-right">Terminate {{ Customer::where('status', 'terminate')->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="visual">
                            <i class="fa fa-server"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 {{ Costumercircuit::all()->count() }}
                            </div>
                            <div class="desc">
                                 Total Circuits
                            </div>
                        </div>
                        <div class="more">
                            Aktif {{ Costumercircuit::where('status', 'aktif')->count() }}
                            <div class="pull-right"> Suspend {{ Costumercircuit::where('status', 'suspend')->count() }} | Terminate
                            {{ Costumercircuit::where('status', 'terminate')->count() }} </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ uang(Biayacostumercircuit::where('currency','USD')->sum('mrc')); }} USD
                            </div>
                            <div class="desc">
                                dan {{ uang(Biayacostumercircuit::where('currency','IDR')->sum('mrc')); }} IDR
                            </div>
                        </div>
                        <div class="more">
                        Total MRC Circuit Customer
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 {{ uang(Biayalastmilevendor::where('currency','USD')->sum('mrc')); }} USD
                            </div>
                            <div class="desc">
                                dan {{ uang(Biayalastmilevendor::where('currency','IDR')->sum('mrc')); }} IDR
                            </div>
                        </div>
                        <div class="more">
                        Total MRC Circuit Lastmile Vendor
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->
            <!-- BEGIN DASHBOARD STATS -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat yellow-gold">
                        <div class="sbpstat">
                        Bali {{ Customer::where('area', 'bali')->where('status', 'aktif')->count() }}<br>
                        Tj Pinang {{ Customer::where('area', 'tpi')->where('status', 'aktif')->count() }}<br>
                        Tj Bl Karimun {{ Customer::where('area', 'tbk')->where('status', 'aktif')->count() }}<br>
                        </div>
                        <div class="details">
                            <div class="sbpdesc">
                                 Global {{ Customer::where('area', 'global')->where('status', 'aktif')->count() }}<br>
                                 Jakarta {{ Customer::where('area', 'jakarta')->where('status', 'aktif')->count() }}<br>
                                 Batam {{ Customer::where('area', 'batam')->where('status', 'aktif')->count() }}<br>

                            </div>
                        </div>
                        <div class="more" align="center">
                            Jumlah Customer Aktif Base On Area
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="sbpstat">
                        Bali {{ Costumercircuit::where('area', 'bali')->where('status', 'aktif')->count() }}<br>
                        Tj Pinang {{ Costumercircuit::where('area', 'tpi')->where('status', 'aktif')->count() }}<br>
                        Tj Bl Karimun {{ Costumercircuit::where('area', 'tbk')->where('status', 'aktif')->count() }}<br>
                        </div>
                        <div class="details">
                            <div class="sbpdesc">
                                 Global {{ Costumercircuit::where('area', 'global')->where('status', 'aktif')->count() }}<br>
                                 Jakarta {{ Costumercircuit::where('area', 'jakarta')->where('status', 'aktif')->count() }}<br>
                                 Batam {{ Costumercircuit::where('area', 'batam')->where('status', 'aktif')->count() }}<br>

                            </div>
                        </div>
                        <div class="more" align="center">
                            Jumlah Circuits Aktif Base On Area
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-steel">
                        <div class="visual">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 {{ uang(Biayabackhaulvendor::where('currency','USD')->sum('mrc')); }} USD
                            </div>
                            <div class="desc">
                                dan {{ uang(Biayabackhaulvendor::where('currency','IDR')->sum('mrc')); }} IDR
                            </div>
                        </div>
                        <div class="more">
                            Total MRC Circuit Backhaul Vendor
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-hoki">
                        <div class="visual">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ uang($marginusd); }} USD
                            </div>
                            <div class="desc">
                                dan {{ uang($marginidr); }} IDR
                            </div>
                        </div>
                        <div class="more">
                            Total Margin MRC
                        </div>
                    </div>
                </div>

            </div>

           <!-- BEGIN SAMPLE TABLE PORTLET-->
           <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-share"></i>Data Circuit Activation 2005-2015
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="" class="fullscreen">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body">

                <div id="chart_div"></div>

                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>Mei</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Agt</th>
                                <th>Sep</th>
                                <th>Okt</th>
                                <th>Nov</th>
                                <th>Des</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (range(2005, 2015) as $thn)

                                    <tr>
                                        <td>{{{$thn}}}</td>

                                        @foreach (range(1,12) as $bln)
                                            <td>{{{$cirb[$thn][$bln]}}}</td>
                                        @endforeach

                                        <td>{{{$cirt[$thn]}}}</td>
                                    </tr>
                                    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
           </div>
           <!-- END SAMPLE TABLE PORTLET-->