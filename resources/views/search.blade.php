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


  <div class="custom-product">

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Cart List</h2>
            <a class="btn btn-success" href="/ordernow">Order now</a> <br><br>
            @foreach($products as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                    </a>

                </div>
                <div class="col-sm-3">
                    <div class=>
                        <h4>{{ $item->name}}</h4>
                        <h5>{{ $item->description}}</h5>
                        <h5>{{ $item->price}}</h5>
                        
                    </div>
                </div>
                <div class="col-sm-3">
                         <a href="/removecart/{{$item->cartid}}"class="btn btn-warning">Remove</a>
                        
                    
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>




 

@endsection