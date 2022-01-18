@extends('layouts.master')
@section('content')
<!-- Cart Start -->
<div>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @foreach($products as $key => $product)
                        <tr>
                            <td class="align-middle"><img src="images/{{ $product->gallery }}" alt="" style="width: 50px;"> {{ $product->name }}</td>
                            <td class="align-middle"><i class="fas fa-rupee-sign"></i>{{$product->price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a href="/product/quantity/decrement?cart_id={{ $product->cartid }}" class="btn btn-sm btn-primary btn-minus {{ $product->quantity == 1? 'qty-disable': '' }}">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $product->quantity }}">
                                    <div class="input-group-btn">
                                        <a href="/product/quantity/increment?cart_id={{ $product->cartid }}" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><i class="fas fa-rupee-sign"></i>{{ $product->price * $product->quantity}}</td>
                            <td class="align-middle"><a href="/removecart/{{$product->cartid}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">

                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>

                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><i class="fas fa-rupee-sign"></i>{{$total}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tax</h6>
                            <h6 class="font-weight-medium">Free</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium"><i class="fas fa-rupee-sign"></i>100</h6>
                        </div>
                    </div>

                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><i class="fas fa-rupee-sign"></i>{{$total + 100}}</h5>
                        </div>
                        <a href="/ordernow" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection