<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{ url('admin/dashboard') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
                BroadCast
                <span class="right badge badge-danger">New</span>
            </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
                Categories
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Main Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/sub-category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/end-category') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>End Category</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
                Market
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/market/products') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Products</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/reviews') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comments/Ratings</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/wishlist') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Wishlists</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Sales/Orders
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/products-orders') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Orders</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/carts') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cart</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Refund Orders</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
                Brands
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/brands') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product Brands</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
                Customers
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/customers') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Customers</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
                Market Extras
                <i class="fas fa-angle-left right"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('admin/currency') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Currency</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/colors') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Colors</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('admin/sizes') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sizes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/shipping-cost') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Cost</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/shipping-cost-all') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Shipping Cost All</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/payment-method') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Payment Methods</p>
                </a>
            </li>
            </ul>
        </li>
        <li class="nav-header">SITE SETTINGS</li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Banner/Slider/Ads
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('admin/top-slider-settings') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/banner-settings') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/ads-settings') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ads Settings</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('admin/logo-favicon') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                    Logo/Favicon Setting
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-flag"></i>
                <p>
                    Site Settings
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/site-setting') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/on-ff-setting') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>On/Off Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/other-settings') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Other Settings</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    Mailbox
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sent Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Subscribers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sent Mails</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Web Pages
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/about-us') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About US</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/contact_us') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Contact Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/faq') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/how-to-shop') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>How to Shop</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/payment-method') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payment Methods</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/money-back-guarantee') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Money Back!</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/returns') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Returns</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/shipping') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Shipping</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/terms_condition') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Terms and conditions</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/privacy_policy') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Privacy Policy</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                    Monthly Report
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/search/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Search</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/search/enhanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Enhanced</p>
                    </a>
                </li>
                </ul>
            </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
