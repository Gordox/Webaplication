<?php

namespace App\Http\Controllers;
use App\Product;
use App\Store;
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
      $newProduct = new Product;
      $newProduct->title = $request->title;
      $newProduct->brand = $request->brand;
      $newProduct->price = $request->price;
      $newProduct->image = $request->image;
      $newProduct->description = $request->description;
      $newProduct->save();

      foreach($request->get("stores") as $store){
          $newProduct->stores()->attach($store);
      }
    }

    public function show($id)
    {
      $product = Product::with('reviews', 'stores')->find($id);

      return view('show', ["product" => $product]);
    }

    public function edit($id)
    {
      $stores = Store::all();
      $product = Product::find($id);
      return view("edit", [ "product" => $product,"stores" => $stores,]);
    }

    public function update(Request $request, $id)
    {
      $product = Product::find($request->id);
      $product->title = $request->title;
      $product->brand = $request->brand;
      $product->price = $request->price;
      $product->image = $request->image;
      $product->descripion = $request->description;

      $product->stores()->detach();

      $stores = $request->input('stores');

      if($stores != null)
      {
        foreach($stores as $store)
        {
          $products->stores()->attach($store);
        }
      }

      return redirect()->action('ProductController@index');
    }

    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete();

      return redirect()->action('ProductController@index');
    }
}
