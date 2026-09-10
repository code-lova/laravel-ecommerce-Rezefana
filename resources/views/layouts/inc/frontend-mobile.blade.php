<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
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
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->
