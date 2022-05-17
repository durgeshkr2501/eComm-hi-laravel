<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
         $data = product::all();
         return view('home', ['products' => $data]);
    }
}
