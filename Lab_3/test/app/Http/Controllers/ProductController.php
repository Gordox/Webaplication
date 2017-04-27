<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{


  public function index(){
      $products = json_decode(file_get_contents('../resources/Products.json'));
      return response()->json($products);
    }

  public function show($id){
    $products = json_decode(file_get_contents('../resources/Products.json'));

    foreach ($products->products as $product) {
      if ($id == $product->id) {
        return response()->json($product);
      }
    }
    return "Product not found";
  }

  public function create(Request $request){

    $id = $request->input("id");
    $title = $request->input("title");
    $price = $request->input("price");

    if ($id == NULL or $title == NULL or $price == NULL) {
      return "Missing id, title, price";
    }

    $products = json_decode(file_get_contents('../resources/Products.json'), true);

    $product = [];
    $product["id"] = $id;
    $product["title"] = $title;
    $product["price"] = $price;

    $products["products"][] = $product;

    file_put_contents('../resources/Products.json', json_encode($products));

    return "Product saved";
}

}
?>
