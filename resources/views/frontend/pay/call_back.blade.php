@extends('layouts.frontpage')

@section('title',"$setting->title")
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
                <li class="breadcrumb-item"><a href="#">Success page</a></li>
                <li class="breadcrumb-item active" aria-current="page">Payment Success</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->


    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="row">

                    <aside class="col-lg-10">
                        <div class="summary">
                            <h3 class="summary-title">Payment Success Page</h3><!-- End .summary-title -->

                            <h3 class="post-title" style="color: rgb(29, 173, 29);">PAYMENT SUCCESSFULL</h3>
                            <br>
                            <p>Welldone Comerade <b>{{ Auth::user()->name }}</b>.
                                <br>Your Payment is now Undergoing verification. Navigate to 'Account/Profile' to see orders made.<br>
                                <p>You will get a confirmation email afterwards.</p>
                            </p>


                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->

            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->


</main>

@endsection
