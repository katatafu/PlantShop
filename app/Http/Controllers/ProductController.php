<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Přehled produktů s filtrováním podle kategorie
    public function index(Request $request): View
    {
        $query = Product::query();

        if ($request->has('category') && $request->category !== 'Všechny') {
            $query->where('category', $request->category);
        }

        $products = $query->get();

        return view('products.index', compact('products'));
    }

    // Detail jednoho produktu
    public function show($id): View
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(10)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    // Vyhledávání produktů
    public function search(Request $request): View
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return view('products.index', compact('products'));
    }

    // CRUD funkce (zatím prázdné)
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
