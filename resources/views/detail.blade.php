@extends('layouts.master')
@section('content')



<!-- Shop Detail Start -->
<div class="container ">
    <div class="row">

    <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">

                        @if(isset($product))
                              @php
                              $images = \App\Models\Media::where("product_id", $product->id)->get();
                              @endphp
                              @if($images->count())
                              @foreach($images as $key => $image)
                                <div class="carousel-item {{ $key == 0? 'active': '' }}">
                                    <img class="img-fluid p-5" src="/{{$image['file_name']}}" style="height:20em" alt="image">
                                </div>
                                @endforeach
                              @endif
                              @endif
                       
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>


        

        <div class="col-sm-6">
            <h3 class="font-weight-semi-bold">{{$product['name']}}</h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1">(50 Reviews)</small>
            </div>
            @if($product['discounted_price'] > 0)
              <h6><i class="fas fa-rupee-sign"></i>{{  number_format($product['discounted_price'],2) }}</h6>
            @else
              <h6><i class="fas fa-rupee-sign"></i>{{ $product['price'] }}</h6>
            @endif
            <h6 class="text-muted ml-2"><del><i class="fas fa-rupee-sign"></i>{{ number_format($product['price'], 2) }}</del></h6>

            <span class="percentage_discount">{{($product['product_discount'])}}% off</span>
           
            <p>Category:{{ $product['category']}}</p>
           
            <p class="mb-4">Description:/{{$product['description']}}</p>

            <br>
            <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                @csrf
                <div class="d-flex align-items-center mb-2 pt-2">
                    <button class="btn btn-primary px-2"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
            </form>
            <br>

            <form action="/buy-now" method="POST">
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <input type="hidden" name="orderType" value="now">
                @csrf
                <div class="d-flex align-items-center mb-2 pt-2">
                    <button class="btn btn-primary px-2"><i class="fa fa-shopping-cart mr-1"></i> Buy Now</button>
                </div>
            </form>

            <br>
            <a href="/" class="btn btn-primary">GO BACK</a>
        </div>
    </div>


</div>


<!-- Shop Detail End -->









@endsection