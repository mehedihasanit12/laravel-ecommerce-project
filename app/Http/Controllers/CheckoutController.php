<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\SslCommerzPaymentController;

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

    public $email;
    public function checkCustomerEmail()
    {
        $this->email = $_GET['email'];
        $this->customer = Customer::where('email', $this->email)->first();
        if ($this->customer)
        {
            return response()->json([
                'success' => false,
                'message' => "Sorry ... Email already exist."
            ]);
        }
        else
        {
            return response()->json([
                'success' => true,
                'message' => "Email Address is available."
            ]);
        }
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
        if ($request->payment_method == 'Cash')
        {
            $this->orderId = Order::newOrder($request);
            OrderDetail::newOrderDetail($this->orderId);
            return redirect('/checkout/complete-order')->with('message', 'Your order info post successfully. Please wait, we will contact with you soon.');
        }
        elseif ($request->payment_method == 'Online')
        {
            $sslCommerzPayment = new SslCommerzPaymentController();
            $sslCommerzPayment->index($request);
        }

    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
