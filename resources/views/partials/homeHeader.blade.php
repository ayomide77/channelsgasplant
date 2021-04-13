<header id="header-part" class="header-2">

    <!--===== NAVBAR START =====-->
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">

                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="/chnlsgasplant/images/logo-w.png" alt="Logo">
                        </a> <!-- Logo -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a class="active" href="{{ url('/') }}">Home</a>

                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('products') }}">Products</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#">Account</a>
                                    <ul class="sub-menu">
                                        {{-- CHECK FOR AUTH ACCESS AND DISPLAY --}}
                                        @if (Route::has('login'))
                                            <div class="top-right links">
                                                @auth

                                                    {{-- DISPLAY ITEMS BASED ON USER ROLE --}}
                                                    @hasanyrole('Admin|Sales')
                                                    <li class="li"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                    @endhasanyrole

                                                    @hasrole('User')
                                                    <li class="li"><a href="{{ route('home') }}">Home</a></li>
                                                    @endhasrole
                                                    {{-- DISPLAY ITEMS BASED ON USER ROLE --}}

                                                    <li class="li"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                @else

                                                    <li class="li"><a href="{{ route('login') }}">
                                                          Customer  Login</a>
                                                        
                                                        </li>
                                                    <li class="li"><a href="{{ route('register') }}">
                                                           Customer Register</a>
                                                        
                                                        </li>

                                                        <hr/>
                                                        <li class="li"><a href="{{ route('adminLogin') }}"> Staff Login</a>
                                                        </li>
                                                    {{-- @endif --}}
                                                @endauth
                                            </div>
                                        @endif

                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contact') }}">How it Works</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('contact') }}">Contact Us</a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('about') }}">About Us</a>
                                </li>

                            </ul>
                        </div>
                        <div class="cart-search ">
                            <p class="d-none d-lg-block"><i class="fa fa-phone"></i> (+234 - 9099658524)</p>
                            <ul class="text-right">
                                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-basket"></i><span
                                            class="checkout_items">{{ Cart::count() }}</span></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--===== NAVBAR ENDS =====-->

</header>
