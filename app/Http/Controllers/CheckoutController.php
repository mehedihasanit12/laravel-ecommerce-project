<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;

class CheckoutController extends Controller
{
    private $customer, $orderId;

    public function index()
    {
        if (Session::get('id'))
        {
            return redirect('/checkout/billing-info');
        }
        return view('website.checkout.index');
    }

    public function newCustomer(Request $request)
    {
       $this->customer = Customer::newCustomer($request);
        Session::put('id', $this->customer->id);
        Session::put('name', $this->customer->name);
        return redirect('/checkout/billing-info');
    }

    public function billingInfo()
    {
        return view('website.checkout.billing-info');
    }


    public function customerLogin(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('id', $this->customer->id);
                Session::put('name', $this->customer->name);

                return redirect('/checkout/billing-info');
            }
            else
            {
                return back()->with('message', 'Password is invalid.');
            }
        }
        else
        {
            return back()->with('message', 'Email address is invalid.');
        }
    }

    public function newOrder(Request $request)
    {
        $this->orderId = Order::newOrder($request);
        OrderDetail::newOrderDetail($this->orderId);
        return redirect('/checkout/complete-order')->with('message', 'Your order info post successfully. Please wait, we will contact with you soon.');
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
