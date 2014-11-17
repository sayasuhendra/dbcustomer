

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <img src="\assets\images\logosm.png" alt="logo sbp"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/">Home</a></li>

                @if(Auth::guest())                    
                <li><a href="/register">Mendaftar</a></li>
                    <li><a href="/login">Login</a></li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/vendors">Vendors</a></li>
                  <li><a href="/customers">Customers</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Circuit<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/lastmiles">Vendor Circuits</a></li>
                  <li><a href="/costumercircuits">Costumer Circuits</a></li>  
                  <li><a href="/backhauls">Circuits Backhaul</a></li>                  
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Layanan Lain<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="/layanans">Layanan Vendor</a></li>
                  <li><a href="/layanansbps">Layanan SBP</a></li>
                  </ul>
                </li>
                <li><a href="/backhaulswitches">Perangkat SBP</a></li>
                  @if(Auth::user()->hasRole('admin'))
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage User<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="/register">Create User</a></li>
                  </ul>
                  </li>
                  @endif
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{{ Auth::user()->username }}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li> {{ Auth::user()->profile ? link_to_profile() : link_to_createprofile();}} </li>
                          <li><a href="{{ route('user.profile.index') }}">Kontak SBP</a></li>
                          <li class="divider"></li>
                          <li><a href="/logout">Logout</a></li>
                        </ul>
                      </li>
                  </ul>
                @endif
            
        </div><!--/.nav-collapse -->
    </div>
</div>