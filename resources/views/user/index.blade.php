@extends('layouts.frontpage')

@section('title',"$setting->title",)
@section('meta_title',"$setting->meta_title")
@section('meta_description',"$setting->meta_description")
@section('meta_keyword',"$setting->meta_keyword")
@section('website_name',"$setting->site_name")

@section('content')

@include('layouts.inc.frontend-orderdetails-model');

<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ asset('assets/images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">My Account<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-2">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Update Password</a>
                            </li>

                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Hello <span class="font-weight-normal text-dark">{{ $user->name }}</span>
                                <br>
                                From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @if ($userOrder->count() > 0)
                                    <table class="table table-wishlist table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Delivery Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($userOrder as $orders)
                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset('uploads/products/'.$orders->ProductsImages[0]->image) }}" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="{{ url('/collections/'.$orders->item_slug.'/'.$orders->item_name) }}">{{ $orders->product->name }}</a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col">
                                                    {{ $orders->quantity }} X {{ $currency->symbol }}@php echo number_format($orders->price) @endphp.00 <br/>
                                                    Total: {{ $currency->symbol }}@php echo number_format($orders->total_price) @endphp
                                                </td>

                                                <td class="stock-col">
                                                    @if ($orders->payment_status == 0)
                                                        @if ($orders->method == 1)
                                                            <span class="text-warning">Verifying..</span>
                                                        @else
                                                            <span class="text-warning">Pending..</span>
                                                        @endif
                                                    @elseif ($orders->payment_status == 1)
                                                        <span class="text-success">PAID</span>
                                                    @elseif ($orders->payment_status == 2)
                                                        <span class="text-danger">Cancelled</span>
                                                    @endif
                                                    <br/>
                                                    @if ($orders->method == 1)
                                                        <span class="text-muted" style="font-size: 14px;">Bank Transfer</span>
                                                    @elseif ($orders->method == 2)
                                                        <span class="text-muted" style="font-size: 14px;">Cash on delivery</span>
                                                    @elseif ($orders->method == 3)
                                                        <span class="text-muted" style="font-size: 14px;">Card Payment</span>
                                                    @endif
                                                </td>
                                                <td class="price-col">
                                                    @if ($orders->delivery_status == 0)
                                                        <span class="text-muted">Order Placed</span>
                                                    @elseif ($orders->delivery_status == 1)
                                                        <span class="text-success">Shipped</span>
                                                    @elseif ($orders->delivery_status == 2)
                                                        <span class="text-primary">Delivered</span>
                                                    @endif
                                                </td>
                                                <td class="action-col">
                                                    <button data-toggle="modal" data-target="#orderDetailsModal" value="{{ $orders->id }}" class="btn btn-outline-primary-2 fetchDetailsBtn"><i class="icon-cart-plus"></i>View Details</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->
                                    <!-- PAGER -->
                                    <div class="pager primary">
                                        {{ $userOrder->links() }}
                                    </div>
                                    <!-- /PAGER -->
                                @else
                                    <p>No order has been made yet.</p>
                                    <a href="{{ url('/') }}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @endif


                            </div><!-- .End .tab-pane -->




                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>The following addresses will be used on the checkout page by default.</p>

                                <div id="station">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Billing Address</h3><!-- End .card-title -->

                                                    <p>{{ $user->name }}<br>
                                                    {{ $user->company_name }}<br>
                                                    {{ $user->phone }}<br>
                                                    {{ $user->country }}<br>
                                                    {{ $user->address }}<br>
                                                    {{ $user->email }}<br>
                                                    <a href="#">Edit <i class="icon-edit"></i></a></p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                        @if ($user->address == Null)
                                            <div class="col-lg-6">
                                                <div class="card card-dashboard">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Shipping/Billing Address</h3><!-- End .card-title -->

                                                        <p>You have not set up this type of address yet.<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a></p>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .card-dashboard -->
                                            </div><!-- End .col-lg-6 -->
                                        @else
                                            <div class="col-lg-6">
                                                <div class="card card-dashboard">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Shipping/Billing Address</h3><!-- End .card-title -->

                                                        <p>{{ $user->name }}<br>
                                                            {{ $user->company_name }}<br>
                                                            {{ $user->phone }}<br>
                                                            {{ $user->country }}<br>
                                                            {{ $user->address }}<br>
                                                            {{ $user->email }}<br>
                                                        </p>
                                                    </div><!-- End .card-body -->
                                                </div><!-- End .card-dashboard -->
                                            </div><!-- End .col-lg-6 -->
                                        @endif

                                    </div><!-- End .row -->
                                    <form id="ProfileSettingForm" method="POST">

                                        <input type="hidden" value="{{ $user->id }}" id="user_id">
                                        <div id="res"></div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Full Names *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Phone *</label>
                                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        <label>Company name *</label>
                                        <input type="text" class="form-control" name="company_name" value="{{ $user->company_name }}">
                                        <small class="form-text">This will be how your company name will be displayed in the account</small>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Zip *</label>
                                                <input type="text" class="form-control" name="zip" value="{{ $user->zip }}" required>
                                            </div><!-- End .col-sm-6 -->
                                            @if ($user->state == Null)
                                                <div class="col-sm-6">
                                                    <label>State *</label>
                                                    <select class="form-control" name="state" required>
                                                        <option value="">--Select State--</option>
                                                        @foreach ($state as $states)
                                                            <option value="{{ $states->id }}">{{ $states->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div><!-- End .col-sm-6 -->
                                            @else
                                            <div class="col-sm-6">
                                                <label>State *</label>
                                                <select class="form-control" name="state" required>
                                                    <option value="">--Select State--</option>
                                                    @foreach ($state as $states)
                                                        <option value="{{ $states->id }}" {{ $user->state == $states->id ? 'selected':'' }}>{{ $states->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div><!-- End .col-sm-6 -->
                                            @endif
                                        </div><!-- End .row -->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>City *</label>
                                                <input type="text" class="form-control" name="city" value="{{ $user->city }}" required>

                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Country *</label>
                                                <input type="text" name="country" value="{{ $user->country }}" class="form-control" disabled>
                                            </div><!-- End .col-sm-6 -->

                                        </div><!-- End .row -->

                                        <label>Email address *</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>


                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" required>




                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div>
                            </div><!-- .End .shipping details tab-pane -->

                            <!-- .Begin . Update Account password -->
                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form id="updatePasswordForm" method="POST">
                                    @method('PUT')
                                    <input type="hidden" id="user_id" value="{{ $user->id }}">

                                    <div id="ressp"></div>

                                    <label>Current password (leave blank to leave unchanged)</label>
                                    <input type="password" name="oldpassword" class="form-control">

                                    <label>New password (leave blank to leave unchanged)</label>
                                    <input type="password" name="password" class="form-control">

                                    <label>Confirm new password</label>
                                    <input type="password" name="password_confirmation" class="form-control mb-2">

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

    @section('script')

        @include('user.userscript_js')

    @endsection

@endsection
