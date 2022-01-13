@extends('layouts.master')
@section('content')

<div class="custom-product">

    <div class="col-sm-6 col-sm-offset-3">
        <table class="table table-striped">

            <tbody>
                <tr>
                    <td>price</td>
                    <td>Rs {{$total}}/ </td>
                </tr>
               
                <tr>
                    <td>Tax</td>
                    <td>Rs 0/ </td>

                </tr>
                <tr>
                    <td>Delivery Charge</td>
                    <td>Rs 100/ </td>

                </tr>
                <tr>
                    <td>Total Amount</td>
                    <td>Rs {{$total+100}}/</td>

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