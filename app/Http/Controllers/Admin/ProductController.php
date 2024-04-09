<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all(); // Va faire référence au model Product.

        return view('admin.products.index', ['products' => $products]);
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        $products = new Product;

        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->is_active = $request->is_active;

        $products->save(); 

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès !');
    }

    public function edit($id) {

        $product = Product::findOrFail($id);

        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_active = $request->is_active;

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié avec succès !');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès !');
    }


}
