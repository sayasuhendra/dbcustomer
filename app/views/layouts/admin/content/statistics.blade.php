            <!-- BEGIN DASHBOARD STATS -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
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
                    <div class="dashboard-stat red-intense">
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