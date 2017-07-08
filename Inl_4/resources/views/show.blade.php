@extends('master')
<style>

div.display {
  clear: both;
  width: 100%;
  height: 50%;
  border: 1px solid #ccc;
}

ul li{
  padding: 2px;
  display: inline;
}
.column{
  float: left;
  padding: 15px;
}

.image{
  float: left;
  width: 25%;
  height: 100%;
  border-right: 1px solid #ccc;
}

.content{
  float: right;
  width: 75%;
}

div.display img {
    padding-top: 25%;
    width: 100%;
    height: auto;
    float: left;
}
</style>

@section('content')
<!--Information-->
<div class="display">
  <!--- Image--->
  <div class="image">
      <img class="column menu" src="{{$product->image }}">
  </div>

  <!--- Content --->
  <div class="content">
    <div style="text-align:center;">
      <!--Title-->
      <h1>{{$product->title}}</h1>
      <p style="font-size: 9;"> Comapny: {{$product->brand }}</p>
    </div>
    <!--Description, shop and price-->
    <div class="column">
      <h3>Description</h3>
      <p> {{$product->description }} </p>
      <h4>Can be found here</h4>
      <ul>
      @foreach ($product->stores as $store)
        <li>{{$store->name}}</li>
      @endforeach
      </ul>
      <h4 style="float: right;">Price: {{$product->price }} kr</h4>

    </div>
  </div>
</div> <br>
<!--Comments-->
<div style="border: 1px solid #ccc;" >
  <div style="text-align:center;">
    <h1>Reviews</h1>
  </div>
  @foreach ($product->reviews as $review)
    <p style="padding: 10px;">Name: {{$review->name}} <br>Comment: {{$review->comment}}<br> Score: {{$review->grade}} </p>
    @if (!Auth::guest())
    <form action="{{action('ReviewsController@destroy', $review->id)}}" method="POST">
             {{ csrf_field() }}
             <input type="hidden" name="_method" value="DELETE">
             <button type="submit"> Delete </button>
    </form>
    @endif
    <p style="padding: 10px; border-bottom: 1px solid #ccc; width: 100%;" ></p>
  @endforeach

  <button onclick="location.href='{{action('ReviewsController@create', $product->id)}}'" type="button" >Add Review</button>
</div>
<!--- buttons --->
<div style="display: inline;">
  @if (!Auth::guest())
  <h3>Handel product</h3>
  <form action="{{action('ProductController@destroy', $product->id)}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit"> Delete </button>
  </form>
  <button onclick="location.href='{{ action('ProductController@edit', $product->id) }}'" type="button" >Edit</button>
  @endif
</div>

@endsection
