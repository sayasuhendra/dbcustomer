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
                        <div class="sbpstat">
                        Bali {{ Customer::where('area', 'bali')->count() }}<br>
                        Tj Pinang {{ Customer::where('area', 'tpi')->count() }}<br>
                        Tj Bl Karimun {{ Customer::where('area', 'tbk')->count() }}<br>
                        </div>
                        <div class="details">
                            <div class="desc">
                                 Global {{ Customer::where('area', 'global')->count() }}<br>
                                 Jakarta {{ Customer::where('area', 'jakarta')->count() }}<br>
                                 Batam {{ Customer::where('area', 'batam')->count() }}<br>

                            </div>
                        </div>
                        <div class="more" align="center">
                            Jumlah Customer Base On Area
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green">
                        <div class="sbpstat">
                        Bali {{ Costumercircuit::where('area', 'bali')->count() }}<br>
                        Tj Pinang {{ Costumercircuit::where('area', 'tpi')->count() }}<br>
                        Tj Bl Karimun {{ Costumercircuit::where('area', 'tbk')->count() }}<br>
                        </div>
                        <div class="details">
                            <div class="desc">
                                 Global {{ Costumercircuit::where('area', 'global')->count() }}<br>
                                 Jakarta {{ Costumercircuit::where('area', 'jakarta')->count() }}<br>
                                 Batam {{ Costumercircuit::where('area', 'batam')->count() }}<br>

                            </div>
                        </div>
                        <div class="more" align="center">
                            Jumlah Circuits Customer Base On Area
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