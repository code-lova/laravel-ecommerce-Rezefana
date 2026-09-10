@extends('layouts.frontpage')


@section('title',"$setting->title")
@section('meta_description',"$setting->site_desc")
@section('meta_keyword',"$setting->keywords")
@section('website_name',"$setting->site_name")

@section('content')

<style>
    /* Star Rating */
        .checked{
            color: rgb(255, 183, 0);
        }
</style>

    <main class="main">
        <div class="intro-section">
            <div class="intro-section-slider">
                <div class="container">
                    @php
                        $slider = App\Models\HomePageSlider::find(1);
                    @endphp
                    @if ($slider)
                    <div class="intro-slider-container slider-container-ratio mb-0">
                        <div class="intro-slider owl-carousel owl-simple owl-light" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "responsive": {
                                    "1200": {
                                        "nav": true,
                                        "dots": false
                                    }
                                }
                            }'>


                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{ asset('assets/images/demos/demo-9/slider/slide-1-480w.jpg') }}">
                                        <img src="{{ asset('uploads/slider/'.$slider->slider1_image) }}" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">{{ $slider->slider1_first_note }}</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title text-white">{{ $slider->slider1_second_note }} <br>{{ $slider->slider1_third_note }}</h1><!-- End .intro-title -->

                                    <div class="intro-text text-white">{{ $slider->slider1_fourth_note }}</div><!-- End .intro-text -->

                                    <a href="{{ url('/collection/products/ladies-sport-wears') }}" class="btn btn-primary">
                                        <span>{{ $slider->slider1_fifth_note }}</span>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{ asset('assets/images/demos/demo-9/slider/slide-2-480w.jpg') }}">
                                        <img src="{{ asset('uploads/slider/'.$slider->slider2_image) }}" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">{{ $slider->slider2_first_note }}</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title text-white">{{ $slider->slider2_second_note }}<br>{{ $slider->slider2_third_note }}</h1><!-- End .intro-title -->

                                    <a href="{{ url('/collections/products/mens-clothing') }}" class="btn btn-primary">
                                        <span>{{ $slider->slider2_fourth_note }}</span>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <source media="(max-width: 480px)" srcset="{{ asset('assets/images/demos/demo-9/slider/slide-3-480w.jpg') }}">
                                        <img src="{{ asset('uploads/slider/'.$slider->slider3_image) }}" alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                                <div class="intro-content">
                                    <h3 class="intro-subtitle">{{ $slider->slider3_first_note }}</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title text-white">{{ $slider->slider3_second_note }}</h1><!-- End .intro-title -->

                                    <div class="intro-text text-white">{{ $slider->slider3_third_note }} {{ $currency->name }}</div><!-- End .intro-text -->

                                    <a href="{{ url('/collections/products/men-shoes') }}" class="btn btn-primary">
                                        <span>{{ $slider->slider3_fourth_note }}</span>
                                    </a>
                                </div><!-- End .intro-content -->
                            </div><!-- End .intro-slide -->
                        </div><!-- End .intro-slider owl-carousel owl-simple -->

                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                    @endif
                </div><!-- End .container -->
            </div><!-- End .intro-section-slider -->

            <div class="icon-boxes-container pt-0 pb-0">
                <div class="container">
                    <div class="owl-carousel owl-simple" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "autoplay": true,
                            "autoplayTimeout": 8000,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                },
                                "1200": {
                                    "items":4
                                }
                            }
                        }'>
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-rocket"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $cta->cta_heading_1 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $cta->cta_sub_1 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->

                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $cta->cta_heading_2 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $cta->cta_sub_2 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->

                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $cta->cta_heading_3 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $cta->cta_sub_3 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->

                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">{{ $cta->cta_heading_4 }}</h3><!-- End .icon-box-title -->
                                    <p>{{ $cta->cta_sub_4 }}</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
        </div><!-- End .intro-section -->

        <div class="pt-3 pb-3">
            <div class="container">
                <div class="banner-group">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="banner banner-overlay banner-lg">
                                <a href="">
                                    <img src="{{ asset('uploads/banner/'.$banner->banner1_image) }}" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-bottom">
                                    <h4 class="banner-subtitle text-white"><a href="#">{{ $banner->banner1_first_note }}</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">{{ $banner->banner1_second_note }}</a></h3><!-- End .banner-title -->
                                    <div class="banner-text text-white"><a href="#">{{ $banner->banner1_third_note }} {{ $currency->name }}</a></div><!-- End .banner-text -->
                                    <a href="{{ url('/collections/products/ladies-clothings') }}" class="btn btn-outline-white banner-link">{{ $banner->banner1_fourth_note }}</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-sm-6 col-lg-4 order-lg-last">
                            <div class="banner banner-overlay banner-lg">
                                <a href="#">
                                    <img src="{{ asset('uploads/banner/'.$banner->banner4_image) }}" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-top">
                                    <h4 class="banner-subtitle text-white"><a href="#">{{ $banner->banner4_first_note }}</a></h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">{{ $banner->banner4_second_note }}<br>{{ $banner->banner4_third_note }}</a></h3><!-- End .banner-title -->
                                    <a href="{{ url('/collection/products/ladies-sport-wears') }}" class="btn btn-outline-white banner-link">{{ $banner->banner4_fifth_note }}</a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-sm-6 col-lg-12">
                                    <div class="banner banner-overlay">
                                        <a href="#">
                                            <img src="{{ asset('uploads/banner/'.$banner->banner2_image) }}" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-white"><a href="#">{{ $banner->banner2_first_note }}</a></h4><!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#">{{ $banner->banner2_second_note }}<br>{{ $banner->banner2_third_note }}</a></h3><!-- End .banner-title -->
                                            <a href="{{ url('/collections/products/men-shoes') }}" class="btn btn-outline-white banner-link">{{ $banner->banner2_fourth_note }}</a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 col-lg-12 -->

                                <div class="col-sm-6 col-lg-12">
                                    <div class="banner banner-overlay">
                                        <a href="#">
                                            <img src="{{ asset('uploads/banner/'.$banner->banner3_image) }}" alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-white"><a href="#">{{ $banner->banner3_first_note }}</a></h4><!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#">{{ $banner->banner3_second_note }}</a></h3><!-- End .banner-title -->
                                            <a href="{{ url('/collection/products/winter-clothing') }}" class="btn btn-outline-white banner-link">{{ $banner->banner3_fourth_note }}</a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 col-lg-12 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div><!-- End .banner-group -->
                @if ($switcher->ads_1 ==  1)
                <!-- Ads section image -->
                <img src="{{ asset('uploads/ads/'.$adsImage->adv_1) }}" alt="advertise here">
                @endif
            </div><!-- End .container -->
        </div><!-- End .bg-lighter -->

        <div class="bg-lighter pt-6">
            <div class="container">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Trending Now</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="trending-women-link" data-toggle="tab" href="#trending-women-tab" role="tab" aria-controls="trending-women-tab" aria-selected="true">Women's Clothing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="trending-men-link" data-toggle="tab" href="#trending-men-tab" role="tab" aria-controls="trending-men-tab" aria-selected="false">Men's Clothing</a>
                            </li>
                        </ul>
                </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trending-women-tab" role="tabpanel" aria-labelledby="trending-women-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "dots": false
                                    }
                                }
                            }'>
                            @forelse ($trendingWomenClothing as $trending)
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    @if ($trending->ProductsImages->count() > 0)
                                    <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}">
                                        <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$trending->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                    </a>
                                    @endif
                                    <div class="product-action-vertical">
                                        <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}">{{ $trending->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{ $currency->symbol }}{{ $trending->selling_price }}
                                    </div><!-- End .product-price -->

                                    <div class="ratings-container">
                                        @php
                                            $rating = App\Models\Comment::where('product_id', $trending->id)->get();
                                            $ratingSum = App\Models\Comment::where('product_id', $trending->id)->sum('star_rating');
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
                                        <a href="#" class="active">
                                            <img src="{{ asset('uploads/products/'.$trending->ProductsImages[1]->image) }}" alt="{{ $trending->name }}">
                                        </a>


                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @empty
                            <div>
                                <center>
                                    <h4>No Available Trending Products Yet</h4>
                                </center>
                            </div>
                            @endforelse

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="trending-men-tab" role="tabpanel" aria-labelledby="trending-men-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                "nav": false,
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":4,
                                        "dots": false
                                    }
                                }
                            }'>
                            @forelse ($trendingMenClothing as $trending)
                            <div class="product product-7 text-center">
                                <figure class="product-media">
                                    @if ($trending->ProductsImages->count() > 0)
                                    <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}">
                                        <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$trending->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                    </a>
                                    @endif
                                    <div class="product-action-vertical">
                                        <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{ url('/collections/'.$trending->category->slug.'/'.$trending->slug) }}">{{ $trending->name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{ $currency->symbol }}{{ $trending->selling_price }}
                                    </div><!-- End .product-price -->

                                    <div class="ratings-container">
                                        @php
                                            $rating = App\Models\Comment::where('product_id', $trending->id)->get();
                                            $ratingSum = App\Models\Comment::where('product_id', $trending->id)->sum('star_rating');
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
                                        <a href="#" class="active">
                                            <img src="{{ asset('uploads/products/'.$trending->ProductsImages[1]->image) }}" alt="{{ $trending->name }}">
                                        </a>


                                    </div><!-- End .product-nav -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                            @empty
                            <div>
                                <center>
                                    <h4>No Available Trending Products Yet</h4>
                                </center>
                            </div>
                            @endforelse

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .container -->
        </div>

        <div class="container featured mt-4 pb-2">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Featured Footwear</h2><!-- End .title -->
                </div><!-- End .heading-left -->

            <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="featured-women-link" data-toggle="tab" href="#featured-women-tab" role="tab" aria-controls="featured-women-tab" aria-selected="true">Women's Shoes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="featured-men-link" data-toggle="tab" href="#featured-men-tab" role="tab" aria-controls="featured-men-tab" aria-selected="false">Men's Shoes</a>
                        </li>
                    </ul>
            </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="banner banner-overlay product-banner">
                        <a href="#">
                            <img src="{{ asset('assets/images/demos/demo-9/banners/banner-5.jpg') }}" alt="banner image">
                        </a>
                        <div class="banner-content">
                            <div class="banner-top">
                                <div class="banner-title text-white text-center">
                                    <i class="la la-star-o"></i><h3 class="text-white">Our Experts<br>Recommend</h3>
                                </div>
                            </div>
                            <div class="banner-bottom">
                                <div class="product-cat">
                                    <h4 class="text-white">On Sale</h4>
                                </div>
                                <div class="product-price">
                                    <h4 class="text-white">Women</h4>
                                </div>
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now</a>
                            </div>
                        </div>
                    </div><!-- End .banner banner-overlay -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-9">
                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="featured-women-tab" role="tabpanel" aria-labelledby="featured-women-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":3,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                                @forelse ($featuredWomenfootware as $footware)
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <span class="product-label label-sale">30% off</span>
                                        @if ($footware->ProductsImages->count() > 0)
                                        <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$footware->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$footware->ProductsImages[1]->image) }}" alt="Product image" class="product-image-hover">
                                        </a>
                                        @endif
                                        <div class="product-action-vertical">
                                            <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}">{{ $footware->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">Now {{ $currency->symbol }}{{ $footware->selling_price }}</span>
                                            <span class="old-price">Was {{ $currency->symbol }}{{ $footware->original_price }}</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            @php
                                                $rating = App\Models\Comment::where('product_id', $footware->id)->get();
                                                $ratingSum = App\Models\Comment::where('product_id', $footware->id)->sum('star_rating');
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
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @empty
                                <div>
                                    <center>
                                        <h4>
                                            No Product Available yet
                                        </h4>
                                    </center>
                                </div>
                                @endforelse

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="featured-men-tab" role="tabpanel" aria-labelledby="featured-men-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":1
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":3,
                                            "dots": false
                                        }
                                    }
                                }'>
                                @forelse ($featuredMenfootware as $footware)
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <span class="product-label label-sale">30% off</span>
                                        @if ($footware->ProductsImages->count() > 0)
                                        <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$footware->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$footware->ProductsImages[1]->image) }}" alt="Product image" class="product-image-hover">
                                        </a>
                                        @endif
                                        <div class="product-action-vertical">
                                            <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{ url('/collections/'.$footware->category->slug.'/'.$footware->slug) }}">{{ $footware->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">Now {{ $currency->symbol }}{{ $footware->selling_price }}</span>
                                            <span class="old-price">Was {{ $currency->symbol }}{{ $footware->original_price }}</span>
                                        </div><!-- End .product-price -->

                                        <div class="ratings-container">
                                                @php
                                                    $rating = App\Models\Comment::where('product_id', $footware->id)->get();
                                                    $ratingSum = App\Models\Comment::where('product_id', $footware->id)->sum('star_rating');
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
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @empty
                                <div>
                                    <center>
                                        <h4>
                                            No Product Available yet
                                        </h4>
                                    </center>
                                </div>
                                @endforelse
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
        <!-- Ads section image -->
        @if ($switcher->ads_2 ==  1)
        <div class="container">
            <img src="{{ asset('uploads/ads/'.$adsImage->adv_2) }}" alt="advertise here">
            <hr class="mt-3 mb-4">
        </div><!-- End .container -->
        @endif

        <div class="container pb-2">
            <div class="heading heading-flex mb-3">
                <div class="heading-left">
                    <h2 class="title">Bags & Accessories</h2><!-- End .title -->
                </div><!-- End .heading-left -->

            <div class="heading-right">
                    <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="bags-women-link" data-toggle="tab" href="#bags-women-tab" role="tab" aria-controls="bags-women-tab" aria-selected="true">Women's</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="bags-men-link" data-toggle="tab" href="#bags-men-tab" role="tab" aria-controls="bags-men-tab" aria-selected="false">Men's</a>
                        </li>
                    </ul>
            </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="banner banner-overlay product-banner">
                        <a href="#">
                            <img src="{{ asset('assets/images/demos/demo-9/banners/banner-6.jpg') }}" alt="banner image">
                        </a>
                        <div class="banner-content">
                            <div class="banner-top">
                                <div class="banner-title text-white text-center">
                                    <i class="la la-star-o"></i><h3 class="text-white">Our Experts<br>Recommend</h3>
                                </div>
                            </div>
                            <div class="banner-bottom">
                                <div class="product-cat">
                                    <h4 class="text-white">Sale</h4>
                                </div>
                                <div class="product-price">
                                    <h4 class="text-white">$129.99</h4>
                                </div>
                                <div class="product-txt">
                                    <p class="text-white">Cross Body Bag</p>
                                </div>
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now</a>
                            </div>
                        </div>
                    </div><!-- End .banner banner-overlay -->
                </div><!-- End .col-lg-3 -->

                <div class="col-lg-9">
                    <div class="tab-content tab-content-carousel">
                        <div class="tab-pane p-0 fade show active" id="bags-women-tab" role="tabpanel" aria-labelledby="bags-women-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "1200": {
                                            "items":3,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                                @forelse ($WomenBags as $bags)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if ($bags->ProductsImages->count() > 0)
                                        <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$bags->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$bags->ProductsImages[1]->image) }}" alt="Product image" class="product-image-hover">
                                        </a>
                                        @endif


                                        <div class="product-action-vertical">
                                            <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}">{{ $bags->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $currency->symbol }}{{ $bags->selling_price }}
                                        </div><!-- End .product-price -->

                                        <div class="ratings-container">
                                                @php
                                                    $rating = App\Models\Comment::where('product_id', $bags->id)->get();
                                                    $ratingSum = App\Models\Comment::where('product_id', $bags->id)->sum('star_rating');
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
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @empty
                                <div>
                                    <center>
                                        <h4>
                                            No Product Available yet
                                        </h4>
                                    </center>
                                </div>
                                @endforelse

                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane p-0 fade" id="bags-men-tab" role="tabpanel" aria-labelledby="bags-men-link">
                            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                                data-owl-options='{
                                    "nav": false,
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "992": {
                                            "items":4
                                        },
                                        "1200": {
                                            "items":4,
                                            "nav": true,
                                            "dots": false
                                        }
                                    }
                                }'>
                                @forelse ($MenBags as $bags)
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        @if ($bags->ProductsImages->count() > 0)
                                        <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$bags->ProductsImages[0]->image) }}" alt="Product image" class="product-image">
                                            <img style="width: 277px; height:377px;" src="{{ asset('uploads/products/'.$bags->ProductsImages[1]->image) }}" alt="Product image" class="product-image-hover">
                                        </a>
                                        @endif


                                        <div class="product-action-vertical">
                                            <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <h3 class="product-title"><a href="{{ url('/collections/'.$bags->category->slug.'/'.$bags->slug) }}">{{ $bags->name }}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            {{ $currency->symbol }}{{ $bags->selling_price }}
                                        </div><!-- End .product-price -->

                                        <!-- Rating and container and review -->
                                        <div class="ratings-container">
                                                @php
                                                    $rating = App\Models\Comment::where('product_id', $bags->id)->get();
                                                    $ratingSum = App\Models\Comment::where('product_id', $bags->id)->sum('star_rating');
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
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                                @empty
                                <div>
                                    <center>
                                        <h4>
                                            No Product Available yet
                                        </h4>
                                    </center>
                                </div>
                                @endforelse
                            </div><!-- End .owl-carousel -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div>
            </div>
        </div><!-- End .container -->

        <div class="container">
            <hr class="mt-3 mt-xl-1 mb-0">
        </div><!-- End .container -->

        <div class="cta pt-4 pt-lg-6 pb-5 pb-lg-7 mb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-8 col-lg-6">
                        <div class="cta-heading text-center">
                            <h3 class="cta-title">Sign Up for updates from Molla</h3><!-- End .cta-title -->
                            <p class="cta-desc">and receive <span class="font-weight-normal">$20 coupon</span> for first shopping</p><!-- End .cta-desc -->
                        </div><!-- End .text-center -->

                        <form action="#">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" title="Sing up"><i class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- .End .input-group -->
                        </form>
                    </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->

        @if ($switcher->ads_3 ==  1)
        <div class="container">
            <img src="{{ asset('uploads/ads/'.$adsImage->adv_3) }}" alt="advertise here">
            <hr class="mt-3 mb-4">
        </div><!-- End .container -->
        @endif

    </main><!-- End .main -->

@endsection
