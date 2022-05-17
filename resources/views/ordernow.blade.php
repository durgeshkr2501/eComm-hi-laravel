@extends('layouts.master')
@section('content')
<div class="container pt-5">

    <div class="row custom-product ">
        <!-- <div class="col-sm-4"></div> -->
        <div class="col-sm-8">
            <label for="">Order details</label>
            <table class="table table-striped">

                <tbody>
                    <tr>
                        <td>price</td>
                        <td><i class="fas fa-rupee-sign"> {{$total}} </td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td class=> Free </td>

                    </tr>
                    <tr>
                        <td>Delivery Charge</td>
                        <td><i class="fas fa-rupee-sign"> 100 </td>

                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td><i class="fas fa-rupee-sign">{{$total+100}}</td>

                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-sm-4">
            <form method="post" action="orderplace">
                <h4 class="font-weight-semi-bold m-0">Delivery address</h4>
                @if(!is_null(request('cart')))
                <input type="hidden" name="cart" value="{{ request('cart') }}">
                @endif
                @csrf
                <div class="form-group">
                    <textarea placeholder="Enter your address" name="address" class="form-control"></textarea>
                    @error('address')<p class="text-danger">{{$message}}</p> @enderror
                </div>
                <label for="">Payment Method</label>
                <div class="form-group">
                    <p><input type="radio" value="online" name="payment"><span>Google Pay UPI</span></p>
                    <p><input type="radio" value="online" name="payment"><span>Wallets</span></p>
                    <p><input type="radio" value="online" name="payment"><span>Credit/Debit/ATM Card</span></p>
                    <p><input type="radio" value="online" name="payment"><span>Net Banking</span></p>
                    <p><input type="radio" value="online" name="payment"><span>EMI (Easy Insallments)</span></p>
                    <p><input type="radio" value="cash" name="payment"><span>Cash on Delivery</span></p>
                    @error('payment')<p class="text-danger">{{$message}}</p> @enderror
                </div>
                
                <button type="submit" class="btn btn-warning" >Procced To Payment</button>
            </form>
        </div>
    </div>
</div>



@endsection