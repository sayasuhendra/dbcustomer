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
                            <i class="fa fa-bar-chart-o"></i>
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
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                {{ uang(Biayacostumercircuit::where('currency','USD')->sum('mrc')); }} USD
                            </div>
                            <div class="desc">
                                 {{ uang(Biayacostumercircuit::where('currency','IDR')->sum('mrc')); }} IDR
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
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 {{ uang(Biayalastmilevendor::where('currency','USD')->sum('mrc')); }} USD
                            </div>
                            <div class="desc">
                                 {{ uang(Biayalastmilevendor::where('currency','IDR')->sum('mrc')); }} IDR
                            </div>
                        </div>
                        <div class="more">
                        Total MRC Circuit Lastmile Vendor
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DASHBOARD STATS -->