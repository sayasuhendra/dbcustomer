<li class="start {{ Request::is('/') ? 'active' : '' }} ">
    <a href="{{ route('home') }}">
    <i class="icon-home"></i>
    <span class="title"> Home</span>
    </a>
</li>

@if (Auth::user()->hasRole('user'))

    <li class="{{ ( Request::is('vendors') || Request::is('vendors/*') || Request::is('customers') || Request::is('customers/*') )? 'active' : '' }}">
        <a href="javascript:;">
        <i class="icon-layers"></i>
            <span class="title">Master Data</span>
        <span class="arrow"></span>
        </a>
        <ul class="sub-menu">

            @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'sales']))
                <li class="{{ ( Request::is('vendors') || Request::is('vendors/*') ) ? 'active' : '' }}">
                    <a href="/vendors">
                    <i class="icon-globe"></i>
                    Vendors</a>
                </li>
            @endif        

            @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'ar', 'sales']))
                <li class="{{ ( Request::is('customers') || Request::is('customers/*') ) ? 'active' : '' }}">
                    <a href="/customers">
                    <i class="icon-users"></i>
                    Customers</a>
                </li>
            @endif

        </ul>
    </li>

    <li class="{{ ( Request::is('lastmiles') || Request::is('lastmiles/*') || Request::is('costumercircuits') || Request::is('costumercircuits/*') || Request::is('backhauls') || Request::is('backhauls/*') ) ? 'active' : '' }}">
        <a href="javascript:;">
        <i class="icon-list"></i>
        <span class="title">Circuits Data</span>
        <span class="arrow "></span>
        </a>
        <ul class="sub-menu">

        @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'sales']))
            <li class="{{ ( Request::is('lastmiles') || Request::is('lastmiles/*') ) ? 'active' : '' }}"><a href="/lastmiles">
                <i class="icon-share"></i>
                Vendor Circuits</a>
            </li>
        @endif

        @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'ar', 'sales']))
            <li class="{{ ( Request::is('costumercircuits') || Request::is('costumercircuits/*') ) ? 'active' : '' }}"><a href="/costumercircuits">
                <i class="icon-graph"></i>
                Costumer Circuits</a></li>
        @endif

        @if(Auth::user()->hasRole(['bod', 'noc']))  
            <li class="{{ ( Request::is('backhauls') || Request::is('backhauls/*') ) ? 'active' : '' }}"><a href="/backhauls">
                <i class="icon-equalizer"></i>
                Circuits Backhaul</a></li>
        @endif

        </ul>
    </li>

    <li class="{{ ( Request::is('terminatedlastmiles') || Request::is('terminatedlastmiles/*') || Request::is('terminatedcircuits') || Request::is('terminatedcircuits/*') ) ? 'active' : '' }}">
        <a href="javascript:;">
        <i class="icon-close"></i>
        <span class="title">Terminated Circuits</span>
        <span class="arrow "></span>
        </a>
        <ul class="sub-menu">

        @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'ar', 'sales']))
            <li class="{{ ( Request::is('terminatedlastmiles') || Request::is('terminatedlastmiles/*') ) ? 'active' : '' }}"><a href="/terminatedlastmiles">
                <i class="icon-share"></i>
                Terminated Lastmiles</a>
            </li>
        @endif

        @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap', 'sales']))
            <li class="{{ ( Request::is('terminatedcircuits') || Request::is('terminatedcircuits/*') ) ? 'active' : '' }}"><a href="/terminatedcircuits">
                <i class="icon-graph"></i>
                Terminated Circuits</a></li> 
        @endif

        </ul>
    </li>

    <li class="{{ ( Request::is('layanans') || Request::is('layanans/*') || Request::is('layanansbps') || Request::is('layanansbps/*') ) ? 'active' : '' }}">
        <a href="javascript:;">
        <i class="icon-briefcase"></i>
        <span class="title">Layanan Lain</span>
        <span class="arrow "></span>
        </a>
        <ul class="sub-menu">

        @if(Auth::user()->hasRole(['bod', 'noc', 'dco', 'ap']))
            <li class="{{ ( Request::is('layanans') || Request::is('layanans/*') ) ? 'active' : '' }}"><a href="/layanans">
                <i class="icon-grid"></i>
                Layanan Vendor</a>
            </li>
        @endif

        @if(Auth::user()->hasRole(['bod', 'noc', 'ar', 'sales']))
            <li class="{{ ( Request::is('layanansbps') || Request::is('layanansbps/*') ) ? 'active' : '' }}"><a href="/layanansbps">
                <i class="icon-calendar"></i>
                Layanan SBP</a>
            </li>
        @endif

        </ul>
    </li>

    @if(Auth::user()->hasRole(['bod', 'noc']))

        <li class="{{ ( Request::is('backhaulswitches') || Request::is('backhaulswitches/*') ) ? 'active' : '' }}"><a href="/backhaulswitches">
            <i class="icon-vector"></i>
            <span class="title"> Perangkat SBP</span></a>
        </li>

    @endif

    @if(Auth::user()->hasRole('bod', 'csc'))

        <li class="{{ ( Request::is('problems') || Request::is('problems/*') || Request::is('problemsopen') ) ? 'active' : '' }}">
            <a href="javascript:;">
            <i class="icon-envelope-letter"></i>
            <span class="title">Problems Report</span>
            <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ ( Request::is('problems') || Request::is('problems/*') ) ? 'active' : '' }}"><a href="/problems">
                    <i class="icon-envelope"></i>
                    <span class="title"> Tickets Close</span></a>
                </li>
                <li class="{{ ( Request::is('problemsopen') || Request::is('problems/*') ) ? 'active' : '' }}"><a href="/problemsopen">
                    <i class="icon-envelope-open"></i>
                    <span class="title"> Tickets Open</span></a>
                </li>
            </ul>
        </li>

    @endif

    @if(Auth::user()->hasRole(['bod', 'admin']))

        <li class="{{ ( Request::is('users') || Request::is('users/*') || Request::is('roles') || Request::is('roles/*') ) ? 'active' : '' }}">
            <a href="javascript:;">
            <i class="icon-users"></i>
            <span class="title">Users Management</span>
            <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="{{ ( Request::is('users') || Request::is('users/*') ) ? 'active' : '' }}"><a href="/users">
                    <i class="icon-settings"></i>
                    Roles Management</a>
                </li>
                <li class="{{ ( Request::is('roles') || Request::is('roles/*') ) ? 'active' : '' }}"><a href="/roles">
                    <i class="icon-key"></i>
                    Roles</a>
                </li>
                
                <li class="{{ ( Request::is('user/profile') || Request::is('user/profile/*') ) ? 'active' : '' }}"><a href="/user/profile">
                    <i class="icon-user-follow"></i>
                    Users Profile</a>
                </li>
            </ul>
        </li>

    @endif

@endif