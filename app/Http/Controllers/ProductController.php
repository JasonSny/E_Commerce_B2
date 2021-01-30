<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query){
                $query->where('slug', request()->categorie);
            })->paginate(6);
        } else {
            $products = Product::with('categories')->paginate(6);
        }

        return view('products.index')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $stock = $product->stock === 0 ? 'Indisponible' : 'Disponible';

        return view('products.show', [
            'product' => $product,
            'stock' => $stock
        ]);
    }

    public function search()
    {
        request()->validate([
            'x' => 'required|min:3'
        ]);

        $x = request()->input('x');

        $products = Product::where('title', 'like', "%$x%")  //% permet de retrouver sans que ça soit exact le SEARCH
        ->orWhere('description', 'like', "%$x%")
        ->paginate(6);

        return view('products.search')->with('products', $products);
    }
}
