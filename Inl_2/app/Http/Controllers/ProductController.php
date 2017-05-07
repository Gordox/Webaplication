<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Stores;
use App\Review;
use App\Product;

class ProductController extends Controller
{


  public function index(){
    $products = Product::all();
    return "Hej";//response()->json($products);
  }

  public function showProduct($id){
    $product = Product::find($id);
    $product->stores = $product->stores;
    $product->review = $product->review;

    return response()->json($products);
  }

  public function stores(){
    $stores = Store::all();
    return response()->json($stores);
  }

  public function reviews(){
    $reviews = Review::all();
    return response()->json($stores);
  }


  public function create(Request $request){
    $newProduct = new Product;
    $newProduct->title = $request->title;
    $newProduct->brand = $request->brand;
    $newProduct->price = $request->price;
    $newProduct->image = $request->image;
    $newProduct->description = $request->description;

    foreach ($request->get("stores") as $store) {
      $newProduct->stores()->attach($store);
    }
    $newProduct->save();

    $complete = array();
    $complete['success'] = true;
    return response()->json($complete);
  }

}
?>
