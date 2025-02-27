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
                            <li>login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row mb-3">
                <div class="col">
                    <p class="text-danger text-center fs-3">{{session('middleware_message')}}</p>
                </div>
            </div>
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <p class="text-danger">{{session('message')}}</p>
                        <form action="{{route('customer.login')}}" method="POST">
                            @csrf
                            <p>
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>Passwords <span class="text-danger">*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <a href="#">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember" type="checkbox">
                                    Remember me
                                </label>
                                <button type="submit">login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="{{route('customer.register')}}" method="POST">
                            @csrf
                            <p>
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" required>
                            </p>
                            <p>
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input type="number" name="mobile" required>
                            </p>
                            <p>
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" required>
                            </p>
                            <p>
                                <label>Passwords <span class="text-danger">*</span></label>
                                <input type="password" name="password" required>
                            </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->

@endsection
