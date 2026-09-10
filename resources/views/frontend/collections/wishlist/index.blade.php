@extends('layouts.frontpage')

@section('title',"$setting->title",)
@section('meta_title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword")
@section('website_name',"$setting->site_name")

@section('content')

    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ asset('assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($wishlistProducts as $items)
                        <tr class="wish-col">
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="{{ url('/collections/'.$items->item_slug.'/'.$items->item_name) }}">
                                            <img src="{{ asset('uploads/products/'.$items->ProductsImages[0]->image) }}" alt="Product image">
                                        </a>
                                    </figure>


                                </div><!-- End .product -->
                            </td>
                            <td>
                                <h3 class="product-title">
                                    <a href="{{ url('/collections/'.$items->item_slug.'/'.$items->item_name) }}">{{ $items->product->name }}</a>
                                </h3><!-- End .product-title -->
                            </td>
                            <td class="price-col">{{ $currency->symbol }}@php echo number_format($items->product->selling_price) @endphp.00</td>
                            @if ($items->product->quantity > 0)
                                <td class="stock-col"><span class="in-stock">In stock</span></td>
                            @else
                                <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                            @endif

                            <td class="remove-col"><button class="btn-remove deleteItem" value="{{ $items->id }}"><i class="icon-close"></i></button></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="product-col">
                                <b> You have no Product in your wishlist</b>
                            </td>
                        </tr>

                        @endforelse

                    </tbody>
                </table><!-- End .table table-wishlist -->
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    @section('script')
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.deleteItem', function () {
                    if(confirm('Are you sure you want to Remove this product from wishlist.?')){
                        var thisClicked = $(this);
                        var item_id = thisClicked.val();

                        $.ajax({
                            type: "DELETE",
                            url: "/app/collection/delete-wishitem/"+item_id,
                            dataType:"json",
                            success: function (res) {
                                if(res.status == 200){
                                    thisClicked.closest('.wish-col').remove();
                                    $('.wishlist-link').load(location.href+' .wishlist-link');
                                    //$('.total-summary').load(location.href+' .total-summary');
                                    toastr.success(res.message);
                                }else{
                                    toastr.error(res.message);
                                }
                            }
                        });
                    }
                });


            });
        </script>

    @endsection


@endsection
