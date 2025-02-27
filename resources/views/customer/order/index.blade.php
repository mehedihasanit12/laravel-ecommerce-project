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
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>BDT {{$order->order_total}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- customer dashboard end -->

@endsection

