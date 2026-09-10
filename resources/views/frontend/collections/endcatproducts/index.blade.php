@extends('layouts.frontpage')

@section('title',"$setting->title",)
@section('meta_title',"$endcategory->meta_title")
@section('meta_description',"$endcategory->meta_description")
@section('meta_keyword',"$endcategory->meta_keyword")
@section('website_name',"$setting->site_name")

@section('content')
<style>
    /* Star Rating */
        .checked{
            color: rgb(255, 183, 0);
        }
</style>
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{ asset('assets/images/page-header-bg.jpg') }})">
            <div class="container">
                <h1 class="page-title">{{ $endcategory->category->name }} - {{ $endcategory->name }}<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> All {{ $endcategory->category->name }} {{ $endcategory->name }}</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">

                                <div class="toolbox-info">
                                    Showing <span>{{ $productcount }}</span> Products
                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Sort by:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control">
                                            <option value="popularity" selected="selected">Most Popular</option>
                                            <option value="rating">Most Rated</option>
                                            <option value="date">Date</option>
                                        </select>
                                    </div>
                                </div><!-- End .toolbox-sort -->
                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->


                        <div class="products mb-3">
                            <div class="row justify-content-center">
                                @forelse ($productItem as $fashion)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            @if ($fashion->quantity < 0)
                                                <span class="product-label label-out">Out of Stock</span>
                                            @elseif ($fashion->trending == 1)
                                                <span class="product-label label-top">Top</span>
                                            @endif
                                            @if ($fashion->ProductsImages->count() > 0)
                                            <a href="{{ url('/collections/'.$fashion->category->slug.'/'.$fashion->slug) }}">
                                                <img style="width: 277px; height:300px;" src="{{ asset('uploads/products/'.$fashion->ProductsImages[0]->image) }}" alt="{{ $fashion->name }}" class="product-image">
                                            </a>
                                            @endif

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->

                                            <div class="product-action">
                                                <a href="{{ url('/collections/'.$fashion->category->slug.'/'.$fashion->slug) }}" class="btn-product btn-cart"><span>View Product</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#">{{ $fashion->category->name }}</a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="{{ url('/collections/'.$fashion->category->slug.'/'.$fashion->slug) }}">{{ $fashion->name }}</a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                                {{ $currency->symbol }}{{ $fashion->selling_price }}
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                @php
                                                    $rating = App\Models\Comment::where('product_id', $fashion->id)->get();
                                                    $ratingSum = App\Models\Comment::where('product_id', $fashion->id)->sum('star_rating');
                                                        if($rating->count() > 0){
                                                            $ratingValue = $ratingSum/$rating->count();
                                                        }
                                                        else{
                                                            $ratingValue = 0;
                                                        }
                                                        $rateNum = number_format($ratingValue);
                                                @endphp
                                                @if ($rating->count() > 0)

                                                    @for($i =1; $i<= $rateNum; $i++)
                                                        <i class="icon-star-o checked"></i>
                                                    @endfor
                                                    @for($j = $rateNum+1; $j <= 5; $j++ )
                                                        <i class="icon-star-o"></i>
                                                    @endfor
                                                    <span class="ratings-text"> ( {{ $rating->count() }} Reviews )</span>
                                                @else
                                                @for($j = $rateNum+1; $j <= 5; $j++ )
                                                    <i class="icon-star-o"></i>
                                                @endfor
                                                    <span class="ratings-text"> ( 0 Reviews )</span>
                                                @endif
                                            </div><!-- End .rating-container -->

                                            <div class="product-nav product-nav-thumbs">
                                                <a href="{{ url('/collections/'.$fashion->category->slug.'/'.$fashion->slug) }}" class="active">
                                                    <img src="{{ asset('uploads/products/'.$fashion->ProductsImages[1]->image) }}" alt="product desc">
                                                </a>
                                            </div><!-- End .product-nav -->

                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                @empty
                                <div>
                                    <br>
                                    <br>
                                    <h5>No products available yet</h5>
                                </div>
                                @endforelse
                            </div>
                        </div>

                    </div><!-- End .col-lg-9 -->

                    <!-- Filter aside bar-->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="#" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <form action="{{ URL::current() }}" method="GET">
                                @csrf

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                        Brand
                                    </a>
                                </h3><!-- End .widget-title -->

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @foreach ($endcategory->category->brands as $brandItems)
                                            @php
                                                $checked = [];
                                                if(isset($_GET['filterbrand'])){

                                                    $checked = $_GET['filterbrand'];
                                                }
                                            @endphp
                                            <label class="d-block">
                                                <input type="checkbox" name="filterbrand[]" value="{{ $brandItems->name }}"
                                                @if(in_array($brandItems->name, $checked)) checked @endif />
                                                {{  $brandItems->name }}
                                            </label>
                                            @endforeach
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <button type="submit" class="btn btn-primary">Filter Product</button>
                            </form>


                        </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->

                {{-- <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{ $products->links() }}
                        </ul>
                    </nav> --}}

            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->



@endsection
