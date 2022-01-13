@extends('layouts.master')
@section('content')

<div class="custom-product">

    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h2>Orders List</h2>
            
            @foreach($Orders as $item)
            <div class="row searched-item cart-list-devider">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                    </a>

                </div>
                <div class="col-sm-3">
                    <div class=>
                        <h4>{{ $item->name}}</h4>
                        <h5>Delivery status:{{ $item->status}}</h5>
                        <h5>Payment status:{{ $item->payment_status}}</h5>
                        <h5>Payment Method:{{ $item->payment_method}}</h5>
                        <h5>Delivery address:{{ $item->address}}</h5>
                        <h5>Price{{ $item->price}}</h5>
                    </div>
                </div>
                <div class="col-sm-3">
                        
                        
                    
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>


@endsection