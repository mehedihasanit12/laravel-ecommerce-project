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
                            <li>Checkout</li>
                            <li>Complete Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->



    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-success text-center">{{session('message')}}</p>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

@endsection
