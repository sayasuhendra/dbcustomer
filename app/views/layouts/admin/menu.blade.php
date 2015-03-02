                <li class="start {{ Request::is('/') ? 'active' : '' }} ">
                    <a href="{{ route('home') }}">
                    <i class="icon-home"></i>
                    <span class="title"> Home</span>
                    </a>
                </li>
                <li class="{{ ( Request::is('vendors') || Request::is('vendors/*') || Request::is('customers') || Request::is('customers/*') )? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-book-open"></i>
                    <span class="title">Master Data</span>
                    <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ ( Request::is('vendors') || Request::is('vendors/*') ) ? 'active' : '' }}">
                            <a href="/vendors">
                            <i class="icon-globe"></i>
                            Vendors</a>
                        </li>
                        <li class="{{ ( Request::is('customers') || Request::is('customers/*') ) ? 'active' : '' }}">
                            <a href="/customers">
                            <i class="icon-users"></i>
                            Customers</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ ( Request::is('lastmiles') || Request::is('lastmiles/*') || Request::is('costumercircuits') || Request::is('costumercircuits/*') || Request::is('backhauls') || Request::is('backhauls/*') ) ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-list"></i>
                    <span class="title">Circuits Data</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ ( Request::is('lastmiles') || Request::is('lastmiles/*') ) ? 'active' : '' }}"><a href="/lastmiles">
                            <i class="icon-share"></i>
                            Vendor Circuits</a>
                        </li>
                        <li class="{{ ( Request::is('costumercircuits') || Request::is('costumercircuits/*') ) ? 'active' : '' }}"><a href="/costumercircuits">
                            <i class="icon-graph"></i>
                            Costumer Circuits</a></li>  
                        <li class="{{ ( Request::is('backhauls') || Request::is('backhauls/*') ) ? 'active' : '' }}"><a href="/backhauls">
                            <i class="icon-equalizer"></i>
                            Circuits Backhaul</a></li>
                    </ul>
                </li>

                <li class="{{ ( Request::is('terminatedlastmiles') || Request::is('terminatedlastmiles/*') || Request::is('terminatedcircuits') || Request::is('terminatedcircuits/*') ) ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-close"></i>
                    <span class="title">Terminated Circuits</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ ( Request::is('terminatedlastmiles') || Request::is('terminatedlastmiles/*') ) ? 'active' : '' }}"><a href="/terminatedlastmiles">
                            <i class="icon-share"></i>
                            Terminated Lastmiles</a>
                        </li>
                        <li class="{{ ( Request::is('terminatedcircuits') || Request::is('terminatedcircuits/*') ) ? 'active' : '' }}"><a href="/terminatedcircuits">
                            <i class="icon-graph"></i>
                            Terminated Circuits</a></li> 
                    </ul>
                </li>

                <li class="{{ ( Request::is('layanans') || Request::is('layanans/*') || Request::is('layanansbps') || Request::is('layanansbps/*') ) ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Layanan Lain</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ ( Request::is('layanans') || Request::is('layanans/*') ) ? 'active' : '' }}"><a href="/layanans">
                            <i class="icon-grid"></i>
                            Layanan Vendor</a>
                        </li>
                        <li class="{{ ( Request::is('layanansbps') || Request::is('layanansbps/*') ) ? 'active' : '' }}"><a href="/layanansbps">
                            <i class="icon-calendar"></i>
                            Layanan SBP</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ ( Request::is('backhaulswitches') || Request::is('backhaulswitches/*') ) ? 'active' : '' }}"><a href="/backhaulswitches">
                    <i class="icon-vector"></i>
                    <span class="title"> Perangkat SBP</span></a>
                </li>

                <li class="{{ ( Request::is('problems') || Request::is('problems/*') ) ? 'active' : '' }}"><a href="/problems">
                    <i class="icon-bubbles"></i>
                    <span class="title"> Problem Tickets</span></a>
                </li>


                {{-- 
                <li class="heading">
                    <h3 class="uppercase">More</h3>
                </li>
                --}}