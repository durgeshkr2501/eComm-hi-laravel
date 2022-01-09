@extends('layouts.master')
@section('content')

<div class="custom-product">
 <div class="col-sm-4">
<a href="#">Filter</a>
 </div>
 <div class="col-sm-4">
 <div class="trending-wrapper">
    <h2>Search for Products</h2>
     @foreach($products as $item)
    <div class= "searched-item">
      <a href="detail/{{$item['id']}}">
        <img class="trending-img" src="{{$item['gallery']}}" >
        <div class=>
          <h4>{{ $item['name']}}</h4>
          <h5>{{ $item['description']}}</h5>
           </div>
        </a>
      </div>
      @endforeach
    </div>

 </div>
  </div>


@endsection