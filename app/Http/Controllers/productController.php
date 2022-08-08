<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UserOrdernowRequest;

class ProductController extends Controller
{
    //
    function index()
    {
        $categories = Category::select("id", "category_id", "name", "slug")
        ->with("childCategory")
        ->whereNull('category_id')->get()->toArray();

        $data = product::paginate(8);
        return view('products.product', ['products' => $data],compact('categories'));
    }
    function detail($id)
    {
        
         
        $data = product::find($id);
        return view('detail', ['product' => $data]);
        
    }
    function search(Request $req, $category = null, $child_category = null, $child_category_id = null)
    {
        // $categories = Category::select("id", "category_id", "name", "slug")
        // ->with("childCategory")
        // ->whereNull('category_id')->get()->toArray();


        $query_string = $req->input('query');
        $query = product::query();
        
        if($query_string) {
            $query = $query->where('name', 'like', '%' . $query_string . '%')
                ->orWhere('category', 'like', "%$query_string%");
        }
            //  ->where('description', 'like', "%$query%");
        
        if(!is_null($child_category_id)) {
            $query = $query->where("category", $child_category_id);
        }

        $data = $query->get();

        return view('search', ['products' => $data]);
    }

    public function buyNow(Request $req)
    {
        $cart = $this->addToCart($req);

        return redirect(route('orderNow', ['cart' => $cart->id]));
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
            session()->flash('message', 'Product added successfully!');

       }
        if ($req->has('orderType') && $req->get('orderType') == 'now') {
            return $cart;
        }
        return redirect()->back();
    }
    function cartList()
    {
       // $data = product::find($id);
        $categories = Category::select("id", "category_id", "name", "slug")
        ->with("childCategory")
        ->whereNull('category_id')->get()->toArray();

        $user = Auth::user()['id'];
        // $userId= session::get('user')['id'];
        $products =  Cart::join('products', 'carts.product_id', 'products.id')
            ->select('products.*', 'carts.id as cartid', 'carts.quantity')
            ->where('carts.user_id', $user)
            ->get();

        $total = $products->sum(function ($product) {
            return $product->discounted_price * $product->quantity;
        });

        return view('cartlist', ['products' => $products, 'total' => $total],compact('categories'));
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow()
    {
        // filter for single product

        $cartId = request('cart');
        $user = Auth::user()['id'];
        // $userId= session::get('user')['id'];
        $total = Cart::join('products', 'carts.product_id', 'products.id', 'carts.quantity')
            ->where('carts.user_id', $user);
            

        if (!is_null($cartId)) {
            $total = $total->where("carts.id", $cartId);
        }

        $total    = $total->sum(DB::raw('products.price * carts.quantity'));

        return view('ordernow', ['total' => $total]);
        
    }
    public function orderPlace(UserOrdernowRequest $req)
    {
        $user = Auth::user()['id'];
        $cartId = request('cart');

        $allCart = Cart::where('user_id', $user);

        if (!is_null($cartId)) {
            $allCart = $allCart->where('id', $cartId);
        }

        $allCart = $allCart->get();

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

        $deletableCart = Cart::where('user_id', $user);

        if (!is_null($cartId)) {
            $deletableCart = $deletableCart->where('id', $cartId);
        }

        $deletableCart->delete();
       

        return redirect('myorder');
    }
    public function myOrder()
    {
        $user = Auth::user()['id'];
        
        $Orders =  DB::table('orders')
            ->join('products', 'orders.product_id', 'products.id')
            
            ->where('orders.user_id', $user)
            ->orderBy('orders.created_at', 'desc')->get();
           
            
        return view('myorder', ['Orders' => $Orders]);
       
    }

    public function increamentOrDecrment($type)
    {
        $cartId = request()->get('cart_id');
        $cart = Cart::find($cartId);

        if ($type == "decrement") {
            $cart->quantity = $cart->quantity - 1;
        } else if ($type == "increment") {
            $cart->quantity = $cart->quantity + 1;
        }

        if ($cart->quantity > 0) {
            $cart->save();
        }

        return redirect('/cartlist');
    }
}
