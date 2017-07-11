@extends('master')
<style>

div.gallery {
  width: 100%;
  height: 400px;
  border: 1px solid #ccc;
}

div.desc {
    padding: 15px;
    text-align: center;
}

div.gallery img {
    width: 100%;
    height: auto;
}

.responsive {
    padding: 0 5px;
    float: left;
    width: 25%;
}

</style>
@section('content')
<div>
  <div style="text-align:center;">
    <!--Title-->
    <h1>Items</h1>
    <p>Glorious thing these are!</p>
  </div>

  <div>

    @foreach ($products as $product)
      <div class="responsive">
        <div class="gallery">
          <img src="{{$product->image }}">
          <div class="desc">
            <h2>{{$product->title }}</h2>
            <p> Company: {{$product->brand }}</p>
            <p> Price: {{$product->price }} kr </p>
            <button onclick="location.href='/products/show/{{$product->id }}'" type="button">More info</button>
          </div>
        </div>
      </div>
    @endforeach

  </div>
</div>

@endsection
