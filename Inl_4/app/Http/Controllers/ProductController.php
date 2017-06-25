<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return view('showAll', ["products" => $products]);
    }

    public function create()
    {
      return view('create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
      $product = Product::with('reviews', 'stores')->find($id);

      return view('show', ["product" => $product]);
    }

    public function edit($id)
    {

    }

    public function update(Requet $request, $id)
    {

    }

    public function destroy($id)
    {
      
    }
}
