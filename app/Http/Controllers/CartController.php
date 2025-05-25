<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => isset($cart[$id]) ? $cart[$id]['quantity'] + 1 : 1,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produkt přidán do košíku!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produkt odebrán z košíku!');
    }
}
