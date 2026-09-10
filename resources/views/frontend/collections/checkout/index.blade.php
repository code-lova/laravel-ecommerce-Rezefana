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
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                <form action="{{ url('/app/place-order') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Full Name *</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" disabled>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Company Name (Optional)</label>
                                        <input type="text" name="company_name" value="{{ $user->company_name }}" class="form-control" disabled>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Country *</label>
                                <input type="text" name="country" value="{{ $user->country }}" class="form-control" disabled>

                                <label>Street address *</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="House number and Street name/Appartments, suite, unit etc ..." disabled>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" name="city" class="form-control" value="{{ $user->city }}" disabled>
                                    </div><!-- End .col-sm-6 -->

                                    @if ($user->states != Null)
                                    <div class="col-sm-6">
                                        <label>State *</label>
                                        <input type="text" name="state"  value="{{ $user->states->name }}" class="form-control" disabled>
                                    </div><!-- End .col-sm-6 -->
                                    @else
                                    <div class="col-sm-6">
                                        <label>State *</label>
                                        <input type="text" name="state"  value="" class="form-control" disabled>
                                    </div><!-- End .col-sm-6 -->
                                    @endif
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" value="{{ $user->zip }}" name="zip" disabled>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" name="phone" value="{{ $user->phone }}" class="form-control" disabled>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" disabled>

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="title mb-3">Select A Payment Method Style</h2><!-- End .title mb-3 -->
                                        <h4 style="font-size: 14px; color:green">NOTE: Click to select a payment of your choice before you place your order.</h4>
                                    </div><!-- End .col-12 -->
                                    <div class="col-md-12">
                                        <div class="tabs-vertical">
                                            <ul class="nav nav-tabs nav-tabs-bg flex-column" id="tabs-7" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="tab-25-tab" data-toggle="tab" href="#tab-25" role="tab" aria-controls="tab-25" aria-selected="true">Direct Bank Transfer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-26-tab" data-toggle="tab" href="#tab-26" role="tab" aria-controls="tab-26" aria-selected="false">Cash On Delivery</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tab-27-tab" data-toggle="tab" href="#tab-27" role="tab" aria-controls="tab-27" aria-selected="false">Credit Card Payment</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content tab-content-border" id="tab-content-7">
                                                <div class="tab-pane fade show active" id="tab-25" role="tabpanel" aria-labelledby="tab-25-tab">
                                                    <p>
                                                        <!-- CHECKBOX -->
                                                        <input type="radio" id="regular-license" name="method" value="{{ $paymentMethodbk->id }}" checked>
                                                        <label class="b-label linked-check" for="regular-license">
                                                            <span class="checkbox primary"><span></span></span>
                                                            Select {{ $paymentMethodbk->payment_name }}
                                                        </label>
                                                        <!-- /CHECKBOX -->
                                                        <h2 class="checkout-title">
                                                            Bank Details
                                                        </h2>
                                                        <!-- End .checkout-title -->
                                                        <p>{!! $paymentMethodbk->payment_details !!}</p>

                                                        <br/>
                                                        <b>NOTE: Attach payment receipt for confirmation. Supported file: Jpeg,Jpg,Png</b>
                                                        <br/>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Payment Receipt *</label>
                                                                <input type="file" name="payment_receipt" class="form-control">
                                                                @error('payment_receipt')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div><!-- End .col-sm-6 -->
                                                        </div><!-- End .row -->

                                                    </p>
                                                </div><!-- .End .tab-pane -->

                                                <div class="tab-pane fade" id="tab-26" role="tabpanel" aria-labelledby="tab-26-tab">
                                                    <p>
                                                        <!-- CHECKBOX -->
                                                        <input type="radio" id="extended-license" name="method" value="{{ $paymentMethodcod->id }}">
                                                        <label class="b-label linked-check" for="extended-license">
                                                            <span class="checkbox primary"><span></span></span>
                                                            Select {{ $paymentMethodcod->payment_name }}
                                                        </label>
                                                        <!-- /CHECKBOX -->
                                                        <h2 class="checkout-title">
                                                            Cash on Delivery
                                                        </h2>
                                                        <p>{!! $paymentMethodcod->payment_details !!}</p>

                                                    </p>
                                                </div><!-- .End .tab-pane -->

                                                <div class="tab-pane fade" id="tab-27" role="tabpanel" aria-labelledby="tab-27-tab">
                                                    <p>
                                                        <input type="radio" id="extended-license" name="method" value="{{ $paymentMethodcc->id }}">
                                                        <label class="b-label linked-check" for="extended-license">
                                                            <span class="checkbox primary"><span></span></span>
                                                            Select {{ $paymentMethodcc->payment_name }}
                                                        </label>
                                                        <!-- /CHECKBOX -->
                                                        <h2 class="checkout-title">
                                                            Credit Card Payment
                                                        </h2>
                                                        <p>{!! $paymentMethodcc->payment_details !!}</p>

                                                    </p>
                                                </div><!-- .End .tab-pane -->

                                            </div><!-- End .tab-content -->
                                        </div><!-- End .tabs-vertical -->
                                    </div><!-- End .col-md-6 -->

                                </div><!-- End .row -->
                                <br/>
                                <br/>

                                <center>
                                @if ($user->address != Null)
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                        <span class="btn-text">Place Order</span>
                                        <span class="btn-hover-text">Proceed to Checkout</span>
                                    </button>
                                 @else
                                    <b style="color:rgb(232, 121, 121)">Pleasae Update your Billing/Shipping Address to continue</b>
                                    <br/>
                                    <br/>
                                    <b class="text-center">
                                       <a href="{{ route('user.profile') }}"> Click here.. To Update</a>
                                    </b>

                                @endif
                                </center>

                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <form action="" method="post">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cartProducts as $items)
                                        <tr>
                                            <td><a href="#">{{ $items->product->name }}</a></td>
                                            <td>{{ $currency->symbol }}@php echo number_format($items->total_price) @endphp.0</td>
                                        </tr>


                                        @empty
                                        <tr>
                                            <td>
                                                <b>Nothing to Checkout</b>
                                            </td>
                                            <td>
                                                <a href="{{ url('/') }}" type="button" class="btn-product btn-cart">SHOP NOW</a>
                                            </td>
                                        </tr>
                                        @endforelse


                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{ $currency->symbol }}@php echo number_format($itemTotalPrice)@endphp.00</td>
                                        </tr><!-- End .summary-subtotal -->


                                        @if ($user->state == $shippingCost->state_id)
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>{{ $currency->symbol }}@php echo number_format($shippingCost->amount)@endphp.00</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>{{ $currency->symbol }}@php echo number_format($shippingrestofstates->amount)@endphp.00</td>
                                            </tr>
                                        @endif

                                        @if ($user->state == $shippingCost->state_id)
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{  $currency->symbol  }}@php echo number_format($shippingCost->amount + $itemTotalPrice)@endphp.00</td>
                                            </tr><!-- End .summary-total -->
                                        @else
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{  $currency->symbol  }}@php echo number_format($shippingrestofstates->amount + $itemTotalPrice)@endphp.00</td>
                                            </tr><!-- End .summary-total -->
                                        @endif
                                    </tbody>


                                </table><!-- End .table table-summary -->




                            </div><!-- End .summary -->
                            </form>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->


@endsection
