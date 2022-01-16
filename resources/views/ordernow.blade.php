@extends('layouts.master')
@section('content')

<div class="row custom-product">
<div class="col-sm-3"></div>
    <div class="col-sm-6 ">
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
        <form method="post" action="orderplace">
            @csrf
            <div class="form-group">
                <textarea placeholder="enter your address" name="address" class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label for="">Payment Method</label>
                <p><input type="radio" value="cash" name="payment"><span>Google Pay UPI</span></p>
                <p><input type="radio" value="cash" name="payment"><span>Wallets</span></p>
                <p><input type="radio" value="online" name="payment"><span>Credit/Debit/ATM Card</span></p>
                <p><input type="radio" value="cash" name="payment"><span>Net Banking</span></p>
                <p><input type="radio" value="cash" name="payment"><span>EMI (Easy Insallments)</span></p>
                <p><input type="radio" value="cash" name="payment"><span>Cash on Delivery</span></p>
            </div>
            <button type="submit" class="btn btn-danger">Procced To Payment</button>
        </form>
    </div>
</div>


@endsection