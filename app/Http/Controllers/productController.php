<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    function index()
    {
        //return "welcom to product page";
        $data = product::all();
        return view('products.product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = product::find($id);
        return view('detail', ['product' => $data]);
    }
    function search(Request $req)
    {
        $query = $req->input('query');
        $data = product::where('name', 'like', '%' . $query . '%')
            ->orWhere('category', 'like', "%$query%")
            ->where('description', 'like', "%$query%")
            ->get();

        return view('search', ['products' => $data]);
    }
    function addToCart(Request $req)
    {
        $user = Auth::user();
        // check if product already added to cart 
        $cartProduct = Cart::where('user_id', $user->id)
            ->where('product_id', $req->product_id)
            ->get();
        if ($cartProduct->count()) {
            $cartData = $cartProduct[0];
            $cartData->quantity = $cartData->quantity + 1;
            $cartData->save();
        } else {
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $req->product_id;
            $cart->quantity = 1;
            $cart->save();
        }

        return redirect('/');
    }
    function cartList()
    {
        $user = Auth::user()['id'];
        // $userId= session::get('user')['id'];
        $products =  Cart::join('products', 'carts.product_id', 'products.id')
            ->select('products.*', 'carts.id as cartid', 'carts.quantity')
            ->where('carts.user_id', $user)
            ->get();

        $total = $products->sum(function ($product) {
            return $product->price * $product->quantity;
        });

        return view('cartlist', ['products' => $products, 'total' => $total]);
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow()
    {
        $user = Auth::user()['id'];
        // $userId= session::get('user')['id'];
        $total = Cart::join('products', 'carts.product_id', 'products.id')
            ->where('carts.user_id', $user)
            ->sum('products.price');
        return view('ordernow', ['total' => $total]);;
    }
    public function orderPlace(Request $req)
    {
        $user = Auth::user()['id'];
        $allCart = Cart::where('user_id', $user)->get();
        foreach ($allCart as $Cart) {
            $Order = new Order;
            $Order->product_id = $Cart['product_id'];
            $Order->user_id = $Cart['user_id'];
            $Order->address = $req->address;
            $Order->status = "pending";
            $Order->payment_method = $req->payment;
            $Order->payment_status = "pending";
            $Order->save();
        }
        Cart::where('user_id', $user)->delete();
        return redirect('/');
    }
    public function myOrder()
    {
        $user = Auth::user()['id'];
        $Orders =  DB::table('orders')
            ->join('products', 'Orders.product_id', 'products.id')
            ->where('Orders.user_id', $user)
            ->get();
        return view('myorder', ['Orders' => $Orders]);
    }

    public function increamentOrDecrment($type) 
    {
        $cartId = request()->get('cart_id');
        $cart = Cart::find($cartId);

        if($type == "decrement") {
            $cart->quantity = $cart->quantity - 1;
        } else if($type == "increment") {
            $cart->quantity = $cart->quantity + 1;
        }
        
        if($cart->quantity > 0) {
            $cart->save();
        }

        return redirect('/cartlist');
    }
}
