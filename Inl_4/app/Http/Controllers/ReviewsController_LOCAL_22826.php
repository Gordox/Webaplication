<?php

namespace App\Http\Controllers;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {
      return view('createReview', ['product_id' => $id]);
    }

    public function store(Request $request)
    {
      $newReview = new Review;
      $newReview->name = $request->name;
      $newReview->comment = $request->comment;
      $newReview->grade = $request->grade;
      $newReview->product_id = $request->id;

      $newReview->save();

      return redirect()->action('ProductController@index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
      $review = Review::find($id);
      $review->delete();

      return redirect()->action('ProductController@index');
    }
}
