<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category');
        
        if ($selectedCategory) {
            $products = Product::where('category', $selectedCategory)->get();
        } else {
            $products = Product::all();
        }

        $categories = Product::select('category')->distinct()->pluck('category');

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }
}
