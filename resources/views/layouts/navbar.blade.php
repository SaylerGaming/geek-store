<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="assets/img/logo/logo.png" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>                                                
                            <ul id="navigation">  
                                <li><a href="/categories">shop</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                @guest
                                    <li><a href="/auth">auth</a></li>
                                @endguest
                                @auth
                                    <li><a href="blog.html">{{ Auth::user()->name }}</a>
                                        <ul class="submenu">
                                            <li><a href="/favorites">Favorites</a></li>
                                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                                        </ul>
                                    </li>
                                @endauth
                                <li><a href="/orders">orders</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            @Auth
                            <li>
                                <a href="/cart"><span class="flaticon-shopping-cart"></span></a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>