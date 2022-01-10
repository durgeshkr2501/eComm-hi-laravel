<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class productController extends Controller
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

        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id = $req->product_id;
        $cart->save();
        
        return redirect('/');
    }
    function cartList()
    {
        $user = Auth::user('user')['id'];
       // $userId= Auth::get('user')['id'];
      $data=  DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->select('products.*','cart.id as cartid')
        ->where('cart.user_id',$user)
        ->get();
        return view('cartlist',['products'=>$data]);
    }
    function removeCart($id)
    {
       cart::destroy($id);
       return redirect('cartlist');
    }
}
