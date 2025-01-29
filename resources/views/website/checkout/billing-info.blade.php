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
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('checkout.new-order')}}" method="POST">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <label>Delivery address  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="delivery_address" required placeholder="Order Delivery address"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Payment Method <span class="text-danger">*</span></label>
                                        <div class="mt-2">
                                            <label class="text-center"><input style="height: 20px !important;" type="radio" name="payment_method" checked value="Cash">Cash On Delivery</label>
                                            <label class="text-center"><input style="height: 20px !important;" type="radio" name="payment_method" value="Online">Online</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <input type="submit" class="btn btn-success bg-success text-white rounded-0" value="Confirm Order">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sum = 0)
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td><a href="{{route('product-detail', ['id' => $item->id])}}">{{$item->name}}</a> <strong> {{$item->price}} × {{$item->qty}}</strong></td>
                                        <td> {{$item->price * $item->qty}}</td>
                                    </tr>
                                     @php($sum = $sum + ($item->price * $item->qty))
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Cart Subtotal</th>
                                        <td>{{$sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Amount</th>
                                        <td>{{$tax = round($sum * 0.15)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>{{$shipping = 100}}</strong></td>
                                    </tr>
                                    <tr class="order_total">
                                        <th>Order Total</th>
                                        <td><strong>{{$orderTotal = $sum + $tax + $shipping}}</strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <?php
                                    Session::put('order_total', $orderTotal);
                                    Session::put('tax_total', $tax);
                                    Session::put('shipping_total', $shipping);
                                ?>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

@endsection
