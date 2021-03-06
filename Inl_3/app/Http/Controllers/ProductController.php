<?php

namespace App\Http\Controllers;
use App\Product;
use App\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view('showAll',["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $stores = Store::all();

      return view('create', ['stores' => $stores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

      return redirect()->action('ProductController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Product::with('reviews', 'stores')->find($id);

      return view('show',["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $stores = Store::all();
      $product = Product::find($id);
      return view("edit", [ "product" => $product,"stores" => $stores,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $product = Product::find($id);
      $product->title = $request->get("title");
      $product->brand = $request->get("brand");
      $product->price = $request->get("price");
      $product->description = $request->get("description");
      $product->image = $request->get("image");

      $product->save();

      $product->stores()->detach();

      $stores = $request->input('stores');
      if ($stores != null)
      {
        foreach($stores as $store)
        {
          $product->stores()->attach($store);
        }
      }

      return redirect()->action('ProductController@show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
      $product->delete();

      return redirect()->action('ProductController@index');
    }
}
