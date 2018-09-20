<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
            </div>

            <span class="topbar-child1">
                Free shipping for standard order over 100 Ks
            </span>

            <div class="topbar-child2">
                <span class="topbar-email">
                    Nyo Lay Htike
                </span>

                <div class="topbar-language rs1-select2">
                    
                </div>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo">
                <img src="{{url('frontend/images/icons/logo_bk.png')}}" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{url('/about')}}">About</a>
                        </li>

                        <li>
                            <a href="{{url('/contact')}}">Contact</a>
                        </li>
                        <li>
                            <a href="#">Delivery Price</a>
                            <ul class="sub_menu">
                                <li><a href="#">Sanchaung - 1000</a></li>
                                <li><a href="#">KyiMyintDine - 1500</a></li>
                                <li><a href="#">Alone - 1800</a></li>
                                <li><a href="#">Mayangone - 2000</a></li>
                                <li><a href="#">Hlaing - 2500</a></li>
                                <li><a href="#">Insein - 3500</a></li>
                                <li><a href="#">Latha - 2500</a></li>
                                <li><a href="#">Kyaukdadar - 2800</a></li>
                                <li><a href="#">BotaHtaung - 3000</a></li>
                                <li><a href="#">Bahan - 3500</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                @guest
                    <ul class="main_menu">
                        <li>
                            <a href="{{url('login')}}">Login</a>
                            <ul class="sub_menu">
                                
                                <li><a href="{{url('register')}}">Register</a></li>
                            </ul>
                        </li>
                    </ul>       
                @else
                    <li class="dropdown">
                        <a href="" class="header-wrapicon1 dis-block">
                            <img src="{{url('frontend/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                        </a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                
                

                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <a href="{{ url('/cart') }}">
                        <img src="{{url('frontend/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        @if(Cart::content()) 
                            <span class="header-icons-noti">{{ Cart::count() }}</span>  
                        @else
                            <span class="header-icons-noti">0</span>    
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="{{ url('/') }}" class="logo-mobile">
            <img src="{{url('frontend/images/icons/logo_bk.png')}}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <a href="{{ url('/cart') }}">
                        <img src="{{url('frontend/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        @if(Cart::content()) 
                            <span class="header-icons-noti">{{ Cart::count() }}</span>  
                        @else
                            <span class="header-icons-noti">0</span>    
                        @endif
                    </a>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{url('frontend/images/item-cart-01.jpg')}}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $19.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{url('frontend/images/item-cart-02.jpg')}}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $39.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="{{url('frontend/images/item-cart-03.jpg')}}" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $17.00
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <span class="topbar-child1">
                        Free shipping for standard order over 100
                    </span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
                        <span class="topbar-email">
                            Nyo Lay Htike
                        </span>

                        <div class="topbar-language rs1-select2">
                            
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="{{url('/')}}">Home</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="{{url('/about')}}">About</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="{{url('/contact')}}">Contact</a>
                </li>

                @guest
                    <li class="item-menu-mobile">
                        <a href="{{url('/login')}}">Login</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="" class="header-wrapicon1 dis-block">
                            <img src="{{url('frontend/images/icons/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                        </a>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest


                <li class="item-menu-mobile">
                    <a href="#">Delivery Price</a>
                    <ul class="sub-menu">
                        <li><a href="#">Sanchaung - 1000</a></li>
                        <li><a href="#">KyiMyintDine - 1500</a></li>
                        <li><a href="#">Alone - 1800</a></li>
                        <li><a href="#">Mayangone - 2000</a></li>
                        <li><a href="#">Hlaing - 2500</a></li>
                        <li><a href="#">Insein - 3500</a></li>
                        <li><a href="#">Latha - 2500</a></li>
                        <li><a href="#">Kyaukdadar - 2800</a></li>
                        <li><a href="#">BotaHtaung - 3000</a></li>
                        <li><a href="#">Bahan - 3500</a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>
            </ul>
        </nav>
    </div>
</header>