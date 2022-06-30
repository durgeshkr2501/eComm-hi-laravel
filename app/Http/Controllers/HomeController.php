<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

         $data = product::paginate(8);
        //  dd($data);
         return view('home', ['products' => $data]);
    }
}
