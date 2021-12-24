<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UsersController extends Controller
{
    //
    function loadView($user)
    {
        return view('users',['name'=>$user]);
    }
}
