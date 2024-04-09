<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::all(); // Va faire référence au model Product.

        return view('home.index', ['products' => $products]);
    }
    
}
