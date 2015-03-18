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
            <!-- END DASHBOARD STATS -->

                <div class="col-md-6 col-sm-6">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet solid grey-cararra bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-bullhorn"></i>Revenue
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="" class="btn grey-steel btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    Filter <span class="fa fa-angle-down">
                                    </span>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;">
                                            Q1 2014 <span class="label label-sm label-default">
                                            past </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                            Q2 2014 <span class="label label-sm label-default">
                                            past </span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="javascript:;">
                                            Q3 2014 <span class="label label-sm label-success">
                                            current </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                            Q4 2014 <span class="label label-sm label-warning">
                                            upcoming </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div id="site_activities_loading">
                                <img src="../../assets/admin/layout/img/loading.gif" alt="loading"/>
                            </div>
                            <div id="site_activities_content" class="display-none">
                                <div id="site_activities" style="height: 228px;">
                                </div>
                            </div>
                            <div style="margin: 20px 0 10px 30px">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-sm label-success">
                                        Revenue: </span>
                                        <h3>$13,234</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-sm label-info">
                                        Tax: </span>
                                        <h3>$134,900</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-sm label-danger">
                                        Shipment: </span>
                                        <h3>$1,134</h3>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                        <span class="label label-sm label-warning">
                                        Orders: </span>
                                        <h3>235090</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>

           <div id="chart_div" style="width: 900px; height: 500px;"></div>