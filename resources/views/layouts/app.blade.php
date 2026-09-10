<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="robots" content="all,follow">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">

     <!-- Sweet Alert style -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!--
        *** TOPBAR ***
        _________________________________________________________
        -->
        @if(Auth::check())
        <div id="top">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
              <div class="col-lg-6 text-center text-lg-right">
                <ul class="menu list-inline mb-0">
                  <li class="list-inline-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                  <li class="list-inline-item"><a href="register.html">{{ Auth::user()->name }}</a></li>
                  <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                  <li class="list-inline-item"><a href="#">Recently viewed</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
        @else
        <div id="top">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
                <div class="col-lg-6 text-center text-lg-right">
                  <ul class="menu list-inline mb-0">
                    <li class="list-inline-item"><a href="{{ route('login') }}">Login</a></li>
                    <li class="list-inline-item"><a href="{{ route('register') }}">Register</a></li>
                    <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                    <li class="list-inline-item"><a href="#">Recently viewed</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          @endif
        <nav class="navbar navbar-expand-lg">
          <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logo.png" alt="Obaju logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
            <div class="navbar-buttons">
              <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
              <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
            </div>
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{ '/' }}" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Men<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Clothing</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Shoes</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Accessories</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Featured</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                          <h5>Looks and trends</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Ladies<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Clothing</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Shoes</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Accessories</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          </ul>
                          <h5>Looks and trends</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <div class="banner"><a href="#"><img src="img/banner.jpg" alt="" class="img img-fluid"></a></div>
                          <div class="banner"><a href="#"><img src="img/banner2.jpg" alt="" class="img img-fluid"></a></div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Template<b class="caret"></b></a>
                  <ul class="dropdown-menu megamenu">
                    <li>
                      <div class="row">
                        <div class="col-md-6 col-lg-3">
                          <h5>Shop</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="index.html" class="nav-link">Homepage</a></li>
                            <li class="nav-item"><a href="category.html" class="nav-link">Category - sidebar left</a></li>
                            <li class="nav-item"><a href="category-right.html" class="nav-link">Category - sidebar right</a></li>
                            <li class="nav-item"><a href="category-full.html" class="nav-link">Category - full width</a></li>
                            <li class="nav-item"><a href="detail.html" class="nav-link">Product detail</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>User</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="register.html" class="nav-link">Register / login</a></li>
                            <li class="nav-item"><a href="customer-orders.html" class="nav-link">Orders history</a></li>
                            <li class="nav-item"><a href="customer-order.html" class="nav-link">Order history detail</a></li>
                            <li class="nav-item"><a href="customer-wishlist.html" class="nav-link">Wishlist</a></li>
                            <li class="nav-item"><a href="customer-account.html" class="nav-link">Customer account / change password</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Order process</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="basket.html" class="nav-link">Shopping cart</a></li>
                            <li class="nav-item"><a href="checkout1.html" class="nav-link">Checkout - step 1</a></li>
                            <li class="nav-item"><a href="checkout2.html" class="nav-link">Checkout - step 2</a></li>
                            <li class="nav-item"><a href="checkout3.html" class="nav-link">Checkout - step 3</a></li>
                            <li class="nav-item"><a href="checkout4.html" class="nav-link">Checkout - step 4</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                          <h5>Pages and blog</h5>
                          <ul class="list-unstyled mb-3">
                            <li class="nav-item"><a href="blog.html" class="nav-link">Blog listing</a></li>
                            <li class="nav-item"><a href="post.html" class="nav-link">Blog Post</a></li>
                            <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li>
                            <li class="nav-item"><a href="text.html" class="nav-link">Text page</a></li>
                            <li class="nav-item"><a href="text-right.html" class="nav-link">Text page - right sidebar</a></li>
                            <li class="nav-item"><a href="404.html" class="nav-link">404 page</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="navbar-buttons d-flex justify-content-end">
                <!-- /.nav-collapse-->
                <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>3 items in cart</span></a></div>
              </div>
            </div>
          </div>
        </nav>

        <div id="search" class="collapse">
          <div class="container">
            <form role="search" class="ml-auto">
              <div class="input-group">
                <input type="text" placeholder="Search" class="form-control">
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </header>

    @yield('content')
    @include('layouts.inc.frontend-footer')
    @include('layouts.inc.frontend-copyright')

    <!-- JavaScript files-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js') }}"></script>
    <script src="{{ asset('assets/js/front.js') }}"></script>

    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true
        }
              toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true

        }
              toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true

        }
              toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true
        }
              toastr.warning("{{ session('warning') }}");
        @endif
  </script>


</body>
</html>
