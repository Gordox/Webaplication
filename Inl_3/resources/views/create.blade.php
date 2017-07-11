@extends ('master')
@section('content')

<h1>Create page</h1>

<form class="form-horizontal" role="form" method="POST" action="{{ action('ProductController@store') }}">
  {{ csrf_field() }}

<div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
</div>

<div class="form-group">
  <label for="brand">Brand</label>
  <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter brand">
</div>

<div class="form-group">
  <label for="price">Price</label>
  <input type="value" class="form-control" id="price" name="price" placeholder="Enter price">
</div>

<div class="form-group">
  <label for="image">Image</label>
  <input type="text" class="form-control" id="image" name="image" placeholder="Enter link to image">
</div>

<div class="form-group">
  <label for="description">Description</label>
  <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
</div>

<div class="form-group">
  <label for="store">List of stores</label>
  @foreach($stores as $store)
    <div class="checkbox">
      <label><input type="checkbox" name="stores[]" value={{ $store->id }}>{{ $store->name}}</label>
    </div>
    @endforeach
</div>

<input type="submit" value="Save product" class="btn btn-success">
@endsection
