<header id="header-part">


    <!--===== NAVBAR START =====-->
    <div class="navigation">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">

                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('/chnlsgasplant/images/logo.png') }}" alt="Logo">
                        </a> <!-- Logo -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button> <!-- toggle Button -->

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('products') }}">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Account</a>
                                    <ul class="sub-menu">

                                        @if (Route::has('login'))
                                            <div class="top-right links">
                                                @auth

                                                    @hasanyrole('Admin|Sales')
                                                    <li class="li"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                    @endhasanyrole

                                                    @hasrole('User')
                                                    <li class="li"><a href="{{ route('home') }}">Home</a></li>
                                                    @endhasrole

                                                    <li class="li"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">Logout</a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                @else
                                                    <li class="li"><a href="{{ route('login') }}">Customer Login</a>
                                                    </li>
                                                    <li class="li"><a href="{{ route('register') }}">Customer Register</a>
                                                    </li>
                                                    <hr/>
                                                    <li class="li"><a href="{{ route('adminLogin') }}"> Staff Login</a>
                                                    </li>
                                                   
                                                @endauth
                                            </div>
                                        @endif
                                    </ul>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="{{ request()->is('contact') ? 'active' : '' }}"
                                        href="{{ route('contact') }}">Contact Us</a>
                                </li>


                                <li class="nav-item">
                                    <a class="{{ request()->is('about') ? 'active' : '' }}"
                                        href="{{ route('about') }}">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="{{ request()->is('testimonial') ? 'active' : '' }}"
                                        href="{{ route('testimonial.create') }}">Testimonial</a>
                                </li>
                            </ul>
                        </div>
                        <div class="cart-search">

                            <ul>
                                <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-basket"></i><span
                                            class="checkout_items">{{ Cart::count() }}</span></a></li>
                            </ul>
                        </div>
                        <!-- cart search -->
                    </nav> <!-- nav -->

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <!--===== NAVBAR ENDS =====-->
</header>
