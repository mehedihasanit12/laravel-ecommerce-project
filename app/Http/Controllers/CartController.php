<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;

    public function index()
    {
        return view('website.cart.index', ['cart_products' => Cart::content()]);
    }

    public function addToCart(Request $request, $id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $request->qty,
            'price' => $this->product->selling_price,
            'options' => [
                'image' => $this->product->image,
                'code' => $this->product->code
            ]
        ]);

        return redirect('cart/index');
    }

    public function deleteProduct($rowId)
    {
        Cart::remove($rowId);
        return back()->with('cart-delete-message', 'Cart product info delete successfully.');
    }

    public function updateProduct(Request $request)
    {
        foreach ($request->qty as $item)
        {
            Cart::update($item['rowId'], $item['qty']);
        }
        return back()->with('message', 'Cart product info update successfully.');
    }

    public function directAddToCart($id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => 1,
            'price' => $this->product->selling_price,
            'options' => [
                'image' => $this->product->image,
                'code' => $this->product->code
            ]
        ]);

        return redirect('/cart/index');
    }
}
