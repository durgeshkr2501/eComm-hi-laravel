@extends('layouts.master')
@section('content')


<div class="">
  @if(session()->has('message'))
  <div class="alert alert-success" role="alert">{{session()->get('message')}}</div>
  @endif

  <div class="row border-top px-xl-5">
    <div class="col-lg-12">
      <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          @foreach($products as $key => $item)
           <div class="carousel-item {{ $key ==0? 'active': '' }}" style="height: 300px;">
            <img src="{{$item['gallery']}}" style="width: 100px; height:auto; margin:5em;" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
              <div class="p-4" style="max-width: 400px;">
                  <h5 class="display-block mb-4"  style=" height: 100px;">{{ $item['name'] }}</h5> 
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


@include('products.product')


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

<div class="pagination">
  {{ $products->links() }}
</div>
<!-- Featured End -->

@endsection