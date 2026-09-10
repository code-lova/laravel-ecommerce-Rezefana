<header class="header header-6">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <ul class="top-menu top-link-menu d-none d-md-block">
                    @php
                        $setting = App\Models\SiteSettings::find(1);
                        $currency = App\Models\Currency::where('status', '1')->first();
                    @endphp
                    @if ($setting)
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: {{ $setting->mobile }}</a></li>
                        </ul>
                    </li>
                    @endif
                </ul><!-- End .top-menu -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="social-icons social-icons-color">
                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon social-instagram" title="Pinterest" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon social-pinterest" title="Instagram" target="_blank"><i class="icon-pinterest-p"></i></a>
                </div><!-- End .soial-icons -->

                @if (Auth::check())
                    <!-- Start to check if user is auth -->
                    <ul class="top-menu top-link-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li>
                                    <a href="{{ route('user.profile') }}"><i class="icon-user"></i>{{ Auth::user()->name }}</a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                    <!-- End to check if user is auth -->
                @else
                    <!-- Start to check if user is auth -->
                    <ul class="top-menu top-link-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                    <!-- End to check if user is auth -->
                @endif


                @if (Auth::check())
                    <!-- Start to check if user is auth -->
                <div class="header-dropdown">
                    <a href="{{ route('user.profile') }}">Account</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                            <li><a href="{{ route('user.profile') }}">Settings</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropdown -->
                @endif

            </div><!-- End .header-right -->
        </div>
    </div>

    <!-- Start to check if user is auth -->
    @if (Auth::check())
        <div class="header-middle">
            <div class="container">
                <div class="header-left">
                    <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="{{ url('/collection/search') }}" method="get">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="query" class="sr-only">Search</label>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                <input type="text" class="form-control" name="query" placeholder="Search product ..." required>
                            </div><!-- End .header-search-wrapper -->
                        </form>
                    </div><!-- End .header-search -->
                </div>
                <div class="header-center">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('uploads/logofav/'.$logo->logo) }}" alt="Re-zefana Logo" width="230" height="100">
                    </a>
                </div><!-- End .header-left -->

                <div class="header-right">
                    @php
                        $wishlistCount = App\Models\Wishlist::where('user_id', Auth::user()->id)->count();

                    @endphp
                    <a href="{{ url('/app/collections/wishlist') }}" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">{{ $wishlistCount }}</span>
                        <span class="wishlist-txt">My Wishlist</span>
                    </a>
                    @php
                        $itemCount = App\Models\Cart::where('user_id', Auth::user()->id)->count();
                        $itemPrice = App\Models\Cart::where('user_id', Auth::user()->id)->sum('price');
                        $itemTotalPrice = App\Models\Cart::where('user_id', Auth::user()->id)->sum('total_price');
                        $products = App\Models\Cart::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

                    @endphp


                    <div class="dropdown cart-dropdown" id="cart-dropdowns">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $itemCount }}</span>
                            <span class="cart-txt">{{ $currency->symbol }}@php echo number_format($itemTotalPrice)@endphp.00</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">

                                @forelse ($products as $items)
                                <div class="product">
                                    <div class="product-cart-details">
                                        <h4 class="product-title">
                                            <a href="{{ url('/collections/'.$items->item_slug.'/'.$items->item_name) }}">{{ $items->product->name }}</a>
                                        </h4>
                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">{{ $items->quantity }}</span>
                                            x {{ $currency->symbol }}@php echo number_format($items->price) @endphp.00
                                        </span>
                                    </div><!-- End .product-cart-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('uploads/products/'.$items->ProductsImages[0]->image) }}" alt="{{ $items->product->name }}">
                                        </a>
                                    </figure>
                                </div><!-- End .product -->
                                @empty
                                    <b class="text-success">Your cart is currently empty</b>
                                @endforelse
                            </div><!-- End .cart-product -->


                            <div class="dropdown-cart-total">
                                <span>Total</span>
                                <span class="cart-total-price">{{ $currency->symbol }}@php echo number_format($itemTotalPrice)@endphp.00</span>
                            </div><!-- End .dropdown-cart-total -->

                            @if ($itemCount != Null)
                                <div class="dropdown-cart-action">
                                    <a href="{{ url('app/collections/view-cart') }}" class="btn btn-outline-primary-2">View Cart</a>
                                    <a href="{{ route('checkout.item') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            @endif

                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->

                </div>
            </div><!-- End .container -->
        </div><!-- End .header-middle -->
    @else
    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{ url('/collection/search') }}" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="query" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="text" class="form-control" name="query" id="q" placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
            <div class="header-center">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('uploads/logofav/'.$logo->logo) }}" alt="Re-zefana Logo" width="230" height="100">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">
                <a href="{{ route('login') }}" class="wishlist-link">
                    <i class="icon-heart-o"></i>
                    <span class="wishlist-txt">Wishlist</span>
                </a>

                <div class="dropdown cart-dropdown">
                    <a href="{{ route('login') }}" class="dropdown-toggle" role="button">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-txt">Cart</span>
                    </a>

                </div><!-- End .cart-dropdown -->
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
    @endif
    <!-- Stop to check if user is auth -->




    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        @foreach ($category as $categories)
                            <li>
                                <a href="#" class="sf-with-ul">{{ $categories->name }}</a>
                                <ul>
                                    @foreach ($categories->Subcategories as $subcat)
                                        <li>
                                            <a href="{{ url('/collections/products/'.$subcat->slug) }}" class="sf-with-ul">{{ $subcat->name }}</a>
                                            <ul>
                                                @foreach ($subcat->Endcategories as $endcat)
                                                    <li><a href="{{ url('/collection/products/'.$endcat->slug) }}">{{ $endcat->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <li>
                            <a href="blog.html">New Arrivals</a>
                        </li>
                        <li>
                            <a href="blog.html">About Us</a>
                        </li>
                        <li>
                            <a href="blog.html">Contact Us</a>
                        </li>

                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
            </div><!-- End .header-left -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Delivery Up to 10% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
