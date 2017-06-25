@extends('master')
@section('content')
<h1>Edit Product</h1>
<h5>ID: {{$product->id}}</h5>

<form class="form-horizontal" role="form" method="POST" action="{{ action('ProductController@update', $product->id) }}">
  {{ method_field('PUT') }}
  {{ csrf_field() }}

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" value= "{{$product->title}}" name="title">
  </div>

  <div class="form-group">
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" value= "{{$product->brand}}" name="brand">
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" value= "{{$product->price}}"name="price">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" value= "{{$product->description}}" name="description">
  </div>

  <div class="form-group">
    <label for="image">Link to product image</label>
    <input type="text" class="form-control" id="image" value= "{{$product->image}}" name="image">
  </div>

  <div class="form-group">
    <label for="store">Stores</label>
    @foreach($stores as $store)
      <div class="checkbox">
        <label>
          <input type="checkbox" name="stores[]" value="{{$store->id}}" >
            {{$store->name}}
          </input>
        </label>
      </div>
    @endforeach
  </div>

  <input type="submit" value="Save edit" class="btn btn-success">
  <button onclick="location.href='{{ action('ProductController@show', $product->id) }}'" type="button"  class="btn btn-danger">Discard</button>
</form>
@endsection
