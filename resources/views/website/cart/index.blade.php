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
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="{{route('cart.update')}}" method="POST">
                <div class="row">
                    <div class="col-12">
                        <p class="text-center text-success">{{session('message')}}</p>
                        <p class="text-center text-danger">{{session('cart-delete-message')}}</p>
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sum=0)
                                    @foreach($cart_products as $key => $cart_product)
                                    <tr>
                                        <td class="product_remove"><a href="{{route('cart.remove', ['id' => $cart_product->rowId])}}" onclick="return confirm('Are you sure ..');"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="product_thumb"><a href="#"><img src="{{asset($cart_product->options->image)}}" width="50" height="50" alt=""></a></td>
                                        <td class="product_name"><a href="{{route('product-detail', ['id' => $cart_product->id])}}">{{$cart_product->name}}</a></td>
                                        <td class="product-price">BDT {{$cart_product->price}}</td>
                                        <td class="product_quantity">
                                                @csrf
                                                <label>Quantity</label>
                                                <input value="{{$cart_product->rowId}}" name="qty[{{$key}}][rowId]" type="hidden">
                                                <input min="1" max="100" value="{{$cart_product->qty}}" name="qty[{{$key}}][qty]" type="number">
                                        </td>
                                        <td class="product_total">BDT {{$cart_product->price * $cart_product->qty}}</td>
                                    </tr>
                                     @php($sum = $sum + ($cart_product->price * $cart_product->qty))
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">BDT {{ number_format($sum) }}</p>
                                    </div>
                                    <div class="cart_subtotal">
                                        <p>Tax Amount (15%)</p>
                                        <p class="cart_amount">
                                            @php($tax = round( ($sum * 0.15) ))
                                            BDT {{number_format($tax)}}</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span>BDT {{$shipping = 100}}</p>
                                    </div>
                                    <a href="#">Calculate shipping</a>

                                    <div class="cart_subtotal">
                                        <p>Total Payable</p>
                                        <p class="cart_amount">
                                            @php($totalBill = $sum + $tax + $shipping)
                                            BDT {{number_format($totalBill)}}</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{route('checkout.index')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    <!--shopping cart area end -->

@endsection
