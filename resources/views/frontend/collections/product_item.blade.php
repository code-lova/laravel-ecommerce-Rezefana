@extends('layouts.frontpage')

@section('title',"$setting->title",)
@section('meta_title',"$category_data->meta_title")
@section('meta_description',"$category_data->meta_description")
@section('meta_keyword',"$category_data->meta_keyword")
@section('website_name',"$setting->site_name")

@section('content')

<style>
    /* Star Rating */
        .checked{
            color: rgb(255, 183, 0);
        }
</style>


<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('') }}">{{ $productItem->category->name }} Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Centered</li>
            </ol>


        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ asset('uploads/products/'.$productItem->ProductsImages[0]->image) }}" alt="{{ $productItem->name }}">
                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @if ($productItem->ProductsImages->count() > 0)
                                        @foreach ($productItem->ProductsImages as $pImages)

                                        <a class="product-gallery-item" href="#" data-image="{{ asset('uploads/products/'.$pImages->image) }}">
                                            <img src="{{ asset('uploads/products/'.$pImages->image) }}" alt="{{ $productItem->name }}">
                                        </a>
                                        @endforeach
                                    @endif

                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details product-details-centered">
                            <h1 class="product-title">{{ $productItem->name }}</h1><!-- End .product-title -->

                            @php $rateNum = number_format($ratingValue) @endphp
                            <div class="ratings-container" id="starate">

                                @for($i =1; $i<= $rateNum; $i++)
                                    <i class="icon-star-o checked"></i>
                                @endfor
                                @for($j = $rateNum+1; $j <= 5; $j++ )
                                    <i class="icon-star-o"></i>
                                @endfor

                                @if ($ratingCount->count() > 0)
                                    <a class="ratings-text" href="#" id="review-link">
                                        ( {{ $ratingCount->count() }}  Ratings )
                                    </a>
                                @else
                                    <a class="ratings-text" href="#" id="review-link">
                                        No Ratings Yet
                                    </a>
                                @endif
                            </div><!-- End .rating-container -->

                            <div class="price">
                                <s>{{ $currency->symbol }}@php echo number_format($productItem->original_price) @endphp.00</s>
                            </div><!-- End .product-price -->

                            <div class="product-price">
                                {{ $currency->symbol }}@php echo number_format($productItem->selling_price) @endphp.00
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{ $productItem->short_description }}.</p>
                            </div><!-- End .product-content -->

                                <form action="{{ url('app/collection/store-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id" value="{{ $productItem->id }}" >
                                    <input type="hidden" name="price" value="{{ $productItem->selling_price }}" >
                                    <input type="hidden" name="brand" value="{{ $productItem->brand }}">
                                    <input type="hidden" name="item_slug" value="{{ $productItem->category->slug }}">
                                    <input type="hidden" name="item_name" value="{{ $productItem->slug }}">


                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size_id" class="form-control">
                                                <option value="" selected="selected">Select a Size</option>
                                                @forelse ($size as $sizes)
                                                    <option value="{{ $sizes->product_size_id }}">{{ $sizes->psizeName->size_name }}</option>
                                                @empty
                                                    <option value="">No size</option>
                                                @endforelse
                                            </select>
                                        </div><!-- End .select-custom -->
                                        @error('size_id')
                                            <script>
                                                alert('{{ $message }}')
                                            </script>
                                        @enderror


                                        <label for="size">Color:</label>
                                        <div class="select-custom">
                                            <select name="color_id" class="form-control">
                                                <option value="" selected="selected">Pick a color</option>
                                                @forelse ($color as $colors)
                                                    <option value="{{ $colors->product_color_id }}">{{ $colors->pcolorName->color_name }}</option>
                                                @empty
                                                    <option value="">No Color</option>
                                                @endforelse
                                            </select>
                                        </div><!-- End .select-custom -->
                                        @error('color_id')
                                            <script>
                                                alert('{{ $message }}')
                                            </script>
                                        @enderror
                                    </div><!-- End .details-filter-row -->


                                    <div class="product-details-action">
                                        <div class="details-action-col">
                                            <div class="product-details-quantity">
                                                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                            </div><!-- End .product-details-quantity -->

                                            <button type="submit" class="btn-product btn-cart">Add to cart</button>
                                        </div><!-- End .details-action-col -->
                                </form>

                                        <div class="details-action-wrapper">
                                        <input type="hidden" class="prodId" value="{{ $productItem->id }}">
                                        <input type="hidden" class="itmSlg" name="item_slug" value="{{ $productItem->category->slug }}">
                                        <input type="hidden" class="itmNe" name="item_name" value="{{ $productItem->slug }}">

                                            <button class="btn-product btn-wishlist wishlistBtn"  title="Wishlist"><span>Add to Wishlist</span></button>
                                        </div><!-- End .details-action-wrapper -->

                                    </div><!-- End .product-details-action -->



                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{ $productItem->category->name }}</a>,
                                    <a href="{{ url('/collections/products/'.$productItem->slug) }}">{{ $productItem->subcategory->name }}</a>,
                                    <a href="#">{{ $productItem->endcategory->name }}</a>
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                    </li>
                    <li class="nav-item" id="reviev">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ( {{ $totalReview }} )</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <h3>Product Information</h3>
                            <p>{!! $productItem->description !!}. </p>
                        </div><!-- End .product-desc-content -->


                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Delivery & returns</h3>
                            <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                            We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->

                    <!-- product review and comment starts here -->
                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div id="viewreview">
                                <h3> ( {{ $totalReview }} ) Reviews</h3>

                                @forelse ($allReviews as $reviews)
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            @if ($reviews->star_rating == 1 || $reviews->star_rating == 2)
                                                <b><a href="#">Its Ok.</a></b>
                                            @elseif ($reviews->star_rating == 3 || $reviews->star_rating == 4)
                                                <b><a href="#">Nice Product.</a></b>
                                            @elseif ($reviews->star_rating == 5)
                                                <b><a href="#">Perfect.</a></b>
                                            @endif


                                            <div class="ratings-container">
                                                <div class="ratings">
                                                        @if ($reviews->star_rating == 1)
                                                            <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                        @endif
                                                        @if ($reviews->star_rating == 2)
                                                            <div class="ratings-val" style="width: 40%;"></div><!-- End .ratings-val -->
                                                        @endif
                                                        @if ($reviews->star_rating == 3)
                                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                                        @endif

                                                        @if ($reviews->star_rating == 4)
                                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                        @endif

                                                        @if ($reviews->star_rating == 5)
                                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                        @endif

                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                                <span class="review-date">{{ Carbon\Carbon::parse($reviews->created_at)->diffForHumans() }}</span>
                                        </div><!-- End .col -->

                                        <div class="col">

                                                <h4>{{ $reviews->user->name }}</h4>

                                            <div class="review-content">
                                                <p>{{ $reviews->comment }}</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                @empty
                                    <div class="review-content">
                                        <p>No Product Reviews/Ratings Yet</p>
                                    </div><!-- End .review-content -->
                                @endforelse

                                @if ($existingReviews->count() > 0)
                                <p></p>
                                @elseif (Auth::check())
                                    <!-- BEGIN STAR RATING .review -->
                                    <form id="ProductReviewForm" method="post">
                                        <div id="resp"></div>
                                        <label for="review">Write Review:</label>
                                        <input type="hidden" name="product_id" value="{{ $productItem->id }}">
                                        <textarea name="comment" id="" cols="30" class="form-control" required rows="10" placeholder="Write a review on this product"></textarea>
                                        <label for="star_rating">Rate This product:</label>
                                        <input type="hidden" name="star_rating" required>
                                        <div class="rateyo" id="rating" data-rateyo-rating="0" data-rateyo-num-stars="5" data-rateyo-score="3"></div>
                                        <span class='result'>0</span>
                                        <br/>
                                        <br/>
                                        <div>
                                            <button type="submit" class="btn btn-outline-primary btn-rounded">Submit</button>
                                        </div>
                                    </form>
                                @endif
                                <!-- END STAR RATING.review -->
                            </div>
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                    <!-- product review and comment Ends here -->


                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
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
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @forelse ($relatedProduct as $related)
                <div class="product product-7 text-center">
                    <figure class="product-media">
                        @if ($related->quantity<0)
                        <span class="product-label label-out">Out of Stock</span>
                        @elseif ($related->trending == 1)
                        <span class="product-label label-new">Trending</span>
                        @endif
                        <a href="{{ url('/collections/'.$related->category->slug.'/'.$related->slug) }}">
                            <img style="width: 277px; height:300px;" src="{{ asset('uploads/products/'.$related->ProductsImages[0]->image) }}" alt="{{ $related->name }}" class="product-image">

                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                        </div><!-- End .product-action-vertical -->

                        <div class="product-action">
                            <a href="{{ url('/collections/'.$related->category->slug.'/'.$related->slug) }}" target="__blank" class="btn-product btn-cart"><span>add to cart</span></a>
                        </div><!-- End .product-action -->
                    </figure><!-- End .product-media -->

                    <div class="product-body">
                        <div class="product-cat">
                            <a href="#">{{ $related->category->name }}</a>
                        </div><!-- End .product-cat -->
                        <h3 class="product-title"><a href="{{ url('/collections/'.$related->category->slug.'/'.$related->slug) }}">{{ $related->name }}</a></h3><!-- End .product-title -->
                        <div class="product-price">
                            <b>Now:</b>{{ $currency->symbol }}@php echo number_format($related->selling_price) @endphp.00
                        </div><!-- End .product-price -->

                        <!-- Getting reviews for each products from the Comment review Table -->
                        <div class="ratings-container">

                            @php
                                $rating = App\Models\Comment::where('product_id', $related->id)->get();
                                $ratingSum = App\Models\Comment::where('product_id', $related->id)->sum('star_rating');
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

                        <div class="product-nav product-nav-dots">
                            <b>Before:</b><s>{{ $currency->symbol }}@php echo number_format($productItem->original_price) @endphp.00</s>

                        </div><!-- End .product-nav -->
                    </div><!-- End .product-body -->
                </div><!-- End .product -->
                @empty
                <b>Fetching Related Products</b>
                @endforelse



            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

