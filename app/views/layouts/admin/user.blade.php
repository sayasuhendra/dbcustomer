                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                @@if (!Auth::guest())
                
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="/foto/{{ Auth::user()->profile ?  Auth::user()->profile->foto : "noimg.png" }}"/>
                    <span class="username username-hide-on-mobile">
                    {{{ ucwords(Auth::user()->username) }}} </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ Auth::user()->profile ? route('profile', Auth::user()->username) : route('profile.create', Auth::user()->username); }}">
                            <i class="icon-user"></i>
                            </i> {{ Auth::user()->profile ? "Profile" : "Create Profile"; }} </a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile.index')}}">
                            <i class="icon-notebook"></i> Internal Kontak </a>
                        </li>
                        <li>
                            <a href="{{ route('editpassword', Auth::user()->username) }}">
                            <i class="icon-note"></i> Edit Password</a>
                        </li>
                        <li class="divider">
                        </li>
                        {{-- 
                        <li>
                            <a href="extra_lock.html">
                            <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        --}}
                        <li>
                            <a href="/logout">
                            <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- END USER LOGIN DROPDOWN -->