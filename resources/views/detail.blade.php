@extends('layouts.master')
@section('content')



 <!-- Shop Detail Start -->
 
 <div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$product['gallery']}}" alt="">
        </div>
        <div class="col-sm-6">
            <a href="/">GO BACK</a>
            <h4>{{$product['name']}}</h4>
            <h5>Price:{{$product['price']}}</h5>
            <h5>Category:{{$product['category']}}</h5>
            <h5>Description:{{$product['description']}}</h5>
            

            <br><br>
            <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                @csrf
                <button class="btn btn-success">Add to Cart</button>
            </form>
            <br><br>
            <button class="btn btn-primary">Buy Now</button>
        </div>
    </div>


</div>
           
               
    <!-- Shop Detail End -->
   





@endsection