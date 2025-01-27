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
                        <form action="#">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <label>Delivery address  <span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Order Delivery address"></textarea>
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
                                        <td> {{$item->name}} <strong> {{$item->price}} × {{$item->qty}}</strong></td>
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
                                        <td><strong>{{$orderTotal = $tax + $shipping}}</strong></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-bs-target="createp_account" />
                                    <label for="payment" data-bs-toggle="collapse" data-bs-target="#method" aria-controls="method">Create an account?</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                                    <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="{{asset('/')}}website/assets/img/icon/papyel.png" alt=""></label>

                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button">
                                    <button  type="submit">Proceed to PayPal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->

@endsection