@section('ratings')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('Rating :'+ rating);
                $(this).parent().find('input[name=star_rating]').val(rating); //add rating value to input field
            });
        });

        $(document ).on('submit', '#ProductReviewForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#ProductReviewForm')[0]);
            //console.log();
            $.ajax({
                type: "POST",
                url: "/app/collection/store-review",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response.status == 400){
                        $('#resp').html("");
                        let error = '<p style="color:red;">'+response.message+'</p>';
                        $("#resp").html(error);
                    }
                    else if(response.status == 401){
                        $('#station').find('textarea').val("");
                        toastr.error(response.message);
                    }
                    else if(response.status == 404){
                        toastr.info(response.message);
                    }
                    else if(response.status == 200){
                        $('#resp').html("");
                        $('#station').find('textarea').val("");
                        $('#viewreview').load(location.href+' #viewreview');
                        $('#reviev').load(location.href+' #reviev');
                        $('#starate').load(location.href+' #starate');
                        toastr.success(response.message);
                    }
                    else if(response.status == 403){
                        $('#resp').html("");
                        $('#viewreview').load(location.href+' #viewreview');
                        toastr.warning(response.message);

                    }
                }
            });
        });


        $(document).on('click', '.wishlistBtn', function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.details-action-wrapper').find('.prodId').val();
            var prod_slug = $(this).closest('.details-action-wrapper').find('.itmSlg').val();
            var prod_name = $(this).closest('.details-action-wrapper').find('.itmNe').val();

           // alert(prod_id)

            var data = {
                'prod_id': prod_id,
                'prod_slug': prod_slug,
                'prod_name': prod_name,
            };

            $.ajax({
                type: "POST",
                url: "/app/collections/add-to-wishlist",
                data: data,
                success: function (response) {

                    if(response.status == 200){
                        toastr.success(response.message);
                        $('.wishlist-link').load(location.href+' .wishlist-link');
                    }else{
                        toastr.warning(response.message);

                    }
                }
            });

        });





    });
</script>
@endsection




@endsection
