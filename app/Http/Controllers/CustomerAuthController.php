<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    public $customer;

    public function index()
    {
        if (Session::get('id'))
        {
            return redirect('/customer/dashboard');
        }
        return view('customer.auth.index');
    }

    public function dashboard()
    {
        return view('customer.dashboard.index');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('id', $this->customer->id);
                Session::put('name', $this->customer->name);

                return redirect('/customer/dashboard');
            }
            else
            {
                return back()->with('message', 'Invalid Password');
            }
        }
        else
        {
            return back()->with('message', 'Invalid Email Address');
        }
    }

    public function register(Request $request)
    {
        $this->customer = Customer::newCustomer($request);
        Session::put('id', $this->customer->id);
        Session::put('name', $this->customer->name);
        return redirect('/customer/dashboard');
    }

    public function logout()
    {
        Session::forget('id');
        Session::forget('name');

        return redirect('/');
    }
}
