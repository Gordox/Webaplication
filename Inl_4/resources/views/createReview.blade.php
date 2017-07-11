@extends ('master')
@section('content')

<h1>Write Review</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ action('ReviewsController@store') }}">
  {{ csrf_field() }}

<div class="form-group">
  <label for="name">Name</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
</div>

<div class="form-group">
  <label for="comment">Comment</label>
  <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment">
</div>

<div class="form-group">
  <label for="grade">Grade</label>
  <input type="number" min="1" max="5" class="form-control" id="grade" name="grade" placeholder="Enter grade">
</div>


<div class="form-group">
      <label><input type="value" name="id" value={{ $product_id }} hidden="true"></label>
</div>

<input type="submit" value="Save product" class="btn btn-success">
@endsection
