@extends('layouts.master')
@section('content')

<div class="custom-product">
    <div class="container">
         <h2>Orders List</h2>
            @foreach($Orders as $item)
            
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <img class="trending-img" src="images/{{$item->gallery}}"><br><br>
                </div>
                <div class="col-sm-3">
                    <div class="order-list">
                        <h5 class="text-danger">{{ $item->name}}</h5>
                        <p>Category:{{$item->category}}</p>
                        <p class="mb-4">Description:{{$item->description}}</p>
                 </div>
                </div>
                <div class="col-sm-3">
                <p ><i class="fas fa-rupee-sign"></i>{{ $item->price +100}}</p>
               </div>
              
            </div>
            
            @endforeach
        </div>
       </div>



@endsection