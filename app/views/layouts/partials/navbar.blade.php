<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">DB SBP</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>

                @if (Auth::guest())
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                @else

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/vendors">Vendors</a></li>
                  <li><a href="/lastmiles">Vendor Circuits</a></li>
                  <li><a href="/customers">Customers</a></li>
                  <li><a href="/costumercircuits">Costumer Circuits</a></li>                  
                  </ul>
                </li>

                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/customers">Customer</a></li>
                  <li><a href="/costumercircuits">Costumer Circuit</a></li>
                  <li><a href="/customercontacts">Customer Contact</a></li>
                  <li><a href="/adsls">ADSL</a></li>
                  <li><a href="/biayacostumercircuits">Biaya Costumer Circuit</a></li>
                  <li><a href="/costumercircuitperangkats">Perangkat Costumer Circuit</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendor <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/vendors">Vendor</a></li>
                  <li><a href="/lastmiles">Lastmile</a></li>
                  <li><a href="/backhauls">Backhaul</a></li>
                  <li><a href="/backhaulswitches">Backhaul Switch</a></li>
                  <li><a href="/contactvendors">Contact Vendor</a></li>
                  <li><a href="/biayalastmilevendors">Biaya Lastmile Vendor</a></li>
                  <li><a href="/biayabackhaulvendors">Biaya Backhaul Vendor</a></li>
                  </ul>
                </li> -->


                    <li><a href="/logout">Logout</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>