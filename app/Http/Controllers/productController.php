<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
