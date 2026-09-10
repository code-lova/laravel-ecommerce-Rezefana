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
            <h1 class="page-title">{{ $title }}<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <!-- Form to update cart quantity -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @forelse ($cartProducts as $items)
                            <tbody>
                                <tr class="pp-col">
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset('uploads/products/'.$items->ProductsImages[0]->image) }}" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="{{ url('/collections/'.$items->item_slug.'/'.$items->item_name) }}">{{ $items->product->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $currency->symbol }}@php echo number_format($items->price) @endphp.00</td>
                                    <td class="quantity-col">
                                        <input type="hidden" class="prodId" value="{{ $items->id }}">
                                        <div class="cart-product-quantity updateQty">
                                            <input type="number" name="quantity" class="form-control input-qty" value="{{ $items->quantity }}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>

                                    <td class="total-col">{{ $currency->symbol }}@php echo number_format($items->total_price) @endphp.00</td>

                                    <td class="remove-col"><button class="btn-remove deleteItem" value="{{ $items->id }}"><i class="icon-close"></i></button></td>
                                </tr>
                            </tbody>

                            @empty
                            <tr>
                                <td>
                                    <b>Your cart is empty</b>
                                </td>
                                <td>
                                    <a href="{{ url('/') }}" type="button" class="btn-product btn-cart">SHOP NOW</a>

                                </td>
                            </tr>
                            @endforelse
                        </table><!-- End .table table-wishlist -->

                        {{-- <div class="cart-bottom">
                            <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                        </div><!-- End .cart-bottom --> --}}

                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary total-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>{{ $currency->symbol }}@php echo number_format($itemTotalPrice) @endphp.00</td>



                                    <tr class="summary-shipping-estimate">
                                        <td>Shipping according to states<br> <a href="{{ route('user.profile') }}">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>{{ $currency->symbol }}@php echo number_format($itemTotalPrice) @endphp.00</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{ route('checkout.item') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ url('/') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

        </div><!-- End .cart -->
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
                    if(confirm('Are you sure you want to Remove this Item from cart.?')){
                        var thisClicked = $(this);
                        var item_id = thisClicked.val();

                        $.ajax({
                            type: "DELETE",
                            url: "/app/collection/delete-item/"+item_id,
                            dataType:"json",
                            success: function (res) {
                                if(res.status == 200){
                                    thisClicked.closest('.pp-col').remove();
                                    $('#cart-dropdowns').load(location.href+' #cart-dropdowns');
                                    $('.total-summary').load(location.href+' .total-summary');
                                    toastr.success(res.message);
                                }else{
                                    toastr.error(res.message);
                                }
                            }
                        });
                    }
                });


                $(document).on('click', '.updateQty', function (e) {
                    e.preventDefault();

                    var thisClick = $(this);
                    var qty = $(this).closest('.quantity-col').find('.input-qty').val();
                    var prod_id = $(this).closest('.quantity-col').find('.prodId').val();
                    //alert(prod_id);

                    var data = {
                        'qty': qty,
                        'prod_id': prod_id,
                    };

                    $.ajax({
                        type: "POST",
                        url: "/app/collections/update-item",
                        data: data,
                        success: function (response) {

                            if(response.status == 200){
                                thisClick.closest('.pp-col').find('.total-col').text(response.totalprice);
                                toastr.success(response.message);
                                $('.table-summary').load(location.href+' .table-summary');
                                $('.cart-dropdown').load(location.href+' .cart-dropdown');
                            }
                        }
                    });
                });

            });
        </script>

    @endsection

@endsection

