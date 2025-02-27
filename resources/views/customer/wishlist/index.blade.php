@extends('website.master')

@section('body')

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Customer Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!-- customer dashboard start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('customer.includes.menu')
                </div>
                <div class="col-md-9">
                    <div class="card card-body">
                        <h2>My Wishlist</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- customer dashboard end -->

@endsection

