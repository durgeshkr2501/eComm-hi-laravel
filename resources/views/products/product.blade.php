@extends('layouts.master')
@section('content')


<div class="container-fluid mb-5">
  <div class="row border-top px-xl-5">

    <div class="col-lg-12">

      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($products as $key => $item)
          <div class="carousel-item {{ $key ==0? 'active': '' }}" style="height: 410px;">
            <img src="images/{{$item['gallery']}}" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-3" style="max-width: 700px;">
                <h4 class="text-light text-uppercase font-weight-medium mb-3">{{$item['description']}}</h4>
                <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $item['name'] }}</h3>
                <a href="detail/{{$item['id']}}" class="btn btn-light py-2 px-3">Shop Now</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
          </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
          <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Offer Start -->
<div class="container-fluid offer pt-5">
  <div class="row px-xl-5">
    <div class="col-md-6 pb-4">
      <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
        <img src="img/offer-1.png" alt="">
        <div class="position-relative" style="z-index: 1;">
          <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
          <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
          <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 pb-4">
      <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
        <img src="img/offer-2.png" alt="">
        <div class="position-relative" style="z-index: 1;">
          <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
          <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
          <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Offer End -->





<!-- Products Start -->
<div class="container-fluid pt-5">
  <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
  </div>
  <div class="row px-xl-5 pb-3">
  @foreach($products as $key => $item)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-2">
          <img class="img-fluid w-100" style="height: 300px;" src="images/{{$item['gallery']}}" alt="">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
          <h6 class="text-truncate mb-3">{{ $item['name'] }}</h6>
          <div class="d-flex justify-content-center">
            <h6> <i class="fas fa-rupee-sign"></i>{{ number_format($item['price'], 2) }}</h6>
            <h6 class="text-muted ml-2"><del><i class="fas fa-rupee-sign"></i>{{ number_format($item['price'], 2) }}</del></h6>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
          <a href="detail/{{$item['id']}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

          <form action="/add_to_cart" method="POST">
                <input type="hidden" name="product_id" value="{{$item['id']}}">
                @csrf
                <button class="btn btn-sm text-dark p-0">Add to Cart</button>
            </form>
        </div>
      </div>
    </div>
  @endforeach
    
  </div>
</div>
<!-- Products End -->





<!-- Featured Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5 pb-3">
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
        <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
      </div>
    </div>
  </div>
</div>
<!-- Featured End -->

@endsection