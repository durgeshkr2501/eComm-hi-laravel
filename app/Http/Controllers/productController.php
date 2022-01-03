<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    function index()
    {
        //return "welcom to product page";
        $data= product::all();
        return view('products.product',['products'=>$data]);
    }
}
